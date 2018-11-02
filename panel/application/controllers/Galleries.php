<?php
class Galleries extends CI_Controller{
    public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "galleries_v";
        $this->load->model("gallery_model");
        $this->load->model("image_model");
        $this->load->model("video_model");
        $this->load->model("file_model");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }
    public function index(){
        $viewData = new stdClass();
        $items = $this->gallery_model->get_all(
            array(), "rank ASC"
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function new_form(){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function save(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Galeri Adı", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $gallery_type = $this->input->post("gallery_type");
            $path         = "uploads/$this->viewFolder/";
            $folder_name = "";
            if($gallery_type == "image"){
                $folder_name = convertToSEO($this->input->post("title"));
                $path = "$path/images/$folder_name";
            } else if($gallery_type == "file"){
                $folder_name = convertToSEO($this->input->post("title"));
                $path = "$path/files/$folder_name";
            }
            if($gallery_type != "video"){
                if(!mkdir($path, 0755)){
                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Galeri Üretilirken problem oluştu. (Yetki Hatası)",
                        "type"  => "error"
                    );
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("galerries"));
                    die();
                }
            }
            $insert = $this->gallery_model->add(
                array(
                    "title"         => $this->input->post("title"),
                    "gallery_type"  => $this->input->post("gallery_type"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "folder_name"   => $folder_name,
                    "rank"          => 0,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );
            if($insert){
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type"  => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("galleries"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function update_form($id){
        $viewData = new stdClass();
        $item = $this->gallery_model->get(
            array(
                "id"    => $id,
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update($id, $gallery_type, $oldFolderName = ""){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Galeri Adı", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $path         = "uploads/$this->viewFolder/";
            $folder_name = "";
            if($gallery_type == "image"){
                $folder_name = convertToSEO($this->input->post("title"));
                $path = "$path/images";
            } else if($gallery_type == "file"){
                $folder_name = convertToSEO($this->input->post("title"));
                $path = "$path/files";
            }
            if($gallery_type != "video"){
                if(!rename("$path/$oldFolderName", "$path/$folder_name")){
                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text"  => "Galeri Üretilirken problem oluştu. (Yetki Hatası)",
                        "type"  => "error"
                    );
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("galleries"));
                    die();
                }
            }
            $update = $this->gallery_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "title"         => $this->input->post("title"),
                    "folder_name"   => $folder_name,
                    "url"           => convertToSEO($this->input->post("title")),
                )
            );
            if($update){
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("galleries"));
        } else {
            $viewData = new stdClass();
            $item = $this->gallery_model->get(
                array(
                    "id"    => $id,
                )
            );
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function delete($id){
        $gallery = $this->gallery_model->get(
            array(
                "id"    => $id
            )
        );
        if($gallery){
            if($gallery->gallery_type != "video"){
                if($gallery->gallery_type == "image")
                    $path = "uploads/$this->viewFolder/images/$gallery->folder_name";
                else if($gallery->gallery_type == "file")
                    $path = "uploads/$this->viewFolder/files/$gallery->folder_name";
                $delete_folder = rmdir($path);
                if(!$delete_folder){
                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Kayıt silme sırasında bir problem oluştu",
                        "type"  => "error"
                    );
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("galleries"));
                    die();
                }
            }
            $delete = $this->gallery_model->delete(
                array(
                    "id"    => $id
                )
            );
            if($delete){
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde silindi",
                    "type"  => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt silme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("galleries"));
        }
    }
    public function isActiveSetter($id){
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->gallery_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }
    public function rankSetter(){
        $data = $this->input->post("data");
        parse_str($data, $order);
        $items = $order["ord"];
        foreach ($items as $rank => $id){
            $this->gallery_model->update(
                array(
                    "id"        => $id,
                    "rank !="   => $rank
                ),
                array(
                    "rank"      => $rank
                )
            );
        }
    }
    public function upload_form($id){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";
        $item = $this->gallery_model->get(
            array(
                "id"    => $id
            )
        );
        $viewData->item = $item;
        if($item->gallery_type == "image"){
            $viewData->items = $this->image_model->get_all(
                array(
                    "gallery_id"    => $id
                ), "rank ASC"
            );
            $viewData->folder_name = $item->folder_name;
        } else if($item->gallery_type == "file"){
            $viewData->items = $this->file_model->get_all(
                array(
                    "gallery_id"    => $id
                ), "rank ASC"
            );
        } else {
            $viewData->items = $this->video_model->get_all(
                array(
                    "gallery_id"    => $id
                ), "rank ASC"
            );
        }
        $viewData->gallery_type = $item->gallery_type;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function file_upload_old_method($gallery_id, $gallery_type, $folderName){
        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        $config["allowed_types"] = "jpg|jpeg|png|pdf|doc|docx";
        $config["upload_path"]   = ($gallery_type == "image") ? "uploads/$this->viewFolder/images/$folderName/" : "uploads/$this->viewFolder/files/$folderName/";
        $config["file_name"]     = $file_name;
        $this->load->library("upload", $config);
        $upload = $this->upload->do_upload("file");
        if($upload){
            $uploaded_file = $this->upload->data("file_name");
            $modelName = ($gallery_type == "image") ? "image_model" : "file_model";
            $this->$modelName->add(
                array(
                    "url"           => "{$config["upload_path"]}$uploaded_file",
                    "rank"          => 0,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s"),
                    "gallery_id"    => $gallery_id
                )
            );
        } else {
            echo "islem basarisiz";
        }
    }
    public function file_upload($gallery_id, $gallery_type, $folderName){
        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        if ($gallery_type == "image") {
            $image_252x156 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder/images/$folderName/",252,156, $file_name);
            $image_350x216 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder/images/$folderName/",350,216, $file_name);
            $image_851x606 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder/images/$folderName/",851,606, $file_name);
            if ($image_252x156 && $image_350x216 && $image_851x606) {
                $this->image_model->add(
                    array(
                        "url"           => $file_name,
                        "rank"          => 0,
                        "isActive"      => 1,
                        "createdAt"     => date("Y-m-d H:i:s"),
                        "gallery_id"    => $gallery_id
                    )
                );
            }else {
                echo "islem basarisiz";
            }
        }else{
            $config["allowed_types"] = "*";
            $config["upload_path"]   = "uploads/$this->viewFolder/files/$folderName/";
            $config["file_name"]     = $file_name;
            $this->load->library("upload", $config);
            $upload = $this->upload->do_upload("file");
            if($upload){
                $uploaded_file = $this->upload->data("file_name");
                $this->file_model->add(
                    array(
                        "url"           => $uploaded_file,
                        "rank"          => 0,
                        "isActive"      => 1,
                        "createdAt"     => date("Y-m-d H:i:s"),
                        "gallery_id"    => $gallery_id
                    )
                );
            } else {
                echo $this->upload->display_errors();
            }
        }
    }
    public function refresh_file_list($gallery_id, $gallery_type,$folder_name){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";
        $modelName = ($gallery_type == "image") ? "image_model" : "file_model";
        $viewData->items = $this->$modelName->get_all(
            array(
                "gallery_id"    => $gallery_id
            )
        );
        $viewData->folder_name = $folder_name;
        $viewData->gallery_type = $gallery_type;
        $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/file_list_v", $viewData, true);
        echo $render_html;
    }
    public function fileDelete($id, $parent_id, $gallery_type){
        $modelName = ($gallery_type == "image") ? "image_model" : "file_model";
        $fileName = $this->$modelName->get(
            array(
                "id"    => $id
            )
        );
        $delete = $this->$modelName->delete(
            array(
                "id"    => $id
            )
        );
        if($delete){
            unlink($fileName->url);
            redirect(base_url("galleries/upload_form/$parent_id"));
        } else {
            redirect(base_url("galleries/upload_form/$parent_id"));
        }
    }
    public function fileIsActiveSetter($id, $gallery_type){
        if($id && $gallery_type){
            $modelName = ($gallery_type == "image") ? "image_model" : "file_model";
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->$modelName->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }
    public function fileRankSetter($gallery_type){
        $data = $this->input->post("data");
        parse_str($data, $order);
        $items = $order["ord"];
        $modelName = ($gallery_type == "image") ? "image_model" : "file_model";
        foreach ($items as $rank => $id){
            $this->$modelName->update(
                array(
                    "id"        => $id,
                    "rank !="   => $rank
                ),
                array(
                    "rank"      => $rank
                )
            );
        }
    }
    public function gallery_video_list($id){
        $viewData = new stdClass();
        $gallery = $this->gallery_model->get(
            array(
                "id"    => $id
            )
        );
        $items = $this->video_model->get_all(
            array(
                "gallery_id"    => $id
            ), "rank ASC"
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "video/list";
        $viewData->items = $items;
        $viewData->gallery = $gallery;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function new_gallery_video_form($id){
        $viewData = new stdClass();
        $viewData->gallery_id = $id;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "video/add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function gallery_video_save($id){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("url", "Video URL", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $insert = $this->video_model->add(
                array(
                    "url"           => $this->input->post("url"),
                    "gallery_id"    => $id,
                    "rank"          => 0,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );
            if($insert){
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type"  => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("galleries/gallery_video_list/$id"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "video/add";
            $viewData->form_error = true;
            $viewData->gallery_id = $id;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function update_gallery_video_form($id){
        $viewData = new stdClass();
        $item = $this->video_model->get(
            array(
                "id"    => $id,
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "video/update";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function gallery_video_update($id, $gallery_id){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("url", "Video URL", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $update = $this->video_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "url"   => $this->input->post("url"),
                )
            );
            if($update){
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("galleries/gallery_video_list/$gallery_id"));
        } else {
            $viewData = new stdClass();
            $item = $this->video_model->get(
                array(
                    "id"    => $id,
                )
            );
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "video/update";
            $viewData->form_error = true;
            $viewData->item = $item;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function rankGalleryVideoSetter(){
        $data = $this->input->post("data");
        parse_str($data, $order);
        $items = $order["ord"];
        foreach ($items as $rank => $id){
            $this->video_model->update(
                array(
                    "id"        => $id,
                    "rank !="   => $rank
                ),
                array(
                    "rank"      => $rank
                )
            );
        }
    }
    public function galleryVideoIsActiveSetter($id){
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->video_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }
    public function galleryVideoDelete($id, $gallery_id){
        $delete = $this->video_model->delete(
            array(
                "id"    => $id
            )
        );
        if($delete){
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde silindi",
                "type"  => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Kayıt silme sırasında bir problem oluştu",
                "type"  => "error"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("galleries/gallery_video_list/$gallery_id"));
    }
}
/*<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Galleries extends CI_Controller {
	public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "galleries_v";
        $this->load->model("gallery_model");
        $this->load->model("image_model");
        $this->load->model("video_model");
        $this->load->model("file_model");
    }
	public function index(){
		$viewData = new stdClass();
		$items = $this->gallery_model->get_all(
			array(),"rank ASC"
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$viewData->items = $items;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function new_form(){
		$viewData = new stdClass();
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "add";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function save(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Galeri Adı", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $gallery_type = $this->input->post("gallery_type");
            $path = "uploads/$this->viewFolder/";
            $folder_name = "";
            if ($gallery_type == "image") {
                $folder_name = convertToSEO($this->input->post("title"));
                $path = "$path/images/$folder_name";
            }else if($gallery_type == "file"){
                $folder_name = convertToSEO($this->input->post("title"));
                $path = "$path/files/$folder_name";
            }
            if ($gallery_type != "video") {
                if (!mkdir($path,0755)) {
                    $alert = array(
                    "title" => "İşlem Başarısız Oldu!",
                    "text" => "Galeri ekleme sırasında bir problem oluştu! (Yetki Hatası)!",
                    "type" => "error"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("galleries"));
                    die();
                }
            }
            $insert = $this->gallery_model->add(
                array(
                    "title"         => $this->input->post("title"),
                    "gallery_type"   => $this->input->post("gallery_type"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "folder_name" => $folder_name,
                    "rank"          => 0,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );
            if($insert){
                $alert = array(
                    "title" => "İşlem Başarılıyla Gerçekleşti.",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız Oldu!",
                    "text" => "Kayıt ekleme sırasında bir problem oluştu!",
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("galleries"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function update_form($id){
    	$viewData = new stdClass();
    	$item = $this->gallery_model->get(
    		array(
    			"id"=>$id
    		)
    	);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function update($id,$gallery_type,$oldFolderName = ""){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Galeri Adı", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $path = "uploads/$this->viewFolder/";
            $folder_name = "";
            if ($gallery_type == "image") {
                $folder_name = convertToSEO($this->input->post("title"));
                $path = "$path/images";
            }else if($gallery_type == "file"){
                $folder_name = convertToSEO($this->input->post("title"));
                $path = "$path/files";
            }
            if ($gallery_type != "video") {
                if (!rename("$path/$oldFolderName","$path/$folder_name")) {
                    $alert = array(
                    "title" => "İşlem Başarısız Oldu!",
                    "text" => "Galeri ekleme sırasında bir problem oluştu! (Yetki Hatası)!",
                    "type" => "error"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("galleries"));
                    die();
                }
            }
            $update = $this->gallery_model->update(
            	array(
            		"id" => $id
            	),
                array(
                    "title"         => $this->input->post("title"),
                    "folder_name"   => $folder_name,
                    "url"           => convertToSEO($this->input->post("title"))
                )
            );
            if($update){
                $alert = array(
                    "title" => "İşlem Başarılıyla Gerçekleşti.",
                    "text" => "Kayıt başarılı bir şekilde güncellendi.",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız Oldu.",
                    "text" => "Kayıt güncelleme sırasında bir problem oluştu!",
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("galleries"));
        } else {
        	$item = $this->gallery_model->get(
    			array(
    				"id"=>$id
    			)
    		);
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
    		$viewData->item = $item;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function delete($id){
        $gallery = $this->gallery_model->get(
            array(
                "id" => $id
            )
        );
        if ($gallery) {
            if ($gallery->gallery_type != "video") {
                if ($gallery->gallery_type == "image") {
                    $path = "uploads/$this->viewFolder/images/$gallery->folder_name";
                }else if($gallery->gallery_type == "file"){
                    $path = "uploads/$this->viewFolder/files/$gallery->folder_name";
                }
                $delete_folder = rmdir($path);
                if (!$delete_folder) {
                    $alert = array(
                        "title" => "İşlem Başarısız Oldu.",
                        "text" => "Kayıt silme işlemi sırasında bir problem oluştu!",
                        "type" => "error"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("galleries"));
                    die();
                }
            }
            $delete = $this->gallery_model->delete(
                array(
                    "id" => $id
                )
            );
            if ($delete) {
                $alert = array(
                    "title" => "İşlem Başarılıyla Gerçekleşti.",
                    "text" => "Kayıt silme işlemi başarılı bir şekilde silindi.",
                    "type" => "success"
                );
            }else{
                $alert = array(
                    "title" => "İşlem Başarısız Oldu.",
                    "text" => "Kayıt silme işlemi sırasında bir problem oluştu!",
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("galleries"));
        }        
    }
    public function imageDelete($id,$parent_id){
        $delete = $this->galleries_image_model->delete(
            array(
                "id" => $id
            )
        );
        if ($delete) {
            $rsil = getFileName($id);
            unlink("uploads/{$this->viewFolder}/$rsil");
            redirect(base_url("galleries/image_form/$parent_id"));
        }else{
            redirect(base_url("galleries/image_form/$parent_id"));
        }
    }
    public function isActiveSetter($id){
    	if ($id) {
    		$isActive = ($this->input->post("data") === "true") ? 1 : 0;
    		$this->gallery_model->update(
    			array(
    				"id" => $id
    			),
    			array(
    				"isActive" => $isActive
    			)
    		);
    	}
    }
    public function imageIsActiveSetter($id){
        if ($id) {
            $imageIsActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->galleries_image_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $imageIsActive
                )
            );
        }
    }
    public function rankSetter(){
    	$data = $this->input->post("data");
    	parse_str($data,$order);
    	$items = $order["ord"];
    	foreach ($items as $rank => $id) {
    		$this->gallery_model->update(
    			array(
    				"id" => $id,
    				"rank !=" => $rank
    			),
    			array(
    				"rank" => $rank
    			)
    		);
    	}
    }
    public function fileRankSetter($gallery_type){
        $data = $this->input->post("data");
        parse_str($data,$order);
        $items = $order["ord"];
        $modelName = ($gallery_type == "image") ? "image_model" : "file_model";
        foreach ($items as $rank => $id) {
            $this->modelName->update(
                array(
                    "id" => $id,
                    "rank !=" => $rank
                ),
                array(
                    "rank" => $rank
                )
            );
        }
    }
    public function upload_form($id){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";
        $item = $this->gallery_model->get(
            array(
                "id" => $id
            )
        );
        if ($item->gallery_type = "image") {
            $viewData->items = $this->image_model->get_all(
                array(
                    "gallery_id" => $id
                ),"rank ASC"
            );
        }else if($item->gallery_type = "file"){
            $viewData->items = $this->file_model->get_all(
                array(
                    "gallery_id" => $id
                ),"rank ASC"
            );
        }else{
            $viewData->items = $this->video_model->get_all(
                array(
                    "gallery_id" => $id
                ),"rank ASC"
            );
        }
        $viewData->gallery_type = $item->gallery_type;
        $viewData->item = $item;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);

    }
    public function file_upload($gallery_id, $gallery_type, $folderName){
        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        $config["allowed_types"] = "jpg|jpeg|png|pdf|doc|docx";
        $config["upload_path"]   = ($gallery_type == "image") ? "uploads/$this->viewFolder/images/$folderName/" : "uploads/$this->viewFolder/files/$folderName/";
        $config["file_name"]     = $file_name;
        $this->load->library("upload", $config);
        $upload = $this->upload->do_upload("file");
        if($upload){
            $uploaded_file = $this->upload->data("file_name");
            $modelName = ($gallery_type == "image") ? "image_model" : "file_model";
            $this->$modelName->add(
                array(
                    "url"           => "{$config["upload_path"]}$uploaded_file",
                    "rank"          => 0,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s"),
                    "gallery_id"    => $gallery_id
                )
            );
        } else {
            echo "islem basarisiz";
        }
    }
    public function refresh_file_list($gallery_id,$gallery_type){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";
        $modelName = ($gallery_type == "image") ? "image_model" : "file_model";
        $viewData->items = $this->modelName->get_all(
            array(
                "gallery_id" => $gallery_id
            )
        );
        $viewData->gallery_type = $gallery_type;
        $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/file_list_v",$viewData,true);
        echo $render_html;
    }
    public function isCoverSetter($id,$parent_id){
        if ($id && $parent_id) {
            $isCover = ($this->input->post("data") === "true") ? 1 : 0;
            $this->galleries_image_model->update(
                array(
                    "id" => $id,
                    "gallery_id" => $parent_id
                ),
                array(
                    "isCover" => $isCover
                )
            );

            $this->galleries_image_model->update(
                array(
                    "id !=" => $id,
                    "gallery_id" => $parent_id
                ),
                array(
                    "isCover" => 0
                )
            );
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "image";
            $viewData->item_images = $this->galleries_image_model->get_all(
                array(
                    "gallery_id" => $parent_id
                ),"rank ASC"
            );
            $render_html = $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v",$viewData,true);
            echo $render_html;
        }
    }
}*/