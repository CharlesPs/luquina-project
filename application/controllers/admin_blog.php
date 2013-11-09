<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_blog extends CI_Controller {

	function __construct(){
		parent::__construct();

		if($this->m_control->user_lvl < 3){
			redirect(base_url() . "admin/control");
		}

		$this->pagination_url = base_url()."admin/blog/";

		$this->main_model_name = "m_admin_blog";

		$this->list_view = "admin/v_blog_posts";
		$this->add_view = "admin/v_blog_posts_add";
		$this->edit_view = "admin/v_blog_posts_edit";

		$this->modal_view = "admin/inc/v_modal_photos";
	}

	function set_output(){
		$output = array();

		return $output;
	}

	public function index(){

		$output = $this->set_output();

		$output["body_class"] = "";

		$output["web_content"] = "";

		$output["mod_title"] = "Noticias";

		$output["left_active"] = 5;
		$output["sidebar"] = $this->load->view("admin/inc/v_sidebar", $output, true);

		$this->load->model($this->main_model_name, "main_model");

		$offset = $this->uri->segment(3);

		$output["result"] = $this->main_model->get_result($offset);

		//***************************************************
		$this->load->model("m_paginator");

		$data = new M_object();

		$data->uri_segment 	= 3;
		$data->base_url 	= $this->pagination_url;
		$data->total_rows 	= $this->main_model->get_total_rows();
		$data->per_page 	= 1;

		$output["paginator"] = $this->m_paginator->create($data);
		//***************************************************

		$output["web_content"] .= $this->load->view("admin/inc/v_header", $output, true);
		$output["web_content"] .= $this->load->view($this->list_view, $output, true);
		$output["web_content"] .= $this->load->view("admin/inc/v_footer", $output, true);

		$this->load->view('admin/v_website', $output);
	}

	public function add(){

		$output = $this->set_output();

		$output["body_class"] = "";

		$output["web_content"] = "";

		$output["mod_title"] = "Nueva Noticia";

		$output["left_active"] = 5;
		$output["sidebar"] = $this->load->view("admin/inc/v_sidebar", $output, true);

		$output["web_content"] .= $this->load->view($this->modal_view, $output, true);
		$output["web_content"] .= $this->load->view("admin/inc/v_header", $output, true);
		$output["web_content"] .= $this->load->view($this->add_view, $output, true);
		$output["web_content"] .= $this->load->view("admin/inc/v_footer", $output, true);

		$this->load->view('admin/v_website', $output);
	}

	public function edit(){

		$output = $this->set_output();

		$output["body_class"] = "";

		$output["web_content"] = "";

		$output["mod_title"] = "Editar Noticia";

		$output["left_active"] = 5;
		$output["sidebar"] = $this->load->view("admin/inc/v_sidebar", $output, true);

		$this->load->model($this->main_model_name, "main_model");

		$entry = $this->uri->segment(4);

		$output["row"] = $this->main_model->get_row($entry);

		$output["web_content"] .= $this->load->view($this->modal_view, $output, true);
		$output["web_content"] .= $this->load->view("admin/inc/v_header", $output, true);
		$output["web_content"] .= $this->load->view($this->edit_view, $output, true);
		$output["web_content"] .= $this->load->view("admin/inc/v_footer", $output, true);

		$this->load->view('admin/v_website', $output);
	}

	public function save(){

		$data = new M_object();
		$locales = new M_object();

		$data->entry 			= $this->input->post("entry");
		$data->idPhoto 			= $this->input->post("idPhoto");
		$data->active 			= $this->input->post("active");
		$data->tags 			= $this->input->post("tags");

		$locales->caption_es 	= $this->input->post("caption_es");
		$locales->title_es 		= $this->input->post("title_es");
		$locales->alias_es 		= strtolower(url_title($locales->title_es));
		$locales->intro_es 		= $this->input->post("intro_es");
		$locales->content_es 	= $this->input->post("content_es");

		$locales->caption_en 	= $this->input->post("caption_en");
		$locales->title_en 		= $this->input->post("title_en");
		$locales->alias_en 		= strtolower(url_title($locales->title_en));
		$locales->intro_en 		= $this->input->post("intro_en");
		$locales->content_en 	= $this->input->post("content_en");

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