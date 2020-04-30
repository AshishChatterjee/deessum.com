<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_model extends CI_Model{


	public function __construct(){
		$this->load->database();
	}

	public function registrations(){
		$this->db->select('cr.*, c.name customer_name, c.mobile customer_mobile, c.address customer_address, c.email customer_email, mp.name package_name');
        $this->db->from("customer_registrations cr");
        $this->db->join('customer c', 'cr.customer=c.id', 'left');
        $this->db->join('mstr_package mp', 'cr.pkg=mp.id', 'left');
        $this->db->where('cr.flag',TRUE);
        $this->db->order_by('cr.cdt',"DESC");
        return $this->db->get();
	}
}