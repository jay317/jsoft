<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Optics extends CI_Controller {

	public function __construct() {

		parent::__construct();
		if(!$this->session->userdata("username"))
		{
			redirect('welcome/index');
		}
		$this->load->model('OpticsModel');

	}

	/*-----------  order  --------*/
function index(){
	redirect('optics/order');
} 	
function orderList(){
	if($this->input->get('list_type')){
		$list_type=$_REQUEST['list_type'];
		$data['list_type']=$list_type;
		$data['orderList']=$this->OpticsModel->optOrderListGet();
		$data['page_title']='Orders List';
		$data['req_page_name']="optics/order_list";
		$this->load->view('layout',$data);
	}else{
		if($_SESSION['usertype']=='user'){
			$data['list_type']='lab';
			$data['orderList']=$this->OpticsModel->optOrderListGet();
			$data['page_title']='Orders List';
			$data['req_page_name']="optics/order_list";
			$this->load->view('layout',$data);
		}else{
			$data['list_type']='shop';
			$data['orderList']=$this->OpticsModel->optOrderListGet();
			$data['page_title']='Orders List';
			$data['req_page_name']="optics/order_list";
			$this->load->view('layout',$data);
		}
	}
	}
	
	public function order(){
		$last_order_no  =$this->db->select('icw_opt_Id0317')->order_by('icw_opt_Id0317','desc')->limit(1)->get('icw_opt_order_0317')->row('icw_opt_Id0317');
		if($last_order_no ==0){
			$last_order_no=1;
		}else{
			$last_order_no=$last_order_no + 1;
		}
		$data['order_no']=$last_order_no;
		$data['page_title']='Place order';
		$data['req_page_name']='optics/optical-order';
		$this->load->view('layout',$data);
	}

	public function optOrderSave(){
		$newdate = date('Y-m-d', strtotime($_POST['date']));
		$settingDetails=$this->session->userdata('settingDetails');
		$last_order_no=trim($_POST['orderNo']);
		$ordData= array(
		'shopId'=>$settingDetails->icw_shopId0317,
		'date'=>$newdate,
		'cusName'=>trim($_POST['cusName']),	
		'mobile'=>trim($_POST['mobile']),
		'frame'=>trim($_POST['frame']),
		'lenses'=>trim($_POST['lenses']),
		'totalAmount'=>trim($_POST['totalAmount']),
		'advnc'=>trim($_POST['advnc']),
		'balance'=>trim($_POST['balance']),
		'orderNo'=>trim($_POST['orderNo']),
		'rdSph'=>$this->input->post('rdSph'),
		'rdCyl'=>$this->input->post('rdCyl'),
		'rdAxis'=>$this->input->post('rdAxis'),
		'rnSph'=>$this->input->post('rnSph'),
		'rnCyl'=>$this->input->post('rnCyl'),
		'rnAxis'=>$this->input->post('rnAxis'),
		'ldSph'=>$this->input->post('ldSph'),
		'ldCyl'=>$this->input->post('ldCyl'),
		'ldAxis'=>$this->input->post('ldAxis'),
		'lnSph'=>$this->input->post('lnSph'),
		'lnCyl'=>$this->input->post('lnCyl'),
		'lnAxis'=>$this->input->post('lnAxis')	
		);//print_r($_REQUEST);die;
		//echo $_POST['lnAxis']; die;
		$res=$this->OpticsModel->optOrderSave($ordData);
		if($res==true){
			$res=$this->OpticsModel->optOrderGet($last_order_no);
			if($res){
				$settingDetails=$this->session->userdata('settingDetails');
				$shopType=$settingDetails->icw_shop_type0317;
				$this->load->model('SendSms');
				$this->load->model('MainModel');
				$getTemp=$this->OpticsModel->getTemplates($shopType);
				$getTechnician=$this->OpticsModel->getTechnician();
				$mobile_tec=$getTechnician==true?$getTechnician->icw_userMobile0317:'';
				
				$mobile_cus=$_POST['mobile'];
				$ord_no=$last_order_no;
				$custSms=$this->SendSms->send_sms_optics_cus($mobile_cus,$ord_no,'CUST_ORDER_TEMP');
				$techniSms=$this->SendSms->send_sms_optics_tec($mobile_tec,$ord_no,'TECH_ORDER_TEMP');
				
				$data['rslt']=$res;
				$data['page_title']='Order Form Receipt';
				$data['req_page_name']="optics/order_receipt";
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
			$paid=$this->OpticsModel->optOrderPaid($last_order_no);
			$res=$this->OpticsModel->optOrderGet($last_order_no);
			$data['rslt']=$res;
			$data['page_title']='Invoice';
			$data['req_page_name']="optics/order_invoice";
			$this->load->view('layout',$data);
		}elseif($invo_print =='ord_check'){
			$res=$this->OpticsModel->optOrderGet($last_order_no);
			$data['rslt']=$res;
			$data['page_title']='Order Check';
			$data['req_page_name']="optics/order_lab";
			$this->load->view('layout',$data);
		}else{
			$res=$this->OpticsModel->optOrderGet($last_order_no);
			$data['rslt']=$res;
			$data['page_title']='Invoice';
			$data['req_page_name']="optics/order_complete";
			$this->load->view('layout',$data);
		}
	}

	function orderDispatch(){
		$last_order_no=$_REQUEST['ord_no'];
		$result=$this->OpticsModel->orderDispatch($last_order_no);
		if($result==true){
			$res=$this->OpticsModel->optOrderGet($last_order_no);
			$data['list_type']="lab";
			$data['rslt']=$res;
			$data['page_title']='Order Check';
			$data['orderList']=$this->OpticsModel->optOrderListGet();
			$data['req_page_name']="optics/order_list";
			$this->load->view('layout',$data);
		}else{}
	}
	
	function invoice_list(){
		$data['page_title']='Invoice List';
		$data['result']=$this->OpticsModel->invoice_list();
		$data['req_page_name']="optics/optical_invoice_list";
		$this->load->view('layout',$data);	
	}

	function delete_Order(){
		$del_id=$_REQUEST['del_id'];
		$result=$this->OpticsModel->orderDelete($del_id);
		if($result==TRUE){ echo 1;			
		}else{echo 0;}
		
		
	}

}
?>