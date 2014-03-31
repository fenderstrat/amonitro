<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{		
		$data['title'] = 'Artikel';
		$data['template']=  'admin/dashboard/index';
		$this->load->view('admin/layout/master', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */