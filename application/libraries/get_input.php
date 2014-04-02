<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Get_input {

	protected $instance;

	public function __construct()
	{
		$this->instance =& get_instance();
		$this->instance->load->library('form_validation');
	}

	public function user()
	{	
		# load helper untuk fungsi hash
		$this->instance->load->helper('security');
		
		if($this->instance->form_validation->run('login') === true) {
			$data = array(
				'username' => $this->instance->input->post('username'),
				# hash password
				'password' => do_hash($this->instance->input->post('password'))
			);
			return $data;
		} else {
			return false;
		}
	}

	public function artikel()
	{	
		if($this->instance->form_validation->run('artikel') === true) {

			#cek jika date kosong
			if($this->instance->input->post('tanggal') == null) {
				$tanggal = date("d/m/Y");
			} else {
				$tanggal = $this->instance->input->post('tanggal');
			}
			
			$data = array(
				'judul' 		=> $this->instance->input->post('judul'),
				'isi' 		=> $this->instance->input->post('isi'),
				'tanggal' 	=> $tanggal,
				'deskripsi' 	=> $this->instance->input->post('deskripsi'),
				'keyword' 	=> $this->instance->input->post('keyword'),
				'tag' 		=> $this->instance->input->post('tag')
			);
			return $data;
		} else {
			return false;
		}
	}

	public function kategori_artikel()
	{	
		#cek jika kategori kosong
		if($this->instance->input->post('kategori') == null) {
			$kategori = 'Uncategorized';
		} else {
			$kategori = $this->instance->input->post('kategori');
		}

		$data = array(
			'kategori_id' => $kategori,
			'artikel_id' => $this->db->insert_id()
		);
		return $data;
	}
}

/* End of file get_input_helper.php */
/* Location: ./application/helpers/get_input_helper.php */