<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'base_admin.php';

class Dashboard extends Base_admin {

	public function index()
	{
		
	}
	
	public function login()
	{
		$this->load->view('admin/layout/login');
	}

	public function logout()
	{
		# code...
	}
	
}