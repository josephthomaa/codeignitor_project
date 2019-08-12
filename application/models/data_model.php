<?php
class data_model extends CI_Model {
function __construct()
{
    parent::__construct();
    $this->load->database();
}

public function islogin($data){
    $query=$this->db->get_where('tbluser',array('uname'=>$data['username'],'upwd'=>$data['password']));
    return $query->num_rows();
}

public function record_count($table) {
        return $this->db->count_all($table);
    }
// function to fetch all data
public function get_all($table,$limit, $start){
	$this->db->limit($limit, $start);
    $query=$this->db->get($table);
    return $query->result();
}
// function to insert data
public function insert($data,$table){
    return $this->db->insert($table,$data);
}
// function to get a detail
public function get_details($id,$table){
    $query=$this->db->get_where($table,array('id'=>$id));
    return $query->row_array();
}
public function get_exp_details($id,$table){
    $query=$this->db->get_where($table,array('intexperimentid'=>$id));
    return $query->row_array();
}
//function to update
public function update($data,$id,$table){
    $this->db->where($table.'.id',$id);
    return $this->db->update($table,$data);
}
// function to delete
public function delete($id,$table){
    $this->db->where($table.'.id',$id);
    return $this->db->delete($table);
}
// get game results 
public function game_details($id,$table){
    $query=$this->db->get_where($table,array('intexperimentid'=>$id));
    $result= $query->result();
   return $result;
}


}
?>