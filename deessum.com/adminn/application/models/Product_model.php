<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model{


	public function __construct()
	{
		$this->load->database();
    }

    public function getProducts($product_id=null){
        $this->db->select('p.*, b.name brand_name, b.discount_percentage brand_discount, c.category_name category_name, sc.sub_category sub_category');
        $this->db->from("product p");
        $this->db->join('brand b', 'p.brand_id=b.id', 'left');
        $this->db->join('category c', 'p.category_id=c.id', 'left');
        $this->db->join('sub_category sc', 'p.sub_category_id=sc.id', 'left');
        $this->db->where('p.flag',TRUE);
        if($product_id!=null){
            $this->db->where('p.id',$product_id);
        }
        return $this->db->get();
    }

    public function getOrders($condition=null){
        $this->db->select('o.*, c.name customer_name');
        $this->db->from("order o");
        $this->db->join('customer c', 'o.login_id=c.email', 'left');
        $this->db->where('o.flag',TRUE);
        $this->db->order_by("o.id","DESC");
        if($condition!=null){
            $this->db->where($condition);
        }
        return $this->db->get();
    }
}