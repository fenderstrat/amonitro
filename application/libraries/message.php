<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message {

	protected $instance;

	public function __construct()
	{
		$this->instance =& get_instance();
		$this->instance->load->library('session');
	}

	public function login_failed()
	{
		$this->instance->session->set_flashdata('login_failed', 'Gagal login! Pastikan username dan password Anda sudah benar!');
	}

	public function validation()
	{
		$this->instance->session->set_flashdata('validation', validation_errors());
	}

	public function add_success()
	{
		$this->instance->session->set_flashdata('add_success', 'Data berhasil ditambahkan');
	}

	public function add_fail()
	{
		$this->instance->session->set_flashdata('add_success', 'Data gagal ditambahkan');
	}

}

/* End of file message.php */
/* Location: ./application/libraries/message.php */