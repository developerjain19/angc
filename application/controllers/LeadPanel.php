<?php
defined('BASEPATH') or exit('no direct access allowed');

class LeadPanel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (sessionId('lid') == "") {
            redirect(base_url('lead_login'));
        }
        date_default_timezone_set("Asia/Kolkata");
    }


    public function user_panel()
    {

        $data['title'] = sessionId('name') .   'Profile';
        // print_r($_SESSION);
        $data['doc'] = $this->CommonModal->getRowByIdInOrder('tbl_document_list',  array('image_section' => '0'), 'did', 'ASC');
        $data['leads'] = $this->CommonModal->getRowById('tbl_leads', 'lid ', sessionId('lid'));
        $data['submission'] = $this->CommonModal->getAllRowsInOrder('tbl_submission_list', 'sid', 'ASC');
        $this->load->view('admin/user-profile', $data);
    }

    public function insert_submission()
    {
        if (count($_POST) > 0) {

            $post = $this->input->post();
            $insert = $this->Dashboard_model->insertdata('tbl_submission', $post);

            $lid = $this->input->post('lead_id');
            $lead = encryptId($lid);
            if ($insert) {
                $this->session->set_flashdata('msg', 'Submission  Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url() . 'user_panel');
        } else {

            redirect(base_url() . 'user_panel');
        }
    }



    public function insert_submission_file()
    {
        if (count($_POST) > 0) {

            $post = $this->input->post();
            $lid = $this->input->post('lead_id');

            $post['lead_id'] = $lid;

            $filetemp = $post['file'];

            if ($_FILES['file_temp']['name'] != '') {
                $file = imageUpload('file_temp', 'uploads/submission/');
                $post['file'] = $file;
                if ($filetemp != "") {
                    unlink('uploads/submission/' . $filetemp);
                }
            }

            $datarow = $this->CommonModal->getRowByMoreId('tbl_submission_file', array('lead_id' => $lid));
            if ($datarow != '') {
                $insert = $this->CommonModal->updateRowById('tbl_submission_file', 'fid', $datarow[0]['sid'], $post);
            } else {
                $insert = $this->CommonModal->insertRow('tbl_submission_file', $post);
            }

            $lead = encryptId($lid);
            if ($insert) {
                $this->session->set_flashdata('msg', 'Submission  Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Submission  Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url() . 'user_panel');
        } else {

            redirect(base_url() . 'user_panel');
        }
    }

    public function update_submission()
    {
        if (count($_POST) > 0) {

            $post = $this->input->post();
            $lid = $this->input->post('lead_id');
            $sub_id = $this->input->post('sub_id');


            $lead = encryptId($lid);

            $update = $this->CommonModal->updateRowById('tbl_submission', 'sub_id', $sub_id, $post);

            if ($update) {
                $this->session->set_flashdata('msg', 'Submission Update successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url() . 'user_panel');
        } else {

            redirect(base_url() . 'user_panel');
        }
    }

    public function insert_document()
    {
        if (count($_POST) > 0) {
            $countImg = '';
            $did = $this->input->post('doc_id');
            $status = $this->input->post('status');
            $remark = $this->input->post('remark');
            $image = $this->input->post('image');

            $lid = $this->input->post('lead_id');
            $lo = encryptId($lid);

            // echo'<pre>';
            // print_r($_POST);
            // print_r($_FILES);
            // exit;

            if (isset($_FILES['image_temp']['name'])) {
                $countImg = count($_FILES['image_temp']['name']);
            }
            $responce = array();
            if (!empty($did)) {
                for ($i = 0; $i < count($did); $i++) {
                    if ($did[$i] != '') {

                        $no = rand();
                        if (!empty($_FILES["image_temp"]["name"][$i])) {
                            $folder = "uploads/files/";
                            move_uploaded_file($_FILES["image_temp"]["tmp_name"][$i], "$folder" . $no . $_FILES["image_temp"]["name"][$i]);
                            $file_name1 = $no . $_FILES["image_temp"]["name"][$i];
                        } else {
                            $file_name1 = $image[$i];
                        }

                        $data = array('doc_id' => $did[$i], 'lead_id' => $lid, 'remark' => ((isset($remark[$i])) ? $remark[$i] : ''), 'image' => $file_name1, 'status' => ((isset($status[$i])) ? '1' : '0'));
                        // print_r($data);

                        $datarow = $this->CommonModal->getRowByMoreId('tbl_document', array('doc_id' => $did[$i], 'lead_id' => $lid));
                        if ($datarow != '') {
                            $insert = $this->CommonModal->updateRowById('tbl_document', 'id', $datarow[0]['id'], $data);
                        } else {
                            $insert = $this->CommonModal->insertRow('tbl_document', $data);
                        }
                        if ($insert) {
                            array_push($responce, 'true');
                        } else {
                            array_push($responce, 'false');
                        }
                    }
                }
            }

            if (array_search("false", $responce)) {

                $this->session->set_flashdata('msg', 'Something went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            } else {
                $this->session->set_flashdata('msg', 'Document Verify successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url() . 'user_panel');
        } else {

            redirect(base_url() . 'user_panel');
        }
    }



    public function document_text()
    {
        if (count($_POST) > 0) {

            $did = $this->input->post('doc_id');
            $remark = $this->input->post('remark');

            $lid = $this->input->post('lead_id');
            $lo = encryptId($lid);
            $responce = array();
            if (!empty($did)) {
                for ($i = 0; $i < count($did); $i++) {
                    if ($did[$i] != '') {
                        $data = array('doc_id' => $did[$i], 'lead_id' => $lid, 'remark' => $remark[$i]);
                        $datarow = $this->CommonModal->getRowByMoreId('tbl_document_text', array('doc_id' => $did[$i], 'lead_id' => $lid));
                        // print_r($datarow);

                        if ($datarow != '') {
                            $insert = $this->CommonModal->updateRowById('tbl_document_text', 'id', $datarow[0]['id'], $data);
                        } else {
                            $insert = $this->CommonModal->insertRow('tbl_document_text', $data);
                        }
                        if ($insert) {
                            array_push($responce, 'true');
                        } else {
                            array_push($responce, 'false');
                        }
                    }
                }
            }

            if (array_search("false", $responce)) {

                $this->session->set_flashdata('msg', 'Something went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            } else {
                $this->session->set_flashdata('msg', 'Document Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url() . 'user_panel');
        } else {

            redirect(base_url() . 'user_panel');
        }
    }
}
