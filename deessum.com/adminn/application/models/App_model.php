<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_model extends CI_Model{


	public function __construct()
	{
		$this->load->database();
    }

    public function insert($table,$data){
        return $this->db->insert($table,$data);
    }

    public function getAllData($table){
        $this->db->where('flag',TRUE);
        return $this->db->get($table);
    }

    public function getdata($table,$condition){
        $fields = array_keys($condition);
        foreach ($fields as $field) {
            $this->db->where($field,$condition[$field]);
        }
    	return $this->db->get($table);
    }
    
    public function update($table,$data,$condition){
        $fields = array_keys($condition);
        foreach ($fields as $field) {
            $this->db->where($field,$condition[$field]);
        }
        return $this->db->update($table,$data);
    }
    
    public function getBestSellingProducts(){

        $this->db->select('p.*, b.name brand_name');
        $this->db->from("product p");
        $this->db->join('brand b', 'p.brand_id=b.id', 'left');
        $this->db->where('p.flag',TRUE);
        $this->db->order_by("(mrp-selling_price)/(mrp/100)","DESC");
        $this->db->limit("9");      
        return $this->db->get();
    }

    public function getProductDetail($product_id=null){
        $this->db->select('p.*, b.name brand_name, b.discount_percentage brand_discount, c.category_name category_name, sc.sub_category sub_category');
        $this->db->from("product p");
        $this->db->join('brand b', 'p.brand_id=b.id', 'left');
        $this->db->join('category c', 'p.category_id=c.id', 'left');
        $this->db->join('sub_category sc', 'p.sub_category_id=sc.id', 'left');
        $this->db->where('p.flag',TRUE);
            $this->db->where('p.id',$product_id);
        return $this->db->get();
    }

    public function getProductDetailOf($condition=null){
        $this->db->select('p.*, b.name brand_name, b.discount_percentage brand_discount, c.category_name category_name, sc.sub_category sub_category');
        $this->db->from("product p");
        $this->db->join('brand b', 'p.brand_id=b.id', 'left');
        $this->db->join('category c', 'p.category_id=c.id', 'left');
        $this->db->join('sub_category sc', 'p.sub_category_id=sc.id', 'left');
        $this->db->where($condition);
        return $this->db->get();
    }
    
    public function getRecentProducts(){

        $this->db->select('p.*, b.name brand_name, b.discount_percentage brand_discount, c.category_name category_name, sc.sub_category sub_category');
        $this->db->from("product p");
        $this->db->join('brand b', 'p.brand_id=b.id', 'left');
        $this->db->join('category c', 'p.category_id=c.id', 'left');
        $this->db->join('sub_category sc', 'p.sub_category_id=sc.id', 'left');
        $this->db->where('p.flag',TRUE);
        $this->db->order_by("id","DESC");  
        $this->db->limit("12");
        return $this->db->get();
    }
    
    public function getCartProducts($login_id){
        $this->db->select('c.qty, p.*, b.name brand_name ,cat.category_name,scat.sub_category sub_category_name');
        $this->db->from('cart c'); 
        $this->db->join('product p', 'c.product_id=p.id', 'left'); 
        $this->db->join('brand b', 'p.brand_id=b.id', 'left'); 
        $this->db->join('category cat','p.category_id=cat.id','left');
        $this->db->join('sub_category scat','p.sub_category_id=scat.id','left');
        $this->db->where('c.login_id',$login_id);     
        return $this->db->get();
    }
    
    public function placeOrder($login_id,$savings,$payableamt){
        $inputOrder=array(
            'login_id'=>$login_id,
            'savings'=>$savings,
            'payableamt'=>$payableamt
        );
        $this->db->insert('order',$inputOrder);
        $order_id=$this->db->insert_id();
        
        $this->db->where('login_id',$login_id);
        $cart_products=$this->db->get('cart');

        foreach ($cart_products->result() as $row) {
            $inputOrderDetail=array(
                'order_id'=>$order_id,
                'product_id'=>$row->product_id,
                'qty'=>$row->qty
            );
            $this->db->insert('order_detail',$inputOrderDetail);
            $inputOrderDetail=array();
        }
        $delcon=array(
            'login_id'=>$login_id
        );
        $this->db->delete('cart',$delcon);  
        return $order_id;      
    }
    
    public function getOrders($login_id){
        $this->db->where('login_id',$login_id);
        $this->db->order_by("id","DESC");
        return $this->db->get('order');
    }
    
    public function getOrderDetail($order_id){
        $this->db->select('p.*,od.qty, b.name brand_name');
        $this->db->from('order_detail od'); 
        $this->db->join('order co', 'co.id=od.order_id', 'left'); 
        $this->db->join('product p','p.id=od.product_id','left');
        $this->db->join('brand b','p.brand_id=b.id','left');
        $this->db->where('co.id',$order_id);     
        return $this->db->get();
    }
    
    public function increaseQuantity($login_id,$product_id){
        $condition=array(
            'login_id'=>$login_id,
            'product_id'=>$product_id
        );
        $this->db->where($condition);
        $data=$this->db->get('cart')->row();
        $qty=$data->qty;
        $qty++;
        $this->db->where($condition);
        return $this->db->update('cart',array('qty'=>$qty));
    }
    
    public function decreaseQuantity($login_id,$product_id){
        $condition=array(
            'login_id'=>$login_id,
            'product_id'=>$product_id
        );
        $this->db->where($condition);
        $data=$this->db->get('cart')->row();
        $qty=$data->qty;
        $qty--;
        $this->db->where($condition);
        return $this->db->update('cart',array('qty'=>$qty));
    }
    
    public function deleteCartItem($login_id,$product_id){
        $condition=array(
            'login_id'=>$login_id,
            'product_id'=>$product_id
        );
        return $this->db->delete('cart',$condition);
    }
    
    public function getSearchedProducts($text){
    	$search_text=$text;
        $this->db->select('p.*, b.name brand_name');
        $this->db->from('product p'); 
        $this->db->join('brand b', 'p.brand_id=b.id', 'left'); 
        $this->db->join('category cat', 'cat.id=p.category_id', 'left'); 
        $this->db->join('sub_category scat','scat.id=p.sub_category_id','left');
        $this->db->like('p.name',$search_text);    
        $this->db->or_like('p.description',$search_text);  
        $this->db->or_like('b.name',$search_text); 
        $this->db->or_like('cat.category_name',$search_text); 
        $this->db->or_like('scat.sub_category',$search_text);
        return $this->db->get(); 
    }
    
    public function getClientDetails($login_id){
        $this->db->select('cust.*,c.city_name city,l.locality,cust.city city_id,cust.locality locality_id');
        $this->db->from('customer cust'); 
        $this->db->join('city c', 'c.id=cust.city', 'left'); 
        $this->db->join('locality l','l.id=cust.locality','left');
        $this->db->where('cust.email',$login_id);
        return $this->db->get();
    }
}