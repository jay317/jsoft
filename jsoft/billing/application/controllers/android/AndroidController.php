<?php
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');  

class AndroidController extends CI_Controller {


public function do_login(){ 
		$username = $this->security->xss_clean($this->input->post('uname'));
		$password = $this->security->xss_clean($this->input->post('passwd'));
		
		$responseJson=array();
		$this->load->model('android_model/AndroidLogin_model');
		$result = $this->AndroidLogin_model->validate($username,$password);
		
			if($result=='200'){ 
				$responseJson = array('status'=>'success','status'=>'1',
			'sessid'=>$this->session->userdata('sessid'),'uid'=>$this->session->userdata('uid'),'login_id'=>$this->session->userdata('login_id'),'username'=>$this->session->userdata('username'));
				echo json_encode($responseJson);
			}elseif($result=='201'){ 
				$responseJson = array('status'=>'0','error_code'=>201,'error_message'=>'Account Inactive');
				echo json_encode($responseJson);
			}else if($result=='202'){ 
				$responseJson  = array('status'=>'0','error_code'=>202,'error_message'=>'Invalid username or Password');
				echo json_encode($responseJson);
			}

	}
	
	
public function getCategory(){
	$this->load->model('android_model/AndroidLogin_model');
	$resultJson=$this->AndroidLogin_model->getProductCat();
	$resultJson=$resultJson->result();
	//foreach($resultJson- as $k){}shl_ss_230218u
	echo json_encode($resultJson);
	}
public function getProductById(){
	
	//print_r($_REQUEST['id']);
	 $id=$_REQUEST['id'];
	 $this->load->model('android_model/AndroidLogin_model');
	 $productResult=$this->AndroidLogin_model->getProducts($id);
	 if($productResult==TRUE){
	 //$imgpath="http://172.16.16.10/iconsoft/billing/uploads/products-images";
	 $imgpath= base_url()."uploads/product-images/";
	 $json_dt[]=array('product'=>$productResult,'imgpath'=>$imgpath);
	 echo json_encode($json_dt);
	 }else{
	 	echo 0;
	 }

}
	
}