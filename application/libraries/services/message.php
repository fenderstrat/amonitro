<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message
{
	protected $instance;

	public function __construct()
	{
		$this->instance =& get_instance();
		$this->instance->load->library('session');
	}

	public function login_failed()
	{
		$this->instance->session->set_flashdata(
			'login_failed',
			'Gagal login! Pastikan username dan password Anda sudah benar!'
		);
	}

	public function validation()
	{
		$this->instance->session->set_flashdata(
			'validation',
			validation_errors()
		);
	}

	public function add_success()
	{
		$this->instance->session->set_flashdata(
			'success',
			'Record berhasil ditambahkan'
		);
	}

	public function add_fail()
	{
		$this->instance->session->set_flashdata(
			'fail',
			'Record gagal ditambahkan'
		);
	}


	public function update_success()
	{
		$this->instance->session->set_flashdata(
			'success',
			'Record berhasil diubah'
		);
	}

	public function update_fail()
	{
		$this->instance->session->set_flashdata(
			'fail',
			'Record gagal diubah'
		);
	}

	public function upload_error()
	{
		$this->instance->session->set_flashdata(
			'upload_error',
			$this->instance->upload->display_errors()
		);
	}

	public function delete_image_success()
	{
		$this->instance->session->set_flashdata(
			'success',
			'Image berhasil dihapus'
		);
	}

	public function delete_image_fail()
	{
		$this->instance->session->set_flashdata(
			'fail',
			'Image gagal dihapus'
		);
	}

	public function sampah()
	{
		$this->instance->session->set_flashdata(
			'success',
			'Record dipindah ke kotak sampah'
		);
	}
	public function delete()
	{
		$this->instance->session->set_flashdata(
			'success',
			'Record berhasil dihapus'
		);
	}

}

/* End of file message.php */
/* Location: ./application/libraries/message.php */
