<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
	
			$this->load->helper('file');
			$this->load->library('session');
			$this->load->model('post_model');
			$this->load->library('email');
			$this->load->helper('url');
		
    }
	
	public function index()
	{
		
		$this->load->view('userswall');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */