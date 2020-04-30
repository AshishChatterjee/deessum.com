<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{


	public function __construct()
	{
		$this->load->database();
    }

    public function member_login($data){
        return $this->db->get_where('members',$data);
    }
}