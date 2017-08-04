<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Test2 extends CI_Controller{
   public function __construct()
{
    parent::__construct();  
    //load database library      
    $this->load->database();
    //load Model Model_db.php
    $this->load->model('Model_db');
	
}
	// get current time of Asia zone
         public function user_post(){
             $name='nayan';
             $pass='n5565';
           $data = array($name => $this->input->post('name'),
           $pass => $this->input->post('pass'),
           'c_type' => $this->input->post('type')
           );
//           $r = $this->user_model->insert($data);
//           $this->response($r); 
        print_r($data);
       }
       function math(){
           $m=$this->input->post('m');
           $n=$this->input->post('n');
           $total=$m*$n;
          $result='total= '.$total;
//           print($result);
           echo ($result);
        
       }
       function name(){
           $data=$this->input->get('d');
           $pack=$this->input->get('p');
           $result=$data.' '.$pack;
           echo ($result);
       }
       function dbTest(){
           $sql='select * from nayantb';
        
           $query=$this->db->query($sql);
           
           $result=$query->result();
           //
           $querys = $this->db->get("nayantb"); 
           $data['login'] = $querys->result();
         
           print_r($data);
       }
       function updateTb(){
           $data = array( 'user_name' => 'masud','pass_word'=>'7799'); 
           $this->db->set($data); 
           $this->db->where("id", '2'); 
           $updated=$this->db->update("nayantb", $data);
           print_r($updated);
       }
       function insertTb(){
           $data=array('id'=>3,'user_name'=>'rony','pass_word'=>'4433');
           $this->db->insert('nayantb',$data);
       }
       function delete(){
           $this->db->where("id", '2'); 
           $this->db->delete("nayantb"); 
       }
       function log_in(){
           $user_name=$this->input->post('username');
           $password=$this->input->post('pass_word');
           $this->db->where("user_name", $user_name);     
           $this->db->where("pass_word", $password); 
           $querys = $this->db->get("nayantb"); 
           $data['login'] = $querys->result();
         
           $number=$querys->num_rows();
           
            if ($number>0){
           
                $response=array('status'=>'success',
                    'user_name'=>$user_name,
                    'pass_word'=>$password);
                print_r(json_encode($response));
            }else {
                 $response=array('status'=>'failer');
                print_r(json_encode($response));
                
            }
       }
       function jsonData(){
           $response=array('status'=>'success',
                    'user_name'=>'$user_name',
                    'pass_word'=>'$password');
                print_r(json_encode($response));
       }
}