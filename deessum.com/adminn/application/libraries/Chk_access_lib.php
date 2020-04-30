<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package     CodeIgniter
 * @author      Anil Kumar Panigrahi
 * @copyright           Copyright (c) 2015, Anil Labs.
 * @license    
 * @link        http://www.anillabs.com
 * @since       Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Anil Labs core CodeIgniter class
 *
 * @package     CodeIgniter
 * @subpackage          Libraries
 * @category            Anil Labs
 * @author      Anil Kumar Panigrahi
 * @link        http://www.anillabs.com
 */

class Chk_access_lib {
    var $CI;
    public function __construct($params = array()){
        $this->CI =& get_instance();

        $this->CI->load->helper('url');
        $this->CI->config->item('base_url');
        $this->CI->load->database();
       
    }

    public function chkAccess($portal_access_codes=null){

		if($this->CI->session->userdata('loginid') && $this->CI->session->userdata('section')=="ADMIN" ){
			$this->CI->load->model("CRUDS_model");
			$memberid=$this->CI->session->userdata('loginid');
			$accesses=$this->CI->CRUDS_model->getdata('member_access',array('member_id'=>$memberid,"flag"=>TRUE));
			$flag=false;
			foreach($portal_access_codes as $code){
				foreach($accesses->result() as $row){
					if($code==$row->access){
						$flag=true;
						break;
					}
				}
				if($flag){
					break;
				}
			}
			
			if(!$flag){
				redirect(base_url('common/accesss_denied'));
			}
	   	}else{
			$this->CI->session->set_flashdata('message','Invalid Access...');
			redirect(base_url());
	    }
	}

	public function getInfoAccess($portal_access_codes=null){

		if($this->CI->session->userdata('loginid') && $this->CI->session->userdata('section')=="ADMIN" ){
			$this->CI->load->model("CRUDS_model");
			$memberid=$this->CI->session->userdata('loginid');
			$accesses=$this->CI->CRUDS_model->getdata('member_access',array('member_id'=>$memberid));
			$flag=false;
			foreach($portal_access_codes as $code)
			{
				foreach($accesses->result() as $row){
					if($code==$row->access){
						$flag=true;
						break;
					}
				}
				if($flag){
					break;
				}
			}
			return $flag;
	   	}else{
			$this->CI->session->set_flashdata('message','Invalid Access...');
			redirect(base_url());
	    }
	}
}