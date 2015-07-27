<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Post_model extends CI_Model {

 
	public function list_post() {

		$this->db->select('posts.*,users.Name');    
		$this->db->from('posts');
		$this->db->join('users','users.UserId = posts.UserId');
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

     public function insert_comment($data) {

		$this->db->insert('comments', $data);
		if ($this->db->affected_rows() > 0) {
		return true;
		} else {
		return false;
		}

    }

    public function list_comment($postid) {

		$this->db->select('comments.*,users.Name');    
		$this->db->from('comments');
		$this->db->join('users','users.UserId = comments.UserId');
		$this->db->where('PostId',$postid);
		$query = $this->db->get();
		
		if($query){
		return $query->result();
		}else{
		return false;
		}

    }

    public function comment_counts($postid) {

		$this->db->select('*');    
		$this->db->from('comments');
		$this->db->where('PostId',$postid);
		$query = $this->db->get(); 
		$rowcount = $query->num_rows();

		return $rowcount;

    }

    public function like_counts($data) {

		$this->db->insert('likes', $data);
		if ($this->db->affected_rows() > 0) {
		return true;
		} else {
		return false;
		}

    }
		
	
}//end of the class
?>