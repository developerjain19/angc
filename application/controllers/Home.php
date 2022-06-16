<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {

        $data['logo'] = 'assets/logo.png';
        $data['title'] = 'Welcome To ANGC Group Pvy Ltd';


        if ($this->session->userdata('staff_id')) {
            redirect(base_url('dashboard'));
        } else {
            $this->load->view('home', $data);
        }
    }

    public function staff_regsiteration()
    {
        if ($this->session->has_userdata('login_user_id')) {
            redirect(base_url('Home/profile'));
        }
        if (count($_POST) > 0) {
            $formdata = $this->input->post();
              $formdata['staff_code'] = 'ANST' . rand(10, 1000);
            $table = "tbl_staff";

            if (strlen($formdata['number']) == 10) {
                $regdata = $this->CommonModal->getRowById('tbl_staff', 'number', $formdata['number']);

                if (empty($regdata)) {
                    $regdataemail = $this->CommonModal->getRowById('tbl_staff', 'email', $formdata['email']);
                    if (empty($regdataemail)) {


                        $this->CommonModal->insertRowReturnId($table, $formdata);
                    } elseif (count($regdataemail) == 1) {
                        $this->session->set_userdata('regmsg', 'Mail ID Already registered');
                        redirect(base_url('staff_regsiteration'));
                    } else {
                        $this->session->set_userdata('regmsg', 'Your account is been blocked with multiple  mail ID ' . $formdata['email']);
                        redirect(base_url('staff_regsiteration'));
                    }
                } elseif (count($regdata) == 1) {
                    $this->session->set_userdata('regmsg', 'Contact no. Already registered');
                    redirect(base_url('staff_regsiteration'));
                } else {
                    $this->session->set_userdata('regmsg', 'Your account is been blocked with with multiple contact no. ' . $formdata['number']);
                    redirect(base_url('staff_regsiteration'));
                }
            } else {
                $this->session->set_userdata('regmsg', 'Invalid Contact no. Contact no. should be of 10 digit');
                redirect(base_url('staff_regsiteration'));
            }
            $this->session->set_userdata('msg', 'You have registered successfully. Login To Continue.');
            $this->session->set_userdata('msg_class', 'alert-success');
            redirect(base_url());
        } else {
            $data['title'] = 'Staff Registeration | ANGC Group Pvy Ltd';
            $data['logo'] = 'assets/logo.png';
            $this->load->view('staff_registeration', $data);
        }
    }
}
