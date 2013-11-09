<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_slides extends CI_Controller {

	function __construct(){
		parent::__construct();

		if($this->m_control->user_lvl < 3){
			redirect(base_url() . "admin/control");
		}

		$this->main_model_name = "m_admin_slides";
	}

	function set_output(){
		$output = array();

		return $output;
	}

	public function index(){

		$output = $this->set_output();

		$output["body_class"] = "";

		$output["web_content"] = "";

		$output["mod_title"] = "Slides";

		$output["left_active"] = 3;
		$output["web_leftbar"] = $this->load->view("back/v_inc_leftbar", $output, true);

		$this->load->model($this->main_model_name, "main_model");

		$offset = $this->uri->segment(3);

		$output["result"] = $this->main_model->get_result($offset);

		//***************************************************
		$this->load->model("m_paginator");

		$data = new M_object();

		$data->uri_segment 	= 3;
		$data->base_url 	= base_url()."admin/slides/";
		$data->total_rows 	= $this->main_model->get_total_rows();
		$data->per_page 	= 20;

		$output["paginator"] = $this->m_paginator->create($data);
		//***************************************************

		$output["web_content"] .= $this->load->view("back/v_inc_header", $output, true);
		$output["web_content"] .= $this->load->view("back/v_content_slides", $output, true);
		$output["web_content"] .= $this->load->view("back/v_inc_footer", $output, true);

		$this->load->view('back/v_website', $output);
	}

	public function add(){

		$output = $this->set_output();

		$output["body_class"] = "";

		$output["web_content"] = "";

		$output["mod_title"] = "Nuevo Slide";

		$output["left_active"] = 3;
		$output["web_leftbar"] = $this->load->view("back/v_inc_leftbar", $output, true);

		$output["web_content"] .= $this->load->view("back/v_inc_header", $output, true);
		$output["web_content"] .= $this->load->view("back/v_content_slides_add", $output, true);
		$output["web_content"] .= $this->load->view("back/v_inc_footer", $output, true);

		$this->load->view('back/v_website', $output);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */