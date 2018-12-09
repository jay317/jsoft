<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OpticsModel extends CI_Model {


function optOrderSave($ordData){
$orderData= array(
		'icw_shopId0317'=>$ordData['shopId'],
		'icw_opt_date0317'=>$ordData['date'],
		'icw_opt_cName0317'=>$ordData['cusName'],	
		'icw_opt_cMobile0317'=>$ordData['mobile'],
		'icw_opt_frame0317'=>$ordData['frame'],
		'icw_opt_lense0317'=>$ordData['lenses'],
		'icw_opt_totalAmt0317'=>$ordData['totalAmount'],
		'icw_opt_advance0317'=>$ordData['advnc'],
		'icw_opt_balance0317'=>$ordData['balance'],
		'icw_opt_orderNo_0317'=>$ordData['orderNo'],
		'icw_rdSph0317'=>$ordData['rdSph'],
		'icw_rdCyl0317'=>$ordData['rdCyl'],
		'icw_rdAxis0317'=>$ordData['rdAxis'],
		'icw_rnSph0317'=>$ordData['rnSph'],
		'icw_rnCyl0317'=>$ordData['rnCyl'],
		'icw_rnAxis0317'=>$ordData['rnAxis'],
		'icw_ldSph0317'=>$ordData['ldSph'],
		'icw_ldCyl0317'=>$ordData['ldCyl'],
		'icw_ldAxis0317'=>$ordData['ldAxis'],
		'icw_lnSph0317'=>$ordData['lnSph'],
		'icw_lnCyl0317'=>$ordData['lnCyl'],
		'icw_lnAxis0317'=>$ordData['lnAxis'],
	 	); 
$ins=$this->db->insert('icw_opt_order_0317', $orderData);
if($ins){
return true;
}else{
return false;
}
}

function optOrderGet($last_order_no){
	$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
	$this->db->select('*');
	$this->db->from('icw_opt_order_0317');
	$this->db->where('icw_opt_orderNo_0317',$last_order_no);
	$this->db->where('icw_shopId0317',$shopId);
	$qry=$this->db->get()->row();
	return $qry;
}

function optOrderListGet(){
	$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
	$this->db->select('*');
	$this->db->from('icw_opt_order_0317');
	$this->db->order_by('icw_opt_orderNo_0317','desc');
	$this->db->where('icw_shopId0317',$shopId);
	$qry=$this->db->get()->result();
	return $qry;
}

function optOrderPaid($last_order_no){
	$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
	$data=array('icw_opt_balance0317'=>0,'icw_opt_advance0317'=>0);
	$this->db->where('icw_opt_orderNo_0317',$last_order_no);
	$this->db->where('icw_shopId0317',$shopId);
	$updt=$this->db->update('icw_opt_order_0317',$data);
	if($updt == true){
		return true;}else{ return false;}

}

function orderDispatch($last_order_no){
	$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
$data=array('icw_opt_dispatch0317'=>1);
	$this->db->where('icw_opt_orderNo_0317',$last_order_no);
	$this->db->where('icw_shopId0317',$shopId);
	$updt=$this->db->update('icw_opt_order_0317',$data);
	if($updt == true){
		return true;}else{ return false;}
}

function orderDelete($del_id){
	$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
$this->db->where('icw_opt_Id0317',$del_id);
$this->db->where('icw_shopId0317',$shopId);
	$delete=$this->db->delete('icw_opt_order_0317');
	if($delete == true){
		return true;}else{ return false;}
}

function getTemplates($shopType){
	$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
	    $this->db->select('*');
		$this->db->where('icw_template_type0317',$shopType);
		$this->db->from('icw_templates_0317');
		//$this->db->where('icw_shopId0317',$shopId);
		$rslt=$this->db->get();
		return $rslt->result();			
}
function getTechnician(){
	$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		$this->db->select('*');
		$this->db->where('icw_userType0317','user');
		//$this->db->where('icw_shopId0317',$shopId);
		$this->db->from('icw_users_0317');
		$rslt=$this->db->get()->row();
		if(count($rslt)>0){
		return $rslt;
		}else{ return false;}
}

function invoice_list(){
	$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
	$this->db->select('icw_opt_Id0317 as id, icw_opt_totalAmt0317 as total, icw_opt_advance0317 as advance, icw_opt_balance0317 as balance, icw_opt_cMobile0317 as mobile, icw_opt_date0317 as date');
	$this->db->from('icw_opt_order_0317');
	$this->db->where('icw_shopId0317',$shopId);
	$rslt=$this->db->get();
		return $rslt->result();
}
/*----- dashboard data display--- */
   public function optDashboardDataDetails(){
   	$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		
		$this->db->select('sum(icw_opt_totalAmt0317) as icw_opt_totalAmt0317');
		$this->db->from('icw_opt_order_0317');
		$this->db->where('icw_opt_balance0317=',0);
		$this->db->where('icw_shopId0317',$shopId);
		$totalAmtDt=$this->db->get()->row();
		
		$this->db->select('sum(icw_opt_advance0317) as icw_opt_advance0317');
		$this->db->from('icw_opt_order_0317');
		$this->db->where('icw_opt_balance0317 >',0);
		$this->db->where('icw_shopId0317',$shopId);
		$totalAdvAmtDt=$this->db->get()->row();
		
		$this->db->select('sum(icw_opt_balance0317) as icw_opt_balance0317');
		$this->db->from('icw_opt_order_0317');
		$this->db->where('icw_opt_advance0317 >',0);
		$this->db->where('icw_shopId0317',$shopId);
		$totalBalAmtDt=$this->db->get()->row();
		
		$this->db->select('sum(icw_opt_totalAmt0317) as icw_opt_totalAmt0317,icw_opt_date0317 as date');
		$this->db->from('icw_opt_order_0317');
		$this->db->group_by('icw_opt_date0317');
		$this->db->where('icw_shopId0317',$shopId);		
		$this->db->where('icw_opt_date0317 BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
		$queryWeekData=$this->db->get()->result();
		
		$this->db->select('sum(icw_opt_totalAmt0317) as icw_opt_totalAmt0317,icw_opt_date0317 as date');
		$this->db->from('icw_opt_order_0317');
		$this->db->group_by('icw_opt_date0317');
		$this->db->where('icw_shopId0317',$shopId);			
		$this->db->where('icw_opt_date0317 BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()');
		$queryMonthData=$this->db->get()->result();
		
		$this->db->where('icw_fk_shop_id0317',$shopId);
		$TotalRegistration=$this->db->get('icw_users_0317');
		$TotalRegistration=$TotalRegistration->num_rows();
		
		$qry=array('queryWeekData'=>$queryWeekData,'queryMonthData'=>$queryMonthData,'TotalRegistration'=>$TotalRegistration,'totalAmtDt'=>$totalAmtDt,'totalAdvAmtDt'=>$totalAdvAmtDt,'totalBalAmtDt'=>$totalBalAmtDt);		
		return $qry;
   }

}
?>