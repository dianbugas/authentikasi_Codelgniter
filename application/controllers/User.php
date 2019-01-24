<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model');
    }

    public function profile()
    {
        if (!$this->User_Model->is_LoggedIn()) {
            redirect('login');
        }

        $data['user'] = $this->User_Model->get_user('id', $_SESSION['user_id']);
        $this->load->view('layout/header');
        $this->load->view('user/profile', $data);
        $this->load->view('layout/footer');
    }
}