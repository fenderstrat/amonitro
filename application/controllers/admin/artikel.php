<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'base_admin.php';

class Artikel extends Base_admin {

	public function __construct() {
		parent::__construct();
		$this->load->model('artikel_model','artikel');
	}

	public function index()
	{
		# Cek jika database tidak kosong
		if($this->artikel->all()->num_rows() !== 0){
			$data['content'] = $this->artikel->all()->result();
		} else {
			$data['content'] = null;
		}

		$data['title'] = 'Artikel';
		$data['template'] =  'admin/artikel/index';
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
		$this->load->view('admin/layout/master', $data);
	}

	public function save()
	{
		if($this->get_input->artikel() !== false) {
			$artikel = $this->get_input->artikel();
			$kategori_artikel = $this->get_input->kategori_artikel();
			$save = $this->artikel->save($artikel, $kategori_artikel);
			if($save) {
				$this->message->add_success();
			} else {
				$this->message->add_fail();
			}
		} else {
			$this->message->validation();
		}
		redirect('admin/artikel/add');
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