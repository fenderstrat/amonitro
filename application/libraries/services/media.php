<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media
{
    protected $instance;

    public function __construct()
    {
        $this->instance =& get_instance();
    }

    public function upload($input)
    {
        $config = array(
            'upload_path' => 'assets/uploads/',
            'allowed_types' => 'gif|jpg|png',
            'max_size' => '5000',
            'encrypt_name' => true
        );

        $this->instance->load->library('upload', $config);

        # jika ada file yang diupload, cek jika upload tidak error.
        # jika tidak ada file yang diupload, return null.
        if (! empty($_FILES[$input]['name'])) {
            # jika file berhasil diupload, return nama filenya
            # jika file gagal diupload return false
            if ($this->instance->upload->do_upload($input)) {
                $data = $this->instance->upload->data();
                return $data['file_name'];
            } else {
                $this->instance->message->upload_error();
                return false;
            }
        }
    }
}
