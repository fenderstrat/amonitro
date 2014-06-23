<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('artikel_model');
	}
	public function index()
	{
		// Pagination
		$offset = $this->uri->segment(2);
<<<<<<< HEAD
		$base_url = base_url('welcome');
=======
		$base_url = base_url();
>>>>>>> b861d05c5457c279fe07d6c0af5f09f2219c60cf
		$per_page = 2;
		$total_rows = $this->artikel_model->all()->num_rows();
		Pagination::main($base_url, $per_page, $total_rows);

		if ($this->artikel_model->all()->num_rows() !=0) {
			$data['artikel'] = $this->artikel_model->all_limit($per_page, $offset)->result();
		} else {
			$data['artikel'] = null;
		}

		$data['title'] = 'Komisi Pemilihan Umum Kabupaten Mukomuko';
<<<<<<< HEAD
		$this->load->view('home',$data);
=======
		$this->load->view('template/home',$data);
>>>>>>> b861d05c5457c279fe07d6c0af5f09f2219c60cf
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */