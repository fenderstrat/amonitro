<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact
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
     * function yang digunakan untuk mengambil input add contact
     * @return boolean jika validasi gagal
     * @return string  jika validasi berhasil
     */
    public function post()
    {
        /**
         * Cek validasi sesuai dengan rule yang ada di config/form_validation.php
         * Jika validasi gagal, tampilkan pesan gagal validasi.
         */
        if ($this->instance->form_validation->run('contact') === true) {
            $data = array(
                'title'     => $this->instance->input->post('title'),
                'contact'   => $this->instance->input->post('contact'),
                'email'     => $this->instance->input->post('email'),
                'phone'     => $this->instance->input->post('phone'),
                'longitude' => $this->instance->input->post('longitude'),
                'latitude'  => $this->instance->input->post('latitude')
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
/* End of file contact.php */
/* Location: ./application/libraries/contact/contact.php */
