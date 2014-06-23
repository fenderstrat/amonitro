<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/admin/base_admin.php';

class Widget_Controller extends Base_admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('widget_model');
    }

    public function index()
    {
        $data['title'] = 'Widget';
        $data['template'] = 'admin/widget/index';
        $this->load->view('admin/layout/master', $data);
    }

    public function save()
    {
        // @file : libraries/widget/widget.php
        // ambil input widget
        $post = $this->widget->post();

        // jika nilai kembalian input widget adalah false, redirect ke add widget dan tampilkan pesan gagal
        if($post !== false) {
            // simpan ke database
            $this->widget_model->save($post);

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
        redirect('admin/widget');
    }

}

/* End of file widget_controller.php */
/* Location: ./application/controllers/admin/widget_controller.php */