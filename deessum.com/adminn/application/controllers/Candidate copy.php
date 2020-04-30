<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
    }

    public function candidateList(){
        $accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();
        
        $candidates=$this->CRUDS_model->getdata("couple",array());
        $datas['candidates']=$candidates;
        $this->load->view("Candidate_list",$datas);
    }

    public function groups(){
        $accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();

        $this->load->model("Candidate_model");
        $datas['groups']=$this->Candidate_model->groups();
        $datas['game_status']=$this->CRUDS_model->getdata("game_status",array())->row();

        $this->load->view("Group_list",$datas);
    }

    public function active_group($grp=null){
        if($grp!=null){
            $this->CRUDS_model->update("game_status",array("grp"=>$grp),array());
            // $this->CRUDS_model->update("couple",array("login"=>FALSE),array());
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function deleteCouple($id=null){
        if($id!=null){
            $d_couple=$this->CRUDS_model->getdata("couple",array("id"=>$id));
            if($d_couple->num_rows()>0){
                $d_row=$d_couple->row();
                $this->CRUDS_model->deleteWhere("couple",array("id"=>$id));
                $idata=array(
                    "husband_name"=>$d_row->husband_name,
                    "wife_name"=>$d_row->wife_name,
                    "mobile"=>$d_row->mobile,
                    "password"=>$d_row->password,
                    "address"=>$d_row->address,
                    "round"=>$d_row->round
                );

                $this->CRUDS_model->insert("couple",$idata);

                $i=1;
                $counter=1;
                $group="G1";
                $couples=$this->CRUDS_model->getdata("couple",array());
                foreach($couples->result()as $couple){
                    if($counter==17){
                        $counter=1;
                        $i++;
                        $group="G".$i;
                    }
                    $counter++;
                    $udata=array("grp"=>$group);
                    $this->CRUDS_model->update("couple",$udata,array("id"=>$couple->id));
                }


                redirect($_SERVER['HTTP_REFERER']);
            }else{
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function rounds(){
        $accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();

        $this->load->model("Candidate_model");
        $datas['rounds']=$this->CRUDS_model->getdata("round_status",array());

        $this->load->view("Round_list",$datas);
    }

    public function active_round($round=null){
        if($round!=null){
            $condition=array('round'=>$round);
            $this->CRUDS_model->update("round_status",array("active"=>FALSE),array());
            $this->CRUDS_model->update("round_status",array("active"=>TRUE),$condition);
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function activeGroupCouplesList(){
        $accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();

        $game_status=$this->CRUDS_model->getdata("game_status",array())->row();
        $group=$game_status->grp;

        $couples=$this->CRUDS_model->getdata("couple",array("grp"=>$group));

        $datas['candidates']=$couples;

        $this->load->view("Candidate_list_auto_refresh",$datas);
    }

    public function declareFirstRoundResult(){

        $accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();


        $group_data=$this->CRUDS_model->getdata("game_status",array());
        $group=$group_data->row()->grp;

        $this->load->model("Candidate_model");
        if($round_data->num_rows()>0){
            $round="ROUND1";
            if($round=="ROUND1"){
                $answers=$this->Candidate_model->getFirstRoundAns($group);

                $i=1;
                foreach($answers->result() as $ans){
                    $question=$this->CRUDS_model->getdata("question",array("id"=>$ans->qid));
                    if($i<=8){
                        if($ans->ans==$question->row()->ans){
                            $couple_id=$ans->candidate;
                            $this->CRUDS_model->update("couple",array("round"=>"ROUND2"),array("id"=>$couple_id));
                            $i++;
                        }
                    }else{
                        break;
                    }
                }
                $couples=$this->CRUDS_model->getdata("couple",array("grp"=>$group),"round","DESC");
                $datas['couples']=$couples;
                $this->load->view("First_round_result",$datas);
            }else if($round=="ROUND2"){
                $couples=$this->CRUDS_model->getdata("couple",array("grp"=>$group,"round"=>"ROUND2"));
                foreach($couples->result() as $couple){
                    $couple_id=$couple->id;
                    $answers=$this->CRUDS_model->getdata("sr_ans",array("candidate"=>$couple_id));
                    $i=0;
                    foreach($answers->result() as $answer){
                        if($answer->ans==$answer->mans){
                            $i++;
                        }
                    }
                    $point=$this->CRUDS_model->getdata("round_two_points",array("couple"=>$couple->id));
                    if($point->num_rows()>0){
                        $this->CRUDS_model->update("round_two_points",array("point"=>$i),array("couple"=>$couple->id));
                    }else{
                        $this->CRUDS_model->insert("round_two_points",array("couple"=>$couple->id,"point"=>$i,"grp"=>$group));
                    }

                }

                $winners=$this->CRUDS_model->getdata("round_two_points",array("grp"=>$group),"point","DESC");
                $counter=0;
                foreach($winners->result() as $winner){
                    if($i<4){
                        $udata=array("round"=>"ROUND3");
                        $this->CRUDS_model->update("round_two_points",$udata,array("couple"=>$winner->couple));
                        $this->CRUDS_model->update("couple",$udata,array("id"=>$winner->couple));
                        $i++;
                    }else{
                        break;
                    }

                }

                $couples=$this->CRUDS_model->getdata("couple",array("grp"=>$group,"round!="=>"ROUND1"),"round","DESC");
                $datas['couples']=$couples;
                $this->load->view("Second_round_result",$datas);

            }
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}