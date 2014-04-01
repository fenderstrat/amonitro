<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Get_input {

	protected $instance;

	public function __construct()
	{
		$this->instance =& get_instance();
		$this->instance->load->library('form_validation');
	}

	public function user()
	{	
		# load helper untuk fungsi hash
		$this->instance->load->helper('security');
		
		$this->instance->form_validation->set_rules('username', 'Username', 'required');
		$this->instance->form_validation->set_rules('password', 'Password', 'required');

		if($this->instance->form_validation->run() === true) {
			$data = array(
				'username' => $this->instance->input->post('username'),
				# hash password
				'password' => do_hash($this->instance->input->post('password'))
			);
			return $data;
		} else {
			return false;
		}
	}
}

/* End of file get_input_helper.php */
/* Location: ./application/helpers/get_input_helper.php */