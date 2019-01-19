<?php

class User_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_user()
    {
        $this->load->helper('string');
        $_SESSION['token'] = random_string('alnum', 16);

        $data = [
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'token' => $_SESSION['token']
        ];
        $this->db->insert('users', $data);
    }
}