<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Restaurant extends CI_Controller {

	public function __construct() {
		
		parent::__construct();
	     if(!$this->session->userdata("username"))
            {
                 redirect('welcome/index');
            }
		$this->load->model('RestaurantModel');
		$this->load->model('ProductModel');
		
	}

public function index(){
	$data['table_status']=$this->RestaurantModel->getTableStatus();
	$data['table_list']=$this->RestaurantModel->getTableList();	
	$data['parcel_list']=$this->RestaurantModel->getParcel();
	$data['servitor_list']=$this->RestaurantModel->getServitorList();
	$data['getCategory']=$this->RestaurantModel->getCategory();
	$data['getItems']=$this->RestaurantModel->getItems();
	$data['getbillTable']=$this->RestaurantModel->getbillTable();
	$data['page_title']='Place order';
	$data['req_page_name']='restaurant/restaurant';
	$this->load->view('layout',$data);

}
public function index1(){
    $data['table_list']=$this->RestaurantModel->getTableList();
    $data['servitor_list']=$this->RestaurantModel->getServitorList();
    $data['getCategory']=$this->RestaurantModel->getCategory();
    $data['getItems']=$this->RestaurantModel->getItems();
    $data['getbillTable']=$this->RestaurantModel->getbillTable();
    $data['page_title']='Place order';
    $data['req_page_name']='restaurant/restaurant2';
    $this->load->view('layout2',$data);
    
}
public function tables(){
	$data['page_title']='Tables';
	$data['table_list']=$this->RestaurantModel->getTableList();
	$data['servitor_list']=$this->RestaurantModel->getServitorList();
	$data['req_page_name']='restaurant/restaurant-table-list';
	$this->load->view('layout',$data);	
}

public function tableAdd() {
		$action=$this->input->get('a');
		$id =$this->uri->segment(3);
		$id=isset($id)?$id:'';
		$data=array();
		if($id){
			$data['page_title']='Tables';
			$data['getTableById']=$this->RestaurantModel->getTableById($id);
			$data['req_page_name']='restaurant/restaurant-table';
			$this->load->view('layout',$data);
		}else{
			$data['page_title']='Tables';
			$data['getTableById']='';
			$data['req_page_name']='restaurant/restaurant-table';
			$this->load->view('layout',$data);
		}
}
public function servitorAdd() {
		$action=$this->input->get('a');
		$id =$this->uri->segment(3);
		$id=isset($id)?$id:'';
		$data=array();
		if($id){
			$data['page_title']='Servitor';
			$data['getServitorById']=$this->RestaurantModel->getServitorById($id);
			$data['req_page_name']='restaurant/restaurant-servitor';
			$this->load->view('layout',$data);
		}else{
			$data['page_title']='Servitor';
			$data['getServitorById']='';
			$data['req_page_name']='restaurant/restaurant-servitor';
			$this->load->view('layout',$data);
		}
}

public function tableAddDt() {
		$action = $this->input->get('a');
		$tableName = $this->input->post('tableName');		
		$seats = $this->input->post('seats');
		$id = $this->input->post('hidden_id');
		
		$images = $_FILES["images"]["name"];
		if($images !=''){
			$images=$_FILES["images"]["name"];
	      $_FILES['userfile']['name']     = $_FILES['images']['name'];
	      $_FILES['userfile']['type']     = $_FILES['images']['type'];
	      $_FILES['userfile']['tmp_name'] = $_FILES['images']['tmp_name'];
	      $_FILES['userfile']['error']    = $_FILES['images']['error'];
	      $_FILES['userfile']['size']     = $_FILES['images']['size'];
	      $config = array(
	        'allowed_types' => 'jpg|jpeg|png|gif',
	        'max_size'      => 3000,
	        'overwrite'     => TRUE,
	        'upload_path'=> './uploads/restaurant-images/'
	      );
	 	  $this->load->library('upload');
	      $this->upload->initialize($config);
	      $this->upload->do_upload();
		  }else{
		  	$images=$this->input->post('hidden_images');
		  }
		  
		if($action=='update'){
			
			$result=$this->RestaurantModel->tableAddDt($id,$tableName, $seats, $images);
			if($result == TRUE)
			{
				$this->session->set_flashdata('msg_success', 'Table Updated Successfully!');
				redirect('restaurant/tables');
			}else{
				$this->session->set_flashdata('msg_error', 'Table Not Updated!');
				redirect('restaurant/tables');
			}
		}else{
			$result=$this->RestaurantModel->tableAddDt('',$tableName, $seats, $images);
		if($result == TRUE)
			{
				$this->session->set_flashdata('msg_success', 'Table Added Successfully!');
				redirect('restaurant/tables');
			}else{
				$this->session->set_flashdata('msg_error', 'Table Not Added!');
				redirect('restaurant/tables');
			}
		}
}

public function servitorAddDt() {
		$action = $this->input->get('a');
		$sno = $this->input->post('sno');		
		$sname = $this->input->post('sname');
		$id = $this->input->post('hidden_id');
		
		$images = $_FILES["images"]["name"];
		if($images !=''){
			$images = $_FILES["images"]["name"];
	      $_FILES['userfile']['name']     = $_FILES['images']['name'];
	      $_FILES['userfile']['type']     = $_FILES['images']['type'];
	      $_FILES['userfile']['tmp_name'] = $_FILES['images']['tmp_name'];
	      $_FILES['userfile']['error']    = $_FILES['images']['error'];
	      $_FILES['userfile']['size']     = $_FILES['images']['size'];
	      $config = array(
	        'allowed_types' => 'jpg|jpeg|png|gif',
	        'max_size'      => 3000,
	        'overwrite'     => TRUE,
	        'upload_path'=> './uploads/restaurant-images/'
	      );
	 	  $this->load->library('upload');
	      $this->upload->initialize($config);
	      $this->upload->do_upload();
		  }else{
		  	$images=$this->input->post('hidden_images');
		  }
		  
		if($action=='update'){
			$result=$this->RestaurantModel->servitorAddDt($id,$sno, $sname, $images);
			if($result == TRUE)
			{
				$this->session->set_flashdata('msg_success', 'servitor Updated Successfully!');
				redirect('restaurant/tables');
			}else{
				$this->session->set_flashdata('msg_error', 'servitor Not Updated!');
				redirect('restaurant/tables');
			}
		}else{
			$result=$this->RestaurantModel->servitorAddDt('',$sno, $sname, $images);
		if($result == TRUE)
			{
				$this->session->set_flashdata('msg_success', 'servitor Added Successfully!');
				redirect('restaurant/tables');
			}else{
				$this->session->set_flashdata('msg_error', 'servitor Not Added!');
				redirect('restaurant/tables');
			}
		}
}

function deleteTable(){
	$id=$this->input->get('id');
	$rslt=$this->RestaurantModel->deleteTable($id);
	if($rslt==true){
			redirect('restaurant/tables');
		}else{
			return false;
		}
}

function deleteServitor(){
	$id=$this->input->get('id');
	$rslt=$this->RestaurantModel->deleteServitor($id);
	if($rslt==true){
			redirect('restaurant/tables');
		}else{
			return false;
		}
}	

public function getItemByCat()
{
	 $id=$_REQUEST['dt'];
	 $query1=$this->RestaurantModel->getItemByCat($id);
		if($query1->num_rows() != 0)
				{
					
					foreach($query1->result() as $qry)
					{
						$imgid=$qry->icw_pi0317;
						$this->db->select('*');
						$this->db->where('icw_pid0317',$imgid);
						$this->db->from('icw_img_0317');
						$query2 = $this->db->get()->row();
						?>		
		                <span style="cursor:pointer;" title="Click to add list" onclick="addItems(<?php echo $qry->icw_pi0317;?>,'1');" ><figure style="color:#aaa"><img src="<?php echo base_url();if($query2->icw_imgname0317 !=''){echo 'uploads/product-images/'. $query2->icw_imgname0317;}else{echo 'assets/images/no-image.gif' . $query2->icw_imgname0317;}?>" width="50px;" height="50px;" ><figcaption><?php echo ucwords($qry->icw_pn0317);?></figcaption></figure></span>		
						<?php
					}
				}
				else
				{
					return false;
				}
}

public function addItems(){
	$pid=$this->input->get('pid');
	$typ=$this->input->get('j');
	 $qty=$this->input->get('qty');
	$res=$this->RestaurantModel->addItems($pid);
	$previousItems = $this->session->userdata("add_items")?$this->session->userdata("add_items"):array();
	if(isset($previousItems[$pid])){
				$itemRow = $previousItems[$pid];				
				$itemRow['item_qty'] = $qty;//$itemRow['item_qty']+1;					
				$itemRow['item_total']=$itemRow['item_qty'] * $itemRow['item_price'];	
			}else{
	$res=$this->RestaurantModel->addItems($pid);
	$itemRow = array(
	 'item_id'=>$res->pid,
	 'item_name'=>$res->name,
	 'item_qty'=>1,
	 'item_price'=>$res->price,
	 'item_img'=>$res->img,
	 'item_total'=>$res->price
	);
}
	//print_r($previousItems);
	$previousItems[$pid]=$itemRow;
	$this->session->set_userdata('add_items', $previousItems);
	
	//print_r($previousItems);die;
	$data['previousItems']=$this->session->userdata("add_items");
	$this->load->view('restaurant/left_side_block',$data);
		
}


function removeItems(){
	$rowId = $this->input->get('pid');
	$previousItems = $this->session->userdata("add_items")?$this->session->userdata("add_items"):array();
		unset($previousItems[$rowId]);			
	$this->session->set_userdata("add_items",$previousItems);
	$data['previousItems']=$this->session->userdata("add_items");
	$this->load->view('restaurant/left_side_block',$data);
}

function orderSave(){
	 $tblNo=$this->input->get('tblno');
	 $servNo=$this->input->get('servno');
	 $ordType=$this->input->get('ordtype');
	$result=$this->RestaurantModel->orderSave($tblNo,$servNo,$ordType);
	if($result==true){echo 1;}else{echo 0;}
	
}

function getBill(){
	$tblNo=$this->input->get('tblno');
	$type=$this->input->get('type');
	$result=$this->RestaurantModel->getBill($tblNo);
	$tax=$this->RestaurantModel->getTax();
	$subtaxdts=$tax['result'];
	$taxdts=$tax['res'];
	//print_r($taxdt->icw_subTaxPercent0317); die;
	if($result){
		$totalAmt=0;
		$taxItem=0;
		foreach($result as $row) {
			$calcData=array(
		      'price'=>$row->price,
		      'total'=>$row->total 
			);
			$totalAmt +=$calcData['total'];	
		}
	     $totalAmt=$totalAmt;
		foreach($subtaxdts as $taxdt){
			 $taxAmts='';
			 $taxAmt =(($totalAmt * ($taxdt->icw_subTaxPercent0317)) / 100);
			$taxdtl[]=array(
			'tname'=>$taxdt->icw_subTaxName0317,
			'tper'=>$taxdt->icw_subTaxPercent0317,
			'tamt'=>$taxAmt
			);
			//$taxAmt +=$taxdtl['tamt'];
		}
			$tottax = 0;
			foreach ($taxdtl as $item) {
			    $tottax += $item['tamt'];
			}
		$grandTotal=$totalAmt+$tottax;
		$finalCalData = array(
				'totalAmt'=>$totalAmt,
				'taxAmt'=>$taxAmt,
				'grandTotal'=>$grandTotal,
				'taxPercent'=>$taxdt,
				'taxType'=>$taxdts,
				'subtaxType'=>$subtaxdts,
				'taxdtl'=>$taxdtl
		);
		$data['bill_data']=$result;
		$data['finalCalData']=$finalCalData;
		$data['type']=$type;
		
		$this->load->view('restaurant/bill_block',$data);				
	}else{return false;}
}

function orderList(){
	$data['ord_list1']=$this->RestaurantModel->getOrderr();
	$data['ord_list']=$this->RestaurantModel->getOrder();
	$data['page_title']='order List';
	$data['req_page_name']='restaurant/order_list';
	$this->load->view('layout2',$data);
}

function changeStatus(){
    $ord_id=$this->input->get('ord_id');
    $rslt=$this->RestaurantModel->changeStatus($ord_id);
	if($rslt==true){
		redirect('restaurant/orderList');
	}else{
		return false;
	}
}

function changeAvailStatus(){
    $ord_id=$this->input->get('ord_id');
    $rslt=$this->RestaurantModel->changeStatus($ord_id);
    if($rslt==true){
        redirect('restaurant/orderList');
    }else{
        return false;
    }
}

function deleteOrd(){
	$ord_id=$this->input->get('orderid');
	$result=$this->RestaurantModel->deleteOrd($ord_id);
	if($result==true){echo 1;}else{echo 0;}
}

function report(){
	$data['page_title']='Invoice';
	$data['table_list']=$this->RestaurantModel->getTableList();
	$data['servitor_list']=$this->RestaurantModel->getServitorList();
	$data['invo_list']=$this->RestaurantModel->invoList();
	$data['req_page_name']='restaurant/restaurant-invo';
	$this->load->view('layout',$data);
}

function getFree(){
	$tblNo=$this->input->get('tblno');
	/*$disval=$this->input->get('disval');
	$disAmt=$this->input->get('disAmt');
	$payAmt=$this->input->get('payAmt');*/
	
	$result=$this->RestaurantModel->getBill($tblNo);
	$tax=$this->RestaurantModel->getTax();
	$subtaxdts=$tax['result'];
	$taxdts=$tax['res'];
	if($result){
		$totalAmt=0;
		$taxItem=0;
		foreach($result as $row) {
			$calcData=array(
		      'price'=>$row->price,
		      'total'=>$row->total 
			);
			$totalAmt +=$calcData['total'];	
		}
		$totalAmt=$totalAmt;
		foreach($subtaxdts as $taxdt){
			 $taxAmts='';			
			 $taxAmt = (($totalAmt * ($taxdt->icw_subTaxPercent0317)) / 100);			 
			$taxdtl[]=array(
			'tname'=>$taxdt->icw_subTaxName0317,
			'tper'=>$taxdt->icw_subTaxPercent0317,
			'tamt'=>$taxAmt
			);
			
		}
			$tottax = 0;
			foreach ($taxdtl as $item) {
			    $tottax += $item['tamt'];
			}
		//$taxItem = (($totalPrice * $taxdt->icw_subTaxPercent0317) / 100);
		//echo $tottax;
		$grandTotal=$totalAmt+$tottax;
		$finalCalData = array(
				'totalAmt'=>$totalAmt,
				'taxAmt'=>$tottax,
				'grandTotal'=>$grandTotal,
				'taxPercent'=>$taxdt,
				'taxType'=>$taxdts,
				'subtaxType'=>$subtaxdts,
				'taxdtl'=>$taxdtl,
				'disVal'=>$this->input->get('disVal'),
				'disAmt'=>$this->input->get('disAmt'),
				'payAmt'=>$this->input->get('payAmt')
		);
		
	$rslt=$this->RestaurantModel->ordInvoSave($tblNo,$result, $finalCalData);
    if($rslt==true){
		echo 1;//redirect('restaurant/index');
	}else{
		echo 0;//return false;
	}
  }
}

function getCancle(){
	$tblNo=$this->input->get('tblno');
	$rslt=$this->RestaurantModel->getCancle($tblNo);
	if($rslt==true){
		//redirect('restaurant/index');
		echo 1;
	}else{
		echo 0; //return false;
	}
}
function invoicePrint(){
	$tblNo=$this->input->get('tblno');
	$ordNo=$this->input->get('ordno');
	$date=$this->input->get('date');
	$invono=$this->input->get('invono');
	$rslt=$this->RestaurantModel->invoicePrint($ordNo,$tblNo,$date,$invono);
	if($rslt==true){
		$data['invo_data']=$rslt['result_invo'];
		$data['item_data']=$rslt['result_item'];
		$data['tax_data']=$rslt['result_tax'];
		$this->load->view('restaurant/restaurant_invo_print',$data);
		//redirect('restaurant/index');
		//echo 1;
	}else{
		echo 0; //return false;
	}
}


function getInvoDel(){
	$invoNo=$this->input->get('invoNo');
	$rslt=$this->RestaurantModel->getInvoDel($invoNo);
	if($rslt==true){
		//redirect('restaurant/index');
		echo 1;
	}else{
		echo 0; //return false;
	}
}

function getFilter(){
    $id= $this->input->get('id');
    $typ= $this->input->get('typ'); 
    $data['filter']= $this->RestaurantModel->getFilter($id,$typ);
        $this->load->view('restaurant/filter_ajax_block',$data);
        
}

}
?>