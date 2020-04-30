<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model{


	public function __construct()
	{
		$this->load->database();
    }

    public function getCustomers($consumer_id=null){
        $this->db->select('cust.*, c.city_name city_name, l.locality locality_name');
        $this->db->from("customer cust");
        $this->db->join('city c', 'cust.city=c.id', 'left');
        $this->db->join('locality l', 'cust.locality=l.id', 'left');
        $this->db->where('cust.flag',TRUE);
        if($consumer_id!=null){
            $this->db->where("cust.id",$consumer_id);
            $this->db->or_where("cust.email",$consumer_id);
        }
        return $this->db->get();
    }

    public function getProductsOfOrder($order_id){
        $this->db->select('od.*, p.*');
        $this->db->from("order_detail od");
        $this->db->join('product p', 'od.product_id=p.id', 'left');
        $this->db->where('od.flag',TRUE);
        $this->db->where("od.order_id",$order_id);
        return $this->db->get();
    }
}