<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagination {

	public static function admin($base_url, $per_page, $total_rows, $segment=4)
	{
		$CI = & get_instance();
    		$CI->load->library('pagination');
		
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['next_link']  = '<div class="digit">Next &rsaquo;</div>';
		$config['prev_link']   = '<div class="digit">&lsaquo; Prev</div>';
		$config['num_tag_open'] = '<div class="digit">';
		$config['num_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<div class="digit current">';
		$config['cur_tag_close'] = '</div>';
		$config['num_links'] = 1;
		$config['last_link'] = '<div class="digit">Last &raquo;</div>';
		$config['first_link'] = '<div class="digit">&laquo; First</div>';
		$config['uri_segment'] = $segment;

		$config['base_url']= $base_url;
		$config['per_page'] = $per_page;
		$config['total_rows'] = $total_rows;

		return $CI->pagination->initialize($config); 
	}

<<<<<<< HEAD
	public static function main($base_url, $per_page, $total_rows, $segment=3)
=======
	public static function main($base_url, $per_page, $total_rows, $segment=2)
>>>>>>> b861d05c5457c279fe07d6c0af5f09f2219c60cf
	{
		$CI = & get_instance();
    		$CI->load->library('pagination');
		
		$config['full_tag_open'] = '<div class="halaman">';
		$config['full_tag_close'] = '</div>';
<<<<<<< HEAD
		$config['next_link']  = '<div class="digit prev">Next &rsaquo;</div>';
		$config['prev_link']   = '<div class="digit next">&lsaquo; Prev</div>';
=======
		$config['next_link']  = '<div class="prev">Next &rsaquo;</div>';
		$config['prev_link']   = '<div class="">&lsaquo; Prev</div>';
>>>>>>> b861d05c5457c279fe07d6c0af5f09f2219c60cf
		$config['num_tag_open'] = '<div class="digit digit-all">';
		$config['num_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<div class="currents">';
		$config['cur_tag_close'] = '</div>';
		$config['num_links'] = 1;
		$config['last_link'] = '<div class="digit next">Last &raquo;</div>';
		$config['first_link'] = '<div class="digit prev">&laquo; First</div>';
		$config['uri_segment'] = $segment;

		$config['base_url']= $base_url;
		$config['per_page'] = $per_page;
		$config['total_rows'] = $total_rows;

		return $CI->pagination->initialize($config); 
	} 
}

/* End of file pagination.php */
/* Location: ./application/helpers/pagination.php */