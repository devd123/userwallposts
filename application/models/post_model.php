<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Post_model extends CI_Model {

 
	public function list_post() {

		$this->db->select('*');    
		$this->db->from('posts');
		$query = $this->db->get();
		
		if($query){
		return $query->result();
		}else{
		return false;
		}

    }

    public function insert_post($data) {

		$this->db->insert('posts', $data);
		if ($this->db->affected_rows() > 0) {
		return true;
		} else {
		return false;
		}

    }
		
	
}//end of the class
?>