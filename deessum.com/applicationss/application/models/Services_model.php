<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_model extends CI_Model{


	public function __construct(){
		$this->load->database();
	}

	public function seviceCost($service_id=null){

		$this->db->select('max(id)');
		$this->db->from('cost_services');
		$this->db->where('service',$service_id);
		$this->db->where('validity_now',TRUE);
		$subQuery =  $this->db->get_compiled_select();

		$this->db->select('*');
		$this->db->from('cost_services');
		$this->db->where('service',$service_id);
		$this->db->where("id IN ($subQuery)", NULL, FALSE);
        return $this->db->get();
	}

	public function dtpConversionCosting(){
        $this->db->select('cdc.*, l.name language_name');
        $this->db->from("cost_dtp_conversion cdc");
        $this->db->join('mstr_language l', 'cdc.language=l.id', 'left');
        $this->db->where('cdc.validity_now',TRUE);
        return $this->db->get();
	}
	
	public function physicalStores($store_id=null){
		$this->db->select('mps.*, s.name state_name, d.name district_name');
        $this->db->from("mstr_physical_store mps");
        $this->db->join('state s', 'mps.state=s.id', 'left');
        $this->db->join('district d', 'mps.district=d.id', 'left');
		$this->db->where('mps.flag',TRUE);
		if($store_id!=null){
			$this->db->where('mps.id',$store_id);
		}
        return $this->db->get();
	}

	public function getPrintingCostOf($paper_id=null){
		$this->db->select('cop.*, mbs.size_w, mbs.size_h');
        $this->db->from("cost_printing cop");
        $this->db->join('mstr_book_size mbs', 'mbs.id=cop.size', 'left');
		$this->db->where('cop.paper',$paper_id);
		$this->db->where('cop.validity_now',TRUE);
        return $this->db->get();
	}
}