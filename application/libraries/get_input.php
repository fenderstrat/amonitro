<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Get_input {

	protected $instance;

	public function __construct()
	{
		$this->instance =& get_instance();
		$this->instance->load->library(array('form_validation'));
	}

	public function user()
	{	
		# load helper untuk fungsi hash
		$this->instance->load->helper('security');
		
		if($this->instance->form_validation->run('login') === true) {
			$data = array(
				'username' => $this->instance->input->post('username'),
				'password' => do_hash($this->instance->input->post('password'))
			);
			return $data;
		} else {
			$this->instance->message->validation();
			return false;
		}
	}

	public function artikel()
	{	
		# cek alidasi sesua dengan rule yang ada di config/form_validation.php
		# jika validasi gagal, tampilkan pesan gagal validasi.
		if($this->instance->form_validation->run('artikel') === true) {

			# class library  : media
			$this->instance->load->library('media');			

			# jika file yang diupload gagal,  nilai kembalian adalah false dan akan menampilkan pesan gagal 
			$image_upload = $this->instance->media->upload('ico') ;
			if($image_upload  === false ) {
				return false;
			} else {

				# jika tanggal kosong masukkan tanggal hari ini.
				if($this->instance->input->post('tgl') == null) {
					$tanggal = date("d/m/Y");
				} else {
					$tanggal = $this->instance->input->post('tgl');
				}

				# jika deskripsi kosong ambil deskripsi dari pos.
				if($this->instance->input->post('deskripsi') == null) {
					$post = $this->instance->input->post('isi');
					# file helper/services_helper.php
					# method get_first_paragraph()
					# ambil paragraf pertama
					$deskripsi = get_first_paragraph($post);
				} else {
					$deskripsi = $this->instance->input->post('deskripsi');
				}

				# jika ada file yang diupload, nilai kembalian berupa nama file yang diupload
				# jika tidak ada file yang diupload nilai kembalian adalah null
				$data = array(
					'judul' 		=> $this->instance->input->post('jd'),
					'isi' 		=> $this->instance->input->post('isi'),
					'deskripsi' 	=> $deskripsi,
					'tag' 		=> $this->instance->input->post('tag'),
					'status' 	=> $this->instance->input->post('sts'),
					'tanggal' 	=> $tanggal,
					'image'	=> $image_upload
				);

				return $data;
			}
			
		} else {
			# class library : message
			# tampilkan validasi error
			$this->instance->message->validation();

			# file 	: helper/services_helper.php;
			# repopulate data yang disubmit 
			redata();

			return false;
		}
	}

	public function kategori_artikel()
	{	

		# simpan kategori sebagai array
		$data = array();
		
		#cek jika kategori kosong
		if($this->instance->input->post('kategori') == null) {
			# masukkan kategori dengan id 1 (uncategorized) jika kategori tidak dipilih.
			#  ambil id terbaru dari artikel yang dimasukkan di database. 
			$data[] = array(
				'kategori_id' 	=> 1,
				'artikel_id' 	=> $this->instance->db->insert_id()
			);
		} else {
			# masukkan kategori sebagai array.
			#  ambil id terbaru dari artikel yang dimasukkan di database. 
			foreach($this->instance->input->post('kategori') as $kategori_array){
				$data[] = array(
					'kategori_id' 	=> $kategori_array,
					'artikel_id' 	=> $this->instance->db->insert_id()
				);
				
			}
		}
		
		return $data;
	}
}

/* End of file get_input_helper.php */
/* Location: ./application/helpers/get_input_helper.php */