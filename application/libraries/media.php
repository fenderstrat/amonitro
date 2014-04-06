<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media {

	protected $instance;

	public function __construct()
	{
		$this->instance =& get_instance();
	}

	public function upload($input_name)
	{
		$config['upload_path'] 	= 'assets/uploads/';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']		= '5000';
		$config['encrypt_name']	= true; 

		$this->instance->load->library('upload', $config);

		# jika ada file yang diupload, cek jika upload tidak error. 
		# jika tidak ada file yang diupload, return null.
		if( ! empty($_FILES[$input_name]['name'])) {
			# jika file berhasil diupload, return nama filenya
			# jika file gagal diupload return false
			if ($this->instance->upload->do_upload($input_name)) {
				$data = $this->instance->upload->data();
				return $data['file_name'];
			} else {
				$this->instance->message->upload_error();
				return false;
			}

		} else {
			$data = '';
			return $data;
		}

	}


}