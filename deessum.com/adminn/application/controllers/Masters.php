<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masters extends CI_Controller {

	public function __construct(){
		parent::__construct();
    }

    public function product($id=null,$mode=null){
		$accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
		$datas['member']=$this->common_data_lib->memberDetails();

		if($mode==null){
            $datas['mode']=$this->input->post( "mode");
        }else{
            $datas['mode']=$mode;
        }
        if($id!=NULL && $mode=="EDiT"){
            $product= $this->CRUDS_model->getdata("product",array('id'=>$id))->row();
            $datas['product'] =$product;
		}		

		if($this->input->post()){
            $this->form_validation->set_rules('name',"",'trim|required',array('required'=>"Missing name"));
            $this->form_validation->set_rules('keyword',"",'trim|required',array('required'=>"Missing keyword"));

			$this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; padding:0;" class="normal-text-bold moon-quill">', '</span>');
			
			if($this->form_validation->run()==false){                
                $this->load->view('Product',$datas);
            }else{
                $cdt=date("Y-m-d h:i:s");
				$inputData = array(
                    'name'=>htmlspecialchars($this->input->post('name')),
                    'keyword'=>$this->input->post('keyword')
                );

                if($this->input->post('id')!=null && $this->input->post('mode')=="EDiT"){
                    $condition=array('id'=>$this->input->post('id'));
                    $data = $this->CRUDS_model->update("product",$inputData,$condition);

                    if($data==1)
                        $this->session->set_flashdata('message','<span class="icon-security-on"></span>Services category updated successful ... ');
                    else
                        $this->session->set_flashdata('message','Services category updation failed ... ');

                        redirect(base_url('masters/productList'));
                }else{
                    $inputData['cdt']=date('Y-m-d h:i:s');
                    $data = $this->CRUDS_model->insert("product",$inputData);

                    if($data==1)
                        $this->session->set_flashdata('message','<span class="icon-security-on"></span>Service category added successfully');
                    else
                        $this->session->set_flashdata('message','Service category addition failed');

                    redirect(base_url('masters/productList'));
                }
            }
		}else{
			$this->load->view('Product',$datas);
		}
    }

    public function productList(){
		$accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();
        
		$datas['products']=$this->CRUDS_model->getdata('product',array('flag'=>TRUE));
		$this->load->view("Product_list",$datas);
    }

    public function engineer($id=null,$mode=null){
		$accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
		$datas['member']=$this->common_data_lib->memberDetails();

		if($mode==null){
            $datas['mode']=$this->input->post( "mode");
        }else{
            $datas['mode']=$mode;
        }
        if($id!=NULL && $mode=="EDiT"){
            $engineer= $this->CRUDS_model->getdata("engineer",array('id'=>$id))->row();
            $datas['engineer'] =$engineer;
		}		

		if($this->input->post()){
            $this->form_validation->set_rules('name',"",'trim|required',array('required'=>"Missing name"));
            $this->form_validation->set_rules('email',"",'trim|required',array('required'=>"Missing email"));
            $this->form_validation->set_rules('mobile',"",'trim|required',array('required'=>"Missing mobile"));
            $this->form_validation->set_rules('address',"",'trim|required',array('required'=>"Missing address"));

			$this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; padding:0;" class="normal-text-bold moon-quill">', '</span>');
			
			if($this->form_validation->run()==false){                
                $this->load->view('Engineer',$datas);
            }else{
				$inputData = array(
                    'name'=>htmlspecialchars($this->input->post('name')),
                    'email'=>htmlspecialchars($this->input->post('email')),
                    'mobile'=>htmlspecialchars($this->input->post('mobile')),
                    'address'=>htmlspecialchars($this->input->post('address'))
                );



                if($this->input->post('id')!=null && $this->input->post('mode')=="EDiT"){
                    $condition=array('id'=>$this->input->post('id'));
                    $data = $this->CRUDS_model->update("engineer",$inputData,$condition);

                    if($data==1)
                        $this->session->set_flashdata('message','<span class="icon-security-on"></span>Employee detail updated successfully');
                    else
                        $this->session->set_flashdata('message','Updation error ..');

                        redirect(base_url('masters/engineerList'));
                }else{
                    $inputData['cdt']=date('Y-m-d h:i:s');
                    $data = $this->CRUDS_model->insert("engineer",$inputData);

                    if($data==1)
                        $this->session->set_flashdata('message','<span class="icon-security-on"></span>Employee joining successfull ...');
                    else
                        $this->session->set_flashdata('message','Joining error ...');

                    redirect(base_url('masters/engineerList'));
                }
            }
		}else{
			$this->load->view('Engineer',$datas);
		}
    }

    public function engineerList(){
		$accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();
        
		$datas['engineers']=$this->CRUDS_model->getdata('engineer',array('flag'=>TRUE));
		$this->load->view("Engineer_list",$datas);
    }
    
}