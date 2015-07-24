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
		$result['posts'] = $this->post_model->list_post();
		$this->load->view('userswall', $result);
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
					'Title' => $this->input->post('title'),
					'Desc' => $this->input->post('description'),
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */