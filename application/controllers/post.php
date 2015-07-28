<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
	
			$this->load->helper('form');
			$this->load->library('session');
			$this->load->model('post_model');
			$this->load->library('email');
			$this->load->helper('url');
		
    }
	
	public function index()
	{
		if ($this->session->userdata('logged_in') == ''){
			redirect('user');
		}

		$results = $this->post_model->list_post();
		$data =  array();	
		foreach ($results as  $result) {
		 	
		 	$postid =  $result->Id; 
		 	$resultdata['posts'] = $result;
			$resultdata['comments'] = $this->post_model->list_comment($postid);
			$resultdata['comment-count'] = $this->post_model->get_comment_counts($postid);
			$resultdata['like-count'] = $this->post_model->get_like_counts($postid);
			$data['results'][] = $resultdata;

			//echo "<pre>";print_r($result); die;
		}
			//echo "<pre>": print_r($data); die;
	 		$this->load->view('userswall', $data);
	}

	public function add()
	{
		
		$this->load->view('add-post');
	}

	public function insert_post()
	{
		$sessionArray = $this->session->all_userdata();
		$userid = $sessionArray['logged_in']['userid'];
		$status = 'publish';
			$data = array(
					'UserId' => $userid,
					// 'Title' => $this->input->post('title'),
					'Description' => $this->input->post('description'),
					'Status' => $status
				);
		
		$result = $this->post_model->insert_post($data);
			if ($result == TRUE) {
				 $last_insertid = $this->db->insert_id();
				 $message = 'post added successfully!';
				 $this->session->set_flashdata('message_data', $message);
				 redirect('post');
			}else {
				$data['message'] = 'post could note be insert!';
				$this->load->view('userswall' , $data);
			}		
	}

	public function insert_comment()
	{
		$sessionArray = $this->session->all_userdata();
		$userid = $sessionArray['logged_in']['userid'];
		
		$status = 'publish';
			$data = array(
					'UserId' => $userid,
					'PostId' => $this->input->post('postid'),
					'Comment' => $this->input->post('comment'),
					'Status' => $status
				);
		
		$result = $this->post_model->insert_comment($data);
			if ($result == TRUE) {
				 $last_insertid = $this->db->insert_id();
				 $message = 'you have added a comment successfully!';
				 $this->session->set_flashdata('message_data', $message);
				 redirect('post');
			}else {
				$data['message'] = 'comment could note be insert!';
				$this->load->view('userswall' , $data);
			}		
	}

	public function ajax_insert_like()
	{
		$postid = $_POST['postid']; 
		$sessionArray = $this->session->all_userdata();
		$userid = $sessionArray['logged_in']['userid'];

		$chkuser = $this->post_model->chk_likes($postid,$userid); 
		if($chkuser == TRUE) {
			$result = $this->post_model->delete_likes($postid,$userid);
			if($result == TRUE):
			$counts = $this->post_model->get_like_counts($postid);
			echo $counts;	
			endif;	 
		}else
		{
			$data = array(
					'PostId' => $postid,
					'UserId' => $userid,
					'Rate' => 1
			);
		
			$result = $this->post_model->insert_likes($data);
			if($result == TRUE):
			$counts = $this->post_model->get_like_counts($postid);
			echo $counts;	
			endif;	 
					 
		}
		die;		
	}

	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */