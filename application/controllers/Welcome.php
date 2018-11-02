<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
	public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "index";
        $this->load->helper("text");
    }
	public function index($language = "tr"){
		$viewData = new stdClass();
        $this->load->model("slide_model");
        $this->load->model("news_model");
        $this->load->model("service_model");
        $this->load->model("question_model");
        $this->load->model("reference_model");
        $this->load->model("brand_model");
        $brands = $this->brand_model->get_all(
            array(
                "isActive" => 1
            )
        );
        $slides = $this->slide_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language
            )
        );
        $news = $this->news_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language
            ),"rank ASC"
        );
        $services = $this->service_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language
            ),"rank ASC"
        );
        $questions = $this->question_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language
            )
        );
        $countries = $this->reference_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language
            )
        );
        if ($language == "tr") {
            $viewData->link1 = "Anasayfa";
            $viewData->url1 = "anasayfa/tr";
            $viewData->link2 = "Hakkımızda";
            $viewData->url2 = "hakkimizda/tr";
            $viewData->link3 = "Hizmetlerimiz";
            $viewData->url3 = "hizmetlerimiz/tr";
            $viewData->link4 = "İletişim";
            $viewData->url4 = "iletisim/tr";
            $viewData->link5 = "Ülkeler";
            $viewData->url7 = "ulkeler/tr/";
            $viewData->title1 = "Hizmetlerimiz";
            $viewData->title2 = "İş Ortaklarımız";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Merak Ettikleriniz (S.S.S)";
            $viewData->title5 = "Bize Yazın";
            $viewData->title6 = "İletişim";
            $viewData->title7 = "Tüm Hakları Saklıdır";
            $viewData->title8 = "Hakkımızda";
            $viewData->title9 = "Misyon";
            $viewData->title10 = "Vizyon";
            $viewData->title11 = "Hizmetlerimiz";
            $viewData->title13 = "Devamını Oku";
            $viewData->form1 = "İsim & Soyisim";
            $viewData->form2 = "E-Posta Adresi";
            $viewData->form3 = "Mesaj";
            $viewData->form4 = "Gönder";
            $viewData->url5 = "detay";
            $viewData->url6 = "proje-detay";
        }else if ($language == "en"){
            $viewData->link1 = "Home";
            $viewData->url1 = "home/en";
            $viewData->link2 = "About Us";
            $viewData->url2 = "about-us/en";
            $viewData->link3 = "Our Services";
            $viewData->url3 = "our-services/en";
            $viewData->link4 = "Contact";
            $viewData->url4 = "contact/en";
            $viewData->link5 = "Countries";
            $viewData->url7 = "countries/en/";
            $viewData->title1 = "Our Services";
            $viewData->title2 = "Our Business Partners";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Frequently Asked Questions";
            $viewData->title5 = "Contact Us";
            $viewData->title6 = "Contact";
            $viewData->title7 = "All Rights Reserved";
            $viewData->title8 = "About Us";
            $viewData->title9 = "Mission";
            $viewData->title10 = "Vision";
            $viewData->title11 = "Our Services";
            $viewData->title13 = "Read More";
            $viewData->form1 = "Name & Surname";
            $viewData->form2 = "E-mail address";
            $viewData->form3 = "Message";
            $viewData->form4 = "Send";
            $viewData->url5 = "detail";
            $viewData->url6 = "project-details";
        }else if ($language == "de"){
            $viewData->link1 = "Zuhause";
            $viewData->url1 = "zuhause/de";
            $viewData->link2 = "Über uns";
            $viewData->url2 = "uber-uns/de";
            $viewData->link3 = "unsere Leistungen";
            $viewData->url3 = "unsere-leistungen/de";
            $viewData->link4 = "Kommunikation";
            $viewData->url4 = "kommunikation/de";
            $viewData->link5 = "Länder";
            $viewData->url7 = "lander/de/";
            $viewData->title1 = "unsere Leistungen";
            $viewData->title2 = "Unsere Geschäftspartner";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Häufig gestellte Fragen";
            $viewData->title5 = "Schreiben Sie uns";
            $viewData->title6 = "Kommunikation";
            $viewData->title7 = "Alle Rechte vorbehalten";
            $viewData->title8 = "Über uns";
            $viewData->title9 = "Mission";
            $viewData->title10 = "Vision";
            $viewData->title11 = "unsere Leistungen";
            $viewData->title13 = "Lesen Sie Weiter";
            $viewData->form1 = "Name & Nachname";
            $viewData->form2 = "E-Mail-Adresse";
            $viewData->form3 = "Nachricht";
            $viewData->form4 = "Nachricht senden";
            $viewData->url5 = "detail";
            $viewData->url6 = "project-details";
        }
        $this->session->set_userdata("language",$language);
        $viewData->brands = $brands;
        $viewData->questions = $questions;
        $viewData->services = $services;
        $viewData->slides = $slides;
        $viewData->news = $news;
        $viewData->countries = $countries;
        $viewData->viewFolder = "index";
        $this->load->view($viewData->viewFolder,$viewData);
	}
	public function about($language = "TR"){
		$viewData = new stdClass();
		$this->load->model("brand_model");
        $this->load->model("reference_model");
        $this->load->model("service_model");
        $services = $this->service_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language
            ),"rank ASC"
        );
        $countries = $this->reference_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language
            )
        );
        $brands = $this->brand_model->get_all(
            array(
                "isActive" => 1
            )
        );
        if ($language == "tr") {
            $viewData->link1 = "Anasayfa";
            $viewData->url1 = "anasayfa/tr";
            $viewData->link2 = "Hakkımızda";
            $viewData->url2 = "hakkimizda/tr";
            $viewData->link3 = "Hizmetlerimiz";
            $viewData->url3 = "hizmetlerimiz/tr";
            $viewData->link4 = "İletişim";
            $viewData->url4 = "iletisim/tr";
            $viewData->link5 = "Ülkeler";
            $viewData->url7 = "ulkeler/tr/";
            $viewData->title1 = "Hizmetlerimiz";
            $viewData->title2 = "İş Ortaklarımız";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Merak Ettikleriniz (S.S.S)";
            $viewData->title5 = "Bize Yazın";
            $viewData->title6 = "İletişim";
            $viewData->title7 = "Tüm Hakları Saklıdır";
            $viewData->title8 = "Hakkımızda";
            $viewData->title9 = "Misyon";
            $viewData->title10 = "Vizyon";
            $viewData->title11 = "Hizmetlerimiz";
            $viewData->form1 = "İsim & Soyisim";
            $viewData->form2 = "E-Posta Adresi";
            $viewData->form3 = "Mesaj";
            $viewData->form4 = "Gönder";
        }else if ($language == "en"){
            $viewData->link1 = "Home";
            $viewData->url1 = "home/en";
            $viewData->link2 = "About Us";
            $viewData->url2 = "about-us/en";
            $viewData->link3 = "Our Services";
            $viewData->url3 = "our-services/en";
            $viewData->link4 = "Contact";
            $viewData->url4 = "contact/en";
            $viewData->link5 = "Countries";
            $viewData->url7 = "countries/en/";
            $viewData->title1 = "Our Services";
            $viewData->title2 = "Our Business Partners";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Frequently Asked Questions";
            $viewData->title5 = "Contact Us";
            $viewData->title6 = "Contact";
            $viewData->title7 = "All Rights Reserved";
            $viewData->title8 = "About Us";
            $viewData->title9 = "Mission";
            $viewData->title10 = "Vision";
            $viewData->title11 = "Our Services";
            $viewData->form1 = "Name & Surname";
            $viewData->form2 = "E-mail address";
            $viewData->form3 = "Message";
            $viewData->form4 = "Send";
        }else if ($language == "de"){
            $viewData->link1 = "Zuhause";
            $viewData->url1 = "zuhause/de";
            $viewData->link2 = "Über uns";
            $viewData->url2 = "uber-uns/de";
            $viewData->link3 = "unsere Leistungen";
            $viewData->url3 = "unsere-leistungen/de";
            $viewData->link4 = "Kommunikation";
            $viewData->url4 = "kommunikation/de";
            $viewData->link5 = "Länder";
            $viewData->url7 = "lander/de/";
            $viewData->title1 = "unsere Leistungen";
            $viewData->title2 = "Unsere Geschäftspartner";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Häufig gestellte Fragen";
            $viewData->title5 = "Schreiben Sie uns";
            $viewData->title6 = "Kommunikation";
            $viewData->title7 = "Alle Rechte vorbehalten";
            $viewData->title8 = "Über uns";
            $viewData->title9 = "Mission";
            $viewData->title10 = "Vision";
            $viewData->title11 = "unsere Leistungen";
            $viewData->form1 = "Name & Nachname";
            $viewData->form2 = "E-Mail-Adresse";
            $viewData->form3 = "Nachricht";
            $viewData->form4 = "Nachricht senden";
        }
        $this->session->set_userdata("language",$language);
        $viewData->brands = $brands;
        $viewData->countries = $countries;
        $viewData->services = $services;
		$this->load->view("about/index",$viewData);
	}
	public function portfolio($language = "tr"){
		$viewData = new stdClass();
		$this->load->model("service_model");
        $this->load->model("reference_model");
        $countries = $this->reference_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language
            )
        );
		$services = $this->service_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language
            ),"rank ASC"
        );
        if ($language == "tr") {
            $viewData->link1 = "Anasayfa";
            $viewData->url1 = "anasayfa/tr";
            $viewData->link2 = "Hakkımızda";
            $viewData->url2 = "hakkimizda/tr";
            $viewData->link3 = "Hizmetlerimiz";
            $viewData->url3 = "hizmetlerimiz/tr";
            $viewData->link4 = "İletişim";
            $viewData->url4 = "iletisim/tr";
            $viewData->link5 = "Ülkeler";
            $viewData->url7 = "ulkeler/tr/";
            $viewData->title1 = "Hizmetlerimiz";
            $viewData->title2 = "İş Ortaklarımız";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Merak Ettikleriniz (S.S.S)";
            $viewData->title5 = "Bize Yazın";
            $viewData->title6 = "İletişim";
            $viewData->title7 = "Tüm Hakları Saklıdır";
            $viewData->title8 = "Hakkımızda";
            $viewData->title9 = "Misyon";
            $viewData->title10 = "Vizyon";
            $viewData->title11 = "Hizmetlerimiz";
            $viewData->form1 = "İsim & Soyisim";
            $viewData->form2 = "E-Posta Adresi";
            $viewData->form3 = "Mesaj";
            $viewData->form4 = "Gönder";
            $viewData->url6 = "proje-detay";
        }else if ($language == "en"){
            $viewData->link1 = "Home";
            $viewData->url1 = "home/en";
            $viewData->link2 = "About Us";
            $viewData->url2 = "about-us/en";
            $viewData->link3 = "Our Services";
            $viewData->url3 = "our-services/en";
            $viewData->link4 = "Contact";
            $viewData->url4 = "contact/en";
            $viewData->link5 = "Countries";
            $viewData->url7 = "countries/en/";
            $viewData->title1 = "Our Services";
            $viewData->title2 = "Our Business Partners";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Frequently Asked Questions";
            $viewData->title5 = "Contact Us";
            $viewData->title6 = "Contact";
            $viewData->title7 = "All Rights Reserved";
            $viewData->title8 = "About Us";
            $viewData->title9 = "Mission";
            $viewData->title10 = "Vision";
            $viewData->title11 = "Our Services";
            $viewData->form1 = "Name & Surname";
            $viewData->form2 = "E-mail address";
            $viewData->form3 = "Message";
            $viewData->form4 = "Send";
            $viewData->url6 = "project-details";
        }else if ($language == "de"){
            $viewData->link1 = "Zuhause";
            $viewData->url1 = "zuhause/de";
            $viewData->link2 = "Über uns";
            $viewData->url2 = "uber-uns/de";
            $viewData->link3 = "unsere Leistungen";
            $viewData->url3 = "unsere-leistungen/de";
            $viewData->link4 = "Kommunikation";
            $viewData->url4 = "kommunikation/de";
            $viewData->link5 = "Länder";
            $viewData->url7 = "lander/de/";
            $viewData->title1 = "unsere Leistungen";
            $viewData->title2 = "Unsere Geschäftspartner";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Häufig gestellte Fragen";
            $viewData->title5 = "Schreiben Sie uns";
            $viewData->title6 = "Kommunikation";
            $viewData->title7 = "Alle Rechte vorbehalten";
            $viewData->title8 = "Über uns";
            $viewData->title9 = "Mission";
            $viewData->title10 = "Vision";
            $viewData->title11 = "unsere Leistungen";
            $viewData->form1 = "Name & Nachname";
            $viewData->form2 = "E-Mail-Adresse";
            $viewData->form3 = "Nachricht";
            $viewData->form4 = "Nachricht senden";
            $viewData->url6 = "project-details";
        }
        $this->session->set_userdata("language",$language);
        $viewData->services = $services;
        $viewData->countries = $countries;
		$this->load->view("portfolio/index",$viewData);
	}
	public function services(){
		$this->load->view("services/index");
	}
	public function contact($language = "tr"){
        $viewData = new stdClass();
        $this->load->model("reference_model");
        $this->load->model("service_model");
        $services = $this->service_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language
            ),"rank ASC"
        );
        $countries = $this->reference_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language
            )
        );
        if ($language == "tr") {
            $viewData->link1 = "Anasayfa";
            $viewData->url1 = "anasayfa/tr";
            $viewData->link2 = "Hakkımızda";
            $viewData->url2 = "hakkimizda/tr";
            $viewData->link3 = "Hizmetlerimiz";
            $viewData->url3 = "hizmetlerimiz/tr";
            $viewData->link4 = "İletişim";
            $viewData->url4 = "iletisim/tr";
            $viewData->link5 = "Ülkeler";
            $viewData->url7 = "ulkeler/tr/";
            $viewData->title1 = "Hizmetlerimiz";
            $viewData->title2 = "İş Ortaklarımız";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Merak Ettikleriniz (S.S.S)";
            $viewData->title5 = "Bize Yazın";
            $viewData->title6 = "İletişim";
            $viewData->title7 = "Tüm Hakları Saklıdır";
            $viewData->title8 = "Hakkımızda";
            $viewData->title9 = "Misyon";
            $viewData->title10 = "Vizyon";
            $viewData->title11 = "Hizmetlerimiz";
            $viewData->form1 = "İsim & Soyisim";
            $viewData->form2 = "E-Posta Adresi";
            $viewData->form3 = "Mesaj";
            $viewData->form4 = "Gönder";
        }else if ($language == "en"){
            $viewData->link1 = "Home";
            $viewData->url1 = "home/en";
            $viewData->link2 = "About Us";
            $viewData->url2 = "about-us/en";
            $viewData->link3 = "Our Services";
            $viewData->url3 = "our-services/en";
            $viewData->link4 = "Contact";
            $viewData->url4 = "contact/en";
            $viewData->link5 = "Countries";
            $viewData->url7 = "countries/en/";
            $viewData->title1 = "Our Services";
            $viewData->title2 = "Our Business Partners";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Frequently Asked Questions";
            $viewData->title5 = "Contact Us";
            $viewData->title6 = "Contact";
            $viewData->title7 = "All Rights Reserved";
            $viewData->title8 = "About Us";
            $viewData->title9 = "Mission";
            $viewData->title10 = "Vision";
            $viewData->title11 = "Our Services";
            $viewData->form1 = "Name & Surname";
            $viewData->form2 = "E-mail address";
            $viewData->form3 = "Message";
            $viewData->form4 = "Send";
        }else if ($language == "de"){
            $viewData->link1 = "Zuhause";
            $viewData->url1 = "zuhause/de";
            $viewData->link2 = "Über uns";
            $viewData->url2 = "uber-uns/de";
            $viewData->link3 = "unsere Leistungen";
            $viewData->url3 = "unsere-leistungen/de";
            $viewData->link4 = "Kommunikation";
            $viewData->url4 = "kommunikation/de";
            $viewData->link5 = "Länder";
            $viewData->url7 = "lander/de/";
            $viewData->title1 = "unsere Leistungen";
            $viewData->title2 = "Unsere Geschäftspartner";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Häufig gestellte Fragen";
            $viewData->title5 = "Schreiben Sie uns";
            $viewData->title6 = "Kommunikation";
            $viewData->title7 = "Alle Rechte vorbehalten";
            $viewData->title8 = "Über uns";
            $viewData->title9 = "Mission";
            $viewData->title10 = "Vision";
            $viewData->title11 = "unsere Leistungen";
            $viewData->form1 = "Name & Nachname";
            $viewData->form2 = "E-Mail-Adresse";
            $viewData->form3 = "Nachricht";
            $viewData->form4 = "Nachricht senden";
        }
        $viewData->countries = $countries;
        $viewData->services = $services;
        $this->session->set_userdata("language",$language);
		$this->load->view("contact/index",$viewData);
	}
	public function detail($language = "tr",$url){
		$viewData = new stdClass();
        $this->load->model("news_model");
        $this->load->model("reference_model");
        $this->load->model("service_model");
        $services = $this->service_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language
            ),"rank ASC"
        );
        $countries = $this->reference_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language
            )
        );
        $viewData->news = $this->news_model->get(
            array(
                "isActive" => 1,
                "language" => $language,
                "url" => $url
            )
        );
        if ($language == "tr") {
            $viewData->link1 = "Anasayfa";
            $viewData->url1 = "anasayfa/tr";
            $viewData->link2 = "Hakkımızda";
            $viewData->url2 = "hakkimizda/tr";
            $viewData->link3 = "Hizmetlerimiz";
            $viewData->url3 = "hizmetlerimiz/tr";
            $viewData->link4 = "İletişim";
            $viewData->url4 = "iletisim/tr";
            $viewData->link5 = "Ülkeler";
            $viewData->url7 = "ulkeler/tr/";
            $viewData->title1 = "Hizmetlerimiz";
            $viewData->title2 = "İş Ortaklarımız";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Merak Ettikleriniz (S.S.S)";
            $viewData->title5 = "Bize Yazın";
            $viewData->title6 = "İletişim";
            $viewData->title7 = "Tüm Hakları Saklıdır";
            $viewData->title8 = "Hakkımızda";
            $viewData->title9 = "Misyon";
            $viewData->title10 = "Vizyon";
            $viewData->title11 = "Hizmetlerimiz";
            $viewData->title12 = "Blog Detay";
            $viewData->title13 = "Devamını Oku";
            $viewData->form1 = "İsim & Soyisim";
            $viewData->form2 = "E-Posta Adresi";
            $viewData->form3 = "Mesaj";
            $viewData->form4 = "Gönder";
        }else if ($language == "en"){
            $viewData->link1 = "Home";
            $viewData->url1 = "home/en";
            $viewData->link2 = "About Us";
            $viewData->url2 = "about-us/en";
            $viewData->link3 = "Our Services";
            $viewData->url3 = "our-services/en";
            $viewData->link4 = "Contact";
            $viewData->url4 = "contact/en";
            $viewData->link5 = "Countries";
            $viewData->url7 = "countries/en/";
            $viewData->title1 = "Our Services";
            $viewData->title2 = "Our Business Partners";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Frequently Asked Questions";
            $viewData->title5 = "Contact Us";
            $viewData->title6 = "Contact";
            $viewData->title7 = "All Rights Reserved";
            $viewData->title8 = "About Us";
            $viewData->title9 = "Mission";
            $viewData->title10 = "Vision";
            $viewData->title11 = "Our Services";
            $viewData->title12 = "Blog Detail";
            $viewData->title13 = "Read More";
            $viewData->form1 = "Name & Surname";
            $viewData->form2 = "E-mail address";
            $viewData->form3 = "Message";
            $viewData->form4 = "Send";
        }else if ($language == "de"){
            $viewData->link1 = "Zuhause";
            $viewData->url1 = "zuhause/de";
            $viewData->link2 = "Über uns";
            $viewData->url2 = "uber-uns/de";
            $viewData->link3 = "unsere Leistungen";
            $viewData->url3 = "unsere-leistungen/de";
            $viewData->link4 = "Kommunikation";
            $viewData->url4 = "kommunikation/de";
            $viewData->link5 = "Länder";
            $viewData->url7 = "lander/de/";
            $viewData->title1 = "unsere Leistungen";
            $viewData->title2 = "Unsere Geschäftspartner";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Häufig gestellte Fragen";
            $viewData->title5 = "Schreiben Sie uns";
            $viewData->title6 = "Kommunikation";
            $viewData->title7 = "Alle Rechte vorbehalten";
            $viewData->title8 = "Über uns";
            $viewData->title9 = "Mission";
            $viewData->title10 = "Vision";
            $viewData->title11 = "unsere Leistungen";
            $viewData->title12 = "Blog Details";
            $viewData->title13 = "Lesen Sie Weiter";
            $viewData->form1 = "Name & Nachname";
            $viewData->form2 = "E-Mail-Adresse";
            $viewData->form3 = "Nachricht";
            $viewData->form4 = "Nachricht senden";
        }
        $viewData->countries = $countries;
        $viewData->services = $services;
        $this->session->set_userdata("language",$language);
        $this->load->view("detail/index",$viewData);
	}
	public function project_detail($language = "tr",$url){
		$viewData = new stdClass();
        $this->load->model("service_model");
        $this->load->model("reference_model");
        $countries = $this->reference_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language
            )
        );
        $viewData->service = $this->service_model->get(
            array(
                "isActive" => 1,
                "language" => $language,
                "url" => $url
            )
        );
        $services = $this->service_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language
            ),"rank ASC"
        );
        $viewData->other_services = $this->service_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language,
                "id !=" => $viewData->service->id
            ),"rand()", array("start" => 0, "count" => 3)
        );
        if ($language == "tr") {
            $viewData->link1 = "Anasayfa";
            $viewData->url1 = "anasayfa/tr";
            $viewData->link2 = "Hakkımızda";
            $viewData->url2 = "hakkimizda/tr";
            $viewData->link3 = "Hizmetlerimiz";
            $viewData->url3 = "hizmetlerimiz/tr";
            $viewData->link4 = "İletişim";
            $viewData->url4 = "iletisim/tr";
            $viewData->link5 = "Ülkeler";
            $viewData->url7 = "ulkeler/tr/";
            $viewData->title1 = "Hizmetlerimiz";
            $viewData->title2 = "İş Ortaklarımız";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Merak Ettikleriniz (S.S.S)";
            $viewData->title5 = "Bize Yazın";
            $viewData->title6 = "İletişim";
            $viewData->title7 = "Tüm Hakları Saklıdır";
            $viewData->title8 = "Hakkımızda";
            $viewData->title9 = "Misyon";
            $viewData->title10 = "Vizyon";
            $viewData->title11 = "Hizmetlerimiz";
            $viewData->title12 = "Hizmet Detay";
            $viewData->title14 = "Diğer Hizmetlerimiz";
            $viewData->form1 = "İsim & Soyisim";
            $viewData->form2 = "E-Posta Adresi";
            $viewData->form3 = "Mesaj";
            $viewData->form4 = "Gönder";
            $viewData->url6 = "proje-detay";
        }else if ($language == "en"){
            $viewData->link1 = "Home";
            $viewData->url1 = "home/en";
            $viewData->link2 = "About Us";
            $viewData->url2 = "about-us/en";
            $viewData->link3 = "Our Services";
            $viewData->url3 = "our-services/en";
            $viewData->link4 = "Contact";
            $viewData->url4 = "contact/en";
            $viewData->link5 = "Countries";
            $viewData->url7 = "countries/en/";
            $viewData->title1 = "Our Services";
            $viewData->title2 = "Our Business Partners";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Frequently Asked Questions";
            $viewData->title5 = "Contact Us";
            $viewData->title6 = "Contact";
            $viewData->title7 = "All Rights Reserved";
            $viewData->title8 = "About Us";
            $viewData->title9 = "Mission";
            $viewData->title10 = "Vision";
            $viewData->title11 = "Our Services";
            $viewData->title12 = "Service Detail";
            $viewData->title14 = "Other Services";
            $viewData->form1 = "Name & Surname";
            $viewData->form2 = "E-mail address";
            $viewData->form3 = "Message";
            $viewData->form4 = "Send";
            $viewData->url6 = "project-details";
        }else if ($language == "de"){
            $viewData->link1 = "Zuhause";
            $viewData->url1 = "zuhause/de";
            $viewData->link2 = "Über uns";
            $viewData->url2 = "uber-uns/de";
            $viewData->link3 = "unsere Leistungen";
            $viewData->url3 = "unsere-leistungen/de";
            $viewData->link4 = "Kommunikation";
            $viewData->url4 = "kommunikation/de";
            $viewData->link5 = "Länder";
            $viewData->url7 = "lander/de/";
            $viewData->title1 = "unsere Leistungen";
            $viewData->title2 = "Unsere Geschäftspartner";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Häufig gestellte Fragen";
            $viewData->title5 = "Schreiben Sie uns";
            $viewData->title6 = "Kommunikation";
            $viewData->title7 = "Alle Rechte vorbehalten";
            $viewData->title8 = "Über uns";
            $viewData->title9 = "Mission";
            $viewData->title10 = "Vision";
            $viewData->title11 = "unsere Leistungen";
            $viewData->title12 = "Service Detail";
            $viewData->title14 = "Andere Dienstleistungen";
            $viewData->form1 = "Name & Nachname";
            $viewData->form2 = "E-Mail-Adresse";
            $viewData->form3 = "Nachricht";
            $viewData->form4 = "Nachricht senden";
            $viewData->url6 = "project-details";
        }
        $viewData->countries = $countries;
        $viewData->services = $services;
        $this->session->set_userdata("language",$language);
        $this->load->view("project_detail/index",$viewData);
	}
    public function country_detail($language = "tr",$url){
        $viewData = new stdClass();
        $this->load->model("reference_model");
        $this->load->model("service_model");
        $services = $this->service_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language
            ),"rank ASC"
        );
        $countries = $this->reference_model->get_all(
            array(
                "isActive" => 1,
                "language" => $language
            )
        );
        $country = $this->reference_model->get(
            array(
                "isActive" => 1,
                "url" => $url,
                "language" => $language
            )
        );
        if ($language == "tr") {
            $viewData->link1 = "Anasayfa";
            $viewData->url1 = "anasayfa/tr";
            $viewData->link2 = "Hakkımızda";
            $viewData->url2 = "hakkimizda/tr";
            $viewData->link3 = "Hizmetlerimiz";
            $viewData->url3 = "hizmetlerimiz/tr";
            $viewData->link4 = "İletişim";
            $viewData->url4 = "iletisim/tr";
            $viewData->link5 = "Ülkeler";
            $viewData->url7 = "ulkeler/tr/";
            $viewData->title1 = "Hizmetlerimiz";
            $viewData->title2 = "İş Ortaklarımız";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Merak Ettikleriniz (S.S.S)";
            $viewData->title5 = "Bize Yazın";
            $viewData->title6 = "İletişim";
            $viewData->title7 = "Tüm Hakları Saklıdır";
            $viewData->title8 = "Hakkımızda";
            $viewData->title9 = "Misyon";
            $viewData->title10 = "Vizyon";
            $viewData->title11 = "Hizmetlerimiz";
            $viewData->title12 = "Blog Detay";
            $viewData->title13 = "Devamını Oku";
            $viewData->title15 = "Ülke Detay";
            $viewData->form1 = "İsim & Soyisim";
            $viewData->form2 = "E-Posta Adresi";
            $viewData->form3 = "Mesaj";
            $viewData->form4 = "Gönder";
        }else if ($language == "en"){
            $viewData->link1 = "Home";
            $viewData->url1 = "home/en";
            $viewData->link2 = "About Us";
            $viewData->url2 = "about-us/en";
            $viewData->link3 = "Our Services";
            $viewData->url3 = "our-services/en";
            $viewData->link4 = "Contact";
            $viewData->url4 = "contact/en";
            $viewData->link5 = "Countries";
            $viewData->url7 = "countries/en/";
            $viewData->title1 = "Our Services";
            $viewData->title2 = "Our Business Partners";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Frequently Asked Questions";
            $viewData->title5 = "Contact Us";
            $viewData->title6 = "Contact";
            $viewData->title7 = "All Rights Reserved";
            $viewData->title8 = "About Us";
            $viewData->title9 = "Mission";
            $viewData->title10 = "Vision";
            $viewData->title11 = "Our Services";
            $viewData->title12 = "Blog Detail";
            $viewData->title13 = "Read More";
            $viewData->title15 = "Contry Detail";
            $viewData->form1 = "Name & Surname";
            $viewData->form2 = "E-mail address";
            $viewData->form3 = "Message";
            $viewData->form4 = "Send";
        }else if ($language == "de"){
            $viewData->link1 = "Zuhause";
            $viewData->url1 = "zuhause/de";
            $viewData->link2 = "Über uns";
            $viewData->url2 = "uber-uns/de";
            $viewData->link3 = "unsere Leistungen";
            $viewData->url3 = "unsere-leistungen/de";
            $viewData->link4 = "Kommunikation";
            $viewData->url4 = "kommunikation/de";
            $viewData->link5 = "Länder";
            $viewData->url7 = "lander/de/";
            $viewData->title1 = "unsere Leistungen";
            $viewData->title2 = "Unsere Geschäftspartner";
            $viewData->title3 = "Blog";
            $viewData->title4 = "Häufig gestellte Fragen";
            $viewData->title5 = "Schreiben Sie uns";
            $viewData->title6 = "Kommunikation";
            $viewData->title7 = "Alle Rechte vorbehalten";
            $viewData->title8 = "Über uns";
            $viewData->title9 = "Mission";
            $viewData->title10 = "Vision";
            $viewData->title11 = "unsere Leistungen";
            $viewData->title12 = "Blog Details";
            $viewData->title13 = "Lesen Sie Weiter";
            $viewData->title15 = "Länder Detail";
            $viewData->form1 = "Name & Nachname";
            $viewData->form2 = "E-Mail-Adresse";
            $viewData->form3 = "Nachricht";
            $viewData->form4 = "Nachricht senden";
        }
        $viewData->country = $country;
        $viewData->countries = $countries;
        $viewData->services = $services;
        $this->session->set_userdata("language",$language);
        $this->load->view("country_detail/index",$viewData);
    }
}