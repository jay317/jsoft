<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

	public function __construct() {

		parent::__construct();

	}


	public function login() {

		$username=$this->security->xss_clean($this->input->post('uname'));
		$password=$this->security->xss_clean($this->input->post('pass_'));
		$this->load->model('MainModel');
		$result= $this->MainModel->check_user_login($username, $password);
		if ($result) {
			$user    = $this->MainModel->check_user_login($username, $password);
			// set session user datas
			$_SESSION['user_id']      = (int)$user->icw_userId0317;
			$_SESSION['username']     = (string)$user->icw_userName0317;
			$_SESSION['userMobile']     = (string)$user->icw_userMobile0317;
			$_SESSION['userEmail']     = (string)$user->icw_userEmail0317;
			$_SESSION['userFname']     = (string)$user->icw_userFname0317;
			$_SESSION['usertype']     = (string)$user->icw_userType0317;
			$_SESSION['userstatus']   = (int)$user->icw_user_is_active0317;
			$_SESSION['user_proImg']  = $user->icw_userImg0317;
			$_SESSION['logged_in']    = (bool)true;
			$_SESSION['settingDetails']=$this->MainModel->settingDetail($user->icw_userId0317);
			redirect('mainController/dashboard');
		} else {
			$this->session->set_flashdata('message_name', 'Invalid username or password');
			redirect('welcome/index');
		}
	}
	

	public function dashboard(){
		$this->load->model('ReportModel');
		$this->load->model('OpticsModel');
		$this->load->model('TailorModel');
		$this->load->model('RestaurantModel');
		$data['page_title']='Dashboard';
		$data['dashboardDataDetails']=$this->ReportModel->dashboardDataDetails();
		$data['optDashboardDataDetails']=$this->OpticsModel->optDashboardDataDetails();
		$data['taiDashboardDataDetails']=$this->TailorModel->taiDashboardDataDetails();
		$data['resDashboardDataDetails']=$this->RestaurantModel->resDashboardDataDetails();
		$data['req_page_name']="dashboard";
		$this->load->view('layout',$data);
	}
	public function user(){
		$this->load->model('MainModel');
		$data['page_title']='user';
		$data['allUser']=$this->MainModel->allUser();
		$data['req_page_name']="user/users";
		$this->load->view('layout',$data);

	}
	public function newUser(){
		$data['page_title']='New user';
		$this->load->model('MainModel');
		$data['getShop']=$this->MainModel->getShop();
		$data['req_page_name']="user/user_reg_frm";
		$this->load->view('layout',$data);
	}
	public function addNewUser(){
		//print_r($_REQUEST);
		$data=array(
		'icw_userFname0317'=>$this->input->post('userFullName'),
		'icw_userMobile0317'=>$this->input->post('userMobile'),
		'icw_userEmail0317'=>$this->input->post('userEmail'),
		'icw_userName0317'=>$this->input->post('userName'),
		'icw_userPwd0317'=>trim(md5($this->input->post('urPwd'))),
		'icw_userType0317'=>$this->input->post('userType'),
		'icw_fk_shop_id0317'=>$this->input->post('shop'),
		'icw_user_is_active0317'=>1
		);
		$this->load->model('MainModel');
		$right=$this->MainModel->addNewUser($data);
		if($right == TRUE){
			$this->session->set_flashdata('user_msg_success','New user created successfully.');
			redirect('mainController/newUser');
		}else{
			$this->session->set_flashdata('user_msg_error','New user not created.');
		}
	}

	public function deleteUser()
	{
		$id =$del_id=$_REQUEST['del_id'];
		$this->load->model('MainModel');
		$res=$this->MainModel->deleteUserById($id);
		if($res == TRUE){echo 1;
		}else{echo 0;}
	}

	public function actionUser()
	{
		$id =$del_id=$_REQUEST['act_id'];
		$this->load->model('MainModel');
		$res=$this->MainModel->actionUserById($id);
		if($res == TRUE){echo 1;
		}else{ echo 0;}
	}

	public function logout() {
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			//$this->load->view('user/logout/logout_success', $data);
			redirect('welcome/index');
			die;
		} else {
			redirect('/');
		}
	}

	public function profile(){
		$userId=$this->session->userdata('user_id');
		$this->load->model('MainModel');
		$data['currUser']=$this->MainModel->currUser($userId);
		$data['page_title']='Profile';
		$data['req_page_name']="user/profile";
		$this->load->view('layout',$data);
	}
	public function proImgUpdate(){
		$profimg = $_FILES["image"]["name"];
		//echo $profimg; die;
		if($profimg!=''){
	  $_FILES['userfile']['name']     = $_FILES['image']['name'];
	  $_FILES['userfile']['type']     = $_FILES['image']['type'];
	  $_FILES['userfile']['tmp_name'] = $_FILES['image']['tmp_name'];
	  $_FILES['userfile']['error']    = $_FILES['image']['error'];
	  $_FILES['userfile']['size']     = $_FILES['image']['size'];
	  $config = array(
        'allowed_types' => 'jpg|jpeg|png|gif',
        'max_size'      => 3000,
        'overwrite'     => TRUE,
        'upload_path'=> './uploads/user-images/'
        );
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload()){
        	echo 0;
        }else{
        	$userId=$this->session->userdata('user_id');
        	$this->load->model('MainModel');
        	$updt=$this->MainModel->proImgUpdt($profimg,$userId);
        	if($updt == TRUE){
        		echo 1;
        	}else{
        		echo 2;
        	}
        }
		}
	}
	public function proNameUpdate(){
		// print_r($_REQUEST);
		// echo "hi";
		$data=array('icw_userFname0317'=>trim($this->input->post('userFullName')),'icw_userName0317'=>trim($this->input->post('userName')));
		$userId=$this->session->userdata('user_id');
		$this->load->model('MainModel');
		$updt=$this->MainModel->proNameUpdt($data,$userId);
		if($updt == TRUE){
			echo 1;
		}else{
			echo 0;
		}
	}
	public function proPwdUpdate(){
		$uPwd=$this->input->post('uPwd');
		$unPwd=$this->input->post('unPwd');
		$userId=$this->session->userdata('user_id');
		$this->load->model('MainModel');
		$updt=$this->MainModel->proPwdUpdt($uPwd,$unPwd,$userId);
		if($updt == 1){
			echo 1;
		}elseif($updt == 0){
			echo 0;
		}elseif($updt == 2){
			echo 2;
		}
	}
	public function general_setting(){
		$userId=$this->session->userdata('user_id');
		$this->load->model('MainModel');
		$data['settingDetails']=$this->MainModel->settingDetail($userId);
		$data['page_title']='Setting';
		//$this->load->view('user/setting',$data);
		$data['req_page_name']="user/setting";
		$this->load->view('layout',$data);
	}
	public function settingUpdate(){

		$shop_logo = $_FILES["image"]["name"];
		if($shop_logo !=''){
			$_FILES['userfile']['name']     = $_FILES['image']['name'];
			$_FILES['userfile']['type']     = $_FILES['image']['type'];
			$_FILES['userfile']['tmp_name'] = $_FILES['image']['tmp_name'];
			$_FILES['userfile']['error']    = $_FILES['image']['error'];
			$_FILES['userfile']['size']     = $_FILES['image']['size'];
			$config = array(
			'allowed_types' => 'jpg|jpeg|png|gif',
			'max_size'      => 3000,
			'overwrite'     => TRUE,
			'upload_path'=> './uploads/shop-logo/'
			);
			$this->load->library('upload');
			$this->upload->initialize($config);
			$this->upload->do_upload();
		}else{}

		if($shop_logo !='')
		{
			$shop_logo =$shop_logo;
		}else{
			$shop_logo=$this->input->post('hidden_image');
		}
		$shopId=$this->input->post('shopId');
		$this->load->model('MainModel');
		$rslt=$this->MainModel->settingUpdate($shopId,$shop_logo);
		$_SESSION['settingDetails']=$this->MainModel->settingDetail($this->session->userdata("user_id"));
		if($rslt == TRUE){
			redirect('mainController/general_setting');
		}else{
			redirect('mainController/general_setting');
		}
	}
	
	function template(){
	$tmplt_id =$this->input->get("tmp_id");
	$action =$this->input->get("a");
	if($tmplt_id!='' && $action=='update'){ 
		$arrayData=array(
			    		'tmplt_id'=>$tmplt_id,
						'template_name'=>$this->input->post("template_name"),
			    		'sms_template'=>$this->input->post("sms_template"),
			    		'email_sub'=>$this->input->post("email_sub"),
			    		'email_template'=>$this->input->post("email_template"),
						'template_type'=>$template_type,
			    		'chk_status'=>$this->input->post("chk_status")
			);
			$this->load->model('MainModel');
			$rslt=$this->MainModel->templatesUpdate($arrayData);
			if($rslt==true){
			redirect('MainController/template');}else{redirect('MainController/template');}
		}
		elseif($tmplt_id!='' && $tmplt_id=='n'){ 
					$data['page_title']='Templates';
					$this->load->model('MainModel');
					$data['rslt_temp']='';
					$data['rslt']=$this->MainModel->templateList();
					$data['req_page_name']="templates/master-templates";
					$this->load->view('layout',$data);
		}
		elseif($tmplt_id!=''){
				$data['page_title']='Templates';
				$this->load->model('MainModel');
				$data['rslt_temp']=$this->MainModel->templatesData($tmplt_id);
				$data['rslt']=$this->MainModel->templateList();
				$data['req_page_name']="templates/master-templates";
				$this->load->view('layout',$data);
		}
		else{
			$data['page_title']='Templates';
			$data['req_page_name']="templates/templates";
			$this->load->model('MainModel');
			$data['rslt']=$this->MainModel->templateList();
			$this->load->view('layout',$data);
			}
	
}

function shop_registration(){
	
if(!empty($this->input->post('userName')) 
&& !empty($this->input->post('userName')) 
&& !empty($this->input->post('userEmail')) 
&& !empty($this->input->post('shopName'))
&& !empty($this->input->post('shopType'))
){
	$reg_data=array(
		'userName' => $this->input->post('userName'),
	    'shopMobile' => $this->input->post('shopMobile'),
	    'userEmail' => $this->input->post('userEmail'),
		'userId' => $this->input->post('userId'),
		'userPwd' => $this->input->post('userPwd'),
	    'shopName' => $this->input->post('shopName'),
	    'shopType' => $this->input->post('shopType')
	);
	$this->load->model('MainModel');
	$rslt=$this->MainModel->shop_registration($reg_data);
	if($rslt==true){echo 1;}else{echo 0;}
}else{
echo 2;
}
}


}