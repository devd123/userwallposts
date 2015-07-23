<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
	
			$this->load->helper('file');
			$this->load->library('session');
			$this->load->library('form_validation');
			$this->load->helper('url');
			$this->load->model('user_model');
		
    }
	
	public function index()
	{
		
		$this->load->view('login-form');
	}

	public function login()
	{
		
		$this->load->view('login-form');
	}

	public function logout()
	{
		
	 	$this->session->unset_userdata('logged_in');
	  	session_destroy();
	   	redirect('post', 'refresh');
	}

	// Check for user login process
	public function login_process() {
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) { 	
			$this->load->view('login-form');
		} else {
			$data = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
			);
			$result = $this->user_model->get_login($data);
			//echo "<pre>"; print_r($result); die;
			if($result){
			
				$sess_array = array(
					'userid' => $result->UserId,
					'name' => $result->Name,
					'username' => $result->UserName,
					'email' => $result->Email
				);
				
				// Add user data in session
			
				$this->session->set_userdata('logged_in', $sess_array);
				redirect('post');
			}else{
				$data['error_message'] = 'Invalid Username or Password';
				$this->load->view('login-form', $data);
			}
		}
		
	}

}//end of the class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */