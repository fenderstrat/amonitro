<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_model extends CI_Model
{

    protected $table = 'kategori';
    
    public function all()
    {
        return $this->db->get_where($this->table, array('kategori_id !=' => 1));
    }
}

/* End of file KategoriModel.php */
/* Location: ./application/models/KategoriModel.php */