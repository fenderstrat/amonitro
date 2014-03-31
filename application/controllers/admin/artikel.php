<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'base_admin.php';

class Artikel extends Base_admin {

	public function __construct() {
		parent::__construct();
		$this->load->model('artikel_model','artikel');
	}

	public function index()
	{
		$data['title'] = 'Artikel';
		$data['template'] =  'admin/artikel/index';

		# Cek jika database tidak kosong
		if($this->artikel->all()->num_rows() !== 0){
			$data['content'] = $this->artikel->all()->result();
		} else {
			$data['content'] = null;
		}

		$this->load->view('admin/layout/master', $data);
	}

	public function detail()
	{
		# code...
	}

	public function add()
	{
		$data['title'] = 'Tambah Artikel';
		$data['template'] =  'admin/artikel/add';

		# Cek jika database tidak kosong
		// if($this->artikel->all()->num_rows() !== 0){
		// 	$data['content'] = $this->artikel->all()->result();
		// } else {
		// 	$data['content'] = null;
		// }

		$this->load->view('admin/layout/master', $data);
	}

	public function save()
	{
		# code...
	}

	public function edit()
	{
		# code...
	}

	public function update()
	{
		# code...
	}

	public function delete()
	{
		# code...
	}


}