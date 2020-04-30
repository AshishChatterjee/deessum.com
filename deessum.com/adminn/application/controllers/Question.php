<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
    }

    public function question($id=null,$mode=null){
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
            $question= $this->CRUDS_model->getdata("question",array('id'=>$id))->row();
            $datas['question'] =$question;
		}		

		if($this->input->post()){
            $this->form_validation->set_rules('question',"",'trim|required',array('required'=>"Question Missing"));
            $this->form_validation->set_rules('option1',"",'trim|required',array('required'=>"Missing"));
            $this->form_validation->set_rules('option2',"",'trim|required',array('required'=>"Missing"));
            $this->form_validation->set_rules('option3',"",'trim|required',array('required'=>"Missing"));
            $this->form_validation->set_rules('option4',"",'trim|required',array('required'=>"Missing"));
            $this->form_validation->set_rules('ans',"",'trim|required',array('required'=>"Missing name"));
            $this->form_validation->set_rules('round',"",'trim|required',array('required'=>"Round is missing"));

			$this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; padding:0;" class="normal-text-bold moon-quill">', '</span>');
			
			if($this->form_validation->run()==false){                
                $this->load->view('Question',$datas);
            }else{
                $cdt=date("Y-m-d h:i:s");
				$inputData = array(
                    'question'=>$this->input->post('question'),

                    'option1'=>$this->input->post('option1'),
                    'option2'=>$this->input->post('option2'),
                    'option3'=>$this->input->post('option3'),
                    'option4'=>$this->input->post('option4'),

                    'round'=>htmlspecialchars($this->input->post('round')),
                    'ans'=>htmlspecialchars($this->input->post('ans'))
                );

                if($this->input->post('id')!=null && $this->input->post('mode')=="EDiT"){
                    $condition=array('id'=>$this->input->post('id'));
                    $data = $this->CRUDS_model->update("question",$inputData,$condition);

                    if($data==1)
                        $this->session->set_flashdata('message','<span class="icon-security-on"></span>Services category updated successful ... ');
                    else
                        $this->session->set_flashdata('message','Services category updation failed ... ');
                }else{
                    $data = $this->CRUDS_model->insert("question",$inputData);

                    if($data==1)
                        $this->session->set_flashdata('message','<span class="icon-security-on"></span>Service category added successfully');
                    else
                        $this->session->set_flashdata('message','Service category addition failed');
                }

                if($this->input->post("round")=="ROUND1"){
                    redirect(base_url('question/round1QuestionList'));
                }else{
                    redirect(base_url('question/round2QuestionList'));
                }
            }
		}else{
			$this->load->view('Question',$datas);
		}
    }

    public function questionProfile($id=null){
        $accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();
        
        if($id!=null){
            $datas['question']=$this->CRUDS_model->getdata("question",array("id"=>$id))->row();
            $this->load->view("Question_profile",$datas);
        }else{
            redirect($_SESSION['HTTP_REFERER']);
        }
    }

    public function round1QuestionList(){
        $accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();
        
        $frqs=$this->CRUDS_model->getdata("question",array("round"=>"ROUND1"));
        $datas['questions']=$frqs;
        $this->load->view("Question_list",$datas);
    }

    public function round2QuestionList(){
        $accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();
        
        $frqs=$this->CRUDS_model->getdata("question",array("round"=>"ROUND2"));
        $datas['questions']=$frqs;
        $this->load->view("Question_list",$datas);
    }


    public function activateQuestion($qid=null){
        if($qid!=null){
            $this->CRUDS_model->update("question",array("active"=>FALSE),array());
            $this->CRUDS_model->update("question",array("active"=>TRUE,"o_active"=>FALSE),array("id"=>$qid));
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function deactivateQuestion($qid=null){
        if($qid!=null){
            $this->CRUDS_model->update("question",array("active"=>FALSE,"o_active"=>FALSE),array("id"=>$qid));
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function showQuestionOption($qid=null){
        if($qid!=null){
            $this->CRUDS_model->update("question",array("qo_active"=>TRUE),array("id"=>$qid));
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function showAnswerOption($qid=null){
        if($qid!=null){
            $this->CRUDS_model->update("question",array("o_active"=>TRUE),array("id"=>$qid));
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function activate_srq($srq_id=null){
        if($srq_id!=null){
            $this->CRUDS_model->update("second_round_question",array("active"=>FALSE),array());
            $this->CRUDS_model->update("second_round_question",array("active"=>TRUE),array("id"=>$srq_id));
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    
}