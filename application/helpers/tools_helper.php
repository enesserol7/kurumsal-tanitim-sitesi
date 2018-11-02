<?php
function get_product_cover_image($product_id){
    $t = &get_instance();
    $t->load->model("product_image_model");
    $cover_image = $t->product_image_model->get(
        array(
            "isCover"       => 1,
            "product_id"    => $product_id
        )
    );
    if(empty($cover_image)){
        $cover_image = $t->product_image_model->get(
            array(
                "product_id"    => $product_id
            )
        );
    }
    return !empty($cover_image) ? $cover_image->img_url : "";
}
function get_readable_date($date){
    setlocale(LC_ALL, 'tr_TR.UTF-8');
    return strftime('%e %B %Y', strtotime($date));
}
function get_portfolio_category_title($id){
    $t = &get_instance();
    $t->load->model("portfolio_category_model");
    $portfolio = $t->portfolio_category_model->get(
        array(
            "id" => $id
        )
    );
    return (empty($portfolio)) ? false : $portfolio->title;
}
function get_portfolio_cover_image($id){
    $t = &get_instance();
    $t->load->model("portfolio_image_model");
    $cover_image = $t->portfolio_image_model->get(
        array(
            "isCover"       => 1,
            "portfolio_id"    => $id
        )
    );
    if(empty($cover_image)){
        $cover_image = $t->portfolio_image_model->get(
            array(
                "portfolio_id"    => $id
            )
        );
    }
    return !empty($cover_image) ? $cover_image->img_url : "";
}
function get_settings($language = "tr"){
    $t = &get_instance();
    //$settings = $t->session->userdata("settings");
    //if (empty($settings)) {
        $t->load->model("settings_model");
        $settings = $t->settings_model->get(
            array(
                "language" => $language
            )
        );
        $t->session->set_userdata("settings",$settings);
    //}
    return $settings;
}
function send_email($toEmail = "",$subject = "",$message = ""){
    $t = &get_instance();
    $t->load->model("emailsettings_model");
    $email_settings = $t->emailsettings_model->get(
        array(
            "isActive" => 1
            )
        );
    if (empty($toEmail)) {
        $toEmail = $email_settings->to;
    }
    $config = array(
        "protocol" => $email_settings->protocol,
        "smtp_host" => $email_settings->host,
        "smtp_port" => $email_settings->port,
        "smtp_user" => $email_settings->user,
        "smtp_pass" => $email_settings->password,
        "starttls" => true,
        "charset" => "utf-8",
        "mailtype" => "html",
        "wordwrap" => true,
        "newline" => "\r\n"
    );
    $t->load->library("email",$config);
    $t->email->from($email_settings->from,$email_settings->user_name);
    $t->email->to($toEmail);
    $t->email->subject($subject);
    $t->email->message($message);
    return $t->email->send();
}
function get_picture($path = "", $picture = "", $resolution = "50x50"){
    if($picture != ""){
        if(file_exists(FCPATH . "panel/uploads/$path/$resolution/$picture")){
            $picture = base_url("panel/uploads/$path/$resolution/$picture");
        } else {
            $picture = base_url("assets/images/default_image_$resolution.png");
        }
    } else {
        $picture = base_url("assets/images/default_image_$resolution.png");
    }
    return $picture;
}
function get_popup_service($page = ""){
    $t = &get_instance();
    $t->load->model("popup_model");
    $popup = $t->popup_model->get(
        array(
            "isActive" => 1,
            "page" => $page
        )
    );
    return (!empty($popup)) ? $popup : false;
}
function get_gallery_by_url($url = ""){
    $t = &get_instance();
    $t->load->model("gallery_model");
    $gallery = $t->gallery_model->get(
        array(
            "isActive" => 1,
            "url" => $url
        )
    );
    return ($gallery) ? $gallery : false;
}
function get_gallery_cover_image($folderName){
    $path = "panel/uploads/galleries_v/images/$folderName/350x216";
    if($handle = opendir($path)){
        while(($file = readdir($handle)) !== false){
            if($file != "." & $file != ".."){
                return $file;
            }
        }
    }
}