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
		
		$this->instance->form_validation->set_rules('username', 'Username', 'required');
		$this->instance->form_validation->set_rules('password', 'Password', 'required');

		if($this->instance->form_validation->run() === true) {
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
		$this->instance->form_validation->set_rules('judul', 'Judul', 'required');
		$this->instance->form_validation->set_rules('isi', 'Isi', 'required');
		$this->instance->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->instance->form_validation->set_rules('keyword', 'Keyword', 'required');
		$this->instance->form_validation->set_rules('tag', 'Tag', 'required');

		if($this->instance->form_validation->run() === true) {

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
			'artikel_id' => $this->db->insert_id();
		);
		return $data;
	}
}

/* End of file get_input_helper.php */
/* Location: ./application/helpers/get_input_helper.php */