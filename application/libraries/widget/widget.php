<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Widget
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
     * function yang digunakan untuk mengambil input add widget
     * @return boolean jika validasi gagal
     * @return string  jika validasi berhasil
     */
    public function post()
    {
        /**
         * Cek validasi sesuai dengan rule yang ada di config/form_validation.php
         * Jika validasi gagal, tampilkan pesan gagal validasi.
         */
        if ($this->instance->form_validation->run('widget') === true) {
            $data = array(
                'title'     => $this->instance->input->post('title'),
                'widget'   => $this->instance->input->post('widget'),
                'position'     => $this->instance->input->post('position')
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
/* End of file widget.php */
/* Location: ./application/libraries/widget/widget.php */
