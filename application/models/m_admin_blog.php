<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin_blog extends CI_Model {

    function __construct(){
        parent::__construct();

        $this->main_table = "wc_blog_posts";
        $this->locales_table = "wc_locales_blog_posts";
        $this->photos_table = "wc_photos";
    }

    function get_result($offset = 0){
        $query = $this->db->select("*,".$this->main_table.".entry as entry")
                            ->from($this->main_table)
                            ->join($this->locales_table, 
                                $this->main_table . ".entry = ". $this->locales_table . ".guid",
                                "left")
                            ->join($this->photos_table, 
                                $this->main_table . ".idPhoto = ". $this->photos_table . ".entry",
                                "left")
                            ->limit(20, $offset)
                            ->get();

        return $query->result();
    }

    function get_row($entry){
        $query = $this->db->select("*,".$this->main_table.".entry as entry,
                                        ".$this->main_table.".active as active")
                            ->from($this->main_table)
                            ->join($this->locales_table, 
                                $this->main_table . ".entry = ". $this->locales_table . ".guid",
                                "left")
                            ->join($this->photos_table, 
                                $this->main_table . ".idPhoto = ". $this->photos_table . ".entry",
                                "left")
                            ->where($this->main_table.".entry", $entry)
                            ->get();

        return $query->row();
    }

    function get_photo_ids($criteria = ""){

        if($criteria){
            $result = $this->get_result_by_criteria($criteria);
        }else{
            $result = $this->get_result();
        }

        $retorno = array();

        foreach($result as $row){

            $idPhoto = $row->idPhoto * 1;

            if($idPhoto){
                $retorno[] = array(
                    "entry" => $row->idPhoto * 1,
                    "nombre" => $row->nombre,
                    "extension" => $row->extension
                );
            }
        }

        return $retorno;
    }

    function get_total_rows(){
        $query = $this->db->select("*")
                            ->from($this->main_table)
                            ->get();

        return $query->num_rows();
    }

    function save($data, $locales){

        $entry = $data->entry;
        unset($data->entry);

        if($entry){
            // update
            $this->db->where("guid", $entry);
            $this->db->update($this->locales_table, $locales);

            $this->db->where("entry",$entry);
            return $this->db->update($this->main_table, $data);
        }else{
            //insert
            $this->db->insert($this->main_table, $data);
            $locales->guid = $this->db->insert_id();

            return $this->db->insert($this->locales_table, $locales);
        }
    }

    function delete($entry){
        $this->db->delete($this->locales_table, array('guid' => $entry)); 
        return $this->db->delete($this->main_table, array('entry' => $entry)); 
    }

}