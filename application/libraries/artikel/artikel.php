<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class artikel
{

    protected $instance;

    public function __construct()
   {
        $this->instance =& get_instance();
        // Load library
        $this->instance->load->library(array(
            'form_validation',
            'services/message',
            'services/media',
        ));
        // Load helper
        $this->instance->load->helper(array(
            'services'
        ));
    }

    /**
     * function yang digunakan untuk mengambil input add artikel
     * @return boolean jika validasi gagal
     * @return string  jika validasi berhasil
     */
    public function post()
    {
        /**
         * Cek validasi sesuai dengan rule yang ada di config/form_validation.php
         * Jika validasi gagal, tampilkan pesan gagal validasi.
         */
        if ($this->instance->form_validation->run('artikel') === true) {

            // jika tanggal kosong masukkan tanggal hari ini.
            if ($this->instance->input->post('tgl') === '') {
                $tanggal = date("Y-m-d H:i:s");
            } else {
                $tanggal = $this->instance->input->post('tgl');
            }

            // jika deskripsi kosong ambil deskripsi dari pos.
            if ($this->instance->input->post('deskripsi') === '') {
                $deskripsi = get_first_paragraph($this->instance->input->post('isi'));
            } else {
                $deskripsi = $this->instance->input->post('deskripsi');
            }

            /**
             * Cek apakah ada gambar yang diupload
             */
            if ($_FILES['ico']['name'] == '') {
                $data = array(
                    'judul' => $this->instance->input->post('jd'),
                    'isi' => $this->instance->input->post('isi'),
                    'deskripsi' => $deskripsi,
                    'tag' => $this->instance->input->post('tag'),
                    'status' => $this->instance->input->post('sts'),
                    'tanggal' => $tanggal
                );
             } else {
                $image_upload = $this->instance->media->upload('ico');
                if ($image_upload  !== false) {
                    $this->instance->media->remove(
                        $this->instance->input->post('image')
                    );
                    $data = array(
                        'judul' => $this->instance->input->post('jd'),
                        'isi' => $this->instance->input->post('isi'),
                        'deskripsi' => $deskripsi,
                        'tag' => $this->instance->input->post('tag'),
                        'status' => $this->instance->input->post('sts'),
                        'tanggal' => $tanggal,
                        'image' => $image_upload
                    );

                } else {
                    $data = false;
                }
            }

            return $data;
        } else {
            // Tampilkan validasi error
            $this->instance->message->validation();

            /**
             * @file  : helper/services_helper.php;
             * Repopulate data yang disubmit
             */
            redata();

            return false;
        }
    }

    public function post_add_kategori()
    {

        // simpan kategori sebagai array
        $data = array();

        //cek jika kategori kosong
        if ($this->instance->input->post('kategori') == "") {
            // masukkan kategori dengan id 1 (uncategorized) jika kategori tidak dipilih.
            //  ambil id terbaru dari artikel yang dimasukkan di database.
            $data[] = array(
                'kategori_id' 	=> 2,
                'artikel_id' 	=> $this->instance->db->insert_id()
            );
        } else {
            // masukkan kategori sebagai array.
            //  ambil id terbaru dari artikel yang dimasukkan di database.
            foreach ($this->instance->input->post('kategori') as $kategori_array) {
                $data[] = array(
                    'kategori_id' 	=> $kategori_array,
                    'artikel_id' 	=> $this->instance->db->insert_id()
                );

            }
        }

        return $data;
    }

    public function post_update_kategori()
    {

        // simpan kategori sebagai array
        $data = array();

        //cek jika kategori kosong
        if ($this->instance->input->post('kategori') == "") {
            // masukkan kategori dengan id 1 (uncategorized) jika kategori tidak dipilih.
            // ambil id terbaru dari artikel yang dimasukkan di database.
            $data[] = array(
                'artikel_id' 	=> $this->instance->input->post('id'),
                'kategori_id' 	=> 1
            );
        } else {
            // masukkan kategori sebagai array.
            // ambil id terbaru dari artikel yang dimasukkan di database.
            foreach ($this->instance->input->post('kategori') as $kategori_array) {
                $data[] = array(
                    'artikel_id' 	=> $this->instance->input->post('id'),
                    'kategori_id' 	=> $kategori_array
                );

            }
        }

        return $data;
    }

}

/* End of file Artikel.php */
/* Location: ./application/libraries/artikel/Artikel.php */
