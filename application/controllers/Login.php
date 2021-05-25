<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->model('Tbl_user');
    }

    function index()
    {
        $this->load->view('login');
    }

    function validation()
    {
        $this->form_validation->set_rules('user_username', 'Username', 'required|trim');
        $this->form_validation->set_rules('user_password', 'Password', 'required|trim');
        if($this->form_validation->run())
        {
            $result = $this->Tbl_user->can_login($this->input->post('user_username'), $this->input->post('user_password'));
            if($result == ''){
                redirect('dashboard');
            }else{
                $this->session->set_flashdata('message', $result);
                redirect('login');
            }
        }else{
            $this->index();
        }
    }

}