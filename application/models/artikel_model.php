<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artikel_model extends CI_Model {

	protected $table = 'artikel';
	protected $kategori_table = 'kategori';
	protected $kategori_artikel_table = 'kategori_artikel';

	public function all()
	{
		return $this->db
			->join($this->kategori_artikel_table, $this->table.'.artikel_id = '.$this->kategori_artikel_table.'.artikel_id')
			->join($this->kategori_table, $this->kategori_artikel_table.'.kategori_id = '.$this->kategori_table.'.kategori_id')
			->get($this->table);
	}	

}

/* End of file artikel.php */
/* Location: ./application/models/artikel.php */