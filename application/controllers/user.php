<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
function __construct()
{
    parent::__construct();
    //$this->load->helper('url');
	$this->load->library ( 'session' );
	$this->load->library('pagination');
    $this->load->model('data_model');
	$config['base_url'] =  base_url().'user/page/';
	$config['total_rows'] =$this->data_model->record_count('tbluser');
	$config['first_link'] = '1';
	$config['num_tag_open'] = '&nbsp;';
	$config['num_tag_close'] = '&nbsp;';
	$config['num_links'] = 2;
	$config['per_page'] = 20;
	$this->pagination->initialize($config);
}
public function page(){
	$no = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['user_list']=$this->data_model->get_all('tbluser',20,$no);
	$data["links"] = $this->pagination->create_links();
    $this->load->view('users',$data);
}
public function add_new(){
    $data['uname']=$_POST['name'];
    $data['upwd']=$_POST['pwd'];
    $usertype=$_POST['role'];
    if($usertype==2){
        $data['urole']='Admin';
   }
   else if($usertype==3){
    $data['urole']='Interviewer';
   }
   else{
    $data['urole']='Supervisor';
   }
   $data['intusertype']=$usertype;
   
   $res=$this->data_model->insert($data,'tbluser');
   if($res){
    
    header('location:'.base_url()."index.php/user/".$this->index());
    
    } 
}
public function edit($id){
    $data['user']=$this->data_model->get_details($id,'tbluser');
    $this->load->view('edit_user',$data);
}
public function update(){
    $data['uname']=$_POST['uname'];
    $data['upwd']=$_POST['upwd'];
    $data['urole']=$_POST['urole'];
    $res=$this->data_model->update($data,$_POST['Id'],'tbluser');
    if($res){
        header('location:'.base_url()."index.php/user/".$this->index());
    }

}
public function delete($id){
    $res=$this->data_model->delete($id,'tbluser');
    if($res){
          header('location:'.base_url()."index.php/user/".$this->index());
        
        } 
}
}
?>