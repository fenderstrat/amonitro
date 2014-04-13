<?php if (defined('basepath')) exit('no direct script access allowed');

class Artikel_controller extends ci_controller
{
    public function __construct()
    {
        parent::__construct();

        # load model
        $this->load->model(array(
            'artikel_model', 'kategori_model'
        ));

        # load class library
        $this->load->library(array(
            'artikel/artikel'
        ));
    }

    public function index()
    {
        # jika record tidak ditemukan, hasilkan null
        if ($this->artikel_model->all()->num_rows() !== 0) {
            $data['artikel'] = $this->artikel_model->all()->result();

            # loop kategori artikel 
            $i = 1;
            foreach ($data['artikel'] as $row) :
                $data['artikel_kategori'.$i] = $this->artikel_model->checked_kategori($row->artikel_id)->result();
                $i++;
            endforeach;    

        } else {
            $data['artikel'] = null;
            $data['artikel_kategori'] = null;
        }

        $data['title'] = 'artikel';
        $data['template'] = 'admin/artikel/index';
        $this->load->view('admin/layout/master', $data);
    }

    public function detail()
    {
        # code...
    }

    public function add()
    {       

        # jika record ditemukan, tampilkan record
        # jika record tidak ditemukan, hasilkan null
        if($this->kategori_model->all()->num_rows() !== 0){
            $data['kategori'] = $this->kategori_model->all()->result();
        } else {
            $data['kategori'] = null;
        } 

        $data['title'] = 'tambah artikel';
        $data['template'] =  'admin/artikel/add';
        $this->load->view('admin/layout/master', $data);
    }

    public function save()
    {
        # file : libraries/artikel/artikel.php
        # ambil input artikel
        $post_add = $this->artikel->post_add();

        # jika nilai kembalian input artikel adalah false, redirect ke add artikel dan tampilkan pesan gagal
        if($post_add !== false) {
            # simpan ke database
            $this->artikel_model->save($post_add);

            # file : libraries/artikel/artikel.php
            # ambil input kategori
            $post_add_kategori = $this->artikel->post_add_kategori();
            $this->artikel_model->save_kategori_artikel($post_add_kategori);

            # file : libraries/services/message.php
            # tampilkan pesan berhasil
            $this->message->add_success();
        } else {
            # file : libraries/services/message.php
            # tampilkan pesan gagal
            $this->message->add_fail();
        }
        redirect('admin/artikel/add');
    }

    public function edit()
    {
        # variable id berita
        $id = $this->uri->segment(4);

        # jika artikel tidak ditemukan, tampilkan 404 error
        if($this->artikel_model->find($id)->num_rows() !== 0) {
            $data['artikel'] = $this->artikel_model->find($id)->row();
        } else {
            show_404();
        }
        
        # ambil kategori artikel
        if($this->artikel_model->checked_kategori($id)->num_rows() !== 0) {
            $data['artikel_kategori'] = $this->artikel_model->checked_kategori($id)->result();

            # loop kategori artikel 
            $checked = array();
            foreach ($data['artikel_kategori'] as $row) :
                $checked[] = $row->kategori_id; 
            endforeach;

            # ambil kategori yang belum dipilih
            if ($this->artikel_model->unchecked_kategori($checked)->num_rows !== 0) {
                $data['kategori'] = $this->artikel_model->unchecked_kategori($checked)->result();
            } else {
                $data['kategori'] = null;
            }
        } else {
            $data['artikel_kategori'] = null;
            $data['kategori'] = $this->kategori_model->all()->result();
        }
        
        $data['title'] = 'edit artikel';
        $data['template'] =  'admin/artikel/edit';
        $this->load->view('admin/layout/master', $data);
    }

    public function update()
    {
        # variable id berita
        $id = $this->input->post('id');

        # file : libraries/artikel/artikel.php
        # ambil input artikel
        $post_update = $this->artikel->post_update();

        # jika nilai kembalian input artikel adalah false, redirect ke add artikel dan tampilkan pesan gagal
        if($post_update !== false) {
            # simpan ke database
            $this->artikel_model->update($id, $post_update);

            # file : libraries/artikel/artikel.php
            # ambil input kategori
            $post_update_kategori = $this->artikel->post_update_kategori();
            $expression = $this->artikel_model->update_kategori_artikel($id, $post_update_kategori);
            print_r($expression);
            # file : libraries/services/message.php
            # tampilkan pesan berhasil
            $this->message->update_success();
        } else {
            # file : libraries/services/message.php
            # tampilkan pesan gagal
            $this->message->update_fail();
        }

        # redirect ke halaman sebelumnya
        $link = $this->input->server('HTTP_REFERER', TRUE);
        // redirect($link, 'location');
    }

    public function delete()
    {
        # code...
    }

}

/* end of file artikelcontroller.php */
/* location: ./application/controllers/admin/artikelcontroller.php */
