<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
		$datas['member']=$this->common_data_lib->memberDetails();
		
		
		$this->load->view('Dashboard',$datas);
	}



	
}
