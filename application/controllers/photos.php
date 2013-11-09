<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photos extends CI_Controller {

	public function thumbnail(){

        $image_name = $this->uri->segment(2);
        
        $image_dest = getcwd ().'/_uploads/thumbnails/'.$image_name;
        
        $image_str = explode(".", $image_name);
        $image_data = explode("-", $image_str[0]);
        
        $image_w = $image_data[4];
        $image_h = $image_data[5];
        
        $image_src = getcwd ().'/_uploads/'.$image_data[0]."-".$image_data[1]."-".$image_data[2]."-".$image_data[3].".".$image_str[1];
        
        $valid_exts = array("jpg", "jpeg", "gif", "png");
        
        $errores = '';
        
        if((!file_exists($image_dest)) and (in_array($image_str[1], $valid_exts))){
            
            $config['image_library'] = 'gd2';
            $config['source_image'] = $image_src;
            $config['create_thumb'] = FALSE;
            $config['new_image'] = $image_dest;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = $image_w;
            $config['height'] = $image_h;

            $this->load->library('image_lib', $config);

            if(!$this->image_lib->resize()){
                $errores .= $this->image_lib->display_errors();
            }
            
        }
        
        if(!$errores == ''){
            echo $errores;
        }else{
            switch($image_str[1]){
                case "jpg":
                case "jpeg":
                    $imagecreatefrom = "imagecreatefromjpeg";
                    $imagefunc = "imagejpeg";
                    $content_type = "image/jpeg";
                    break;
                case "gif":
                    $imagecreatefrom = "imagecreatefromgif";
                    $imagefunc = "imagegif";
                    $content_type = "image/gif";
                    break;
                case "png":
                    $imagecreatefrom = "imagecreatefrompng";
                    $imagefunc = "imagepng";
                    $content_type = "image/png";
                    break;
                default:
                    $errores .= "invalid extension";
                    break;
            }
            
            $img_res = $imagecreatefrom($image_dest);
            
            Header('Content-Type: '.$content_type);
            $imagefunc($img_res);
        }
	}

    function create(){
        $this->load->model("m_admin_photos");

        $data = new M_object();

        $data->image_data = $this->input->post("image_data");

        $idPhoto = $this->m_admin_photos->save($data);

        $foto = $this->m_admin_photos->get_row($idPhoto);

        echo json_encode($foto);
    }
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
