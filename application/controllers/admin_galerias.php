<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_galerias extends CI_Controller {

	function __construct(){
		parent::__construct();

		if($this->m_control->user_lvl < 3){
			redirect(base_url() . "admin/control");
		}

		$this->main_model_name = "m_admin_galerias";
		$this->photos_model_name = "m_admin_photos";

		$this->list_view = "back/v_content_galerias";
		$this->add_view = "back/v_content_galerias_add";
		$this->edit_view = "back/v_content_galerias_edit";

		$this->modal_view = "back/v_inc_modal_photos";
	}

	function set_output(){
		$output = array();

		return $output;
	}

	public function index(){

		$output = $this->set_output();

		$output["body_class"] = "";

		$output["web_content"] = "";

		$output["mod_title"] = "Galerías";

		$output["left_active"] = 7;
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
		$output["web_content"] .= $this->load->view($this->list_view, $output, true);
		$output["web_content"] .= $this->load->view("back/v_inc_footer", $output, true);

		$this->load->view('back/v_website', $output);
	}

	public function add(){

		$output = $this->set_output();

		$output["body_class"] = "";

		$output["web_content"] = "";

		$output["mod_title"] = "Nueva Galería";

		$output["left_active"] = 7;
		$output["web_leftbar"] = $this->load->view("back/v_inc_leftbar", $output, true);

		$output["web_content"] .= $this->load->view($this->modal_view, $output, true);
		$output["web_content"] .= $this->load->view("back/v_inc_header", $output, true);
		$output["web_content"] .= $this->load->view($this->add_view, $output, true);
		$output["web_content"] .= $this->load->view("back/v_inc_footer", $output, true);

		$this->load->view('back/v_website', $output);
	}

	public function edit(){

		$output = $this->set_output();

		$output["body_class"] = "";

		$output["web_content"] = "";

		$output["mod_title"] = "Editar Galería";

		$output["left_active"] = 7;
		$output["web_leftbar"] = $this->load->view("back/v_inc_leftbar", $output, true);

		$this->load->model($this->main_model_name, "main_model");
		$this->load->model($this->photos_model_name, "photos_model");

		$entry = $this->uri->segment(4);

		$output["row"] = $this->main_model->get_row($entry);
		$output["row"]->photos = $this->photos_model->get_result_by_array($output["row"]->images);

		$output["web_content"] .= $this->load->view($this->modal_view, $output, true);
		$output["web_content"] .= $this->load->view("back/v_inc_header", $output, true);
		$output["web_content"] .= $this->load->view($this->edit_view, $output, true);
		$output["web_content"] .= $this->load->view("back/v_inc_footer", $output, true);

		$this->load->view('back/v_website', $output);
	}

	public function save(){

		$data = new M_object();
		$locales = new M_object();

		$data->entry 			= $this->input->post("entry");
		$data->idPhoto 			= $this->input->post("idPhoto");
		$data->active 			= $this->input->post("active");
		$data->tags 			= $this->input->post("tags");
		$data->images 			= $this->input->post("images");

		$locales->title_es 		= $this->input->post("title_es");
		$locales->alias_es 		= strtolower(url_title($locales->title_es));
		$locales->short_text_es = $this->input->post("short_text_es");

		$locales->title_en 		= $this->input->post("title_en");
		$locales->alias_en 		= strtolower(url_title($locales->title_en));
		$locales->short_text_en = $this->input->post("short_text_en");

		$this->load->model($this->main_model_name, "main_model");

		echo $this->main_model->save($data, $locales);
	}

	public function delete(){

		$this->load->model($this->main_model_name, "main_model");

		$entry = $this->uri->segment(4);

		echo $this->main_model->delete($entry);
	}

	public function get_photos(){
		$criteria = $this->input->post("criteria");

		$this->load->model($this->main_model_name, "main_model");

		echo json_encode($this->main_model->get_photo_ids($criteria));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */