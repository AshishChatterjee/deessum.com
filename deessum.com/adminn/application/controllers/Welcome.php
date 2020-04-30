<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('Login');
	}

	public function Login(){
		
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

	
}
