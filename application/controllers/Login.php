<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
function __construct()
{
    parent::__construct();
    //$this->load->helper('url');
    $this->load->library ( 'session' );
    $this->load->model('data_model');
}
public function index(){
    $this->load->view('login/login');
}
public function check_login(){
   
    $data['username']=htmlspecialchars($_POST['name']);
    $data['password']=htmlspecialchars($_POST['pwd']);
	$res=$this->data_model->islogin($data);
    if($res){   
		$this->session->set_userdata('id',$data['username']);	
      echo base_url()."dashboard/";
    }
    else{
       echo 0;
    } 
}
public function logout(){
    $this->session->sess_destroy();
    header('location:'.base_url()."login/".$this->index());
    
}
}
?>