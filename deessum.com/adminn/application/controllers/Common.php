<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	
	public function delete($table=null,$id=NULL){
		$accesses=[5];
		$acc=$this->chk_access_lib->getInfoAccess($accesses);
		if($acc){
			$this->load->model("CRUDS_model");
			if($id!=NULL){
				$data=$this->CRUDS_model->update($table,array("flag"=>0),array("id"=>$id));
				if($data==1)
					$this->session->set_flashdata('message','Deletion Successfully ...');
				else
					$this->session->set_flashdata('message','Deletion Failed .... !');

			}
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->load->view('Access_restricted');
		}
	}

	public function delete_with_image($table=null,$dir=null,$id=null){

		$accesses=[5];
		$acc=$this->chk_access_lib->getInfoAccess($accesses);
		if($acc)
		{
			$this->load->model("CRUDS_model");
			$image=$this->CRUDS_model->getdata($table,array('id'=>$id))->row();
			$this->load->helper("file");
			$file="./$dir/".$image->image;
			if (is_readable($file) && unlink($file)) {
				$del_res="Old Img File Deleted";
			} else {
				$del_res="Old Img File Not Deleted";
			}
			$dr=$this->CRUDS_model->delete($table,$id);
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->load->view('Access_restricted');
		}
	}

	public function back(){
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function accesss_denied(){
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();
        $this->load->model("CRUDS_model");
		$this->load->view('Access_restricted',$datas);
	}

	public function logout(){
		$this->session->unset_userdata('loginid');
		$this->session->unset_userdata('lldt');
		$this->session->set_flashdata('message','Successfully Logged Out');
		$this->load->view('Login');
	}

	public function temp_delete_by_ajax(){
        $id=$this->input->post("id");
        $table=$this->input->post("table");
        $this->load->model("CRUDS_model");
        $count=$this->CRUDS_model->update($table,array("flag"=>FALSE),array("id"=>$id));
        if($count!=null){
            echo "DONE";
        }else{
            echo "UNDONE";
        }
	}

	public function restore(){
        $id=$this->input->post("id");
        $table=$this->input->post("table");
        $this->load->model("CRUDS_model");
        $count=$this->CRUDS_model->update($table,array("flag"=>TRUE),array("id"=>$id));
        if($count!=null){
            echo "DONE";
        }else{
            echo "UNDONE";
        }
	}
	
	public function sendingSMS(){
		$accesses=[7];
		$this->chk_access_lib->chkAccess($accesses);
		$datas=null;
		$datas['member']=$this->common_data_lib->memberDetails();

		$numbers=$this->input->post('numbers[]');
		$message=$this->input->post('message');

		$datas['numbers']=$numbers;
		$datas['message']=$message;

		$this->load->view('Sending_message',$datas);
	}

	public function sendMultipleSMS(){
		$numbers_str=$this->input->post('numbers');
		$message=$this->input->post('message');

		$encoded_msg=urlencode($message);

		$numbers=explode(',',ltrim($numbers_str, ','));
		foreach($numbers as $number){
			$url="http://sms.appdoor.in/API/WebSMS/Http/v1.0a/index.php?username=dewacl&password=dewacl&sender=DEWACL&to=".$number."&message=".$encoded_msg."&reqid=&format={json}&route_id=44&callback=#&unique=&sendondate=".date('d-m-yTh:i:s');
            file_get_contents($url);
		}
		echo "DONE";
	}

	public function change_blocked_status_to($to=null,$cid=null,$table=null){
		$accesses=[7]; // Universal Access
		$this->chk_access_lib->chkAccess($accesses);
		
        if($to!=null && $cid!=null && $table!=null){
            $updateData=array("blocked_status"=>$to);
            $updateCond=array("id"=>$cid);
            $this->CRUDS_model->update($table,$updateData,$updateCond);
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect(redirect($_SERVER['HTTP_REFERER']));
        }
	}
	
	public function change_verification_status_to($to=null,$cid=null,$table=null){
		$accesses=[7]; // Universal Access
		$this->chk_access_lib->chkAccess($accesses);
		
        if($to!=null && $cid!=null && $table!=null){
            $updateData=array("verification_status"=>$to);
            $updateCond=array("id"=>$cid);
            $this->CRUDS_model->update($table,$updateData,$updateCond);
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect(redirect($_SERVER['HTTP_REFERER']));
        }
    }
	public function change_flyash_availability_to($to=null,$fid=null,$table=null){
		$accesses=[7]; // Universal Access
		$this->chk_access_lib->chkAccess($accesses);
		
        if($to!=null && $fid!=null && $table!=null){
            $updateData=array("flyash_availability"=>$to);
            $updateCond=array("id"=>$fid);
            $this->CRUDS_model->update($table,$updateData,$updateCond);
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect(redirect($_SERVER['HTTP_REFERER']));
        }
	}
	
	public function updatePassword(){
		$accesses=[7]; // 6 TOTAL CONTROL ON MEMBER PANEL
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();

		if($this->input->post()){
			// $this->form_validation->set_rules('stock_name',"",'trim|required',array('required'=>"Book Stock Name"));
			$this->form_validation->set_rules('old',"",'trim|required',array('required'=>"Enter Old Password"));
			$this->form_validation->set_rules('new',"",'trim|required',array('required'=>"Enter New Password"));
			$this->form_validation->set_rules('conf',"",'trim|required',array('required'=>"Confirm Password"));

			$this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; padding:0;" class="normal-text-bold">', '</span>');
			
			if($this->form_validation->run()==false){
                $this->load->view('Password_update',$datas);
            }else{
				$newPsw=$this->input->post('new');
				$confPsw=$this->input->post('conf');
				if($newPsw!=$confPsw){
					$this->session->set_flashdata('message','New and confirm password did not match');
					redirect(base_url('common/updatePassword'));
				}
				$condition=array(
					'id'=>$this->session->userdata('loginid'),
					'password'=>$this->input->post('old')
				);
				$input=array('password'=>$newPsw);
				$chkData=$this->CRUDS_model->getdata('members',$condition);
				if($chkData->num_rows()){
					$this->CRUDS_model->update('members',$input,$condition);
					$this->session->set_flashdata('message','Password Updated Successfully');
				}else{
					$this->session->set_flashdata('message','Old Password Did Not Match');
				}
				redirect(base_url('common/updatePassword'));
                
            }
        }else{
            $this->load->view('Password_update',$datas);
        }
	}
}
