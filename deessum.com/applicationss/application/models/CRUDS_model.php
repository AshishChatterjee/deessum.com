<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUDS_model extends CI_Model{


	public function __construct()
	{
		$this->load->database();
    }

    public function insert($table,$data){
        return $this->db->insert($table,$data);
    }

    function insertGetBackID($table,$data){
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    function max($table,$col,$condition){
        $this->db->select('max('.$col.') as maxid');
        $this->db->from($table);
        $this->db->where($condition);
        return $this->db->get();
    }

    public function getAllData($table){
        return $this->db->get($table);
    }

    public function getdata($table,$condition,$ordercol=null,$order=null){
        $fields = array_keys($condition);
        foreach ($fields as $field) {
            $this->db->where($field,$condition[$field]);
        }
        if($ordercol!=null){
            if($order!=null){
                $this->db->order_by($ordercol,$order);
            }else{
                $this->db->order_by($ordercol,"ASC");
            }
        }
    	return $this->db->get($table);
    }

    public function update($table,$data,$condition){
        $fields = array_keys($condition);
        foreach ($fields as $field) {
            $this->db->where($field,$condition[$field]);
        }
        return $this->db->update($table,$data);
    }

    public function deleteById($table,$id){
        return $this->db->delete($table,array('id'=>$id));
    }
    public function deleteWhere($table,$condition){
        $this->db->where($condition);
        return $this->db->delete($table);
    }

    // public function count($table,$condition){
    //     $fields = array_keys($condition);
    //     foreach ($fields as $field) {
    //         $this->db->where($field,$condition[$field]);
    //     }
    //     $data=$this->db->get($table);
    //     return $data->num_rows();
    // }
    public function count($table,$condition){
        $this->db->where($condition);
        return $this->db->count_all_results($table);
    }

    public function sum($table,$col,$condition){
        $this->db->select_sum($col);
        $this->db->from($table);
        $this->db->where($condition);
        return $this->db->get();
    }

    public function count_ft($table,$condition){
        $this->db->where($condition);
        return $this->db->count_all_results($table);
    }
}