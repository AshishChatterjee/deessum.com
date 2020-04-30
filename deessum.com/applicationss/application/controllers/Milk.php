<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Milk extends CI_Controller {

	public function __construct(){
		parent::__construct();
    }

    public function milk(){
        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;

        $this->load->view("Milk",$datas);
    }
}