<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Splash extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	private function set_output(){
		$output = array();

		return $output;
	}

	public function index(){

		$output = $this->set_output();

		$this->load->view('v_splash', $output);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */