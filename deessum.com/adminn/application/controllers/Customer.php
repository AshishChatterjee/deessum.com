<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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

    public function orderHistory($customer_id=null){
        $accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();

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

    public function inquiry(){
        $accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();

		$datas['inquries']=$this->CRUDS_model->getdata("contact",array("flag"=>TRUE));
		$this->load->view("Inquries",$datas);
    }


}