<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model{


	public function __construct()
	{
		$this->load->database();
    }

    public function getSubcategories(){
        $this->db->select('sc.*, c.category_name');
        $this->db->from("sub_category sc");
        $this->db->join('category c', 'sc.category_id=c.id', 'left');
        $this->db->where('sc.flag',TRUE);
        return $this->db->get();
    }
    
    public function getLocalities(){
        $this->db->select('l.*, c.city_name');
        $this->db->from("locality l");
        $this->db->join('city c', 'l.city_id=c.id', 'left');
        $this->db->where('l.flag',TRUE);
        return $this->db->get();
    }

    public function getSliders(){
        $this->db->select('s.*, p.name product_name');
        $this->db->from("slider s");
        $this->db->join('product p', 's.product_id=p.id', 'left');
        $this->db->where('s.flag',TRUE);
        return $this->db->get();
    }    
}