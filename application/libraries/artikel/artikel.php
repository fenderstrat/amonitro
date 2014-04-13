<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artikel
{

	protected $instance;

	public function __construct()
   {
		$this->instance =& get_instance();
		# Load library
		$this->instance->load->library(array(
			'form_validation',
			'services/message',
			'services/media',
		));
		# Load helper
		$this->instance->load->helper(array(
			'services'
		));
	}

	/**
	 * function yang digunakan untuk mengambil input add artikel
	 * @return boolean jika validasi gagal
	 * @return string jika validasi berhasil
	 */
	public function post_add()
	{
		/**
		 * Cek validasi sesuai dengan rule yang ada di config/form_validation.php
		 * Jika validasi gagal, tampilkan pesan gagal validasi.
		 */
		if ($this->instance->form_validation->run('artikel') === true) {

			/**
			* Method upload digunakan untuk mengupload gambar dengan parameter nama dari field yang dipost.
			* @var string
			* @return string Jika field gambar kosong, nilai kembalian adalah empty string ('').
			* @return string Jika field gambar tidak kosong, lakukan proses upload. Nilai kembalian adalah nama gambar yang diupload
			* @return boolean Jika file yang diupload gagal,  nilai kembalian adalah false dan akan menampilkan pesan gagal
			*/
			$image_upload = $this->instance->media->upload('ico');

			if ($image_upload  !== false) {
				# jika tanggal kosong masukkan tanggal hari ini.
				if ($this->instance->input->post('tgl') === '') {
					$tanggal = date("Y-m-d H:i:s");
				} else {
					$tanggal = $this->instance->input->post('tgl');
				}

				# jika deskripsi kosong ambil deskripsi dari pos.
				if ($this->instance->input->post('deskripsi') === '') {
					/**
					 * Ambil paragraf pertama 
					 * @file	: helper/services_helper.php
					 * @var string
					 */
					$deskripsi = get_first_paragraph($this->instance->input->post('isi'));
				} else {
					$deskripsi = $this->instance->input->post('deskripsi');
				}

				$data = array(
					'judul' => $this->instance->input->post('jd'),
					'isi' => $this->instance->input->post('isi'),
					'deskripsi' => $deskripsi,
					'tag' => $this->instance->input->post('tag'),
					'status' => $this->instance->input->post('sts'),
					'tanggal' => $tanggal,
					'image' => $image_upload
				);

				return $data;

			} else {
				return false;
			}
		} else {
			# Tampilkan validasi error
			$this->instance->message->validation();

			/**
			 * @file  : helper/services_helper.php;
			 * Repopulate data yang disubmit 
			 */
			redata();

			return false;
		}
	}

	public function post_add_kategori()
	{	

		# simpan kategori sebagai array
		$data = array();
		
		#cek jika kategori kosong
		if($this->instance->input->post('kategori') == "") {
			# masukkan kategori dengan id 1 (uncategorized) jika kategori tidak dipilih.
			#  ambil id terbaru dari artikel yang dimasukkan di database. 
			$data[] = array(
				'kategori_id' 	=> 2,
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

	/**
	 * function yang digunakan untuk mengambil input add artikel
	 * @return boolean jika validasi gagal
	 * @return string jika validasi berhasil
	 */
	public function post_update()
	{
		/**
		 * Cek validasi sesuai dengan rule yang ada di config/form_validation.php
		 * Jika validasi gagal, tampilkan pesan gagal validasi.
		 */
		if ($this->instance->form_validation->run('artikel') === true) {

			/**
			* Method upload digunakan untuk mengupload gambar dengan parameter nama dari field yang dipost.
			* @var string
			* @return string Jika field gambar kosong, nilai kembalian adalah empty string ('').
			* @return string Jika field gambar tidak kosong, lakukan proses upload. Nilai kembalian adalah nama gambar yang diupload
			* @return boolean Jika file yang diupload gagal,  nilai kembalian adalah false dan akan menampilkan pesan gagal
			*/

			# jika tanggal kosong masukkan tanggal hari ini.
			if ($this->instance->input->post('tgl') === '') :
				$tanggal = date("Y-m-d H:i:s");
			else :
				$tanggal = $this->instance->input->post('tgl');
			endif;

			# jika deskripsi kosong ambil deskripsi dari pos.
			if ($this->instance->input->post('deskripsi') === '') :
				$deskripsi = get_first_paragraph($this->instance->input->post('isi'));
			else :
				$deskripsi = $this->instance->input->post('deskripsi');
			endif;

			if ($_FILES['ico']['name'] == '') :
				$data = array(
					'judul' => $this->instance->input->post('jd'),
					'isi' => $this->instance->input->post('isi'),
					'deskripsi' => $deskripsi,
					'tag' => $this->instance->input->post('tag'),
					'status' => $this->instance->input->post('sts'),
					'tanggal' => $tanggal
				);
				return $data;
			else :
				$image_upload = $this->instance->media->upload('ico');
				if ($image_upload  !== false) :

					$data = array(
						'judul' => $this->instance->input->post('jd'),
						'isi' => $this->instance->input->post('isi'),
						'deskripsi' => $deskripsi,
						'tag' => $this->instance->input->post('tag'),
						'status' => $this->instance->input->post('sts'),
						'tanggal' => $tanggal,
						'image' => $image_upload
					);

					return $data;

				else :
					return false;
				endif;
			endif;
		} else {
			# Tampilkan validasi error
			$this->instance->message->validation();

			/**
			 * @file  : helper/services_helper.php;
			 * Repopulate data yang disubmit 
			 */
			redata();

			return false;
		}
	}

	public function post_update_kategori()
	{	

		# simpan kategori sebagai array
		$data = array();
		
		#cek jika kategori kosong
		if($this->instance->input->post('kategori') == "") {
			# masukkan kategori dengan id 1 (uncategorized) jika kategori tidak dipilih.
			#  ambil id terbaru dari artikel yang dimasukkan di database. 
			$data[] = array(
				'kategori_id' 	=> 2
			);
		} else {
			# masukkan kategori sebagai array.
			#  ambil id terbaru dari artikel yang dimasukkan di database. 
			foreach($this->instance->input->post('kategori') as $kategori_array){
				$data[] = array(
					'kategori_id' 	=> $kategori_array
				);
				
			}
		}
		
		return $data;
	}

}

/* End of file Artikel.php */
/* Location: ./application/libraries/artikel/Artikel.php */
