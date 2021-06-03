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
                $this->session->set_flashdata('message', 'Registration successful');
                redirect('register');
            }
        }else{
            $this->index();
        }
    }
}