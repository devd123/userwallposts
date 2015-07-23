<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Post_model extends CI_Model {

 
	public function postlist() {

		$this->db->select('cases.id,cases.name,cases.evictiontype,cases.status,properties.property_name');    
		$this->db->from('cases');
		$this->db->join('properties', ' cases.property_id = properties.id ','left');
		$this->db->where( 'close', 0);
		$query = $this->db->get();
		// echo "<pre>";print_r($query->result());  
		if($query){
		return $query->result();
		}else{
		return false;
		}

    }
		
	
}//end of the class
?>