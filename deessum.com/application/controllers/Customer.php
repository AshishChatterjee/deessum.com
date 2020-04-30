<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    }

    public function loginRegister(){
        $datas=null;

        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
        // $datas['member']=$this->common_data_lib->customerDetail();

        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;

        $datas['cities']=$this->CRUDS_model->getdata("city",array("flag"=>TRUE));
        
        $this->load->view("Login_register",$datas);
    }

    public function login(){
        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;

        $datas['cities']=$this->CRUDS_model->getdata('city',array('flag'=>TRUE));
		
		if($this->input->post()){

			$this->form_validation->set_rules('username',"",'trim|required',array('required'=>"Username is required Field"));
			$this->form_validation->set_rules('password',"",'trim|required',array('required'=>"Password is required Field"));
			$this->form_validation->set_error_delimiters('<p style="color:blue; font-size:13px; margin:0; margin-left:25px; padding:0;" class="normal-text-bold">', '</p>');
			
			if($this->form_validation->run()==false){
				$this->load->view('Login_register',$datas);
			}else{	

				$logindata = array(
					'email'=>htmlspecialchars($this->input->post('username')),
					'password'=>htmlspecialchars($this->input->post('password'))
				);

                $data = $this->CRUDS_model->getdata("customer",$logindata);
     
				if($data->num_rows()==1)
				{
					$detail = $data->row();
					
					if($detail->flag==0){
						$this->session->set_flashdata('message','Sorry you are inactive member');
						$this->load->view('Login_register',$datas);
					}else{
						if($data->num_rows()==1 && $detail->flag==1){
							$ip=$_SERVER['REMOTE_ADDR'];
		
							$idata = array(
									'customer_id'=>$detail->id,
									'ip'=>$ip
							);
		
							$this->load->model("CRUDS_model");
							$this->load->model("General_model");
							$lldt=$this->General_model->getLastLoginDT($detail->id);
							$this->CRUDS_model->insert('customer_logins',$idata);
							if($lldt==null){
								$lldt=$this->General_model->getLastLoginDT($detail->id);
							}
							$this->session->set_userdata('loginid',$detail->id);
							$this->session->set_userdata('customer_name',$detail->name);
							$this->session->set_userdata('customer_email',$detail->email);
							$this->session->set_userdata('customer_address',$detail->address);
							$this->session->set_userdata('section','CUSTOMER');
							$this->session->set_userdata('lldt',$lldt);
							redirect(base_url('customer/loginSuccess/'));
		
						}else{
							$this->session->set_flashdata('message','Invalid login id or password');
							$this->load->view('Login_register',$datas);
						}
					}
				}else{
					$this->session->set_flashdata('message','Invalid login id or password');
					$this->load->view('Login_register',$datas);
				}
			}
		}else{
			$this->load->view('Login_register',$datas);
		}
    }
    
    public function logout(){
        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;
        
        $this->session->unset_userdata('loginid');
        $this->session->unset_userdata('customer_name');
        $this->session->unset_userdata('customer_email');
        $this->session->unset_userdata('customer_address');
		$this->session->unset_userdata('lldt');
        $this->session->set_flashdata('message','Successfully Logged Out');
        
		$this->load->view('Logout_success',$datas);
    }

    public function loginSuccess(){
        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;

        $this->load->view('Login_success',$datas);
    }

    public function register(){
        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;
        
        $datas['cities']=$this->CRUDS_model->getdata('city',array('flag'=>TRUE));
		
		if($this->input->post()){
			$this->form_validation->set_rules('name',"",'trim|required',array('required'=>"Name is missing "));
			$this->form_validation->set_rules('email',"",'trim|required',array('required'=>"Email is missing "));
			$this->form_validation->set_rules('mobile',"",'trim|required',array('required'=>"Mobile number is missing "));
			$this->form_validation->set_rules('city',"",'trim|required',array('required'=>"City Missing "));
			$this->form_validation->set_rules('locality',"",'trim|required',array('required'=>"Locality Missing"));
			$this->form_validation->set_rules('address',"",'trim|required',array('required'=>"Address missing "));
			$this->form_validation->set_rules('password',"",'trim|required',array('required'=>"Password missing "));
            
            $email=$this->input->post("email");
            $existingCustomer=$this->CRUDS_model->getdata("customer",array("email"=>$email));
            if($existingCustomer->num_rows()>0){
                $this->form_validation->set_rules('exist',"",'trim|required',array('required'=>"This mail id is already exist "));
            }
            
            $this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; margin-left:30px; padding:0;" class="normal-text-bold">', '</span>');

			if($this->form_validation->run()==false){
                $city=$this->input->post("city");
                $datas['localities']=$this->CRUDS_model->getdata("locality",array("city_id"=>$city));
                $this->load->view('Login_register',$datas);
            }else{
                
				$inputData = array(
                    'name'=>htmlspecialchars($this->input->post('name')),
                    'email'=>htmlspecialchars($this->input->post('email')),
                    'mobile'=>htmlspecialchars($this->input->post('mobile')),
                    'city'=>htmlspecialchars($this->input->post('city')),
                    'locality'=>htmlspecialchars($this->input->post('locality')),
                    'password'=>htmlspecialchars($this->input->post('password')),
                    'address'=>htmlspecialchars($this->input->post('address'))
                );

                $inputData['c_dt']=date('Y-m-d h:i:s');
                $data = $this->CRUDS_model->insert("customer",$inputData);

                redirect(base_url('customer/registrationSuccess/'));
            }
		}else{
			$this->load->view('Login_register',$datas);
		}
    }

    public function registerInputSource(){
        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;
        
        $datas['cities']=$this->CRUDS_model->getdata('city',array('flag'=>TRUE));
		
		if($this->input->post()){
			$this->form_validation->set_rules('holder',"",'trim|required',array('required'=>"Name is missing "));
            $this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; padding:0;" class="normal-text-bold">', '</span>');
            
			if($this->form_validation->run()==false){
                $city=$this->input->post("city");
                $datas['localities']=$this->CRUDS_model->getdata("locality",array("city_id"=>$city));
                $this->load->view('Login_register',$datas);
            }
		}else{
			$this->load->view('Login_register',$datas);
		}
    }
    
    public function registrationSuccess(){
        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;

        $this->load->view("Registration_success",$datas);
    }

	public function customerList(){
        $accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();
        
        $this->load->model("Customer_model");
		$datas['customers']=$this->Customer_model->getCustomers();
		$this->load->view("Customer_list",$datas);
    }

    public function profile($customer_id=null){
        $accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();

        if($customer_id!=null){
            $this->load->model('Customer_model');
            $customer=$this->Customer_model->getCustomers($customer_id);
            if($customer->num_rows()>0){
                $datas['customer']=$customer->row();
                $this->load->view("Customer_profile",$datas);
            }else{
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function orders($status=null){
        $accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();

        if($status==null){
            $datas['status']="ALL";
        }else{
            $datas['status']=$status;
        }
        $this->load->model("Product_model");
        if($status!=null){
            if($status=="TODAY"){
                $orders=$this->Product_model->getOrders(array("DATE(o.c_dt)"=>date('Y-m-d')));
            }else{
                $orders=$this->Product_model->getOrders(array("o.status"=>$status));
            }
        }else{
            $orders=$this->Product_model->getOrders();
        }
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
        $datas['orders']=$orders;
        $this->load->view("Orders",$datas);

    }

    public function orderDetail($order_id=null){

        $accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();

        if($order_id!=null){
            $order_data=$this->CRUDS_model->getdata("order",array("id"=>$order_id));
            if($order_data->num_rows()>0){
                $order=$order_data->row();
                $this->load->model("Customer_model");
                $customer=$this->Customer_model->getCustomers($order->login_id)->row();
                $items=$this->Customer_model->getProductsOfOrder($order_id);

                $datas['order']=$order;
                $datas['customer']=$customer;
                $datas['items']=$items;

                $this->load->view("Order_detail",$datas);
            }else{
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function dispatchOrder($order_id=null){
        $accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);

        if($order_id!=null){
            $condition=array("id"=>$order_id);
            $input=array("status"=>"DISPATCHED");
            $this->CRUDS_model->update("order",$input,$condition);

            $token_data=$this->CRUDS_model->getdata("firebase_tokens",array());
            if($token_data->num_rows()>0){
                $token=$token_data->row()->token;
                $title="ORDER DISPATCHED";
                $msg="ORDER DISPATCHED SUCCESSFULLY";

                $this->common_data_lib->sendFCM_NotificationToApp($msg,$title,$token);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function deliverOrder($order_id=null){
        $accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);

        if($order_id!=null){
            $condition=array("id"=>$order_id);
            $input=array("status"=>"DELIVERED");
            $this->CRUDS_model->update("order",$input,$condition);
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function orderHistory(){
        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;

        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));

        $customer_id=$this->session->userdata("loginid");
        if($customer_id!=null){

            $this->load->model("Product_model");
            $customer=$this->CRUDS_model->getdata("customer",array("id"=>$customer_id))->row();
            $orders=$this->Product_model->getOrders(array("c.id"=>$customer_id));

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
            $datas['orders']=$orders;
            $datas['customer']=$customer;
            $this->load->view("Customer_order_history",$datas);
        }else{
            redirect($_SERVER['HTTP_REFERER']);            
        }
    }

    public function checkOut(){
        $datas=null;
        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
        // $datas['member']=$this->common_data_lib->customerDetail();

        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;

        if($this->session->userdata("customer_email")){
            $this->load->view("Checkout",$datas);
        }else{
            redirect(base_url("customer/loginRegister"));
        }
    }

    public function placeOrder(){
        $cart_products=$this->common_data_lib->getCartItems();
        $total_mrp=0;
        $total_sp=0;

        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));

        if($cart_products!=null){
            foreach($cart_products as $product){
                $total_sp=$total_sp+($product->qty*$product->selling_price);
                $total_mrp=$total_mrp+($product->qty*$product->mrp);
            }
        }

        $total_saving=$total_mrp-$total_sp;
        $order_data=array(
            "login_id"=>$this->session->userdata("customer_email"),
            "savings"=>$total_saving,
            "payableamt"=>$total_sp,
            "status"=>"PENDING"
        );
        $order_id=$this->CRUDS_model->insertGetBackID("order",$order_data);

        if($cart_products!=null){
            foreach($cart_products as $product){
                $order_detail_row=array(
                    "order_id"=>$order_id,
                    "product_id"=>$product->id,
                    "qty"=>$product->qty
                );
                $this->CRUDS_model->insert("order_detail",$order_detail_row);
            }
        }

        $this->session->unset_userdata('cart');

        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;

        $this->load->view("Order_placed",$datas);

    }


}