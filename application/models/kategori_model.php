<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	protected $table = 'kategori';
	
	public function all()
	{
		return $this->db->get($this->table);
	}
}

/* End of file kategori_model.php */
/* Location: ./application/models/kategori_model.php */