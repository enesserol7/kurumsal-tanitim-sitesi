<?php
class Simpleimagelib{
    public function __construct(){
        require_once ("vendor/autoload.php");
    }
    public function get_simple_image_instance(){
        return new \claviska\SimpleImage();
    }
}