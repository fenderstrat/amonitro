<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/admin/base_admin.php';

class Contact_Controller extends Base_admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('contact_model');
    }

    public function index()
    {
        $data['title'] = 'Contact';
        $data['template'] = 'admin/contact/index';
        $this->load->view('admin/layout/master', $data);
    }

    public function save()
    {
        // @file : libraries/contact/contact.php
        // ambil input contact
        $post = $this->contact->post();

        // jika nilai kembalian input contact adalah false, redirect ke add contact dan tampilkan pesan gagal
        if($post !== false) {
            // simpan ke database
            $this->contact_model->save($post);

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
        redirect('admin/contact');
    }

}

/* End of file contact_controller.php */
/* Location: ./application/controllers/admin/contact_controller.php */