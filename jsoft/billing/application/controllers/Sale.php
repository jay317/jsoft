<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Sale extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        if(!$this->session->userdata("username"))
        {
            redirect('welcome/index');
        }
        
        $this->load->model('ProductModel');
        $this->load->model('CategoryModel');
        $this->load->model('SaleModel');
        $this->load->model('ClientModel');
        
    }
    
    public function index() {
        $data['getPcat']=$this->CategoryModel->getProductCat();
        $data['getProduct']=$this->ProductModel->getProductsDetail();
        $data['getClient']=$this->ClientModel->getClient();
        $data['getCountry']=$this->ClientModel->getCountry();
        $data['getInvoiceNo']=$this->SaleModel->getInvoiceNo();
        $userId=$this->session->userdata('user_id');
        
        $this->load->model('MainModel');
        $data['page_title']='Point Of Sale';
        $data['settingDetails']=$this->MainModel->settingDetail($userId);
        $previousProducts = $this->session->userdata("prev_prdcts")?$this->session->userdata("prev_prdcts"):array();
        
        $data['previousProducts']=$previousProducts;
        //$this->load->view('product/sales',$data);
        $this->load->view('sales/pointofsale',$data);
    }
    function updateRow($rowId = ''){
        $previousProducts = $this->session->userdata("prev_prdcts")?$this->session->userdata("prev_prdcts"):array();
        unset($previousProducts[$rowId]);
        $this->session->set_userdata('prev_prdcts', $previousProducts);
    }
    public function getProInfo()
    {
        $previousProducts = $this->session->userdata("prev_prdcts")?$this->session->userdata("prev_prdcts"):array();
        $id=$_REQUEST['dt'];
        $getdata=$this->SaleModel->getProInfo($id);
        $randomNum = rand(200000, 20000090);
        // $this->session->set_userdata('prev_prdcts', array());
        $previousProducts[$randomNum]=$getdata;
        $this->session->set_userdata('prev_prdcts', $previousProducts);
        if($getdata){
            $query=$getdata['query'];
            $query2=$getdata['query2'];
            ?>
<tr class="jRemove">
	<td><i class="fa fa-times removeRow <?php echo $randomNum;?>"
		aria-hidden="true" style="cursor: pointer"></i><input type="hidden"
		name="r_id[]" class="r_id" value="<?php echo $randomNum;?>" /></td>
	<td><?php echo $query->icw_pn0317;?><input type="hidden"
		class="productName" name="productName[]"
		value="<?php echo $query->icw_pn0317;?>"><input type="hidden"
		class="productId" name="productId[]"
		value="<?php echo $query->icw_pi0317;?>"></td>
	<td><input type="text" class='qty form-control' name='qty[]' value='1'
		style='width: 40px'></td>
	<td><input type='text' class='selling_price form-control input-border'
		name='selling_price[]' value='<?php echo $query->icw_prs0317;?>'></td>
	<td><input type='text' name='itemTotal[]'
		class='itemtotal form-control input-border' readonly='readonly'
		value="<?php echo $query->icw_prs0317;?>" /><input type='hidden'
		name='warehouse_id[]' value='"+warehouse_id+"' /></td>
	<td><select class="optsel ">
			<option>No Tax</option>
			<?php foreach($query2 as $qry){?>
			<option value="<?php if($query2 !=''){echo $qry->icw_id0317;}?>">
			<?php if($query2 !=''){echo $qry->icw_taxName0317;}?>
			</option>
			<?php }?>
	</select>
	</td>

</tr>
			<?php   }
			else
			{
				return false;
			}
	}

	public function getSubTaxInfo()
	{
	 $id=$_REQUEST['dt'];
	 $amount=$_REQUEST['dt2'];
	 $array_index=$_REQUEST['dt3'];
	 $proId=$_REQUEST['dt4'];
	 $proName=$_REQUEST['dt5'];
	 $query = $this->SaleModel->getSubTaxInfo($id);
	 if($query){
	  $sum=0; $i=0;?>
	  <?php  foreach($query as $jqry)
	  { ?>

<tr class="ntr<?php echo $array_index;?>" id="">
	<td><?php echo $jqry->icw_subTaxName0317 . " ".  $jqry->icw_subTaxPercent0317. "%&nbsp;" . "@" .$proName. "&nbsp;amount &nbsp;" . $amount;?><input
		type="hidden" name="proId[]" value="<?php echo $proId;?>"><input
		type="hidden" name="taxDtl[]"
		value="<?php echo $jqry->icw_subTaxName0317 . " ".  $jqry->icw_subTaxPercent0317. "%&nbsp;" . "@" .$proName. "&nbsp;amount &nbsp;" . $amount;?>">
	</td>
	<td><?php
	$txt=$jqry->icw_subTaxPercent0317;
	$cal=$amount * ($txt/100);
	$cal=round($cal,2);
	echo "&nbsp;&nbsp;". $cal;
	$sum+=$cal;
	?> <input type="hidden" name="taxSum[]" value="<?php echo $cal;?>">
	</td>
</tr>
	<?php }?>
<tr class="ntr<?php echo $array_index;?>">
	<td></td>
	<td></td>
	<td><?php echo $sum;?><input type="hidden" name="proId[]"
		value="<?php echo $proId;?>"><input type="hidden"
		name="totTaxAmount[]" value="<?php echo $sum;?>"
		class="totalTaxAmount"></td>
</tr>
	<?php
	 }?>


	 <?php }


	 public function invoiceSave(){
	 	$previousProducts = $this->session->userdata("prev_prdcts")?$this->session->userdata("prev_prdcts"):array();
	 	$date=date('Y/m/d');
	 	$invo_date = date("Y-m-d", strtotime($date));
		$last_invo_no  =$this->db->select('icw_invoiceNo_0317')->order_by('icw_invoiceNo_0317','desc')->limit(1)->get('icw_invoice_0317')->row('icw_invoiceNo_0317');
	 	if($last_invo_no ==0){
	 		$last_invo_no=1;
	 	}else{
	 		$last_invo_no=$last_invo_no + 1;
	 	}
	 	if($_POST['paidAmount']==0){
	 		$balAmt=$_POST['grand_totalJ'];
	 	}else{
	 		$balAmt=$_POST['balanceAmount'];
	 	}
//print_r($_POST); die;
	 	$invoiceData= array(
		'icw_clientId0317'=>trim($_POST['client_id']),
		'icw_shopId0317'=>trim($_POST['shopId']),
	 	'icw_userId0317'=>trim($this->session->userdata("user_id")),
		'icw_noOfItems0317'=>trim($_POST['numberofitemsJ']),
	 	'icw_totalTax0317'=>trim($_POST['totalTaxAmtJ']),
		'icw_totalAmt0317'=>trim($_POST['total_amtJ']),	
		'icw_amtWithTax0317'=>trim($_POST['grand_totalJ']),
		'icw_paidAmount0317'=>trim($_POST['paidAmount']),
		'icw_balanceAmt0317'=>trim($balAmt),
		'icw_transactionId0317'=>trim($_POST['transRefId']),
		'icw_chequeBnk0317'=>trim($_POST['chequeBnk']),
		'icw_chequeNo0317'=>trim($_POST['chequeNo']),
		'icw_paymentMode0317'=>trim($_POST['paymentMode']),
		'icw_taxType0317'=>trim($_POST['taxMode']),
		'icw_invoiceNo_0317'=>$last_invo_no,
		'icw_invoDate0317'=>trim($invo_date),
	 	'icw_customerMob0317'=>trim($_POST['customerMob']),		
		'icw_invoStatus0317'=>1
	 	);
	 	//print_r($invoiceData);
	 	$res=$this->SaleModel->invoiceSave($invoiceData,$invo_date,$last_invo_no);
	 	if($res)
	 	{
	 		redirect('pos/index?msg=success');
			/* $invoiceNo=$last_invo_no;
			$data['getInvoiceQuery']=$this->SaleModel->genInvoice($invoiceNo);
			$this->load->view('sales/print_invo2',$data);*/
	 	}

	 }

	 public function invoicePrint()
	 {
	 	//$data['data']=$_REQUEST;
	 	$invoiceNo=$this->input->get('id');
	 	$data['getInvoiceQuery']=$this->SaleModel->genInvoice($invoiceNo);
	 	$data['page_title']='Print Invoice';
	 	//echo "test";
	 	//print_r($data['getInvoiceQuery']);

	 	$this->load->view('sales/print_inv',$data);
	 }

	 public function invoiceGenerate()
	 {
	 	$data['getClient']=$this->ClientModel->getClient();
	 	$data['page_title']='Print Invoice';
	 	$data['req_page_name']='sales/generate_invoice';
	 	$this->load->view('layout',$data);
	 }

	 public function genInvoice()
	 {
	 	$invoiceNo=trim($_REQUEST['invoiceNo']);
	 	$res=$this->SaleModel->genInvoice($invoiceNo);
	 	if($res == TRUE){
	 		$data['getInvoiceQuery']=$this->SaleModel->genInvoice($invoiceNo);
	 		$this->load->view('sales/print_inv',$data);
	 	}else{
	 		$this->session->set_flashdata('flash_msg','Record not Available..');
	 		redirect('sale/invoiceGenerate');
	 	}
	 }
	
 public function genInvoiceName()
	 {
	 	$clientId=trim($_REQUEST['clientId']);
	 	$date=trim($_REQUEST['date']);
	 	$invo_date = date("Y-m-d", strtotime($date));
	 	$res=$this->SaleModel->genInvoiceName($clientId,$invo_date);
	 	if($res == TRUE){
	 		$data['getInvoiceQuery']=$this->SaleModel->genInvoiceName($clientId,$invo_date);
	 		$this->load->view('sales/print_inv',$data);
	 	}else{
	 		$this->session->set_flashdata('flash_msg','Record not Available..');
	 		redirect('sale/invoiceGenerate');
	 	}
	 }


}
?>