<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artikel_model extends CI_Model
{

    protected $table = 'artikel';
    protected $kategori_table = 'kategori';
    protected $kategori_artikel_table = 'kategori_artikel';

    public function all()
    {
        return $this->db
            ->order_by('artikel_id', 'DESC')
            ->get($this->table);
    }   

    public function find($id)
    {
        return $this->db
            ->where($this->table.'.artikel_id', $id)
            ->get($this->table);
    }   

    public function checked_kategori($id)
    {
        return $this->db
            ->join(
                    $this->kategori_table,
                    $this->kategori_table.'.kategori_id = '.$this->kategori_artikel_table.'.kategori_id'
                )
            ->where('artikel_id', $id)->get($this->kategori_artikel_table);
    }   

    public function unchecked_kategori($checked)
    {
        return $this->db
            ->where_not_in($this->kategori_table.'.kategori_id', $checked)
            ->get($this->kategori_table);
    }   

    public function save($artikel)
    {
        $this->db->insert($this->table, $artikel);
    }

    public function save_kategori_artikel($kategori_artikel)
    {
        $this->db->insert_batch($this->kategori_artikel_table, $kategori_artikel); 
    }

    public function update($id, $artikel)
    {
        $this->db
            ->where('artikel_id', $id)
            ->update($this->table, $artikel);
    }
    

}

/* End of file ArtikelModel.php */
/* Location: ./application/models/ArtikelModel.php */