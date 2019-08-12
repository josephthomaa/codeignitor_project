<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class House extends CI_Controller {
function __construct()
{
    parent::__construct();
    //$this->load->helper('url');
	$this->load->library ( 'session' );
	$this->load->library('pagination');
	$this->load->library('excel');
	
    $this->load->model('data_model');
	$config['base_url'] =  base_url().'house/page/';
	$config['total_rows'] =$this->data_model->record_count('tblhousehold');
	$config['first_link'] = '1';
	$config['num_tag_open'] = '&nbsp;';
	$config['num_tag_close'] = '&nbsp;';
	$config['num_links'] = 2;
	$config['per_page'] = 20;
	$this->pagination->initialize($config);
}
public function page(){
	$no = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['house_list']=$this->data_model->get_all('tblhousehold',10,$no);
	$data["links"] = $this->pagination->create_links();
    $this->load->view('houses',$data);
}

public function excel(){
	$result=$this->data_model->get_all('tblhousehold',0,0);
	$count = 1;
		
	$tittle = "Loss Aversion House List";
	
	

	/** Error reporting */
	

	//define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

	date_default_timezone_set('Europe/London');

	/** Include PHPExcel */
	
	

	$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_in_memory_gzip;
	if (!PHPExcel_Settings::setCacheStorageMethod($cacheMethod)) {
		die($cacheMethod . " caching method is not available" . EOL);
	}



	// Create new PHPExcel object

	$objPHPExcel = new excel();

	// Set document properties

	$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
	->setLastModifiedBy("Maarten Balliauw")
	->setTitle("Office 2007 XLSX Test Document")
	->setSubject("Office 2007 XLSX Test Document")
	->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
	->setKeywords("office 2007 openxml php")
	->setCategory("Test result file");


	$style = array(
			'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					//'Vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			)
	);
	$styleHRight = array(
			'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
						
			)
	);
	$styleHLeft = array(
			'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
						
			)
	);
	// create border
	$styleArray = array(
			'borders' => array(
					/*('top' => array(
					 'style' => PHPExcel_Style_Border::BORDER_THICK
					),
							'bottom' => array(
									'style' => PHPExcel_Style_Border::BORDER_THICK
							)*/
					'allborders' => array(
						 'style' => PHPExcel_Style_Border::BORDER_THICK
					)
			)
	);
	$styleBorderTin = array(
			'borders' => array(
					/*('top' => array(
					 'style' => PHPExcel_Style_Border::BORDER_THICK
					),
							'bottom' => array(
									'style' => PHPExcel_Style_Border::BORDER_THICK
							)*/
					'allborders' => array(
							'style' => PHPExcel_Style_Border::BORDER_THIN
					)
			)
	);
	$styleLeft = array(
			'borders' => array(
					'left' => array(
							'style' => PHPExcel_Style_Border::BORDER_THICK
					)

			)
	);
	$styleTop = array(
			'borders' => array(
					'top' => array(
							'style' => PHPExcel_Style_Border::BORDER_THICK
					)

			)
	);
	$styleBottom = array(
			'borders' => array(
					'bottom' => array(
							'style' => PHPExcel_Style_Border::BORDER_THICK
					)

			)
	);
	$styleRight = array(
			'borders' => array(
					'right' => array(
							'style' => PHPExcel_Style_Border::BORDER_THICK
					)

			)
	);

	$styleLeftTin = array(
			'borders' => array(
					'left' => array(
							'style' => PHPExcel_Style_Border::BORDER_THIN
					)

			)
	);
	$styleTopTin = array(
			'borders' => array(
					'top' => array(
							'style' => PHPExcel_Style_Border::BORDER_THIN
					)

			)
	);
	$styleBottomTin = array(
			'borders' => array(
					'bottom' => array(
							'style' => PHPExcel_Style_Border::BORDER_THIN
					)

			)
	);
	$styleRightTin = array(
			'borders' => array(
					'right' => array(
							'style' => PHPExcel_Style_Border::BORDER_THIN
					)

			)
	);
	//create background color


	$styleBackgroundcolor = array(
			'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => 'D8D8D8')
			)
	);




	$objPHPExcel->setActiveSheetIndex(0);

	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
	$j="F";
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('A3:'.$j.'3');
	$objPHPExcel->getActiveSheet()->getStyle("A3:".$j."3")
	->applyFromArray($style)
	->applyFromArray($styleArray)
	->getAlignment()
	->setWrapText(true);
	$objPHPExcel->getActiveSheet()->getStyle("A3:".$j."3")
	->getFont()
	->setName('times')
	->setSize(18)
	->setBold(true);
		
	$objPHPExcel->getActiveSheet()->getStyle("A3:".$j."3")
	->getFont()
	->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle("A3:".$j."3")->applyFromArray($styleBackgroundcolor);
	$objPHPExcel->getActiveSheet()->setCellValue('A3', $tittle);
	$execlCount = 5;
	$objPHPExcel->getActiveSheet()->getStyle("A".$execlCount.":".$j."".$execlCount)->getFont()->setName('times')->setSize(12)->setBold(true)->applyFromArray($styleBackgroundcolor);

	$objPHPExcel->getActiveSheet()->getStyle("A5:".$j."5")->applyFromArray($styleBackgroundcolor);
	$objPHPExcel->getActiveSheet()->getStyle("A".$execlCount.":".$j."".$execlCount)
	->applyFromArray($style)
	->applyFromArray($styleArray)
	->getAlignment()
	->setWrapText(true);
		
	
	

	$objPHPExcel->getActiveSheet()->setCellValue('A5', "Sr No");
	$objPHPExcel->getActiveSheet()->setCellValue('B5', "House Id");
	$objPHPExcel->getActiveSheet()->setCellValue('C5', "Address");
	$objPHPExcel->getActiveSheet()->setCellValue('D5', "Individual Id");
	$objPHPExcel->getActiveSheet()->setCellValue('E5', "Name");
	$objPHPExcel->getActiveSheet()->setCellValue('F5', "Status");
	
	$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 1);

	$execlCount = 6;
	$count = 1;
	
	foreach($result as $i){
			
		$objPHPExcel->getActiveSheet()->getStyle("A".$execlCount.":".$j."".$execlCount)->getFont()->setName('times')->setSize(12)->setBold(true)->applyFromArray($styleBackgroundcolor);
			
		$objPHPExcel->getActiveSheet()->getStyle("A".$execlCount.":".$j."".$execlCount)
		->applyFromArray($style)
		->applyFromArray($styleArray)
		->getAlignment()
		->setWrapText(true);
			
		$objPHPExcel->getActiveSheet()->getStyle("G".$execlCount.":G".$execlCount)
		->applyFromArray($style)
		->applyFromArray($styleHRight)
		->getAlignment()
		->setWrapText(true);
		$objPHPExcel->getActiveSheet()->getStyle("B".$execlCount)
		->getAlignment()->setWrapText(true);
			
		$objPHPExcel->getActiveSheet()->setCellValue('A' . $execlCount, $count++);
		$objPHPExcel->getActiveSheet()->setCellValue('B' . $execlCount, $i->hhid);
		$objPHPExcel->getActiveSheet()->setCellValue('C' . $execlCount, $i->hhaddress);
		$objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setWrapText(true);
		$objPHPExcel->getActiveSheet()->setCellValue('D' . $execlCount, $i->indid);
		$objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setWrapText(true);
		$objPHPExcel->getActiveSheet()->setCellValue('E' . $execlCount, $i->indname);
		$objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setWrapText(true);
		$objPHPExcel->getActiveSheet()->getStyle("F".$execlCount)
			->getAlignment()->setWrapText(true);
			$status="Completed";
			if($i->status==0){
				$status="Pending";
			}
		$objPHPExcel->getActiveSheet()->setCellValue('F' . $execlCount, $status);
		
		
		$execlCount++;
	}
	
		$objPHPExcel->getActiveSheet()->getStyle("A".$execlCount.":F".$execlCount)->getFont()->setName('times')->setSize(12)->setBold(true)->applyFromArray($styleBackgroundcolor);

		
	
	

	// Save Excel 2007 file

	// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Houselist.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;
}

public function add_new(){
    $data['hhid']=$_POST['hId'];
    $data['hhaddress']=$_POST['hAddress'];
    $data['indid']=$_POST['indId'];
    $data['indname']=$_POST['indName'];
    $data['status']='0';
   
   $res=$this->data_model->insert($data,'tblhousehold');
   if($res){
    
    header('location:'.base_url()."index.php/house/".$this->index());
    
    } 
}
public function edit($id){
    $data['house']=$this->data_model->get_details($id,'tblhousehold');
    $this->load->view('edit_house',$data);
}
public function update(){
    $data['hhid']=$_POST['hhid'];
    $data['hhaddress']=$_POST['hhaddress'];
    $data['indid']=$_POST['indid'];
    $data['indname']=$_POST['indname'];
    $data['status']=$_POST['status'];
    $res=$this->data_model->update($data,$_POST['Id'],'tblhousehold');
    if($res){
        header('location:'.base_url()."index.php/house/".$this->index());
    }

}
public function delete($id){
    $res=$this->data_model->delete($id,'tblhousehold');
    if($res){
          header('location:'.base_url()."index.php/house/".$this->index());
        
        } 
}
}
?>