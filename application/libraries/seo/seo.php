<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seo
{

    protected $instance;

    public function __construct()
   {
        $this->instance =& get_instance();
        // Load library
        $this->instance->load->library(array(
            'form_validation'
        ));
    }

    /**
     * function yang digunakan untuk mengambil input add seo
     * @return boolean jika validasi gagal
     * @return string  jika validasi berhasil
     */
    public function post()
    {
        /**
         * Cek validasi sesuai dengan rule yang ada di config/form_validation.php
         * Jika validasi gagal, tampilkan pesan gagal validasi.
         */
        if ($this->instance->form_validation->run('seo') === true) {
            $data = array(
                'title'     => $this->instance->input->post('title'),
                'seo'   => $this->instance->input->post('seo'),
                'keyword'     => $this->instance->input->post('keyword')
            );
            return $data;
        } else {
            /**
             * @file  : helper/services_helper.php;
             * Repopulate data yang disubmit
             */
            redata();

            return false;
        }
    }
}
/* End of file seo.php */
/* Location: ./application/libraries/seo/seo.php */
