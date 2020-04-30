<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaveImg extends CI_Controller 
{
	
	public function __construct(){
		parent::__construct();
	}

	public function saveimg(){
    {
        $imagedata = base64_decode($_POST['imgdata']);
        $filename = md5(uniqid(rand(), true));
        //path where you want to upload image
        $file = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/'.$filename.'.png';
        $imageurl  = base_url('/assets/img/'.$filename.'.png');
        file_put_contents($file,$imagedata);
        echo $imageurl;

    }

}
    
 ?>   
        