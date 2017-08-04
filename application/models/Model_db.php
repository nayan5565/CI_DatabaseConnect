<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Model_db extends CI_Model {
	 function addData($values){
		$this->db->insert('tbl_name',$values);
	}
	 function addData2(){
		$this->db->set('id',5);
		$this->db->set('name','b');
		$this->db->set('roll','22');
		$this->db->insert('tbl_name');
	}
	 function updateData($values){
		$this->db->where('id',3);
		$result=$this->db->update('tbl_name',$values);
		echo $result;
	}
	function deleteData($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_name');
	}
	function emptyTable(){
		$this->db->empty_table('tbl_name');
	}
	 function getData()	
	{
		$this->db->select('*');
		$this->db->from('tbl_name');
		$query=$this->db->get();
		$result=$query->result();
		echo json_encode($result);
	}
}
