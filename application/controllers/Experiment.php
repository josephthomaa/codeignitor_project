<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Experiment extends CI_Controller {
function __construct()
{
    parent::__construct();
    //$this->load->helper('url');
	$this->load->library('pagination');
	$this->load->library ( 'session' );
    $this->load->model('data_model');
	$config['base_url'] =  base_url().'experiment/page/';
	$config['total_rows'] =$this->data_model->record_count('tblexperiment');
	$config['first_link'] = false;
	$config['num_tag_open'] = '&nbsp;';
	$config['num_tag_close'] = '&nbsp;';
	$config['num_links'] = 2;
	$config['per_page'] = 20;
	$this->pagination->initialize($config);

	
}

public function page(){
	$no = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	$data['exp']=$this->data_model->get_all('tblexperiment',20,$no);
	$data["links"] = $this->pagination->create_links();
    $this->load->view('experiments',$data);
}
public function view($id){
    $data['exp']=$this->data_model->get_exp_details($id,'tblexperiment');
    $expid=$data['exp']['intexperimentid'];
    $data['game']=$this->data_model->game_details($id,'tblgame');
    $this->load->view('viewexp',$data);
}
public function update(){
    $data['roundNo']=$_POST['roundNo'];
    $data['polose']=$_POST['polose'];
    $data['pogain']=$_POST['pogain'];
    $data['edit']='1';
    $res=$this->data_model->update($data,$_POST['Id'],'tblexperiment');
    if($res){
        header('location:'.base_url()."index.php/payoff/".$this->index());
    }
    else{
        header('location:'.base_url()."index.php/payoff/".$this->index());
    }

}
public function delete($id){
    $res=$this->data_model->delete($id,'tblexperiment');
    if($res){
          header('location:'.base_url()."index.php/payoff/".$this->index());
        
        } 
}
}
?>