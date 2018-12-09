<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory extends CI_Controller {

	public function __construct() {

		parent::__construct();
	 if(!$this->session->userdata("username"))
	 {
	 	redirect('welcome/index');
	 }
	  
		$this->load->model('InventoryModel');

	}
	
	public function supplier(){
		$data['page_title']='Supplier';
		$data['getSupplier']=$this->InventoryModel->getSupplier();
		$data['req_page_name']='inventory/supplier_list';
		$this->load->view('layout',$data);
	}
	
	public function addSupplier() {
		$action=$this->input->get('a');
		$id =$this->input->get('sup_id');
		$id=isset($id)?$id:''; 
		$data=array();
		if($id){
			$data['page_title']='Supplier';
			$data['getSupplierById']=$this->InventoryModel->getSupplierById($id);
			$data['req_page_name']='inventory/supplier_add';
			$this->load->view('layout',$data);
		}else{
			$data['page_title']='Supplier';
			$data['getSupplierById']='';
			$data['req_page_name']='inventory/supplier_add';
			$this->load->view('layout',$data);
		}

	}

	public function addSupplierDt() {

		$action = $this->input->get('act');
		$id = $this->input->post('hidden_id');
	
		$arrayData = array(
				   'icw_supplier_name0317' => $this->input->post('suppName'),
				   'icw_supplier_mobile0317' => $this->input->post('suppMobile'),
				   'icw_supplier_email0317' =>  $this->input->post('suppEmail'),
				   'icw_supplier_companyName0317' => $this->input->post('suppCompany'),
				   'icw_supplier_companyAddr0317' => $this->input->post('suppAddress'),
				   'icw_supplier_isactive0317' => $this->input->post('isactive')
				);
		
		if($action=='update'){
			$result=$this->InventoryModel->addSupplierDt($id,$arrayData);
			if($result == TRUE)
			{ //echo "up";die;
				$this->session->set_flashdata('msg_success', 'Supplier Updated &nbsp;<i class="fa fa-check" aria-hidden="true"></i>');
				redirect('inventory/supplier');
			}else{
				$this->session->set_flashdata('msg_error', 'Supplier Not Updated!');
				redirect('inventory/addSupplier');
			}
		}else{//echo "ins";die;
			$result=$this->InventoryModel->addSupplierDt('',$arrayData);
		  if($result == TRUE)
			{
				$this->session->set_flashdata('msg_success', 'Supplier Added Successfully &nbsp;<i class="fa fa-check" aria-hidden="true"></i>');
				redirect('inventory/supplier');
			}else{
				$this->session->set_flashdata('msg_error', 'Supplier Not Added!');
				redirect('inventory/addSupplier');
			}
		}
	}

	public function deleteSupplier()
	{
		$id =$this->input->get('sup_id');
		$res=$this->InventoryModel->deleteSupplierById($id);
		if($res == TRUE){
			$this->session->set_flashdata('msg_delete','one row deleted');
			redirect('inventory/supplier');
		}
	}
	
	public function stockAdd(){
		
		$action=$this->input->get('a');
		$id =$this->input->get('stock_id');
		$id=isset($id)?$id:''; 
		$data=array();
		if($id){
		$data['page_title']='Add Stock';
		$this->load->model('ProductModel');
		$data['getProduct']=$this->ProductModel->getProductsDetail();
		$data['getSupplier']=$this->InventoryModel->getSupplier();
		$data['getStockById']=$this->InventoryModel->getStockById($id);
		$data['req_page_name']='inventory/stock_add';		
		$this->load->view('layout',$data);
		}else{
		$data['page_title']='Add Stock';
		$this->load->model('ProductModel');
		$data['getProduct']=$this->ProductModel->getProductsDetail();
		$data['getSupplier']=$this->InventoryModel->getSupplier();
		$data['getStockById']='';	
		$data['req_page_name']='inventory/stock_add';		
		$this->load->view('layout',$data);	
		}
	}
	
	public function addStockDt(){
		//print_r($_REQUEST);die; 
			$action = $this->input->get('act');
		    $id = $this->input->post('hidden_id');
	
			$getdate=$this->input->post('date');
			$date = str_replace('/', '-', $getdate);
        	$date = date('Y-m-d ', strtotime($date));
       
		$data=array(
		'icw_stock_productId0317'=>$this->input->post('proName'),
		'icw_stock_productQty0317'=>$this->input->post('quantity'),
		'icw_stock_supplierId0317'=>$this->input->post('suppName'),		
		'icw_stock_description0317'=>$this->input->post('description'),
		'icw_stock_date0317'=>$date		
		);
		$stdata=array(
		'icw_stock_productId0317'=>$this->input->post('proName'),
		'icw_stock_productQty0317'=>$this->input->post('quantity')	
		);
		 if($action=='update'){		
		$rslt=$this->InventoryModel->addStockDt($data,$id,$stdata);
			if($rslt == TRUE){
				$this->session->set_flashdata('msg_success','Stock Updated Successfully &nbsp;<i class="fa fa-check" aria-hidden="true"></i>');
				redirect('inventory/getStock');			
			}else{
				$this->session->set_flashdata('msg_error','Stock Not Updated');
				redirect('inventory/getStock');	
			}
		 }else{
		 $rslt=$this->InventoryModel->addStockDt($data,'',$stdata);
			if($rslt == TRUE){
				$this->session->set_flashdata('msg_success','Stock Added Successfully &nbsp;<i class="fa fa-check" aria-hidden="true"></i>');
				redirect('inventory/getStock');			
			}else{
				$this->session->set_flashdata('msg_error','Stock Not Added');
				redirect('inventory/getStock');	
			}
		 	
		 }
	}
	public function getProductStock(){
		$data['page_title']='Product Stock';
		$data['getProductStock']=$this->InventoryModel->getProductStock();
		$data['req_page_name']='inventory/product_stock';		
		$this->load->view('layout',$data);
	}
	public function getStock(){
		$data['page_title']='Stock';
		$data['getStockData']=$this->InventoryModel->getStockData();
		$data['req_page_name']='inventory/stock_list';		
		$this->load->view('layout',$data);			
	}
	public function getProStock(){
		$data['page_title']='Stock';
		$this->load->model('ProductModel');
		$data['getProduct']=$this->ProductModel->getProductsDetail();
		$data['getSupplier']=$this->InventoryModel->getSupplier();
		$data['getStockById']='';
		$data['req_page_name']='inventory/stock_add_pro';		
		$this->load->view('layout',$data);
				
	}
   public function addProStock(){
   	$bar=$this->input->get('bar');
   	$data=array(
   		'icw_productId0317'=>$this->input->get('pid'),
   		'icw_productbarcode0317'=>$this->input->get('bar'),
   		'icw_userId0317'=>$this->session->userdata("user_id")
   		);
		$result=$this->InventoryModel->addBarcodeMap($data,$bar);
		if($result== TRUE){
			echo 1;
		}else{
			echo 0;
		}
					
	}
	
	public function barcode_generate(){
		$data['page_title']='Barcode';
		$data['req_page_name']='inventory/barcode_generate';
		$this->load->view('layout',$data);
	}
	public function deleteStock()
		{
			$id =$this->input->get('stock_id');
			$res=$this->InventoryModel->deleteStockById($id);
			if($res == TRUE){
				
				$this->session->set_flashdata('msg_delete','one row deleted');
				redirect('inventory/getStock');
			}
		}
	
}
?>