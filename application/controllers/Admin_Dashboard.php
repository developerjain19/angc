<?php
defined('BASEPATH') or exit('no direct access allowed');

class Admin_Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (sessionId('staff_id') == "") {
            redirect(base_url());
        }
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index()
    {
        $data['title'] = "Home";
        $data['favicon'] = base_url() . 'assets/favicon.png';
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');


        $data['leads'] = $this->CommonModal->getNumRow('tbl_leads');
        $data['new'] = $this->CommonModal->getNumRows('tbl_leads', array('verification' => 'New'));
        $data['verified'] = $this->CommonModal->getNumRows('tbl_leads', array('verification' => 'Verified'));
        $data['staff'] =  $this->CommonModal->getNumRows('tbl_staff', "`position` NOT IN ('1')");
        $data['reject'] = $this->CommonModal->getNumRows('tbl_leads', array('verification' => 'Reject'));


        $data['sleads'] = $this->CommonModal->getNumRows('tbl_leads',  array('staff_id' => sessionId('staff_id')));
        $data['snew'] = $this->CommonModal->getNumRows('tbl_leads', array('verification' => 'New', 'staff_id' => sessionId('staff_id')));
        $data['sverified'] = $this->CommonModal->getNumRows('tbl_leads', array('verification' => 'Verified', 'staff_id' => sessionId('staff_id')));
        $data['sreject'] = $this->CommonModal->getNumRows('tbl_leads', array('verification' => 'Reject', 'staff_id' => sessionId('staff_id')));

        $data['vleads'] = $this->CommonModal->getNumRows('tbl_leads',  array('verifer' => sessionId('staff_id')));
        $data['vnew'] = $this->CommonModal->getNumRows('tbl_leads', array('verification' => 'New', 'verifer' => sessionId('staff_id')));
        $data['vverified'] = $this->CommonModal->getNumRows('tbl_leads', array('verification' => 'Verified', 'verifer' => sessionId('staff_id')));
        $data['vreject'] = $this->CommonModal->getNumRows('tbl_leads', array('verification' => 'Reject', 'verifer' => sessionId('staff_id')));

        $this->load->view('admin/dashboard', $data);
    }


    public function staff()
    {
        $data['staff'] =  $this->CommonModal->getRowByIdInOrder('tbl_staff', "`position` NOT IN ('1')",   'uid', 'desc');
        $data['title'] = 'Staff Registration';

        if (count($_POST) > 0) {
            // print_r($_POST);

            $post = $this->input->post();

            $post['staff_code'] = 'ANST' . rand(10, 1000);
            $insert = $this->Dashboard_model->insertdata('tbl_staff', $post);

            if ($insert) {
                $this->session->set_flashdata('msg', 'staff  Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url() . 'staff');
        } else {

            $this->load->view('admin/staff', $data);
        }
    }

    public function staff_edit($id = true)
    {
        $data['title'] = 'staff';
        $id = decryptId($id);
        $data['staff'] = $this->CommonModal->getRowById('tbl_staff', 'uid ', $id);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $update = $this->CommonModal->updateRowById('tbl_staff', 'uid ', $id, $post);
            if ($update) {
                $this->session->set_flashdata('msg', 'Staff  Edit successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Staff  Edit successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url() . 'admin_Dashboard/staff');
        } else {
            $this->load->view('admin/staff_edit', $data);
        }
    }

    public function leads()
    {

        $status =  $this->input->get('status');

        if (isset($status)) {
            $data['leads'] = $this->CommonModal->getRowByIdInOrder('tbl_leads',    array('verification' => $status), 'lid', 'desc');
            $data['sleads'] = $this->CommonModal->getRowByIdInOrder('tbl_leads',    array('staff_id' => sessionId('staff_id'), 'verification' => $status), 'lid', 'desc');
            $data['vleads'] = $this->CommonModal->getRowByIdInOrder('tbl_leads',    array('verifer' => sessionId('staff_id'), 'verification' => $status), 'lid', 'desc');
        } else {
            $data['leads'] = $this->CommonModal->getAllRowsInOrder('tbl_leads', 'lid', 'desc');
            $data['sleads'] = $this->CommonModal->getRowByIdInOrder('tbl_leads',    array('staff_id' => sessionId('staff_id')), 'lid', 'desc');
            $data['vleads'] = $this->CommonModal->getRowByIdInOrder('tbl_leads',    array('verifer' => sessionId('staff_id')), 'lid', 'desc');
        }


        $data['ltype'] =  $this->CommonModal->getAllRowsInOrder('tbl_leadtype', 'tid', 'desc');
        $data['stype'] =  $this->CommonModal->getAllRowsInOrder('tbl_servicetype', 'sid', 'desc');
        $data['title'] = 'Leads List';


        if (count($_POST) > 0) {
            $formdata = $this->input->post();

            $table = "tbl_leads";

            if (strlen($formdata['number']) == 10) {
                $regdata = $this->CommonModal->getRowById('tbl_leads', 'number', $formdata['number']);

                if (empty($regdata)) {
                    $regdataemail = $this->CommonModal->getRowById('tbl_leads', 'email', $formdata['email']);
                    if (empty($regdataemail)) {

                        $formdata['user_code'] = 'ANUS' . rand(10, 1000);
                        $formdata['password'] = substr($formdata['name'], 0, 3) . substr($formdata['number'], 0, 3);;

                        $message = donormail($formdata['number'],  $formdata['password']);

                        sendmail($formdata['email'], 'Registered with ANGC | Welcome User', $message);

                        $this->CommonModal->insertRowReturnId($table, $formdata);
                        redirect(base_url() . 'leads');
                    } elseif (count($regdataemail) == 1) {
                        $this->session->set_flashdata('msg', 'Mail ID Already registered');
                        $this->session->set_flashdata('msg_class', 'alert-danger');
                        redirect(base_url() . 'leads');
                    } else {
                        $this->session->set_flashdata('msg', 'Your account is been blocked with multiple  mail ID ' . $formdata['email']);
                        $this->session->set_flashdata('msg_class', 'alert-danger');
                        redirect(base_url() . 'leads');
                    }
                } elseif (count($regdata) == 1) {
                    $this->session->set_flashdata('msg', 'Contact no. Already registered');
                    $this->session->set_flashdata('msg_class', 'alert-danger');
                    redirect(base_url() . 'leads');
                } else {
                    $this->session->set_flashdata('msg', 'Your account is been blocked with with multiple contact no. ' . $formdata['number']);
                    $this->session->set_flashdata('msg_class', 'alert-danger');
                    redirect(base_url() . 'leads');
                }
            } else {
                $this->session->set_flashdata('msg', 'Invalid Contact no. Contact no. should be of 10 digit');
                $this->session->set_flashdata('msg_class', 'alert-danger');
                redirect(base_url() . 'leads');
            }
            $this->session->set_flashdata('msg', 'You have registered successfully. Login To Continue.');
            $this->session->set_flashdata('msg_class', 'alert-success');
            redirect(base_url() . 'leads');
        } else {
            $this->load->view('admin/leads', $data);
        }
    }



    public function leads_edit($id = true)
    {
        $data['title'] = 'Leads Edit';
        $id = decryptId($id);
        $data['leads'] = $this->CommonModal->getRowById('tbl_leads', 'lid ', $id);

        if (count($_POST) > 0) {
            $post = $this->input->post();

            $update = $this->CommonModal->updateRowById('tbl_leads', 'lid ', $id, $post);
            if ($update) {
                $this->session->set_flashdata('msg', 'Leads  Edit successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Leads  Edit successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url() . 'admin_Dashboard/leads');
        } else {
            $this->load->view('admin/leads_edit', $data);
        }
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
            redirect(base_url() . 'documents/' . $lead);
        } else {

            redirect(base_url() . 'leads');
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
            redirect(base_url() . 'documents/' . $lead);
        } else {

            redirect(base_url() . 'leads');
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
            redirect(base_url() . 'documents/' . $lead);
        } else {

            redirect(base_url() . 'leads');
        }
    }
    public function documents($id = true)
    {

        $data['title'] = 'Leads List';
        $id = decryptId($id);

        $data['lid'] = decryptId($id);

        $data['doc'] = $this->CommonModal->getRowByIdInOrder('tbl_document_list',  array('image_section' => '0'), 'did', 'ASC');
        $data['leads'] = $this->CommonModal->getRowById('tbl_leads', 'lid ', $id);
        $data['submission'] = $this->CommonModal->getAllRowsInOrder('tbl_submission_list', 'sid', 'ASC');
        $this->load->view('admin/documents', $data);
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
            redirect(base_url() . 'documents/' . $lo);
        } else {

            redirect(base_url() . 'leads');
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
            redirect(base_url() . 'documents/' . $lo);
        } else {

            redirect(base_url() . 'leads');
        }
    }


    public function addverfier()
    {
        $featured = $this->input->post('featured');
        $pid = $this->input->post('pid');
        $this->CommonModal->updateRowById('tbl_leads', 'lid', $pid, array('verifer' => $featured));
    }


    public function staffstatus()
    {
        $status = $this->input->post('status');
        $pid = $this->input->post('pid');
        $this->CommonModal->updateRowById('tbl_staff', 'uid', $pid, array('status' => $status));
    }


    public function stafftoverfier()
    {
        $positiond = $this->input->post('positiond');
        $pid = $this->input->post('pid');
        $this->CommonModal->updateRowById('tbl_staff', 'uid', $pid, array('position' => $positiond));
    }

    public function leadverfication()
    {
        $status = $this->input->post('status');
        $pid = $this->input->post('pid');
        $this->CommonModal->updateRowById('tbl_leads', 'lid', $pid, array('verification' => $status));
    }

    public function leadworkingstatus()
    {
        $status = $this->input->post('wstatus');
        $pid = $this->input->post('pid');
        $this->CommonModal->updateRowById('tbl_leads', 'lid', $pid, array('working_status' => $status));
    }


    public function lead_type()
    {
        $data['type'] =  $this->CommonModal->getAllRowsInOrder('tbl_leadtype', 'tid', 'desc');
        $data['title'] = 'Lead Type';

        if (count($_POST) > 0) {
            // print_r($_POST);

            $post = $this->input->post();


            $insert = $this->Dashboard_model->insertdata('tbl_leadtype', $post);

            if ($insert) {
                $this->session->set_flashdata('msg', 'Lead Type  Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url() . 'lead_type');
        } else {

            $this->load->view('admin/lead_type', $data);
        }
    }

    public function leadtype_del($id)
    {

        $id = decryptId($id);

        $done =  $this->CommonModal->deleteRowById('tbl_leadtype', array('tid' => $id));

        if ($done) {
            $this->session->set_flashdata('msg', 'Lead Type delete successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        }

        redirect(base_url() . 'lead_type');
    }




    public function service_type()
    {
        $data['type'] =  $this->CommonModal->getAllRowsInOrder('tbl_servicetype', 'sid', 'desc');
        $data['title'] = 'Service Type';

        if (count($_POST) > 0) {
            // print_r($_POST);

            $post = $this->input->post();


            $insert = $this->Dashboard_model->insertdata('tbl_servicetype', $post);

            if ($insert) {
                $this->session->set_flashdata('msg', 'Service Type  Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url() . 'service_type');
        } else {

            $this->load->view('admin/service_type', $data);
        }
    }

    public function servicetype_del($id)
    {

        $id = decryptId($id);

        $done =  $this->CommonModal->deleteRowById('tbl_servicetype', array('sid' => $id));

        if ($done) {
            $this->session->set_flashdata('msg', 'service Type delete successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        }

        redirect(base_url() . 'service_type');
    }

    public function admincomment()
    {
        $post = $this->input->post();
        $lead_id = $this->input->post('lead_id');

        $lid = encryptId($lead_id);

        $insert = $this->Dashboard_model->insertdata('tbl_admin_comment', $post);

        if ($insert) {
            $this->session->set_flashdata('msg', 'Comment Added Successfull');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Something went wrong Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }
        redirect(base_url() . 'documents/' . $lid);
    }
}
