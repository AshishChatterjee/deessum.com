<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
    }

    public function roundICandidates(){
        $accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();
        
        $candidates=$this->CRUDS_model->getdata("couple",array());
        $datas['candidates']=$candidates;
        $this->load->view("Candidate_list",$datas);
    }

    public function roundIICandidates(){
        $accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();
        
        $this->load->model("Candidate_model");

        $candidates=$this->Candidate_model->getRoundIICandidates();
        $datas['candidates']=$candidates;
        $this->load->view("CandidateRII_list",$datas);
    }

    public function roundIGroup(){
        $accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();

        $this->load->model("Candidate_model");
        $datas['groups']=$this->Candidate_model->groups();
        $datas['game_status']=$this->CRUDS_model->getdata("game_status",array())->row();

        $this->load->view("Group_list",$datas);
    }

    public function roundIIGroup(){
        $accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();

        $this->load->model("Candidate_model");
        $datas['groups']=$this->Candidate_model->groupsRII();
        $datas['game_status']=$this->CRUDS_model->getdata("game_status",array())->row();

        $this->load->view("Group_listRII",$datas);
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
                    "address"=>$d_row->address
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

    public function activeGroupRICouplesList(){
        $accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();

        $game_status=$this->CRUDS_model->getdata("game_status",array())->row();
        $group=$game_status->grp;

        $couples=$this->CRUDS_model->getdata("couple",array("grp"=>$group));

        $datas['candidates']=$couples;

        $this->load->view("Candidate_listRI_auto_refresh",$datas);
    }

    public function activeGroupRIICouplesList(){
        $accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();

        $game_status=$this->CRUDS_model->getdata("game_status",array())->row();
        $group=$game_status->grp;

        $this->load->model("Candidate_model");

        $candidates=$this->Candidate_model->getRoundIICandidates($group);

        $datas['candidates']=$candidates;

        $this->load->view("Candidate_listRII_auto_refresh",$datas);
    }

    public function declareFirstRoundResult($group=null){

        $accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();

        $this->load->model("Candidate_model");

        $answers=$this->Candidate_model->getFirstRoundAns($group);

        $i=1;
        foreach($answers->result() as $ans){
            $question=$this->CRUDS_model->getdata("question",array("id"=>$ans->qid));

            if($i<=8){
                if($ans->ans==$question->row()->ans){
                    $couple_id=$ans->candidate;
                    $this->CRUDS_model->update("couple",array("r1_at"=>$ans->at,"r1_ans_res"=>TRUE),array("id"=>$couple_id));
                    
                    $existence_data=$this->CRUDS_model->getdata("sr_couples",array("couple"=>$ans->candidate));
                    if(!$existence_data->num_rows()>0){
                        $this->CRUDS_model->insert("sr_couples",array("couple"=>$ans->candidate));
                    }
                    $i++;
                }else{
                    $couple_id=$ans->candidate;
                    $this->CRUDS_model->update("couple",array("r1_at"=>$ans->at,"r1_ans_res"=>FALSE),array("id"=>$couple_id));
                }
            }else{
                if($ans->ans==$question->row()->ans){
                    $couple_id=$ans->candidate;
                    $this->CRUDS_model->update("couple",array("r1_at"=>$ans->at,"r1_ans_res"=>TRUE),array("id"=>$couple_id));
                }else{
                    $couple_id=$ans->candidate;
                    $this->CRUDS_model->update("couple",array("r1_at"=>$ans->at,"r1_ans_res"=>FALSE),array("id"=>$couple_id));
                }
            }
        }
        $couples=$this->CRUDS_model->getdata("couple",array("grp"=>$group),"r1_at","ASC");
        foreach($couples->result() as $couple){
            $ans=$this->CRUDS_model->getdata("fr_ans",array("candidate"=>$couple->id));
            if($ans->num_rows()>0){
                $couple->ans_timing=$ans->row()->at;
            }else{
                $couple->ans_timing="NA";
            }

            $sr_couple=$this->CRUDS_model->getdata("sr_couples",array("couple"=>$couple->id));
            if($sr_couple->num_rows()>0){
                $couple->selected=TRUE;
            }else{
                $couple->selected=FALSE;
            }
        }

        $datas['couples']=$couples;
        $this->load->view("First_round_result",$datas);
    }

    public function declareSecondRoundResult($group=null){

        $accesses=[1]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();

        $this->load->model("Candidate_model");

        $candidates=$this->Candidate_model->getRoundIICandidates($group);

        foreach($candidates->result() as $couple){
            $sr_ans=$this->CRUDS_model->getdata("sr_ans",array("candidate"=>$couple->id));
            $i=0;
            $tat=0;
            foreach($sr_ans->result() as $ans){
                if($ans->ans==$ans->mans && $ans->ans!=0 && $ans->mans!=0){
                    $i++;
                    $tat=$tat+$ans->tat;
                }
            }

            $couple->points=$i;
            $couple->tat=$tat;
            $exist_data=$this->CRUDS_model->getdata("sr_res",array("couple"=>$couple->id));
            if($exist_data->num_rows()>0){
                $this->CRUDS_model->update("sr_res",array("points"=>$i,"tat"=>$tat,"grp"=>$couple->grp),array("couple"=>$couple->id));
            }else{
                $this->CRUDS_model->insert("sr_res",array("couple"=>$couple->id,"points"=>$i,"tat"=>$tat,"grp"=>$couple->grp));
            }
        }

        $this->load->model("Candidate_model");
        $datas['couples']=$this->Candidate_model->secondRoundResultOfGroup($group);
        $this->load->view("Second_round_result",$datas);
    }

    public function assignGroupRIIC(){
        $this->load->model("Candidate_model");
        $candidates=$this->Candidate_model->getRoundIICandidates();
        $i=0;
        foreach($candidates->result() as $candidate){
            $groups=["G1","G2","G3","G4","G5"];
            $this->CRUDS_model->update("sr_couples",array("grp"=>$groups[$i]),array("couple"=>$candidate->id));
            $i++;
            if($i>4){ $i=0; }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function liveStatusRII(){
        $question=$this->CRUDS_model->getdata("question",array("round"=>"ROUND2","active"=>TRUE));

        if($question->num_rows()>0){
            $datas['question']=$question->row();
            $game_status=$this->CRUDS_model->getdata("game_status",array());
            $group=$game_status->row()->grp;

            $this->load->model("Candidate_model");

            $candidates=$this->Candidate_model->getRoundIICandidates($group);
            foreach($candidates->result() as $couple){
                $ans=$this->CRUDS_model->getdata("sr_ans",array("candidate"=>$couple->id,"qid"=>$question->row()->id));
                if($ans->num_rows()>0){
                    if($ans->row()->ans!=0){
                        if($ans->row()->ans==1){
                            $couple->ans=$question->row()->option1;
                        }else if($ans->row()->ans==2){
                            $couple->ans=$question->row()->option2;
                        }else if($ans->row()->ans==3){
                            $couple->ans=$question->row()->option3;
                        }else if($ans->row()->ans==4){
                            $couple->ans=$question->row()->option4;
                        }
                    }
                    if($ans->row()->mans!=0){
                        if($ans->row()->mans==1){
                            $couple->mans=$question->row()->option1;
                        }else if($ans->row()->mans==2){
                            $couple->mans=$question->row()->option2;
                        }else if($ans->row()->mans==3){
                            $couple->mans=$question->row()->option3;
                        }else if($ans->row()->mans==4){
                            $couple->mans=$question->row()->option4;
                        }
                    }
                    $couple->avg_at=$ans->row()->tat;
                }
            }
            $datas['candidates']=$candidates;
            $this->load->view("Live_status",$datas);
        }else{
            echo "DISTROYED";
        }
    }

    public function finalist(){
        $this->load->model("Candidate_model");
        $groups=$this->Candidate_model->groupsRII();
        foreach($groups->result() as $group){
            $candidates=$this->Candidate_model->secondRoundResultOfGroup($group->grp);
            // echo "<pre>";
            // print_r($candidates->result());
            // echo "</pre>";
            // die();
            $i=0;
            foreach($candidates->result() as $couple){
                if($i<4){
                    $i++;
                    $existence=$this->CRUDS_model->getdata("finalist",array("couple"=>$couple->id));
                    if(!$existence->num_rows()>0){
                        $this->CRUDS_model->insert("finalist",array("couple"=>$couple->id,"points"=>$couple->points,"tat"=>$couple->tat,"grp"=>$couple->grp));
                    }
                }
            }
        }

        $candidates=$this->Candidate_model->getFinalist();
        $datas['couples']=$candidates;
        $this->load->view("Finallist",$datas);
    }

    public function upload_image(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $DefaultId = 0;
        
            $ImageData = $_POST['image_path'];
            
            $ImageName = $_POST['image_name'];
        
            $GetOldIdSQL ="SELECT id FROM UploadImageToServer ORDER BY id ASC";
            
            $Query = mysqli_query($conn,$GetOldIdSQL);
            
            while($row = mysqli_fetch_array($Query)){
            
            $DefaultId = $row['id'];
        }
        
        $ImagePath = "images/$DefaultId.png";
        
        $ServerURL = "https://androidjsonblog.000webhostapp.com/$ImagePath";
        
        $InsertSQL = "insert into UploadImageToServer (image_path,image_name) values ('$ServerURL','$ImageName')";
        
        if(mysqli_query($conn, $InsertSQL)){
       
        file_put_contents($ImagePath,base64_decode($ImageData));
       
        echo "Your Image Has Been Uploaded.";
        }
        
        mysqli_close($conn);
        }else{
        echo "Not Uploaded";
        }
    }
}