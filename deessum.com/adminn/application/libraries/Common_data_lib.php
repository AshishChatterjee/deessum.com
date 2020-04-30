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

class Common_data_lib {
    var $CI;
    public function __construct($params = array())
    {
        $this->CI =& get_instance();

        $this->CI->load->helper('url');
        $this->CI->config->item('base_url');
        $this->CI->load->database();
       
    }

    public function memberDetails(){
		if($this->CI->session->userdata('loginid')){
			$this->CI->load->model("CRUDS_model");
			$memberid=$this->CI->session->userdata('loginid');
			$accesses=$this->CI->CRUDS_model->getdata('members',array('id'=>$memberid));
			return $accesses->row();
	   	}else{
			$this->CI->session->set_flashdata('message','Invalid Access...');
			redirect(base_url());
	    }
	}

	public function sendSMS($number=null,$msg=null){
		if($number!=null && $msg!=null){
			$encoded_msg=urlencode($msg);
			$url="http://sms.appdoor.in/API/WebSMS/Http/v1.0a/index.php?username=dewacl&password=dewacl&sender=DEWACL&to=".$number."&message=".$encoded_msg."&reqid=&format={json}&route_id=44&callback=#&unique=&sendondate=15-01-2019T09:34:47";
			return file_get_contents($url);
		}else{
			return FALSE;
		}
	}

	public function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}

	public function sendFCM_NotificationToApp($msg,$title,$token){
		$path_to_fcm = "https://fcm.googleapis.com/fcm/send";
		$server_key = "AAAAVkA6oKw:APA91bF3JuxyNmRwQU64gg0jBxLlkOEcfroarrlHBG7CcMB-y_hasB7Kv8hG_SWeF6kfpMcGBODfAFTc3bB4FO_opkQuIu09qdpZGS5CRWG5YmgQFPvkVOVFwtCft-zwdV0WfY4cS9O7";


		$headers = array(
			'Authorization:key=' . $server_key,
			'Content-Type:application/json'
		);
		
		$curl_session = curl_init();
		curl_setopt($curl_session, CURLOPT_URL, $path_to_fcm);
		curl_setopt($curl_session, CURLOPT_POST, true);
		curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

		$fields = array(
			'to' => $token,
			'notification' => array('title' => $title, 'body' => $msg)
		);

		$payload = json_encode($fields);

		curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload);

		$result = curl_exec($curl_session);
		
		// echo $result;

		curl_close($curl_session);
	}
}