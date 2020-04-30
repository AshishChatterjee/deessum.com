<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model{


	public function __construct()
	{
		$this->load->database();
    }

    public function getCount($table){
        $data=$this->db->get($table);
        return $data->num_rows(); 
    }

    public function getLastLoginDT($member_id){
		$this->db->order_by("id","DESC");
		$this->db->limit(1);
		$this->db->where("member_id",$member_id);
		$ld=$this->db->get("logins")->row();
		return $ld->l_dt;
	}

	public function newEnquries(){
		$this->db->where("i_dt >=",$this->session->userdata("lldt"));
        return $this->db->get("enquiry");
	}

	public function totalEnquries(){
        return $this->db->get("enquiry");
	}

	function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}

	public function getAccessNotations(){
		$this->db->select('an.*, at.type access_type');
        $this->db->from("access_notation an");
        $this->db->join('access_types at', 'an.type=at.id', 'left');
        $this->db->where("an.flag",TRUE);
        $this->db->order_by("an.id","ASC");
        return $this->db->get();
	}
}