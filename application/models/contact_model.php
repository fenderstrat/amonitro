<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function save($post)
    {
        return $this->db->insert($this->table, $post);
    }

}

/* End of file contact_model.php */
/* Location: ./application/models/contact_model.php */