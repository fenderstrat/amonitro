<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('get_input', 'message'));
		if($this->session->userdata('admin') == null){
			return redirect('admin/login');
		}
	}
}