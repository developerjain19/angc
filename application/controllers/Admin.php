<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $get['title'] = "Admin Login";
        $get['favicon'] = "assets/images/logo.png";
         $this->load->view('admin/login', $get);
    }

    public function login()
    {


        $this->form_validation->set_rules('number', 'User Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');

        if ($this->form_validation->run()) {
            $number = $_POST['number'];
            $password = $_POST['password'];
            $data =  $this->CommonModal->getRowById('tbl_staff', 'number', $number);
            if ($data) {

                $f_password = $data[0]['password'];


                if ($password != $f_password) {
                    flashData('login_error', 'Enter a valid Password.');
                } else {


                    if($data[0]['status'] == 0)
                    {
                        flashData('login_error', 'Your Profile Is Not Verified. Please Contact Admin ');
                    }
                    else
                    {
                    
                    $this->session->set_userdata(array('staff_id' => $data[0]['uid'], 's_email' => $data[0]['email'], 's_number' => $data[0]['number'], 's_name' => $data[0]['name'], 'position' => $data[0]['position']));
                    redirect('dashboard');
                    }
                }
            } else {
                flashData('login_error', 'Enter a valid number ');
            }
        }
        redirect(base_url());
    }

    public function slogout()
    {
        $this->load->library('session');
        $this->session->unset_userdata('staff_id');
        $this->session->unset_userdata('position');
        redirect(base_url());
    }


 

   
}
