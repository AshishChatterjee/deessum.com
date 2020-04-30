<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function cities(){
        $this->load->model('App_model');
        $data=$this->App_model->getAllData('city');
        echo json_encode($data->result());
    }

    public function localities($id=null){
        $this->load->model('App_model');
        if($id!=null){
            $condition=array('city_id'=>$id,"flag"=>TRUE);
            $data=$this->App_model->getdata('locality',$condition);
            echo json_encode($data->result());
        }
    }

    public function register_user(){
        $inputData = array(
            'name'=>htmlspecialchars($this->input->post('name')),
            'email'=>htmlspecialchars($this->input->post('email')),
            'mobile'=>htmlspecialchars($this->input->post('mobile')),
            'city'=>htmlspecialchars($this->input->post('city')),
            'locality'=>htmlspecialchars($this->input->post('locality')),
            'address'=>htmlspecialchars($this->input->post('address')),
            'password'=>htmlspecialchars($this->input->post('password'))
        );
        $this->load->model("App_model");
        $data=$this->App_model->getdata('customer',$inputData);
        if($data->num_rows()!=0){
            //echo "SRAE"; // Same Record Already Exist
            echo "Same Record Already Exist";
        }else{
            $data1=$this->App_model->getdata('customer',array('email'=>htmlspecialchars($this->input->post('email'))));
            if($data1->num_rows()!=0){
                //echo "TEMIDAE"; // This Email ID Already Exist
                echo "This Email ID Already Exist";
            }else{
                $data2=$this->App_model->getdata('customer',array('mobile'=>htmlspecialchars($this->input->post('mobile'))));
                if($data2->num_rows()!=0){
                    //echo "TMNOAE"; // This mobile number already exist
                    echo "This mobile number already exist";
                }else{
                    $data = $this->App_model->insert("customer",$inputData);
                    if($data==1)
                        echo "REGISTERED";
                    else
                        echo "REGISTRATION FAILED";
                }
            }

        }			
    }

    public function login_user(){
        $condition = array(
            'email'=>htmlspecialchars($this->input->post('login_id')),
            'password'=>htmlspecialchars($this->input->post('password')),
            'status'=>'ACTIVE'
        );
        $this->load->model('App_model');
        $data=$this->App_model->getdata('customer',$condition);
        if($data->num_rows()!=0){
            echo json_encode($data->result());
        }else{
            echo "INLOGIN";
        }
    }
    
    public function slider_images(){
        $this->load->model('App_model');
        $data=$this->App_model->getAllData('slider');
        echo json_encode($data->result());
    }
    
    public function getBestSellingProducts(){
        $this->load->model('App_model');
        $data=$this->App_model->getBestSellingProducts();
        echo json_encode($data->result());
    }

    public function getCategories(){
        $this->load->model('App_model');
        $data=$this->App_model->getAllData('category');
        echo json_encode($data->result());
    }

    public function getSubCategories($id=null){
        if($id!=null){
            $this->load->model('App_model');
            $condition=array('category_id'=>$id,"flag"=>TRUE);
            $data=$this->App_model->getData('sub_category',$condition);
            echo json_encode($data->result());
        }
    }

    public function getProductsOfSubCategory($id=null){
        if($id!=null){
            $this->load->model('App_model');
            $condition=array('p.sub_category_id'=>$id,"p.flag"=>TRUE);
            $data=$this->App_model->getProductDetailOf($condition);
            echo json_encode($data->result());
        }
    }

    public function getProductDetail($id=null){
        if($id!=null){
            $this->load->model('App_model');
            $data=$this->App_model->getProductDetail($id);
            echo json_encode($data->result());
        }
    }
    
    public function getRecentProducts(){
        $this->load->model('App_model');
        $data=$this->App_model->getRecentProducts();
        echo json_encode($data->result());
    }
    
    public function addToCart(){
        $login_id=$this->input->post('login_id');
        $product_id=$this->input->post('product_id');
        $qty=$this->input->post('qty');

        $inputData=array(
            'login_id'=>$login_id,
            'product_id'=>$product_id
        );
        $this->load->model("App_model");
        $data=$this->App_model->getdata('cart',$inputData);
        if($data->num_rows()!=0){
            $detail = $data->row();
            $oqty=$detail->qty;
            $nqty=$oqty+$qty;
            $udata=array('qty'=>$nqty);
            $ur=$this->App_model->update('cart',$udata,$inputData);
            if($ur==1){
                echo "UPDATED";
            }else{
                echo "NOT UPDATED";
            }
        }else{
            $inputData['qty']=$qty;
            $ir=$this->App_model->insert('cart',$inputData);
            if($ir){
                echo "ADDED TO CART";
            }
        }
    }
    
    public function cartProducts(){
        $login_id=$this->input->post('login_id');
        $this->load->model('App_model');
        $data=$this->App_model->getCartProducts($login_id);
        echo json_encode($data->result());
    }
    
    public function placeOrder(){
        $login_id=$this->input->post('login_id');
        $savings=substr($this->input->post('savings'),3);
        $payableamt=substr($this->input->post('payableamt'),3);
        // $this->mailOrderDetail($login_id,$savings,$payableamt);

        $this->load->model('App_model');
        $order_id=$this->App_model->placeOrder($login_id,$savings,$payableamt);

        $customer=$this->CRUDS_model->getdata("customer",array("email"=>$login_id))->row();
        $token_data=$this->CRUDS_model->getdata("firebase_tokens",array());
        if($token_data->num_rows()>0){
            $token=$token_data->row()->token;
            $title="New Order";
            $msg=$customer->name." Placed new order of worth rupees ".$payableamt.". Order id is : ".$order_id;

            $this->common_data_lib->sendFCM_NotificationToApp($msg,$title,$token);
        }

        echo $order_id;
    }
    
    public function mailOrderDetail($login_id,$savings,$payableamt){
    
        $this->load->model('App_model');
        $data=$this->App_model->getdata('cart',array('login_id'=>$login_id));
        $client_data=$this->App_model->getdata('client',array('email'=>$login_id))->row();
        $table="<table border='1' style='border-collapse:collapse;'";
            $table.="<tr>";
                $table.="<th style='padding:10px;'>Image</th>";
                $table.="<th style='padding:10px;'>Product Name</th>";
                $table.="<th style='padding:10px;'>Product Selling Price</th>";
                $table.="<th style='padding:10px;'>Product MRP</th>";
                $table.="<th style='padding:10px;'>Quantitiy</th>";
                $table.="<th style='padding:10px;'>Total</th>";
            $table.="</tr>";

        foreach($data->result() as $row){

            $pdata=$this->App_model->getdata('product',array('id'=>$row->product_id))->row();
            $cdata=$this->App_model->getdata('category',array('id'=>$pdata->category_id))->row();
            $scdata=$this->App_model->getdata('sub_category',array('id'=>$pdata->sub_category_id))->row();

            $table.="<tr>";
            $table.="<td style='padding:10px;'><img style='width:50px;' src='http://www.shyamcollege.in/Grocery/product_images/".$pdata->image."'/></td>";
                $table.="<td style='padding:10px;'>".$pdata->name."</td>";
                $table.="<td style='padding:10px; text-align:right;'> Rs. ".$pdata->selling_price.".00</td>";
                $table.="<td style='padding:10px; text-align:right;'> Rs. ".$pdata->mrp.".00</td>";
                $table.="<td style='padding:10px; text-align:right;'> ".$row->qty."</td>";
                $table.="<td style='padding:10px; text-align:right;'> Rs. ".($row->qty)*($pdata->selling_price).".00</td>";
            $table.="</tr>";

        }
            $table.="<tr>";
                $table.="<td colspan='5' style='padding:10px; text-align:right;'> Grand Total </td>";
                $table.="<td style='padding:10px; text-align:right;'> Rs. ".$payableamt."</td>";
            $table.="</tr>";
        $table.="</table>";

        $msg="<html>";
            $msg.="<body>";
                $msg.="<p><b>Client Name</b> - ".$client_data->name."</p>";
                $msg.="<p><b>Client Mobile</b> - ".$client_data->mobile."</p>";
                $msg.="<p><b>Client Email</b> - ".$client_data->email."</p>";
                $msg.="<p><b>Client Address</b> - ".$client_data->address."</p>";
                $msg.="<h3>Product Details Of Order</h3>";
                $msg.=$table;
            $msg.="</body>";
        $msg.="</html>";
        $email=$client_data->email;
        echo $msg;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://chhattisgarhzone.org/Mail.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query(array("tomail"=>$email,"subject"=>'New Details',"message"=>$msg)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
    }
    
    public function orders(){
        $login_id=$this->input->post("login_id");
        $this->load->model('App_model');
        $orders=$this->App_model->getOrders($login_id);
        foreach($orders->result() as $order){
            $products_name="";
            $order_id=$order->id;
            $items=$this->CRUDS_model->getdata("order_detail",array("order_id"=>$order_id));
            foreach($items->result() as $item){
                $product=$this->CRUDS_model->getdata("product",array("id"=>$item->product_id))->row();
                $products_name=$products_name."".$product->name.", ";
            }
            $order->items=substr(trim($products_name), 0, -2);;
        }
        echo json_encode($orders->result());
    }
    
    public function orderDetails(){
        $order_id=$this->input->post('order_id');
        $this->load->model('App_model');
        $data=$this->App_model->getOrderDetail($order_id);
        echo json_encode($data->result());
    }
    
    public function increaseProductQuantity(){
        $login_id=$this->input->post('login_id');
        $product_id=$this->input->post('product_id');
        $this->load->model('App_model');
        $data=$this->App_model->increaseQuantity($login_id,$product_id);
        print_r($data);
    }
    
    public function decreaseProductQuantity(){
        $login_id=$this->input->post('login_id');
        $product_id=$this->input->post('product_id');
        $this->load->model('App_model');
        $data=$this->App_model->decreaseQuantity($login_id,$product_id);
        print_r($data);
    }
    
    public function deleteCartItem(){
        $login_id=$this->input->post('login_id');
        $product_id=$this->input->post('product_id');
        $this->load->model('App_model');
        $data=$this->App_model->deleteCartItem($login_id,$product_id);
        print_r($data);
    }
    
    public function getCategoryAndSubCategory(){
        $this->load->model('App_model');
        $data=$this->App_model->getAllData('category');

        $json="{";
        foreach($data->result() as $row){
            //clean_cat=str_replace(' ', '_', $row->category_name);
            //$json=$json."\"".$clean_cat."\":";
            $json=$json."\"".$row->category_name."\":";

            $condition=array('category_id'=>$row->id);
            $catDatas=$this->App_model->getData('sub_category',$condition);
            $json=$json."[";
            foreach($catDatas->result() as $catRow){
                $json=$json."{\"id\":\"".$catRow->id."\",\"sub_category\":\"".$catRow->sub_category."\"},";
            }
            $json=rtrim($json,',');
            $json=$json."],";

        }
        $json=rtrim($json,',');
        $json=$json."}";

        echo $json;
    }
    
    public function searchProducts(){
        $search_text=$this->input->post('search_text');
        $this->load->model('App_model');
        $data=$this->App_model->getSearchedProducts($search_text);
        echo json_encode($data->result());
    }
    
    public function getClientDetails(){
        $login_id=$this->input->post('login_id');
        $this->load->model('App_model');
        $data=$this->App_model->getClientDetails($login_id);
        echo json_encode($data->result());
    }
    
    public function changePassword(){
        $login_id=$this->input->post('login_id');
        $password=$this->input->post('password');
        $condition=array(
            'email'=>$login_id,
            'password'=>$password
        );
        $this->load->model('App_model');
        $data=$this->App_model->getdata('client',$condition);
        if($data->num_rows()!=0){
            $new_password=$this->input->post('new_password');
            $udata=array(
                'password'=>$new_password
            );
            $udatar=$this->App_model->update('client',$udata,$condition);
            if($udatar==1){
                echo "Password Changed Successfully";
            }else{
                echo "Password Not Change";
            }
        }else{
            echo "Incoreect Old Password";
        }
    }
    
    public function changeProfileDetails(){
        $login_id=$this->input->post('login_id');
        $password=$this->input->post('password');
        $condition=array(
            'email'=>$login_id,
            'password'=>$password
        );
        $this->load->model('App_model');
        $data=$this->App_model->getdata('client',$condition);
        if($data->num_rows()!=0){
            $address=$this->input->post('address');
            $mobile=$this->input->post('mobile');
            $name=$this->input->post('name');
            $city=$this->input->post('city');
            $locality=$this->input->post('locality');

            $udata=array(
                'name'=>$name,
                'mobile'=>$mobile,
                'address'=>$address,
                'city'=>$city,
                'locality'=>$locality
            );

            $udatar=$this->App_model->update('client',$udata,$condition);
            if($udatar==1){
                echo "DUS";
            }else{
                echo "Detail Not Updated";
            }
            
        }else{
            echo "Incoreect Old Password";
        }
    }
    
    public function activate_client(){
        $condition = array(
            'email'=>htmlspecialchars($this->input->post('login_id')),
            'otp'=>htmlspecialchars($this->input->post('otp'))
        );

        $this->load->model('App_model');
        $data=$this->App_model->getdata('client',$condition);
        if($data->num_rows()!=0){
            $udata=array(
                'status'=>'ACTIVE'
            );
            $ur=$this->App_model->update('client',$udata,$condition);
            if($ur==1){
                echo "ACTIVATED";
            }else{
                echo "NOT ACTIVATED";
            }
        }else{
            echo htmlspecialchars($this->input->post('otp'));
        }
    }
    
    public function generateOtpToResetPassword(){
        $otp = mt_rand(100000, 999999);
        $email=$this->input->post('email');
        $this->testCurl($email,"OTP To Reset Password : ","Your OTP to reset password is - ".$otp);
        $udata=array(
            'otp'=>$otp
        );
        $condition=array(
            'email'=>$email
        );
        $this->load->model('App_model');
        $data=$this->App_model->getdata('client',$condition);
        if($data->num_rows()!=0){
             $this->App_model->update('client',$udata,$condition);
             echo "SENT";
        }else{
             echo "NOT SENT";
        }
    }
    
    public function resetPassword(){
        $otp=$this->input->post('otp');
        $email=$this->input->post('email');
        $password=$this->input->post('password');

        $condition=array(
            'email'=>$email,
            'otp'=>$otp
        );
        $udata=array(
            'password'=>$password
        );
        $this->load->model('App_model');
        $data=$this->App_model->getdata('client',$condition);
        if($data->num_rows()!=0){
             $this->App_model->update('client',$udata,$condition);
             echo "UPDATED";
        }else{
             echo "NOT UPDATED";
        }
    }
    
    public function getItemCount(){
        $loginid=$this->input->post('login_id');
        $condition=array(
            'login_id'=>$loginid
        );
        $this->load->model('App_model');
        $data=$this->App_model->getdata('cart',$condition);

        echo $data->num_rows();
    }
    
    public function sendMailCurl($tomail,$subject,$message){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://chhattisgarhzone.org/Mail.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query(array("tomail"=>$tomail,"subject"=>$subject,"message"=>$message)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
    }
    
    public function testMail(){
    	$this->sendMailCurl('vir.indraa@gmail.com','JNew mail','Helo');
    }

    public function recordToken(){
        $token=$this->input->post("token");
        $data=$this->CRUDS_model->update("firebase_tokens",array("token"=>$token),array("member_id"=>11742));
        if($data==1)
            echo "DONE";
        else
            echo "ERROR";
    }
}