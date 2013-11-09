<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin_photos extends CI_Model {
	
    function __construct(){
        // Call the Model constructor
        parent::__construct();
				
        $this->main_table = "wc_photos";
    }

    function get_result($offset = 0){
        $query = $this->db->select("*")
                            ->from($this->main_table)
                            ->limit(10, $offset)
                            ->get();

        return $query->result();
    }

    function get_result_by_array($array_str){

        if(!is_array($array_str)){
            $array = explode(",", $array_str);
        }

        $this->db->_protect_identifiers = FALSE;

        $query = $this->db->select("*")
                            ->from($this->main_table)
                            ->where_in("entry", $array)
                            ->order_by("field (entry, " . $array_str . ")")
                            ->get();

        $this->db->_protect_identifiers = TRUE;

        return $query->result();
    }

    function get_row($entry){
        $query = $this->db->select("*")
                            ->from($this->main_table)
                            ->where("entry", $entry)
                            ->get();

        return $query->row();
    }

    function save($data){
        date_default_timezone_set("America/Lima");

        $image = $data->image_data;
        unset($data->image_data);

        // crea un nuevo archivo
        $data->nombre = date("Y-m-d-").md5(uniqid());
        $data->extension = ".jpg";

        $url = $data->nombre.$data->extension;

        $full_archivo = getcwd().'/_uploads/'.$url;

        $image = substr($image, strpos($image, ",")+1);

        $image = base64_decode($image);

        $imagen = imagecreatefromstring($image);

        imagejpeg($imagen, $full_archivo, 100);

        $this->db->insert($this->main_table, $data);
        
        return $this->db->insert_id();
    }

}