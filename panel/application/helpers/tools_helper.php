<?php
function convertToSEO($text){
    $turkce  = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"","/", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");
    return strtolower(str_replace($turkce, $convert, $text));
}
function getFileName($id){
	$ci =& get_instance();
	$ci->load->model("product_image_model");
	$fileName = $ci->product_image_model->get(
        array(
            "id" => $id
        )
    );
    return $fileName->img_url;
}
function get_readable_date($date){
    return strftime('%e %B %Y', strtotime($date));
}
function get_active_user(){
    $t = &get_instance();
    $user = $t->session->userdata("user");
    if ($user) {
        return $user;
    }else{
        return false;
    }
}
function send_email($toEmail = "",$subject = "",$message = ""){
    $t = &get_instance();
    $t->load->model("emailsettings_model");
    $emailsettings = $t->emailsettings_model->get(
        array(
            "isActive" => 1
            )
        );
    $config = array(
        "protocol" => $emailsettings->protocol,
        "smtp_host" => $emailsettings->host,
        "smtp_port" => $emailsettings->port,
        "smtp_user" => $emailsettings->user,
        "smtp_pass" => $emailsettings->password,
        "starttls" => true,
        "charset" => "utf-8",
        "mailtype" => "html",
        "wordwrap" => true,
        "newline" => "\r\n"
    );
    $t->load->library("email",$config);
    $t->email->from($emailsettings->from,$emailsettings->user_name);
    $t->email->to($toEmail);
    $t->email->subject($subject);
    $t->email->message($message);
    return $t->email->send();
}
function get_settings(){
    $t = &get_instance();
    $t->load->model("settings_model");
    if ($t->session->userdata("settings")) {
        $settings = $t->session->userdata("settings");
    }else{
        $settings = $t->settings_model->get();
        if (!$settings) {
            $settings = new stdClass();
            $settings->company_name = "CMS";
            $settings->logo = "default";
        }
        $t->session->set_userdata("settings",$settings);
    }
    return $settings;
}
function get_category_title($category_id = 0){
    $t = &get_instance();
    $t->load->model("portfolio_category_model");
    $category = $t->portfolio_category_model->get(
        array(
            "id" => $category_id
        )
    );
    if ($category) {
        return $category->title;
    }else{
        return "<b style='color:red'>Tanımlı Değil</b>";
    }
}
//$_FILES["img_url"]["tmp_name"]
//100,200
//uploads/$t->viewFolder/deneme.png
function upload_picture($file,$uploadPath,$width,$height,$name){
    $t = &get_instance();
    $t->load->library("simpleimagelib");
    if (!is_dir("{$uploadPath}/{$width}x{$height}")) {
        mkdir("{$uploadPath}/{$width}x{$height}");
    }
    $upload_error = false;
    try {
        $simpleImage = $t->simpleimagelib->get_simple_image_instance();
        $simpleImage
            ->fromFile($file)
            ->thumbnail($width,$height,'center')
            ->toFile("{$uploadPath}/{$width}x{$height}/$name", null, 75);
    } catch(Exception $err) {
        $error =  $err->getMessage();
        $upload_error = true;
    }
    if ($upload_error) {
        echo $error;
    }else{
        return true;
    }
}
function get_picture($path = "",$picture = "",$resolution = "50x50"){
    if ($picture != "") {
        if (file_exists(FCPATH . "uploads/$path/$resolution/$picture")) {
            $picture = base_url("uploads/$path/$resolution/$picture");
        }else{
            $picture = base_url("assets/assets/images/default_image.png");
        }
    }else{
        $picture = base_url("assets/assets/images/default_image.png");
    }
    return $picture;
}
function get_page_list($page){
    $page_list = array(
        "home_v"                => "Anasayfa",
        "about_v"               => "Hakkımızda Sayfası",
        "news_list_v"           => "Haberler Sayfası",
        "galleries"             => "Galeri Sayfası",
        "portfolio_list_v"      => "Portfolyo Sayfası",
        "reference_list_v"      => "Referanslar Sayfası",
        "service_list_v"        => "Hizmetler Sayfası",
        "course_list_v"         => "Eğitimler Sayfası",
        "brand_list_v"          => "Markalar Sayfası",
        "contact_v"             => "İletişim Sayfası",
    );
    return (empty($page)) ? $page_list : $page_list[$page];
}