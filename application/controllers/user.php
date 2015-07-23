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

	// Check for user login process
	public function login_process() {
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) { 	
			$this->load->view('login_form');
		} else {
			$data = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
			);
			$result = $this->user_model->get_login($data);
			echo "<pre>"; print_r($result); die;
			if($result == TRUE){
				$userdata= $this->user_model->get_userdata($data['username']);
				
				$sess_array = array(
					'userid' => $userdata->id,
					'name' => $userdata->name,
					'username' => $userdata->account_type,
					'email' => $userdata->email
				);
					
				// Add user data in session
			
				$this->session->set_userdata('logged_in', $sess_array);
				redirect('post/index');
			}else{
				$data['error_message'] = 'Invalid Username or Password';
				$this->load->view('login_form', $data);
			}
		}
		
	}

}//end of the class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */