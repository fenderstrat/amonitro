<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function dashboard()
	{
		
	}
	
	public function login()
	{
		if($this->input->post('login')) {
			
		} else {
			$this->load->view('admin/layout/login');
		}
	}

	public function logout()
	{
		# code...
	}
	
}