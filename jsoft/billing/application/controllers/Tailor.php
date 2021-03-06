<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Tailor extends CI_Controller {

	public function __construct() {

		parent::__construct();
		if(!$this->session->userdata("username"))
		{
			redirect('welcome/index');
		}
		$this->load->model('TailorModel');

	}

	/*-----------  order  --------*/
function index(){
	redirect('tailor/order');
}
	
function orderList(){
		if($this->input->get('list_type')){
		$list_type=$_REQUEST['list_type'];
		$data['list_type']=$list_type;
		$data['orderList']=$this->TailorModel->orderListGet();
		$data['page_title']='Orders List';
		$data['req_page_name']="tailor/order_list";
		$this->load->view('layout',$data);
	}else{
		if($_SESSION['usertype']=='user'){
			$data['list_type']='lab';
			$data['orderList']=$this->TailorModel->orderListGet();
			$data['page_title']='Orders List';
			$data['req_page_name']="tailor/order_list";
			$this->load->view('layout',$data);
		}else{
			$data['list_type']='shop';
			$data['orderList']=$this->TailorModel->orderListGet();
			$data['page_title']='Orders List';
			$data['req_page_name']="tailor/order_list";
			$this->load->view('layout',$data);
		}
	}
	}
	
	public function order(){
		$last_order_no  =$this->db->select('icw_tai_id0317')->order_by('icw_tai_id0317','desc')->limit(1)->get('icw_tailor_order_0317')->row('icw_tai_id0317');
		if($last_order_no ==0){
			$last_order_no=1;
		}else{
			$last_order_no=$last_order_no + 1;
		}
		$data['order_no']=$last_order_no;
		$data['page_title']='Place order';
		$data['req_page_name']='tailor/tailor-order';
		$this->load->view('layout',$data);
	}

	public function taiOrderSave(){
		$newdate = date('Y-m-d', strtotime($_POST['date']));
		$settingDetails=$this->session->userdata('settingDetails');
		$last_order_no=trim($_POST['orderNo']);
		
		if($this->input->post('p_length')){
			$lenght=$this->input->post('p_length');
		}elseif($this->input->post('sh_length')){
			$lenght=$this->input->post('sh_length');
		}else{
			$lenght=$this->input->post('sk_length');
		}
		//print_r($lenght);die;
	    if($this->input->post('sh_shoulder') !==''){
			$sholder=$this->input->post('sh_shoulder');
		}else{
			$sholder=$this->input->post('sk_shoulder');
		}
		
	    if($this->input->post('p_hip') !==''){
			$hip=$this->input->post('p_hip');
		}else{
			$hip=$this->input->post('sk_hip');
		}
		
	    if($this->input->post('sh_hLength') !==''){
			$hLength=$this->input->post('sh_hLength');
		}else{
			$hLength=$this->input->post('sk_hLength');
		}
		
		
		$ordData= array(
		'shopId'=>$settingDetails->icw_shopId0317,
		'date'=>$newdate,
		'cusName'=>trim($this->input->post('cusName')),	
		'mobile'=>trim($this->input->post('mobile')),
		'totalAmount'=>trim($this->input->post('totalAmount')),
		'advnc'=>trim($this->input->post('advnc')),
		'balance'=>trim($this->input->post('balance')),
		'orderNo'=>trim($this->input->post('orderNo')),
		'type'=>trim($this->input->post('type')),
		'qty'=>trim($this->input->post('qty')),
		
		'length'=>$lenght,
		'fork'=>$this->input->post('p_fork'),
		'waist'=>$this->input->post('p_waist'),
		'thighs'=>$this->input->post('p_thighs'),
		'hip'=>$hip,
		'knee'=>$this->input->post('p_knee'),
		'bottom'=>$this->input->post('p_bottom'),
		'shoulder'=>$sholder,
		'chest'=>$this->input->post('sk_chest'),
		'stomach'=>$this->input->post('sk_stomach'),
		'hLength'=>$hLength,
		'front'=>$this->input->post('sh_front'),
		'collor'=>$this->input->post('sh_collor'),
		'back'=>$this->input->post('sh_back'),		
		);//print_r($_REQUEST);die;
		//echo $_POST['lnAxis']; die;
		$res=$this->TailorModel->OrderSave($ordData);
		if($res==true){
			$res=$this->TailorModel->orderGet($last_order_no);
			if($res){
				$settingDetails=$this->session->userdata('settingDetails');
				$shopType=$settingDetails->icw_shop_type0317;
				$this->load->model('SendSms');
				$this->load->model('MainModel');
				$getTemp=$this->TailorModel->getTemplates($shopType);
				$getTechnician=$this->TailorModel->getTechnician();
				$mobile_tec=$getTechnician==true?$getTechnician->icw_userMobile0317:'';
				
				$mobile_cus=$_POST['mobile'];
				$ord_no=$last_order_no;
				
				$custSms=$this->SendSms->send_sms_tailor_cus($mobile_cus,$ord_no,'CUST_ORDER_TEMP');
				$techniSms=$this->SendSms->send_sms_tailor_tec($mobile_tec,$ord_no,'TECH_ORDER_TEMP');
				$data['rslt']=$res;
				$data['page_title']='Order Form Receipt';
				$data['req_page_name']="tailor/order_receipt";
				$this->load->view('layout',$data);
			}
		}else{
			return false;
		}

	}
	


	function orderComplete(){
		$invo_print=$_REQUEST['print'];
		$last_order_no=$_REQUEST['ord_no'];
		if($invo_print =='invoice'){
			$paid=$this->TailorModel->orderPaid($last_order_no);
			$res=$this->TailorModel->orderGet($last_order_no);
			$data['rslt']=$res;
			$data['page_title']='Invoice';
			$data['req_page_name']="tailor/order_invoice";
			$this->load->view('layout',$data);
		}elseif($invo_print =='ord_check'){
			$res=$this->TailorModel->orderGet($last_order_no);
			$data['rslt']=$res;
			$data['page_title']='Order Check';
			$data['req_page_name']="tailor/order_lab";
			$this->load->view('layout',$data);
		}else{
			$res=$this->TailorModel->orderGet($last_order_no);
			$data['rslt']=$res;
			$data['page_title']='Invoice';
			$data['req_page_name']="tailor/order_complete";
			$this->load->view('layout',$data);
		}
	}

	function orderDispatch(){
		$last_order_no=$_REQUEST['ord_no'];
		$result=$this->TailorModel->orderDispatch($last_order_no);
		if($result==true){
			$res=$this->TailorModel->orderGet($last_order_no);
			$data['list_type']="lab";
			$data['rslt']=$res;
			$data['page_title']='Order Check';
			$data['orderList']=$this->TailorModel->orderListGet();
			$data['req_page_name']="tailor/order_list";
			$this->load->view('layout',$data);
		}else{}
	}
	function invoice_list(){
		$data['page_title']='Invoice List';
		$data['result']=$this->TailorModel->invoice_list();
		$data['req_page_name']="tailor/tailor_invoice_list";
		$this->load->view('layout',$data);	
	}
	function delete_order(){
		$del_id=$_REQUEST['del_id'];
		$result=$this->TailorModel->orderDelete($del_id);
		if($result==TRUE){ echo 1;
		}else{echo 0;}
	}

}
?>