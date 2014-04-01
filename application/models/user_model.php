<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	protected $table = 'user';

	# cek jika user ditemukan
	public function check_user($data)
	{
		return $this->db->get_where($this->table, $data);
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */