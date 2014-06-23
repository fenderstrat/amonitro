<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'artikel_model', 'kategori_model'
		));
	}

	public function index()
	{
<<<<<<< HEAD
		$offset = $this->uri->segment(2);
		$base_url = base_url('artikel');
		$per_page = 2;
		$total_rows = $this->artikel_model->get_all()->num_rows();
		Pagination::main($base_url, $per_page, $total_rows);

		if ($this->artikel_model->all()->num_rows() !=0) {
=======
		$offset = $this->uri->segment(3);
		$base_url = base_url('artikel/index');
		$per_page = 2;
		$total_rows = $this->artikel_model->get_all($per_page, $offset)->num_rows();
		Pagination::main($base_url, $per_page, $total_rows);

		if ($this->artikel_model->all_limit($per_page, $offset)->num_rows() !=0) {
>>>>>>> b861d05c5457c279fe07d6c0af5f09f2219c60cf
			$data['artikel'] = $this->artikel_model->all_limit($per_page, $offset)->result();
		} else {
			$data['artikel'] = null;
		}
<<<<<<< HEAD

		if ($this->artikel_model->all()->num_rows() !=0) {
=======
		
		if ($this->kategori_model->all()->num_rows() !=0) {
>>>>>>> b861d05c5457c279fe07d6c0af5f09f2219c60cf
			$data['kategori'] = $this->kategori_model->all()->result();
		} else {
			$data['kategori'] = null;
		}

		$data['title'] = 'Artikel';
<<<<<<< HEAD
=======
		$data['description'] = 'Artikel';
>>>>>>> b861d05c5457c279fe07d6c0af5f09f2219c60cf
		$data['content'] = 'arsip';
		$this->load->view('template/index', $data);
	}

	public function show()
	{
<<<<<<< HEAD
		$kode = $this->uri->segment(2);

		# Tampilkan berita berdasarkan id
		$get_id = $this->artikel_model->get_id($kode,'')->num_rows();
		$get_id_publish = $this->artikel_model->get_id($this->uri->segment(3),'publish')->num_rows();

		if( $kode = '' || $this->uri->segment(3) == '' || $get_id_publish == 0 || $get_id == 0) {
			show_404();
		}

		$data['artikel_id'] = $this->artikel_model->get_id($kode,'')->row();
=======
		$id = $this->uri->segment(3);
		
		# Tampilkan berita berdasarkan id
		$get_id_publish = $this->artikel_model->get_id($id,'publish')->num_rows();

		if($this->uri->segment(4) == '' || $get_id_publish == 0) {
			show_404();
		}

		$data['artikel_id'] = $this->artikel_model->find($id)->row();
		// var_dump($data['artikel_id']);
>>>>>>> b861d05c5457c279fe07d6c0af5f09f2219c60cf
		$data['title'] = $data['artikel_id']->judul;
		$data['description'] = $data['artikel_id']->deskripsi;
		$data['tanggal'] = $data['artikel_id']->tanggal;
		$data['tag'] = $data['artikel_id']->tag;
<<<<<<< HEAD
		$data['paragraf'] = $data['artikel_id']->isi;

=======
		$data['isi'] = $data['artikel_id']->isi;
		
>>>>>>> b861d05c5457c279fe07d6c0af5f09f2219c60cf
		$data['content'] = 'single';
		$this->load->view('template/index', $data);
	}

<<<<<<< HEAD
	public function kategori()
	{
		$offset = $this->uri->segment(3);
		$base_url = base_url('artikel/kategori');
		$per_page = 2;
		$total_rows = $this->artikel_model->get_kategori()->num_rows();
		Pagination::main($base_url, $per_page, $total_rows);

		if ($this->artikel_model->all()->num_rows() !=0) {
			$data['artikel'] = $this->artikel_model->get_kategori_limit($per_page, $offset)->result();
		} else {
			$data['artikel'] = null;
		}

		if ($this->kategori_model->all()->num_rows() !=0) {
			$data['kategori'] = $this->kategori_model->all()->result();
		} else {
			$data['kategori'] = null;
		}

		$data['title'] = 'Artikel';
		$data['content'] = 'arsip';
		$this->load->view('template/index', $data);
	}
=======
	// public function kategori()
	// {
	// 	$offset = $this->uri->segment(3);
	// 	$base_url = base_url('artikel/kategori');
	// 	$per_page = 2;
	// 	$total_rows = $this->artikel_model->get_kategori()->num_rows();
	// 	Pagination::main($base_url, $per_page, $total_rows);

	// 	if ($this->artikel_model->all()->num_rows() !=0) {
	// 		$data['artikel'] = $this->artikel_model->get_kategori_limit($per_page, $offset)->result();
	// 	} else {
	// 		$data['artikel'] = null;
	// 	}
		
	// 	if ($this->kategori_model->all()->num_rows() !=0) {
	// 		$data['kategori'] = $this->kategori_model->all()->result();
	// 	} else {
	// 		$data['kategori'] = null;
	// 	}

	// 	$data['title'] = 'Artikel';
	// 	$data['content'] = 'arsip';
	// 	$this->load->view('template/index', $data);
	// }
>>>>>>> b861d05c5457c279fe07d6c0af5f09f2219c60cf

	// public function tag()
	// {
	// 	$offset = $this->uri->segment(3);
	// 	$base_url = base_url('artikel/tag');
	// 	$per_page = 2;
	// 	$total_rows = $this->artikel_model->get_tag()->num_rows();
	// 	Pagination::main($base_url, $per_page, $total_rows);

	// 	if ($this->artikel_model->all()->num_rows() !=0) {
	// 		$data['artikel'] = $this->artikel_model->get_tag_limit($per_page, $offset)->result();
	// 	} else {
	// 		$data['artikel'] = null;
	// 	}

	// 	$data['title'] = 'Artikel';
	// 	$data['content'] = 'arsip';
	// 	$this->load->view('template/index', $data);
	// }


}

/* End of file artikel.php */
/* Location: ./application/controllers/artikel.php */