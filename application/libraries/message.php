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
		$this->instance->session->set_flashdata('login_failed', 'Gagal login! Pastikan username dan password Andasudah benar!');
	}

}

/* End of file message.php */
/* Location: ./application/libraries/message.php */