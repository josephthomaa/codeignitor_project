<?php
class api_model extends CI_Model {
		
function __construct()
{
    parent::__construct();
    $this->load->database();
}
// function to fetch all data
public function get_all($table){
    $query=$this->db->get($table);
    return $query->result();
}
// function to insert data
public function insert($data,$table){
    $this->db->insert($table,$data);
	$insert_id = $this->db->insert_id();
	return $insert_id;
	
}
// function to get a detail
public function get_details($id,$table){
    $query=$this->db->get_where($table,array('id'=>$id));
    return $query->row_array();
}
//function to update
public function update($data,$id,$table,$condition){
    $this->db->where($table.$condition,$id);
    return $this->db->update($table,$data);
}

// get game results 
public function game_details($id,$table){
    $query=$this->db->get_where($table,array('intexperimentid'=>$id));
    $result= $query->result();
   return $result;
}

}
?>