<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
function __construct()
{
    parent::__construct();
    //$this->load->helper('url');
	 $this->load->library ( 'session' );
    $this->load->model('data_model');
}
public function index(){
    $data['exp']=$this->data_model->get_all('tblexperiment',0,0);
    $data['hholds']=$this->data_model->get_all('tblhousehold',0,0);
    $data['po']=$this->data_model->get_all('payoff',0,0);
    $data['users']=$this->data_model->get_all('tbluser',0,0);
    $this->load->view('dashboard',$data);
}

}
?>