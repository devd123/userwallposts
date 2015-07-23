<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User_model extends CI_Model {

 
	public function get_login($data) {

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('Email' => $data['email'],'Password' => $data['password']));
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
	   	return $query->row();
 	 	} else {
		return false;
		}

    }
		
	
}//end of the class
?>