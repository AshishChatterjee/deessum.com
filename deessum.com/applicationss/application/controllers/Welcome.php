<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$datas=null;
		$datas['sliders']=$this->CRUDS_model->getdata("site_slider",array("flag"=>TRUE));
		$cart_products=$this->common_data_lib->getCartItems();
		$datas['cart_products']=$cart_products;
		$this->load->model("Product_model");
		$datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
		$datas['latest_products']=$this->Product_model->getProducts();
	
		$this->load->view('Welcome',$datas);
	}

	public function contact(){
        $datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;
		
		if($this->input->post()){
			$this->form_validation->set_rules('name',"",'trim|required',array('required'=>"Name is missing "));
			$this->form_validation->set_rules('email',"",'trim|required',array('required'=>"Email is missing "));
			$this->form_validation->set_rules('mobile',"",'trim|required',array('required'=>"Mobile number is missing "));
			$this->form_validation->set_rules('subject',"",'trim|required',array('required'=>"Subject is missing "));
			$this->form_validation->set_rules('message',"",'trim|required',array('required'=>"Message can not be empty"));
            
            
            $this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; margin-left:30px; padding:0;" class="normal-text-bold">', '</span>');

			if($this->form_validation->run()==false){
                $this->load->view('Contact',$datas);
            }else{
                
				$inputData = array(
                    'name'=>htmlspecialchars($this->input->post('name')),
                    'email'=>htmlspecialchars($this->input->post('email')),
                    'mobile'=>htmlspecialchars($this->input->post('mobile')),
                    'subject'=>htmlspecialchars($this->input->post('subject')),
                    'message'=>htmlspecialchars($this->input->post('message'))
                );

                $inputData['c_dt']=date('Y-m-d h:i:s');
                $data = $this->CRUDS_model->insert("contact",$inputData);

                redirect(base_url('welcome/msgSubmittedSuccessfully/'));
            }
		}else{
			$this->load->view('Contact',$datas);
		}
    }

	public function Login(){
		$datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
		if($this->input->post()){
			$this->form_validation->set_rules('login_id',"",'trim|required',array('required'=>"Login ID is required Field"));
			$this->form_validation->set_rules('password',"",'trim|required',array('required'=>"Password is required Field"));
			$this->form_validation->set_error_delimiters('<p style="color:blue; font-size:13px; margin:0; padding:0;" class="normal-text-bold">', '</p>');
			
			if($this->form_validation->run()==false){
				$this->load->view('Login');
			}else{	

				$this->load->model("Login_model");
				$logindata = array(
					'username'=>htmlspecialchars($this->input->post('login_id')),
					'password'=>htmlspecialchars($this->input->post('password'))
				);

				$data = $this->Login_model->member_login($logindata);
				if($data->num_rows()==1)
				{
					$detail = $data->row();
					
					if($detail->flag==0){
						$this->session->set_flashdata('message','Sorry you are inactive member');
						$this->load->view('Login');
					}else if($detail->login_flag==0){
						$this->session->set_flashdata('message','Sorry you dont have login permission');
						$this->load->view('Login');
					}else{
						if($data->num_rows()==1 && $detail->login_flag==1 && $detail->flag==1){
							$ip=$_SERVER['REMOTE_ADDR'];
		
							$idata = array(
									'member_id'=>$detail->id,
									'ip'=>$ip
							);
		
							$this->load->model("CRUDS_model");
							$this->load->model("General_model");
							$lldt=$this->General_model->getLastLoginDT($detail->id);
							$this->CRUDS_model->insert('logins',$idata);
							if($lldt==null){
								$lldt=$this->General_model->getLastLoginDT($detail->id);
							}
							$this->session->set_userdata('loginid',$detail->id);
							$this->session->set_userdata('section','ADMIN');
							$this->session->set_userdata('lldt',$lldt);
							redirect(base_url('Dashboard/'));
		
						}else{
							$this->session->set_flashdata('message','Invalid login id or password');
							$this->load->view('Login');
						}
					}
				}else{
					$this->session->set_flashdata('message','Invalid login id or password');
					$this->load->view('Login');
				}
				
				
			}
		}else{
			$this->load->view('Login');
		}
	}

	public function logout(){
		$datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
		$this->session->unset_userdata('loginid');
		$this->session->unset_userdata('lldt');
		$this->session->set_flashdata('message','Successfully Logged Out');
		$this->load->view('Login');
	}

	public function sendSMS(){
		$numbers=$this->input->post('numbers[]');
		$message=$this->input->post('message');
	}


	public function category($id=NULL){
		$accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
		$datas['member']=$this->common_data_lib->memberDetails();

		
		$this->load->model("Welcome_model");
		$datas['categories'] = $this->Welcome_model->getAllData("category");

		if($id!=NULL){
			$condition=array('id'=>$id);
			$datas['category_detail'] = $this->Welcome_model->getdata("category",$condition)->row();
		}
			if($this->input->post()){
				$this->form_validation->set_rules('category_name',"",'trim|required',array('required'=>"Category Name is required Field"));
				$this->form_validation->set_error_delimiters('<p style="color:blue; font-size:10px; margin:0; padding:0;">', '</p>');

				if($this->form_validation->run()==false){
					$this->load->view('Category',$datas);
				}else{
					$inputData = array(
						'category_name'=>htmlspecialchars($this->input->post('category_name'))
					);
					
					if($this->input->post('id')!=NULL){
						$condition=array('id'=>$this->input->post('id'));
						$data = $this->Welcome_model->update("category",$inputData,$condition);

						if($data==1)
							$this->session->set_flashdata('message','Category Updated Successfully ...');
						else
							$this->session->set_flashdata('message','Category Updation Failed .... !');
					}else{
						$data = $this->Welcome_model->insert("category",$inputData);

						if($data==1)
							$this->session->set_flashdata('message','Category Created Successfully ...');
						else
							$this->session->set_flashdata('message','Category Creation Failed .... !');
					}

						redirect('welcome/Category');
				}
			}else{
				$this->load->view('Category',$datas);
			}	
	}

	public function msgSubmittedSuccessfully(){
		$datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
        $cart_products=$this->common_data_lib->getCartItems();
        $datas['cart_products']=$cart_products;

        $this->load->view('Msg_submitted_success',$datas);
	}

	
}
