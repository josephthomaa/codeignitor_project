<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payoff extends CI_Controller {
function __construct()
{
    parent::__construct();
    //$this->load->helper('url');
	$this->load->library ( 'session' );
	$this->load->library('pagination');
    $this->load->model('data_model');
	$config['base_url'] =  base_url().'payoff/page/';
	$config['total_rows'] =$this->data_model->record_count('payoff');
	$config['first_link'] = '1';
	$config['num_tag_open'] = '&nbsp;';
	$config['num_tag_close'] = '&nbsp;';
	$config['num_links'] = 2;
	$config['per_page'] = 20;
	$this->pagination->initialize($config);
}
public function page(){
	$no = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['po_list']=$this->data_model->get_all('payoff',20,$no);
	$data["links"] = $this->pagination->create_links();
    $this->load->view('payoff',$data);
}
public function add_new(){
    $data['roundNo']=$_POST['round'];
    $data['polose']=$_POST['loss'];
    $data['pogain']=$_POST['gain'];
    $data['edit']='0';
   
   $res=$this->data_model->insert($data,'payoff');
   if($res){
    
    header('location:'.base_url()."payoff/".$this->index());
    
    } 
}
public function edit($id){
    $data['po']=$this->data_model->get_details($id,'payoff');
    $this->load->view('edit_payoff',$data);
}
public function update(){
    $data['roundNo']=$_POST['roundNo'];
    $data['polose']=$_POST['polose'];
    $data['pogain']=$_POST['pogain'];
    $data['edit']='1';
    $res=$this->data_model->update($data,$_POST['Id'],'payoff');
    if($res){
        header('location:'.base_url()."payoff/".$this->index());
    }
    else{
        header('location:'.base_url()."payoff/".$this->index());
    }

}
public function delete($id){
    $res=$this->data_model->delete($id,'payoff');
    if($res){
          header('location:'.base_url()."payoff/".$this->index());
        
        } 
}
}
?>