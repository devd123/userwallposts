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

    public function get_comment_counts($postid) {

		$this->db->select('*');    
		$this->db->from('comments');
		$this->db->where('PostId',$postid);
		$query = $this->db->get(); 
		$rowcount = $query->num_rows();

		return $rowcount;

    }

    public function insert_likes($data) {

		$this->db->insert('likes', $data);
		if ($this->db->affected_rows() > 0) {
		return true;
		} else {
		return false;
		}

    }

     public function get_like_counts($postid) {

		$this->db->select('*');    
		$this->db->from('likes');
		$this->db->where(array('PostId'=> $postid, 'Rate'=> 1));
		$query = $this->db->get(); 
		$rowcount = $query->num_rows();
		return $rowcount;

    }

		
	
}//end of the class
?>