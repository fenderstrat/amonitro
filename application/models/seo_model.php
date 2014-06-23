<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seo_model extends CI_Model
{

    private $table = 'seo';


    public function get_all()
    {
        # code...
    }

    public function save($post)
    {
        return $this->db->insert($this->table, $post);
    }
}

/* End of file seo_model.php */
/* Location: ./application/models/seo_model.php */