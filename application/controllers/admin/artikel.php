<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'base_admin.php';

class Artikel extends Base_admin {

	public function __construct() {
		parent::__construct();
		$this->load->model('artikel_model','artikel');
		$this->load->model('kategori_model','kategori');
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
		$data['kategori'] = $this->kategori->all()->result();
		$this->load->view('admin/layout/master', $data);
	}

	public function save()
	{
		# class library 	: get_input
		# class model 	: artikel_model as artikel
		# ambil input artikel dan cek validasi
		$artikel = $this->get_input->artikel();

		# jika validasi berhasil, simpan data ke database
		# jika gagal, redirect ke add artikel dan tampilkan pesan validasi error
		if($artikel !== false) {
			# simpan ke database
			$save = $this->artikel->save($artikel);

			# class library 	: get_input
			# class model 	: artikel_model as artikel
			# ambil input kategori dan cek validasi
			$kategori_artikel = $this->get_input->kategori_artikel();
			$save_kategori_artikel = $this->artikel->save_kategori_artikel($kategori_artikel);

			# class library 	: message
			# tampilkan pesan berhasil
			$this->message->add_success();
		} else {
			# tampilkan pesan gagal
			$this->message->add_fail();
		}
		redirect('admin/artikel/add');
	}

	public function edit()
	{
		$id = $this->uri->segment(4);
		$data['title'] = 'Edit Artikel';
		$data['template'] =  'admin/artikel/edit';
		$data['row'] = $this->artikel->find($id)->row();
		$this->load->view('admin/layout/master', $data);
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