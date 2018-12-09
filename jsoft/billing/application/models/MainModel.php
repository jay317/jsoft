<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model {

	public function check_user_login($username, $password)
	{

		$this -> db -> select('icw_userId0317, icw_userName0317 , icw_userFname0317,icw_userPwd0317, icw_userType0317,
 icw_user_is_active0317,icw_userImg0317');
		$this -> db -> from('icw_users_0317');
		$this -> db -> where('icw_userName0317', $username);
		$this -> db -> where('icw_userPwd0317', MD5($password));
		$this -> db -> where('icw_user_is_active0317',1);
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		//  echo $this->db->last_query();
			
		if($query -> num_rows() == 1)
		{
			// print_r($query->result()); die;
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	public function getShop(){
		$this->db->select('icw_shopId0317 as shopid, icw_shop_name0317 as shopname');
		$this->db->from('icw_shop_0317');
		$result=$this->db->get();
		if($result->num_rows()>0){
			return $result->result();
		}else{
			return false;
		}
	}
	public function addNewUser($data){

		$ins=$this->db->insert('icw_users_0317',$data);
		if($ins == TRUE){
			return true;
		}else{
			return false;
		}
	}
	public function deleteUserById($id)
	{
		$this->db->where('icw_userId0317', $id);
		$delete=$this->db->delete('icw_users_0317');
		if($delete == TRUE)
		{
			return true;
		}
	}
	public function actionUserById($id)
	{
		$this->db->select('*');
		$this->db->where('icw_userId0317',$id);
		$this->db->from('icw_users_0317');
		$result=$this->db->get()->row();
		$status=$result->icw_user_is_active0317;
		if($status == 1){
			$status =0;
		}else{
			$status =1;
		}
		$this->db->set('icw_user_is_active0317',$status);
		$this->db->where('icw_userId0317', $id);
		$update=$this->db->update('icw_users_0317');
		if($update == TRUE)
		{
			return true;
		}
	}
	public function getUserById($id)
	{
		$this->db->select('*');
		$this->db->where('icw_userId0317',$id);
		$this->db->from('icw_users_0317');
		$result=$this->db->get()->row();
		return $result;

	}
	public function allUser(){
		$this->db->select('*');
		$this->db->from('icw_users_0317');
		$this->db->order_by('icw_userId0317','desc');
		$result=$this->db->get()->result();
		return $result;
	}
	public function currUser($userId){
		$this->db->select('*');
		$this->db->where('icw_userId0317',$userId);
		$this->db->from('icw_users_0317');
		$result=$this->db->get()->row();
		return $result;
	}
	public function proImgUpdt($profimg,$userId)
	{
		$this->db->set('icw_userImg0317',$profimg);
		$this->db->where('icw_userId0317',$userId);
		$update=$this->db->update('icw_users_0317');
		if($update == TRUE){
			return true;
		}else{
			return false;
		}
	}
	public function proNameUpdt($data,$userId)
	{
		$this->db->where('icw_userId0317',$userId);
		$update=$this->db->update('icw_users_0317',$data);
		if($update == TRUE){
			return true;
		}else{
			return false;
		}
	}

	public function proPwdUpdt($uPwd,$unPwd,$userId){
		$this->db->select('*');
		$this->db->where('icw_userId0317',$userId);
		$this->db->from('icw_users_0317');
		$rslt=$this->db->get()->row();
		if($rslt->icw_userPwd0317 == md5($uPwd))
		{
			$this->db->set('icw_userPwd0317',trim(md5($unPwd)));
			$this->db->where('icw_userId0317',$userId);
			$update=$this->db->update('icw_users_0317');
			if($update == TRUE)
			{
				return 1;
			}else{
				return 0;
			}
		}else{
			return 2;
		}
	}

	public function settingDetail($userId){
		$this->db->select('icw_fk_shop_id0317');
		$this->db->where('icw_userId0317',$userId);
		$this->db->from('icw_users_0317');
		$rslt=$this->db->get()->row();
		$shopId=$rslt->icw_fk_shop_id0317;

		$this->db->select('*');
		$this->db->from('icw_shop_0317');
		$this->db->where('icw_shopId0317',$shopId);
		$result=$this->db->get();
		if($result->num_rows()==1){
			return $result->row();
		}else{
			return false;
		}
	}
	public function settingUpdate($shopId,$shop_logo)
	{
		$this->db->select('*');
		$this->db->where('icw_shopId0317',$shopId);
		$this->db->from('icw_shop_0317');
		$rslt=$this->db->get();

		if($rslt->num_rows()==1)
		{
			$data=array(
		'icw_shop_type0317'=>$this->input->post('shopType'),
		'icw_shop_name0317'=>$this->input->post('shopName'),
		'icw_shop_mobile0317'=>$this->input->post('shopMobile'),
		'icw_shop_phone0317'=>$this->input->post('shopPhone'),
		'icw_shop_gstin0317'=>$this->input->post('shopGstin'),
		'icw_shop_hsn0317'=>$this->input->post('shopHSN'),
		'icw_shop_Address0317'=>$this->input->post('shopAddress'),
		'icw_shop_TermCondition0317'=>$this->input->post('shopTermCondition'),
		'icw_shop_tax0317'=>$this->input->post('tax_setting'),
		'icw_shop_printer0317'=>$this->input->post('printer_setting'),
		'icw_shop_sms0317'=>$this->input->post('smsGty'),
        'icw_shop_bLogo_0317'=>$shop_logo		
			);
			$this->db->where('icw_shopId0317',$shopId);
			$update=$this->db->update('icw_shop_0317',$data);
			if($update == TRUE){
			 return true;
			}else{
				return false;
			}
		}else{
			$data=array(
		'icw_shopId0317'=>$shopId,
		'icw_shop_type0317'=>$this->input->post('shopType'),
		'icw_shop_name0317'=>$this->input->post('shopName'),
		'icw_shop_mobile0317'=>$this->input->post('shopMobile'),
		'icw_shop_phone0317'=>$this->input->post('shopPhone'),
		'icw_shop_gstin0317'=>$this->input->post('shopGstin'),
		'icw_shop_hsn0317'=>$this->input->post('shopHSN'),
		'icw_shop_Address0317'=>$this->input->post('shopAddress'),
		'icw_shop_TermCondition0317'=>$this->input->post('shopTermCondition'),
		'icw_shop_tax0317'=>$this->input->post('tax_setting'),
		'icw_shop_printer0317'=>$this->input->post('printer_setting'),
		'icw_shop_sms0317'=>$this->input->post('smsGty'),
        'icw_shop_bLogo_0317'=>$shop_logo			
			);
			$ins=$this->db->insert('icw_shop_0317',$data);
			$fk_shop_id=$this->db->insert_id();

			$this->db->set('icw_fk_shop_id0317',$fk_shop_id);
			$this->db->where('icw_userId0317',$this->session->userdata('user_id'));
			$updt=$this->db->update('icw_users_0317');
			if($ins == TRUE && $updt == TRUE){
				return true;
			}else{
				return false;
			}

		}
	}

function templatesUpdate($arrayData){
		
	    $this->db->select('*');
		$this->db->where('icw_id0317',$arrayData['tmplt_id']);
		$this->db->from('icw_templates_0317');
		$rslt=$this->db->get();
		$lastid = $this->db->insert_id();
		if($rslt->num_rows()==1)
		{	
			$actdt=array(
				    'icw_template_id0317'=>$arrayData['tmplt_id'],
					'icw_template_name0317'=>$arrayData['template_name'],
					'icw_sms_tmplt0317'=>$arrayData['sms_template'],
					'icw_email_sub0317'=>$arrayData['email_sub'],
					'icw_email_tmplt0317'=>$arrayData['email_template'],
					'icw_template_type0317'=>$arrayData['template_type'],
					'icw_template_status0317'=>$arrayData['chk_status']
					);
			$this->db->where('icw_id0317',$arrayData['tmplt_id']);
			$act=$this->db->update('icw_templates_0317',$actdt);
			return true;
		}else{
			$lastid=$lastid==0?1:$lastid+1;
			$actdt=array(
			    'icw_template_id0317'=>$lastid,
				'icw_template_name0317'=>$arrayData['template_name'],
				'icw_sms_tmplt0317'=>$arrayData['sms_template'],
				'icw_email_sub0317'=>$arrayData['email_sub'],
				'icw_email_tmplt0317'=>$arrayData['email_template'],
				'icw_template_type0317'=>$arrayData['template_type'],
				'icw_template_status0317'=>$arrayData['chk_status']
				);
			$act=$this->db->insert('icw_templates_0317',$actdt);
			return true;
		}		
}

function templateList(){
	$this->db->select('*');
	$this->db->from('icw_templates_0317');
	$rslt=$this->db->get()->result();
	return $rslt;
}
function templatesData($tmplt_id=0){
	$this->db->select('*');
	if($tmplt_id){
		$this->db->where('icw_id0317',$tmplt_id);
	}
		$this->db->from('icw_templates_0317');
		$rslt=$this->db->get();
		if($tmplt_id){
				return $rslt->row();
		}else{
				return $rslt->result();
		}
		

}

function shop_registration($reg_data){
	
	$data_shop=array(
		'icw_shop_type0317'=>$reg_data['shopType'],
		'icw_shop_name0317'=>$reg_data['shopName']
	);
	$act_shop=$this->db->insert('icw_shop_0317',$data_shop);
	 $insert_id = $this->db->insert_id();
	$act_user=array(
		'icw_userFname0317'=>$reg_data['userName'],
		'icw_userEmail0317'=>$reg_data['userEmail'],
		'icw_userMobile0317'=>$reg_data['shopMobile'],
		'icw_userName0317'=>$reg_data['userId'],
		'icw_userPwd0317 '=>md5($reg_data['userPwd']),
		'icw_userType0317'=>'admin',
		'icw_fk_shop_id0317'=> $insert_id,
		'icw_user_is_active0317'=>1	
	);
	$act_user=$this->db->insert('icw_users_0317',$act_user);
	if($act_shop===true && $act_user===true){ 
			return true;
	}else{return false;}
}

}
?>