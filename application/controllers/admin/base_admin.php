<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user') === null){
			return redirect('dashboard/login');
		}
	}
}