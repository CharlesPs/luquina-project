<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_home extends CI_Controller {

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

		$output["body_class"] = "";

		$output["web_content"] = "";

		$output["left_active"] = 1;
		$output["web_leftbar"] = $this->load->view("back/v_inc_leftbar", $output, true);

		$output["web_content"] .= $this->load->view("back/v_inc_header", $output, true);
		$output["web_content"] .= $this->load->view("back/v_content_home", $output, true);
		$output["web_content"] .= $this->load->view("back/v_inc_footer", $output, true);

		$this->load->view('back/v_website', $output);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */