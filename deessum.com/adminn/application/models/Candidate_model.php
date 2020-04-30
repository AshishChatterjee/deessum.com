<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate_model extends CI_Model{


	public function __construct(){
		$this->load->database();
	}

	public function groups($group=null){
        $this->db->distinct();
        $this->db->select('grp');
        $this->db->from("couple");
        return $this->db->get();
    }
    
	public function groupsRII($group=null){
        $this->db->distinct();
        $this->db->select('grp');
        $this->db->from("sr_couples");
        return $this->db->get();
	}

	public function getFirstRoundAns($roup){
		$this->db->select('a.*');
        $this->db->from("fr_ans a");
        $this->db->join('couple c', 'a.candidate=c.id', 'left');
        $this->db->where('c.grp',$roup);
        $this->db->order_by('a.at',"ASC");
        return $this->db->get();
    }

    public function getRoundIICandidates($group=null){
        $this->db->select('c.*, src.grp grp, src.login');
        $this->db->from("sr_couples src");
        $this->db->join('couple c', 'src.couple=c.id', 'left');
        if($group!=null){
            $this->db->where("src.grp",$group);
        }
        $this->db->order_by('src.id',"ASC");
        return $this->db->get();
    }
    
    public function getSecondRoundAns(){
		$this->db->select('c.*');
        $this->db->from("round_two_points a");
        $this->db->join('couple c', 'a.couple=c.id', 'left');
        $this->db->order_by('a.point',"DESC");
        return $this->db->get();
    }

    public function getCouplesOfSecondRoundWithPoints($group){
        $this->db->select('c.*, src.grp grp, src.login, sr.points points');
        $this->db->from("sr_res sr");
        $this->db->join('sr_couples src', 'src.couple=sr.couple', 'left');
        $this->db->join('couple c', 'src.couple=c.id', 'left');
        if($group!=null){
            $this->db->where("src.grp",$group);
        }
        $this->db->order_by('sr.points',"DESC");
        return $this->db->get();
    }

    public function getFinalist(){
        $this->db->select('c.*, f.points, f.tat, f.grp');
        $this->db->from("finalist f");
        $this->db->join('couple c', 'f.couple=c.id', 'left');
        return $this->db->get();
    }

    public function secondRoundCandidate($mobile,$grp){
        $this->db->select('c.*, src.grp grp, src.login');
        $this->db->from("sr_couples src");
        $this->db->join('couple c', 'src.couple=c.id', 'left');
        $this->db->where("c.mobile",$mobile);
        $this->db->where("src.grp",$grp);
        return $this->db->get();
    }

    public function secondRoundResultOfGroup($grp){
        $this->db->select('c.*, sr.points, sr.tat, sr.grp');
        $this->db->from("sr_res sr");
        $this->db->join('couple c', 'sr.couple=c.id', 'left');
        $this->db->where("sr.grp",$grp);
        $this->db->order_by("sr.points","DESC");
        $this->db->order_by("sr.tat","ASC");
        return $this->db->get();
    }
}