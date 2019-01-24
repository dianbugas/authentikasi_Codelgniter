<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model');
    }

    public function register()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password]');

        if ($this->form_validation->run() === false) {
            $this->load->view('layouts/header');
            $this->load->view('auth/register');
            $this->load->view('layouts/footer');
        } else {

            $this->User_Model->insert_user();
            $this->send_email_verification($this->input->post('email'), $_SESSION['token']);
            redirect('login');
        }
    }
    public function send_email_verification($emial, $token)
    {
        $this->load->library('email');
        $this->email->from('dianbugas@gmail.com', 'dian bugas');
        $this->email->to('email');
        $this->email->subject('register aplikasi auth local');
        $this->email->message("
                    klik untuk konfirmasi pendaftaran
                    <a href='http://localhost/authentikasiCI/verify/$email/$token'>Konfirmasi Email</a>
        ");
        $this->email->set_mailtype('html');
        $this->email->send();
    }

    public function verify_register($email, $token)
    {
        $user = $this->user_model->get_user('email', $email);
    
        //cek email ada atau tidak
        if (!user)
            die('email not exists');

        if ($user['token'] !== $token)
            die('token not match');

        //update user role
        $this->User_Model->update_role($user['id'], 1);

        //set session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['logged_in'] = true;
        //redirect profil
        redirect('profile');
    }
}
