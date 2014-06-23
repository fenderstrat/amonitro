<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/admin/base_admin.php';

class Seo_Controller extends Base_admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('seo_model');
    }

    public function index()
    {
        $data['title'] = 'Seo';
        $data['template'] = 'admin/seo/index';
        $this->load->view('admin/layout/master', $data);
    }

    public function save()
    {
        // @file : libraries/seo/seo.php
        // ambil input seo
        $post = $this->seo->post();

        // jika nilai kembalian input seo adalah false, redirect ke add seo dan tampilkan pesan gagal
        if($post !== false) {
            // simpan ke database
            $this->seo_model->save($post);

            // @file : libraries/services/message.php
            // tampilkan pesan berhasil
            $this->message->add_success();
        } else {
            // @file : libraries/services/message.php
            // Tampilkan validasi error
            $this->message->validation();
            // tampilkan pesan gagal
            $this->message->add_fail();
        }
        redirect('admin/seo');
    }

}

/* End of file seo_controller.php */
/* Location: ./application/controllers/admin/seo_controller.php */