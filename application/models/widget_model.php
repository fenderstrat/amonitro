<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Widget_model extends CI_Model {

    private $table = 'widget';

    public function get_all()
    {
        # code...
    }

    public function save($post)
    {
        return $this->db->insert($this->table, $post);
    }

}

/* End of file widget_model.php */
/* Location: ./application/models/widget_model.php */