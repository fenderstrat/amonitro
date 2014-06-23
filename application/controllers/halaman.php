<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Halaman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'halaman_model'
		));
	}

	public function index()
	{
		$id = $this->uri->segment(2);
		if ($this->halaman_model->find($id)->num_rows() !=0) {
			$data['halaman'] = $this->halaman_model->find($id)->row();
		} else {
			show_404();
		}

		$data['title'] = 'halaman';
		$data['content'] = 'single';
		$this->load->view('template/index', $data);
	}

}

/* End of file halaman.php */
/* Location: ./application/controllers/halaman.php */