<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Dhaka");
class Response {
    public $status = "";
    public $message  = "";
    public $data=array();
}
class API extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		//$this->load->helper('url');
		$this->load->library ( 'session' );
		$this->load->model('api_model');
		
	}

	public function getdata($type){
		
		if (isset($_SERVER['PHP_AUTH_USER']) && $_SERVER['PHP_AUTH_USER']=='api' &&  $_SERVER['PHP_AUTH_PW']=='lossaversion' ){
		if($type=='user'){
		$table='tbluser';
		}
		else if($type=='apiversion'){
		$table='tblmeta';
		}
		else if($type=='house'){
		$table='tblhousehold';
		}
		else if($type=='payoff'){
		$table='payoff';
		}
		else{
			$data=array();
			d_response(0,'Invalid Request',$data);die;
		}
		$data[]=$this->api_model->get_all($table);
		if($data){    
			d_response(1,'success',$data);die;
		}
		else{
			$data=array();
			d_response(0,'Error',$data);die;
		} 
		}
		else{
			http_response_code(401);
			$data=array();
			d_response(-1,'Authentication Failed',$data);die;
			
		}
    
	}
	public function updatedata(){
		$date=date("Y-m-d H:i:sa");	
		if (isset($_SERVER['PHP_AUTH_USER']) && $_SERVER['PHP_AUTH_USER']=='api' &&  $_SERVER['PHP_AUTH_PW']=='lossaversion' ){
		$jsonObj = json_decode(file_get_contents("php://input"), true);	
	
		$data=$jsonObj['data'];
		$game=$data[0]['game'];
		$intTotalItem =count($data);
		foreach($data as $i){
		$gameType=$i['gameType'];
		$householdId=$i['householdId'];
		$interviewerId=$i['interviewerId'];
		$otp=$i['otp'];
		if(!empty($otp)){
			$data2['stractive']='NO';
			$data2['strhouseid']=$householdId;
			$data2['intinterviewerid']=$interviewerId;	
			$res=$this->api_model->update($data2,$otp,'tblotp','.OTP');
			//$result=checkstatus($householdId);
			$result=0;
			if($result==0){
				$intTotalItem =count($i['game']);
				$addExp['strhhid']=$i['householdId'];
				$addExp['strgametype']=$i['gameType'];
				$addExp['dateTime']=$date;
				$addExp['strduration']=$i['duration'];
				$addExp['strlocation']=$i['location'];
				$addExp['intinterviewerid']=$i['interviewerId'];
				if(!empty($i['signatureBase64'])){
				$addExp['signatareurl']=base64_to_aws($i['signatureBase64'], $output_file2);
				}
				else{
				$addExp['signatareurl']="";
				}
				if(!empty($i['hhPhotoBase64'])){
				$addExp['hhurl']=base64_to_aws($i['hhPhotoBase64'], $output_file);
				}
				else{
				$addExp['hhurl']="";
				}
				$addExp['hhphotoaccept']=$i['mHHPhotoAcceptance'];
				$addExp['ttlamount']=$i['paymentAmt'];
				$addExp['strobservation']=$i['observations'];
				$addExp['strissues']=$i['issues'];
				$addExp['status']=$i['expStatus'];
				$id=$this->api_model->insert($addExp,'tblexperiment');
				
						
				foreach($i['game'] as $j){
					$insert_exe['strhhid']=$householdId;
					$insert_exe['strgametype']=$gameType;
					$insert_exe['introundno']=$j['round'];
					$insert_exe['strresult']=$j['result'];
					$insert_exe['intexperimentid']=$id;
					$this->api_model->insert($insert_exe,'tblgame');	
				}
				if($gameType=='real'){
					$data3['status']='1';
					$res=$this->api_model->update($data3,$householdId,'tblhousehold','.hhid');
				}
			}
		}
		
	//print_r($i['game']);
		}
		
	//	$data[]=$this->api_model->get_all($table);
		    
			d_response(1,'success',"");die;
		
		 
		}
		else{
			http_response_code(401);
			$data=array();
			d_response(-1,'Authentication Failed',$data);die;
			
		}
    
	}
	
}
 function d_response($status,$message,$data)
	{
		header('Content-type: application/json');
		$meta = new Response();
		$meta->status = $status;
		$meta->message  = $message;
		$meta->data  = $data;
		echo json_encode($meta);die;
	}
?>