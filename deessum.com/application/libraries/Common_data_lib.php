<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Common_data_lib {
    var $CI;
    public function __construct($params = array())
    {
        $this->CI =& get_instance();

        $this->CI->load->helper('url');
        $this->CI->config->item('base_url');
        $this->CI->load->database();
       
    }

    public function addToCart($id){

		$cart=$this->CI->session->userdata('cart');
        if($cart!=null){
            $i=0;
            $flag=true;
            foreach($cart as $c){
                if($c['id']==$id){
                    $tqty=$c['qty'];
                    $tqty++;
                    $cart[$i]=array(
                        "id"=>$id,
                        "qty"=>$tqty
                    );
                    $flag=false;
                }
                $i++;
            }
            if($flag){
                array_push($cart,array("id"=>$id,"qty"=>1));
            }
        }else{
            $cart[0]=array(
                "id"=>$id,
                "qty"=>1
            );
        }
        $this->CI->session->set_userdata('cart',$cart);

		$cart=$this->CI->session->userdata('cart');
		
		$cart_products=array();
		if($cart!=null){
			foreach($cart as $c){
				$pid=$c['id'];
				$product=$this->CI->CRUDS_model->getdata("product",array("id"=>$pid));
				if($cart_products!=null){
					if($product->num_rows()>0){
						$product->row()->qty=$c['qty'];
						array_push($cart_products,$product->row());
					}
				}else{
					$product->row()->qty=$c['qty'];
					$cart_products[0]=$product->row();
				}
			}
			return $cart_products;
		}else{
			return null;
		}
	}

	public function getCartItems(){
		$cart=$this->CI->session->userdata('cart');
		$cart_products=array();
		if($cart!=null){
			foreach($cart as $c){
				$pid=$c['id'];
				$product=$this->CI->CRUDS_model->getdata("product",array("id"=>$pid));
				if($cart_products!=null){
					if($product->num_rows()>0){
						$product->row()->qty=$c['qty'];
						array_push($cart_products,$product->row());
					}
				}else{
					$product->row()->qty=$c['qty'];
					$cart_products[0]=$product->row();
				}
			}
			return $cart_products;
		}else{
			return null;
		}
	}

	public function decreaseCartItemQty($id){
		$cart=$this->CI->session->userdata('cart');
        if($cart!=null){
            $i=0;
            foreach($cart as $c){
                if($c['id']==$id){
                    $tqty=$c['qty'];
					$tqty--;
					if($tqty<=0){
						unset($cart[$i]);
					}else{
						$cart[$i]=array(
							"id"=>$id,
							"qty"=>$tqty
						);
					}
                }
                $i++;
            }
		}
		$this->CI->session->set_userdata('cart',$cart);
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