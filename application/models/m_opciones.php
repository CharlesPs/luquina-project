<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_opciones extends CI_Model {
	
	var $options = array();
	
    function __construct(){
        // Call the Model constructor
        parent::__construct();
				
		$this->load_options();
    }

    function load_options(){
		$query = $this->db->select("optName,optValue")
							->from("wc_opciones")
							->get();
		
		if($query->num_rows() != 0){
			foreach($query->result_array() as $fila){
				$this->options[$fila["optName"]] = $fila["optValue"];
			}
		}
    }
	
    function opcion($optName){
		return $this->options[$optName];
	}
	
	function add_opcion($optName, $optValue){
		$data = array(
			"optName" => $optName,
			"optValue" => $optValue
		);
		
		$this->db->insert('wc_opciones', $data); 
	}
	
	function edit_opcion($optName, $optValue){
		$data = array(
			"optName" => $optName,
			"optValue" => $optValue
		);
		
		$this->db->where('optName', $optName);
		$this->db->update('wc_opciones', $data); 
	}

	function reload($reload){
		if(!$reload){
			return false;
		}

		$reload_files = explode(" ", $reload);
		
		foreach($reload_files as $file){
			$version = $this->opcion($file . "Version");

			if($version){
				$version++;

				$this->edit_opcion($file . "Version", $version);
			}

			$this->load_options();
		}
	}
	
}