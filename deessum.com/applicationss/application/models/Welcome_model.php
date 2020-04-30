<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model{


	public function __construct()
	{
		$this->load->database();
    }

    public function login($data){
        return $this->db->get_where('users',$data);
    }

    public function insert($table,$data){
        return $this->db->insert($table,$data);
    }

    public function getAllData($table){
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

    public function delete($table,$id){
        return $this->db->delete($table,array('id'=>$id));
    }

    public function getAllSubCategories(){
        $this->db->select('sub_category.*,category.category_name');
        $this->db->from('sub_category');
        $this->db->join('category','sub_category.category_id=category.id');
        return $this->db->get();
    }

    public function getAllLocalities(){
        $this->db->select('locality.*,cities.city');
        $this->db->from('locality');
        $this->db->join('cities','locality.city_id=cities.id');
        return $this->db->get();
    }

    public function getSubCategoriesWhere($category_id){
        $this->db->where('category_id',$category_id);
        return $this->db->get('sub_category');
    }
    
    public function getAllProducts(){
        $this->db->select('p.*,c.category_name,sc.sub_category');
        $this->db->from('product p'); 
        $this->db->join('category c', 'p.category_id=c.id', 'left');
        $this->db->join('sub_category sc', 'p.sub_category_id=sc.id', 'left');       
        return $this->db->get();
    }
    
    public function isexist($table,$condition){
        $fields = array_keys($condition);
        foreach ($fields as $field) {
            $this->db->where($field,$condition[$field]);
        }
        $data=$this->db->get($table);
        $count = $data->num_rows();
        if($count===0){
            return false;
        }else{
            return true;
        }
    }
    
    public function getClientsDetail(){
        $this->db->select('cl.*,ci.city city_name,lo.locality locality_name');
        $this->db->from('client cl'); 
        $this->db->join('cities ci', 'cl.city=ci.id', 'left');
        $this->db->join('locality lo', 'cl.locality=lo.id', 'left');       
        $this->db->where('status','ACTIVE');
        return $this->db->get();
    }
    
    public function getPendingOrders(){
        $this->db->select('co.*,cl.name,cl.mobile,cl.address,cl.address,cl.mobile');
        $this->db->from('customer_order co'); 
        $this->db->join('client cl', 'cl.email=co.login_id', 'left');
        $this->db->where('co.status',"PENDING");
        return $this->db->get();
    }

    public function getDeliveredOrders(){
        $this->db->select('co.*,cl.name,cl.mobile,cl.address,cl.address,cl.mobile');
        $this->db->from('customer_order co'); 
        $this->db->join('client cl', 'cl.email=co.login_id', 'left');
        $this->db->where('co.status',"DELIVERED");
        return $this->db->get();
    }

    public function getOrderDetail($order_id){
        $this->db->select('p.*,od.qty,cl.name cname,cl.address,cl.email,cl.mobile,co.savings,co.payableamt,co.order_dt');
        $this->db->from('order_detail od'); 
        $this->db->join('customer_order co', 'co.id=od.order_id', 'left'); 
        $this->db->join('product p','p.id=od.product_id','left');
        $this->db->join('client cl','cl.email=co.login_id','left');
        $this->db->where('co.id',$order_id);     
        return $this->db->get();
    }
}