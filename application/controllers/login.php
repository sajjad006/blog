<?php

/**
 * 
 */
class Login extends MY_Controller
{
	public function index()
	{
		if ($this->session->userdata('username'))
			return redirect('admin/dashboard');
		
		$this->load->helper('form');
		$this->load->view('user/admin_login');
	}
	public function admin_login()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required|alpha|trim');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == TRUE) {
			
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->load->model('login_model');

			if($id=$this->login_model->getUser($username, $password)){
				
				$this->session->set_userdata('username',$username);
				return redirect('admin/dashboard');
			}
			else{
				$this->session->set_flashdata('error', 'Invalid Username or password');
				return redirect(base_url('login/admin_login'));
			}
		}
		else{
			$this->load->view('user/admin_login');
		}

	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		return redirect('user');
	}
}