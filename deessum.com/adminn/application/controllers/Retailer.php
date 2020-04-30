<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retailer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function retailerList(){
        $accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();
        
        $this->load->model("Customer_model");
		$datas['retailers']=$this->CRUDS_model->getdata("retailer",array("flag"=>TRUE));
		$this->load->view("Retailer_list",$datas);
    }

   

    public function retailer($id=null,$mode=null){
		$accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
		$datas['member']=$this->common_data_lib->memberDetails();

		if($mode==null){
            $datas['mode']=$this->input->post( "mode");
        }else{
            $datas['mode']=$mode;
        }
        if($id!=NULL && $mode=="EDiT"){

            $retailer= $this->CRUDS_model->getdata("retailer",array('id'=>$id))->row();
            $datas['retailer'] =$retailer;
        }
        
		
		if($this->input->post()){
			$this->form_validation->set_rules('name',"",'trim|required',array('required'=>"Retailer name is missing"));
			$this->form_validation->set_rules('mobile',"",'trim|required',array('required'=>"Mobil number is missing "));
			$this->form_validation->set_rules('email',"",'trim|required',array('required'=>"Email is missing "));
			$this->form_validation->set_rules('address',"",'trim|required',array('required'=>"Address is missing"));
            $this->form_validation->set_rules('password',"",'trim|required',array('required'=>"Password is missing"));
            
            $this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; padding:0;" class="normal-text-bold">', '</span>');
            
			if($this->form_validation->run()==false){
                $this->load->view('Retailer',$datas);
            }else{
                
				$inputData = array(
                    'name'=>htmlspecialchars($this->input->post('name')),
                    'email'=>htmlspecialchars($this->input->post('email')),
                    'username'=>htmlspecialchars($this->input->post('email')),
                    'mobile'=>htmlspecialchars($this->input->post('mobile')),
                    'password'=>htmlspecialchars($this->input->post('password')),
                    'address'=>htmlspecialchars($this->input->post('address')),
                );

                if($this->input->post('id')!=null && $this->input->post('mode')=="EDiT"){
                    $condition=array('id'=>$this->input->post('id'));
                    $data = $this->CRUDS_model->update("retailer",$inputData,$condition);

                    if($data==1)
                        $this->session->set_flashdata('message','Retailer detail updated successfully ');
                    else
                        $this->session->set_flashdata('message','Retailer detail updation failed');

                        redirect(base_url('product/product/'));
                }else{
					$inputData['c_dt']=date('Y-m-d h:i:s');
                    $id = $this->CRUDS_model->insertGetBackID("retailer",$inputData);

                    if($id!=0){
                        $this->CRUDS_model->insert("retailer_access",array("retailer_id"=>$id,"access"=>7));
                        $this->session->set_flashdata('message','Retailer created successfully');
                    }
                    else
                        $this->session->set_flashdata('message','Retailer creation failed');

                    redirect(base_url('retailer/retailer/'));
                }
            }
		}else{
			$this->load->view('Retailer',$datas);
		}
    }


}