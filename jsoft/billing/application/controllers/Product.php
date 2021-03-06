<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Product extends CI_Controller {

	public function __construct() {
		
		parent::__construct();
	     if(!$this->session->userdata("username"))
            {
                 redirect('welcome/index');
            }
		 
		$this->load->model('ProductModel');
		$this->load->model('CategoryModel');
		
	}


public function index() {
$data['page_title']='Product List';	
$data['getProduct']=$this->ProductModel->getProductsDetail();
$data['req_page_name']='product/product_list';
$this->load->view('layout',$data);

}
public function addPro()
{	$data['page_title']='Add Product';
	$data['getPcat']=$this->CategoryModel->getProductCat();
	$data['getPtax']=$this->ProductModel->getProductTax();
	$data['req_page_name']='product/product_add';
	$this->load->view('layout',$data);
}

public function addProduct()
{
		//print_r($_REQUEST);
		$data=array(
		'categoryName' =>$this->input->post('categoryName'),
		'subcategoryName' =>$this->input->post('subcategoryName'),
		'productName' =>$this->input->post('productName'),
		'productCode' => $this->input->post('productCode'),
		'productBarCode' => $this->input->post('productBarCode'),
		'productHsn' => $this->input->post('productHsn'),
		'productPrice' => $this->input->post('productPrice'),
    		'productBatchNo' => $this->input->post('productBatchNo'),
    		'productMfgDate' => $this->input->post('productMfgDate'),
    		'productExpireDate' => $this->input->post('productExpireDate'),
		'pTax' => $this->input->post('pTax'),	
		'productDescription' => $this->input->post('productDescription')
		);
		$images = $_FILES["images"]["name"];
	if($images !=''){
      $_FILES['userfile']['name']     = $_FILES['images']['name'];
      $_FILES['userfile']['type']     = $_FILES['images']['type'];
      $_FILES['userfile']['tmp_name'] = $_FILES['images']['tmp_name'];
      $_FILES['userfile']['error']    = $_FILES['images']['error'];
      $_FILES['userfile']['size']     = $_FILES['images']['size'];
      $config = array(
        'allowed_types' => 'jpg|jpeg|png|gif',
        'max_size'      => 3000,
        'overwrite'     => TRUE,
        'upload_path'=> './uploads/product-images/'
      );
 	  $this->load->library('upload');
      $this->upload->initialize($config);
      $this->upload->do_upload();
	  }else{}
	  
       $res=$this->ProductModel->addProduct($data,$images);    	 
      if($res == TRUE)
      {
      	redirect('product/index');
      }else{
      	$this->session->set_flashdata('msg_error', 'Product Not Added!');
      	redirect('product/addPro');
      }
      
    
	 
     	
}


public function getProDetail()
{
	 $id=$_REQUEST['dt'];
	 $detail=$this->ProductModel->getProDetail($id);
		$data['qry']=$detail;
		$this->load->view('product/product_detail_block',$data);
}

public function editPro() {
$data['page_title']='Edit Product';
$id =$this->uri->segment(3);
$data['getPcat']=$this->CategoryModel->getProductCat();
$data['getPtax']=$this->ProductModel->getProductTax();
$data['getSubcatss']=$this->CategoryModel->getSubcatss();
$data['getProById']=$this->ProductModel->getProductById($id);
$data['req_page_name']='product/product_edit';
$this->load->view('layout',$data);

}

public function editProduct() {
		 $id =$this->input->post('hidden_id');

 		$data=array(
		'categoryName' =>$this->input->post('categoryName'),
 		'subcategoryName' =>$this->input->post('subcategoryName'),
		'productName' =>$this->input->post('productName'),
		'productCode' => $this->input->post('productCode'),
		'productBarCode' => $this->input->post('productBarCode'),
		'productHsn' => $this->input->post('productHsn'),
		'productPrice' => $this->input->post('productPrice'),
 		    'productBatchNo' => $this->input->post('productBatchNo'),
 		    'productMfgDate' => $this->input->post('productMfgDate'),
 		    'productExpireDate' => $this->input->post('productExpireDate'),
		'pTax' => $this->input->post('pTax'),	
		'productDescription' => $this->input->post('productDescription'),
 		'isactive' => $this->input->post('isactive')
		);
		
		$images = $_FILES["images"]["name"];
   	
	  if($images !=''){  
      $_FILES['userfile']['name']     = $_FILES['images']['name'];
      $_FILES['userfile']['type']     = $_FILES['images']['type'];
      $_FILES['userfile']['tmp_name'] = $_FILES['images']['tmp_name'];
      $_FILES['userfile']['error']    = $_FILES['images']['error'];
      $_FILES['userfile']['size']     = $_FILES['images']['size'];
      $config = array(
        'allowed_types' => 'jpg|jpeg|png|gif',
        'max_size'      => 3000,
        'overwrite'     => TRUE,
        'upload_path'=> './uploads/product-images/'
      );
      $this->load->library('upload');
      $this->upload->initialize($config);
      $this->upload->do_upload();
	  }else{}
		if($images !='')
		{
			$images =$images;
		}else{
			$images=$this->input->post('hidden_image');
		}
		$res=$this->ProductModel->editProduct($id, $data, $images);       	 
		      if($res == TRUE)
		      {
		      	redirect('product/index');
		      }else{
		      	$this->session->set_flashdata('message_error', 'Product Not Updated!');
		      	redirect('product/index');
		      }


}


public function deleteProduct()
	{
		$id =$this->input->post('id');
		$dt=$this->ProductModel->deleteProductById($id);
		if($dt== TRUE){ echo 1;}
	}

public function getProByCat()
{
	 $id=$_REQUEST['dt'];
	 $this->ProductModel->getProByCat($id);
}
public function getProByBarcode()
{
	 $barcode=$_REQUEST['dt'];
	 $this->ProductModel->getProByBarcode($barcode);
}

public function proTax() {
		$data['page_title']='Product Tax';
		$data['getPtax']=$this->ProductModel->getProductTax();
		$data['req_page_name']='product/product_tax_list';
		$this->load->view('layout',$data);		
	}
public function getSubTaxById(){
	$id=$_REQUEST['dt'];
	$result=$this->ProductModel->getSubTaxById($id);
	if($result){ ?>
	
   			<div class="col-md-12" style="max-height: 150px;overflow:auto; background-color:#F0F0F0;">
   			<table class="table table-responsive">
   			<?php $i=1; foreach($result as $results): ?>
   				<tr style=" background-color:#F0F0F0;"><td><?php  echo $i++ . "-";?></td><td><?php echo ucfirst($results->icw_subTaxName0317);?></td><td><?php echo $results->icw_subTaxPercent0317 . "%";?></td></tr>
   				<?php  endforeach;?>
   			</table>   			 
   			</div>
		
<?php }
} 
public function addProTax()
{	
        $action=$this->input->get('updt');
		$id =$this->uri->segment(3);
		$id=isset($id)?$id:'';
		$data=array();
		if($id){
			$data['page_title']='Product Tax';
			$data['getTaxByIds']=$this->ProductModel->getProductTaxById($id);
			$data['req_page_name']='product/product_tax_add';
		    $this->load->view('layout',$data);
			
		}else{
			$data['page_title']='Product Tax';
			$data['getTaxByIds']='';
			$data['req_page_name']='product/product_tax_add';
		    $this->load->view('layout',$data);
		}
}

public function addProductTax() {
		$action = $this->input->get('updt');
		$id = $this->input->post('hidden_id');
		$data=array(
		'taxName' => $this->input->post('taxName'),		
		'texPercent' => $this->input->post('texPercent'),
		'subTaxName' => $this->input->post('subTaxName'),
		'subTaxPercent' => $this->input->post('subTaxPercent'),
		'taxDescription' => $this->input->post('taxDescription'),
		'isactive' => $this->input->post('isactive')
		);
		if($action=='update'){
			$result=$this->ProductModel->addProductTax($id,$data);
			if($result == TRUE)
			{
				$this->session->set_flashdata('message_success', 'Product Tax Added Successfully!');
				redirect('Product/proTax');
			}else{
				$this->session->set_flashdata('message_error', 'Product Tax Not Added!');
				redirect('Product/proTax');
			}
		}else{
			$result=$this->ProductModel->addProductTax('',$data);
		if($result == TRUE)
			{
				$this->session->set_flashdata('message_success', 'Product Tax Added Successfully!');
				redirect('Product/proTax');
			}else{
				$this->session->set_flashdata('message_error', 'Product Tax Not Added!');
				redirect('Product/proTax');
			}
		}

}
public function deleteProductTax()
	{
		$id =$this->input->post('id');
		$res=$this->ProductModel->deleteProductTaxById($id);
		if($res == TRUE)
		{ echo 1;}
	}

}
?>