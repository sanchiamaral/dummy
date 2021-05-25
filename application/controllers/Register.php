<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->model('Tbl_user');
    }

    function index()
    {
        $this->load->view('register');
    }

    function validation()
    {
        $this->form_validation->set_rules('user_username', 'Username', 'required|trim|is_unique[tbl_user.username]');
        $this->form_validation->set_rules('user_password', 'Password', 'required');

        if($this->form_validation->run())
        {
            // $verification_key = md5(rand());
            $encrypted_pswd = $this->encryption->encrypt($this->input->post('user_password'));
            $data = array(
                'username'  => $this->input->post('user_username'),
                'password'  => $encrypted_pswd,
                // 'verification_key' => $verification_key
            );
            $id = $this->Tbl_user->insert($data);
            if($id > 0){
                // $email_subject = "Please verify email for login";
                // $email_message = "
                // <p>Hi ".$this->input->post('user_name')."</p>
                // <p>This is email verification mail from Project Dummy Register system. For complete registration process and login into system. First you want to verify you email by click this <a href='".base_url()."register/verify_email/".$verification_key."'>link</a>.</p>
                // <p>Once you click this link your email will be verified and you can login into system.</p>
                // <p>Thanks,</p>
                // ";
                // $email_config = array(
                //     'protocol'  => 'smtp',
                //     'smtp_host' => 'ssl://smtp.googlemail.com',
                //     'smtp_port' => 465,
                //     'smtp_user' => 'infodummy0@gmail.com',
                //     'smtp_pass' => 'ProjectDummy123',
                //     'mailtype'  => 'html',
                //     'charset'   => 'iso-8859-1',
                //     'wordwrap'  => TRUE
                // );
                // $this->load->library('email', $email_config);
                // $this->email->set_newline("\r\n");
                // $this->email->from('infodummy0@gmail.com');
                // $this->email->to($this->input->post('user_email'));
                // $this->email->subject($email_subject);
                // $this->email->message($email_message);
                // if($this->email->send()){
                //     $this->session->set_flashdata('message', 'Check in your email for verification');
                //     redirect('register');
                // }

                $this->session->set_flashdata('message', 'Registration successful');
                redirect('register');
            }
        }else{
            $this->index();
            // show_error($this->email->print_debugger());
        }
    }
}