<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_export extends CI_Controller {

	function export(){
		$this->load->model('ReportModel');
		$getinvoiceReport=$this->ReportModel->get_invoice_report();
		echo "<pre>";
		print_r($getinvoiceReport);
		echo "</pre>";
		
		require(APPPATH.'third_party/phpexcel/Classes/PHPExcel.php');
		require(APPPATH.'third_party/phpexcel/Classes/PHPExcel/Writer/Excel2007.php');
		$objPHPExcel= new PHPExcel();
		
		$objPHPExcel->getProperties()->setCreator("");
		$objPHPExcel->getProperties()->setTitle("");
		$objPHPExcel->getProperties()->setSubject("");
		//$objPHPExcel->getProperties()->setDiscription("");
		
		$objPHPExcel->setActiveSheetIndex(0);
		
		$objPHPExcel->getActiveSheet()->setCellValue('A1','Client Name');
		$objPHPExcel->getActiveSheet()->setCellValue('B1','Mobile');
		$objPHPExcel->getActiveSheet()->setCellValue('C1','Shop Name');
		$objPHPExcel->getActiveSheet()->setCellValue('D1','Total');
		$objPHPExcel->getActiveSheet()->setCellValue('E1','Paid');
		$objPHPExcel->getActiveSheet()->setCellValue('F1','Balance');
		$objPHPExcel->getActiveSheet()->setCellValue('G1','Invoice No.');
		//$objPHPExcel->getActiveSheet()->setCellValue('B1','Date');
		
		$row=2;
		foreach($getinvoiceReport as $key=>$value){
			
		$objPHPExcel->getActiveSheet()->setCellValue('A1',$row,$value->clientname);
		$objPHPExcel->getActiveSheet()->setCellValue('B1',$row,$value->clientmobile);
		$objPHPExcel->getActiveSheet()->setCellValue('C1',$row,$value->clientbtitle);
		$objPHPExcel->getActiveSheet()->setCellValue('D1',$row,$value->total);
		$objPHPExcel->getActiveSheet()->setCellValue('E1',$row,$value->paid);
		$objPHPExcel->getActiveSheet()->setCellValue('F1',$row,$value->balance);
		$objPHPExcel->getActiveSheet()->setCellValue('G1',$row,$value->invoid);
		//$objPHPExcel->getActiveSheet()->setCellValue('C1',$row,$value->invodate);
		
		$row++;
		}
		$filename='Invoice-report-on'.date("Y-m-d-H-i-s").'.xlsx';
		$objPHPExcel->getActiveSheet()->setTitle('Invoice-Excel');
		
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');
		
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		$objWriter->save('php://output');
		exit;
		
		
		
	}

	}