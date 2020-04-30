<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct(){
		parent::__construct();
    }
    
    public function addtocart($id=null){
        $datas=null;
        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));       
        $datas['social_medias']=$this->CRUDS_model->getdata("social_media_links",array("flag"=>TRUE));       
        $cart_products=$this->common_data_lib->addToCart($id);
        $datas['cart_products']=$cart_products;
        $datas['msg']="New product added";
        $this->load->view("Cart",$datas);
    }

    public function CustProduct($id){
        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;
        $this->load->model("Product_model");
        $prod=$this->Product_model->getProducts($id)->row();
        $datas['prod']=$prod;
        $datas['related_products']=$this->Product_model->getProductOfCategory($prod->category_id);
        
        $this->load->view("CustomTshirt",$datas);
    }



    public function viewCart(){
        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;

        $this->load->view("Cart",$datas);
    }

    public function decreaseCartItemQty($id){
        $cart_products=$this->common_data_lib->decreaseCartItemQty($id);
        redirect("product/viewCart");
    }

    public function ourProducts(){
        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;
        $datas['products']=$this->CRUDS_model->getdata("product",array("flag"=>TRUE));
        $this->load->view("Products",$datas);
    }

    public function productOfCategory($id){
        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;
        $datas['products']=$this->CRUDS_model->getdata("product",array("flag"=>TRUE,"category_id"=>$id));
        $this->load->view("Products",$datas);
    }

    public function search(){
        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
        
        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;
        $this->load->model("Product_model");
        $category=null;
        if($this->input->post("category")){
            $category=$this->input->post("category");
        }
        $datas['products']=$this->Product_model->searchProduct($this->input->post("text"),$category);

        $this->load->view("Products",$datas);
    }

    public function viewProduct($id){
        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;
        $this->load->model("Product_model");
        $prod=$this->Product_model->getProducts($id)->row();
        $datas['prod']=$prod;
        $datas['related_products']=$this->Product_model->getProductOfCategory($prod->category_id);
        
        $this->load->view("Product_view",$datas);
    }

}