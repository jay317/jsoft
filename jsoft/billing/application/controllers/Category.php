<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct() {

		parent::__construct();
	 if(!$this->session->userdata("username"))
	 {
	 	redirect('welcome/index');
	 }
	  
		$this->load->model('CategoryModel');

	}


	public function index() {
		$data['page_title']='Product Category';
		$data['getPcat']=$this->CategoryModel->getProductCat();
		$data['req_page_name']='category/product_cat_list';
		$this->load->view('layout',$data);

	}
	public function addProCat() {
		$action=$this->input->get('a');
		$id =$this->uri->segment(3);
		$id=isset($id)?$id:'';
		$data=array();
		if($id){
			$data['page_title']='Product Category';
			$data['getPcatById']=$this->CategoryModel->getProductCatById($id);
			$data['req_page_name']='category/product_cat_add';
			$this->load->view('layout',$data);
		}else{
			$data['page_title']='Product Category';
			$data['getPcatById']='';
			$data['req_page_name']='category/product_cat_add';
			$this->load->view('layout',$data);
		}

	}


	public function addProductCat() {

		$categoryName = $this->input->post('categoryName');
		$action = $this->input->get('a');
		$categoryDescription = $this->input->post('categoryDescription');
		$id = $this->input->post('hidden_id');
		$isactive = $this->input->post('isactive');
		if($action=='update'){
			$result=$this->CategoryModel->addProductCat($id,$categoryName, $categoryDescription, $isactive);
			if($result == TRUE)
			{
				$this->session->set_flashdata('msg_success', 'Product Category Added Successfully!');
				redirect('Category/index');
			}else{
				$this->session->set_flashdata('msg_error', 'Product Category Not Added!');
				redirect('Category/index');
			}
		}else{
			$result=$this->CategoryModel->addProductCat('',$categoryName, $categoryDescription, $isactive);
		if($result == TRUE)
			{
				$this->session->set_flashdata('msg_success', 'Product Category Added Successfully!');
				redirect('Category/index');
			}else{
				$this->session->set_flashdata('msg_error', 'Product Category Not Added!');
				redirect('Category/index');
			}
		}


	}
	
	public function deleteProductCat()
	{
		$id =$this->input->post('id');
		$res=$this->CategoryModel->deleteProductCatById($id);
		if($res == TRUE){echo 1;}else{echo 0;}
	}
	
	public function productSubCat() {
		$data['page_title']='Product Sub Category';
		$data['getPsubcat']=$this->CategoryModel->getProductsubCat();
		$data['req_page_name']='category/product_subcat_list';
		$this->load->view('layout',$data);

	}
	
	public function addProsubCat() {
		$action=$this->input->get('a');
		$id =$this->uri->segment(3);
		$id=isset($id)?$id:'';
		$data=array();
		if($id){
			$data['page_title']='Product Sub Category';
			$data['getPcat']=$this->CategoryModel->getProductCat();
			$data['getPsubcatById']=$this->CategoryModel->getProductsubCatById($id);
			$data['req_page_name']='category/product_subcat_add';
			$this->load->view('layout',$data);
		}else{
			$data['page_title']='Product Sub Category';
			$data['getPsubcatById']='';
			$data['getPcat']=$this->CategoryModel->getProductCat();
			$data['req_page_name']='category/product_subcat_add';
			$this->load->view('layout',$data);
		}

	}
	
	
public function addProductsubCat() {

		$categoryName = $this->input->post('categoryName');
		$subcategoryName = $this->input->post('subcategoryName');
		$action = $this->input->get('a');
		$subcategoryDescription = $this->input->post('subcategoryDescription');
		$id = $this->input->post('hidden_id');
		$isactive = $this->input->post('isactive');
		if($action=='update'){
			$result=$this->CategoryModel->addProductsubCat($id,$categoryName,$subcategoryName, $subcategoryDescription, $isactive);
			if($result == TRUE)
			{
				$this->session->set_flashdata('msg_success', 'Product SubCategory Added Successfully!');
				redirect('Category/productSubCat');
			}else{
				$this->session->set_flashdata('msg_error', 'Product SubCategory Not Added!');
				redirect('Category/productSubCat');
			}
		}else{
			$result=$this->CategoryModel->addProductsubCat('',$categoryName,$subcategoryName, $subcategoryDescription, $isactive);
		if($result == TRUE)
			{
				$this->session->set_flashdata('msg_success', 'Product SubCategory Added Successfully!');
				redirect('Category/productSubCat');
			}else{
				$this->session->set_flashdata('msg_error', 'Product SubCategory Not Added!');
				redirect('Category/productSubCat');
			}
		}


	}
	
	public function getSubcat(){
		$id=$this->input->get('id');
		$result=$this->CategoryModel->getSubcat($id);
		if($result){
			foreach($result as $row){			
			echo '<option value='.$row->icw_sci0317.'>'.$row->icw_scn0318.'</option>';
			}
		}else{
			return false;
		}			
	}
	
	public function deleteProductsubCat()
	{
		$id =$this->input->post('id');
		$res=$this->CategoryModel->deleteProductsubCatById($id);
		if($res == TRUE){ echo 1;}else{echo 0;}
	}

}
?>