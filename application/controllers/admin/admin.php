<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model', 'user');
		$this->load->library(array('get_input'));
	}

	public function dashboard()
	{
		if($this->session->userdata('admin') == null){
			return redirect('admin/login');
		} 

		$data['title'] = 'Dashboard';
		$data['template'] =  'admin/dashboard/index';
		$this->load->view('admin/layout/master', $data);
	}
	
	public function login()
	{
		$this->load->view('admin/layout/login');
	}

	public function do_login()
	{
		# cek validasi dan ambil data input dari form (library : get_input; method : user) 
		# jika validasi gagal, tampilkan form login
		if($this->get_input->user() !== false) {
			$data = $this->get_input->user();

			# cek data di database
			$check_user =  $this->user->check_user($data);

			# jika ditemukan, tambahkan session admin dan level admin
			# jika tidak ditemukan, tampilan pesan gagal (library : message; method : login_failed)
			if($check_user->num_rows() === 1) {
				$get_user = $check_user->row();
				$this->session->set_userdata( array(
					'admin' => $get_user->username,
					'level'	=> $get_user->level
				));
				redirect('admin/dashboard');
			} else {
				$this->message->login_failed();
			} 
		}
		redirect('admin/login');
	}

	public function logout()
	{
		$this->session->unset_userdata('admin');
		$this->session->unset_userdata('level');
		redirect('admin/login');
	}
	
}