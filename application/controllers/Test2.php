<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Test2 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load database library      
        $this->load->database();
        //load Model Model_db.php
        $this->load->model('Model_api');
    }
    
    function test(){
        echo 'for test';
    }

    // get current time of Asia zone
    public function user_post() {
        $name = 'nayan';
        $pass = 'n5565';
        $data = array($name => $this->input->post('name'),
            $pass => $this->input->post('pass'),
            'c_type' => $this->input->post('type')
        );
//           $r = $this->user_model->insert($data);
//           $this->response($r); 
        print_r($data);
    }

    function math() {
        $m = $this->input->post('m');
        $n = $this->input->post('n');
        $total = $m * $n;
        $result = 'total= ' . $total;
//           print($result);
        echo ($result);
    }

    function name() {
        $data = $this->input->get('d');
        $pack = $this->input->get('p');
        $result = $data . ' ' . $pack;
        echo ($result);
    }

    function dbTest() {
        $sql = 'select * from nayantb';

        $query = $this->db->query($sql);

        $result = $query->result();
        //
        $querys = $this->db->get("nayantb");
        $data['login'] = $querys->result();

        print_r($data);
    }

    function updateTb() {
        $data = array('user_name' => 'masud', 'pass_word' => '7799');
        $this->db->set($data);
        $this->db->where("id", '2');
        $updated = $this->db->update("nayantb", $data);
        print_r($updated);
    }

    function insertTb() {
        $data = array('id' => 3, 'user_name' => 'rony', 'pass_word' => '4433');
        $this->db->insert('nayantb', $data);
    }

    function delete() {
        $this->db->where("id", '2');
        $this->db->delete("nayantb");
    }

    function log_in() {
        $user_name = $this->input->post('username');
        $password = $this->input->post('pass_word');
        $this->db->where("user_name", $user_name);
        $this->db->where("pass_word", $password);
        $querys = $this->db->get("nayantb");
        $data['login'] = $querys->result();

        $number = $querys->num_rows();

        if ($number > 0) {

            $response = array('status' => 'success',
                'user_name' => $user_name,
                'pass_word' => $password);
            print_r(json_encode($response));
        } else {
            $response = array('status' => 'failer');
            print_r(json_encode($response));
        }
    }

    function jsonData() {
        $this->db->select('*');
        $object = $this->db->get("object");
        $querys = $this->db->get("nayantb");
        $result2 = $object->result();
        $result = $querys->result();
        $total = array(
            'data' => $result);
        print_r(json_encode($total, JSON_FORCE_OBJECT));
    }

    function registrationUI() {
        $this->load->view('registration');
    }

    function registration() {
        $errors = array();
        $username = $this->input->post("username");
        $firstname = $this->input->post("firstname");
        $lastname = $this->input->post("lastname");
        $password = $this->input->post("password");
        $confirmpassword = $this->input->post("confirmpassword");
        $email = $this->input->post("email");

        if (isset($username) && isset($firstname) && isset($lastname) && isset($password) && isset($confirmpassword) && isset($email)) {
            if (empty($username)) {
                array_push($errors, "username is required");
                echo 'username is required';
            }
            if (empty($firstname)) {
                array_push($errors, "firstname is required");
                echo 'firstname is required';
            }
            if (empty($lastname)) {
                array_push($errors, "lastname is required");
                echo 'lastname is required';
            }
            if (empty($email)) {
                array_push($errors, "email is required");
                echo 'email is required';
            }
            if (empty($password)) {
                array_push($errors, "password is required");
                echo 'password is required';
            }
            if ($password != $confirmpassword) {
                array_push($errors, "password is required");
                echo 'password did not match is required';
            }
            if (count($errors) == 0) {
                $data = array('username' => $username, 'firstname' => $firstname, 'lastname' => $lastname, 'password' => $password, 'confirmpassword' => $confirmpassword, 'email' => $email);
                $insert = $this->db->insert('user', $data);
                if ($insert > 0) {
                    echo 'successfully added';
                } else {
                    echo 'not inserted';
                }
            }
        }
    }

    function login() {

        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            echo 'sucess';
        } else {
            echo 'wrong username or password';
        }
    }

    public function regist_api() {
       
        $json = $this->input->post('reg');
      
        $data = json_decode($json);
  
        $last_id = $this->Model_api->isRegistration($data);
 
        
        //-1 : email,phone,nid anyone  exists
        // 1 : all new
        // 0: insert err

        if ($last_id > 0) {
            $response = array('status' => 'success',
                'user_id' => $last_id);
            print_r(json_encode($response));
        } else {
            $response = array('status' => 'failed');
            print_r(json_encode($response));
        }
    }
    
    function login_api(){
        $user = $this->input->post('username');
        $pass = $this->input->post('pass');
        $user_id = $this->Model_api->isLogin($user,$pass);
         if ($user_id > 0) {
            //exits
            $response = array(
                'status' => 'success',
                'user_id' => $user_id,
                'access_token' => 'default'
            );
            print_r(json_encode($response));
        } else {
            //dont exist
            $response = array(
                'status' => 'failed',
                'access_token' => 'no'
            );
            print_r(json_encode($response));
        }
    }

}
