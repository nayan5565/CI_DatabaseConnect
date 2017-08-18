<?php

Class Model_api extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function isLogin($user, $pass) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->id;
        } else {
            return 0;
        }
    }

    public function isExists($table, $colmn, $value) {
        $this->db->select($colmn);
        $this->db->from($table);
        $this->db->where($colmn, $value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function isRegistration($data) {
        $username = $data->username;
        $firstname = $data->firstname;
        $lastname = $data->lastname;
        $password = $data->password;
        $confirmpassword = $data->confirmpassword;
        $email = $data->email;
        if (!$this->isExists('user', 'username', $username) &&
                !$this->isExists('user', 'username', $username)) {
            $insertData = array('username' => $username,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'password' => $password,
                'confirmpassword' => $confirmpassword,
                'email' => $email);
            $this->db->insert('user', $insertData);
            return $this->db->insert_id();
        } else {
            return -1;
        }
    }

}
