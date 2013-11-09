<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_start extends CI_Controller {

	function __construct(){
		parent::__construct();

		if($this->m_control->user_lvl < 3){
			redirect(base_url() . "admin/control");
		}
	}

	function set_output(){
		$output = array();

		return $output;
	}


	public function index(){

		$output = $this->set_output();

		$output["web_content"] = "";

		$output["sidebar"] = $this->load->view("admin/inc/v_sidebar", $output, true);
		
		$output["web_content"] .= $this->load->view("admin/inc/v_header", $output, true);
		$output["web_content"] .= $this->load->view("admin/v_start", $output, true);
		//$output["web_content"] .= $this->load->view("admin/inc/v_footer", $output, true);

		$this->load->view('admin/v_website', $output);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */