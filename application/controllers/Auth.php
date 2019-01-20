<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('user_model');
    }

    public function register()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password]');

        if ($this->form_validation->run() === false) {
            $this->load->view('layouts/header');
            $this->load->view('auth/register');
            $this->load->view('layouts/footer');
        } else {
            // $this->user_model->insert_user();//save data
            // $this->email->from('dianbugas@gmail.com', 'dian bugas');
            // $this->email->to($email);
            // $this->email->subject('register aplikasi auth local');
            // $this->email->message("
            //     Klik untuk konfirmasi pendaftaran 
            //     <a href='http://localhost/authentikasiCI/auth/verify/$email/$token'>Konfirmasi Email</a>
            // ");
            // $this->mail->
        }
    }

}
