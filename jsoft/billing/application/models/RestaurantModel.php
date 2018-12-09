<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RestaurantModel extends CI_Model {

public function tableAddDt($id='',$tableName, $seats, $images)
{
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
$data = array(
   'icw_restra_tblNo_0317' => $tableName ,
   'icw_restra_seats_0317' => $seats,
   'icw_restra_img_0317' => $images,
    'icw_fk_shop_id' => $shopId
);
if($id){
	$this->db->where('icw_restra_id_0317', $id);
	$this->db->where('icw_fk_shop_id', $shopId);
	$ins = $this->db->update('icw_restra_table_0317', $data); 
}else{
	$ins = $this->db->insert('icw_restra_table_0317', $data); 
}
return $ins;
}

public function servitorAddDt($id='',$sno, $sname, $images)
{
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;   
$data = array(
   'icw_restra_serNo_0317' => $sno ,
   'icw_restra_serName_0317' => $sname,
   'icw_restra_img_0317' => $images,
    'icw_fk_shop_id' => $shopId
);
if($id){
	$this->db->where('icw_restra_id_0317', $id);
	$this->db->where('icw_fk_shop_id', $shopId);
	$ins = $this->db->update('icw_restra_servitor_0317', $data); 
}else{
	$ins = $this->db->insert('icw_restra_servitor_0317', $data); 
}
return $ins;
}

function getTableStatus(){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
    
    $this->db->select('icw_restra_tblNo0317 as tbl_no');
    $this->db->group_by('icw_restra_tblNo0317');
    $this->db->where('icw_fk_shop_id', $shopId);
    $this->db->from('icw_restra_order_0317');
    $tbl_query = $this->db->get()->result();
    
    $free_query='';
    $full_query='';
    if($tbl_query){
        foreach($tbl_query as $td) {
            $tbl_no[]=$td->tbl_no;
        }
    
    $this->db->select('icw_restra_id_0317 as tid, icw_restra_tblNo_0317 as tname');
    $this->db->where_in('icw_restra_tblNo_0317', $tbl_no);
    $this->db->where('icw_fk_shop_id', $shopId);
    $this->db->from('icw_restra_table_0317');
    $full_query = $this->db->get()->result();
    
    $this->db->select('icw_restra_id_0317 as tid, icw_restra_tblNo_0317 as tname');
    $this->db->where_not_in('icw_restra_tblNo_0317', $tbl_no);
    $this->db->where('icw_fk_shop_id', $shopId);
    $this->db->from('icw_restra_table_0317');
    $free_query = $this->db->get()->result();
    $detail_query=array(
        'full_query'=>$full_query,
        'free_query'=>$free_query
    );
    return $detail_query;
}else{
    return false;
}


}

function getTableList(){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;  
    
		$this->db->select('icw_restra_id_0317 as tid, icw_restra_tblNo_0317 as tname, icw_restra_seats_0317 as seat, icw_restra_img_0317 as img');
		$this->db->where('icw_fk_shop_id', $shopId);
		$this->db->from('icw_restra_table_0317');
		$detail_query = $this->db->get()->result(); 
		return $detail_query;
}
function getServitorList(){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
    
		$this->db->select('icw_restra_id_0317 as sid, icw_restra_serNo_0317 as sno, icw_restra_serName_0317 as sname, icw_restra_img_0317 as img');
		$this->db->where('icw_fk_shop_id', $shopId);
		$this->db->from('icw_restra_servitor_0317');
		$detail_query = $this->db->get()->result();
		return $detail_query;
}

public function getTableById($id)
{
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
	$this->db->select('*');
	$this->db->from('icw_restra_table_0317');
	$this->db->where('icw_restra_id_0317', $id);
	$this->db->where('icw_fk_shop_id', $shopId);
$query = $this->db->get()->row();
return $query;
}

public function getServitorById($id)
{
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
	$this->db->select('*');
	$this->db->from('icw_restra_servitor_0317');
	$this->db->where('icw_restra_id_0317', $id);
	$this->db->where('icw_fk_shop_id', $shopId);
$query = $this->db->get()->row();
return $query;
}

function deleteTable($id){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
    $this->db->where('icw_restra_id_0317', $id);
    $this->db->where('icw_fk_shop_id', $shopId);
	$delete=$this->db->delete('icw_restra_table_0317'); 
		if($delete == TRUE)
		{
			return $delete;
		}
}
function deleteServitor($id){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
    $this->db->where('icw_restra_id_0317', $id);
    $this->db->where('icw_fk_shop_id', $shopId);
	$delete=$this->db->delete('icw_restra_servitor_0317'); 
		if($delete == TRUE)
		{
			return $delete;
		}
}

function getCategory(){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
	    $this->db->select('icw_ci0317 as cid, icw_cn0318 as cname');
	    $this->db->where('icw_fk_shop_id0317', $shopId);
		$this->db->from('icw_cat_0317');
		$detail_query = $this->db->get()->result();
		//print_r($detail_query);die;
		return $detail_query;
}

public function getItemByCat($id)
	{
	    $settingDetails=$this->session->userdata('settingDetails');
	    $shopId=$settingDetails->icw_shopId0317;
		$this->db->select('icw_pi0317,icw_pn0317,icw_pisa0317');
		$this->db->where('icw_cid0317',$id);
		$this->db->where('icw_fk_shop_id', $shopId);
		$this->db->from('icw_pro_0317');
		$query = $this->db->get();
		return $query;
	}


	
function getItems(){
	$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		
		$this->db->select('a.icw_pi0317 as pid, a.icw_pn0317 as name, a.icw_prs0317 as price, b.icw_imgname0317 as img');
		$this->db->from('icw_pro_0317 a');
		$this->db->join('icw_img_0317 b', 'b.icw_pid0317=a.icw_pi0317');
		$this->db->where('a.icw_fk_shop_id',$shopId);
		$detail_query = $this->db->get()->result();
		//print_r($detail_query);die;
		return $detail_query;
}

function addItems($pid){ 
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
		$this->db->select('a.icw_pi0317 as pid, a.icw_pn0317 as name, a.icw_prs0317 as price, b.icw_imgname0317 as img');
		$this->db->from('icw_pro_0317 a');
		$this->db->join('icw_img_0317 b', 'b.icw_pid0317=a.icw_pi0317');
		$this->db->where('a.icw_pi0317',$pid);
		$this->db->where('a.icw_fk_shop_id', $shopId);
		$detail_query = $this->db->get()->row();
		//print_r($detail_query);die;
		return $detail_query;
}

function orderSave($tblNo,$servNo,$ordType){
	$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
$exist_order_no=$this->db->select('icw_restra_orderNo_0317')->where('icw_restra_tblNo0317',$tblNo)->get('icw_restra_order_0317')->row();
$last_order_no  =$this->db->select('icw_restra_orderNo_0317')->order_by('icw_restra_orderNo_0317','desc')->limit(1)->get('icw_restra_order_0317')->row('icw_restra_orderNo_0317');
	 	if($last_order_no ==0){
	 		$last_order_no=1;
	 	}elseif($last_order_no !=0 && count($exist_order_no)>0){
	 		$last_order_no=$exist_order_no->icw_restra_orderNo_0317;
	 	}else{
	 		$last_order_no=$last_order_no + 1;
	 	}
	$previousItems = $this->session->userdata("add_items")?$this->session->userdata("add_items"):array(); 
	 foreach($previousItems as $row) {
      $orderData= array(
      'icw_restra_orderNo_0317'=>$last_order_no,
      'icw_restra_tblNo0317'=>$tblNo,
      'icw_restra_servNo0317'=>$servNo,
      'icw_restra_orderType0317'=>$ordType,
      'icw_restra_item0317'=>$row['item_name'],
      'icw_restra_qty0317'=>$row['item_qty'],
      'icw_restra_price0317'=>$row['item_price'],
      'icw_restra_total0317'=>$row['item_total'],
      'icw_fk_shop_id'=>$shopId     	
		);
	 $orderDataMap= array(
      'icw_restra_orderNo_0317'=>$last_order_no,
      'icw_restra_tblNo0317'=>$tblNo,
      'icw_restra_orderStatus_0317'=>1   	
		);
	 $ins=$this->db->insert('icw_restra_order_0317', $orderData);
	 //$ins2=$this->db->insert('icw_restra_ordermap_0317', $orderDataMap);
	 }
	  $this->session->set_userdata('add_items', null);
			return true;
}

function deleteOrd($ord_id){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
    $this->db->where("icw_restra_orderId_0317",$ord_id);
    $this->db->where('icw_fk_shop_id', $shopId);
	$delete=$this->db->delete('icw_restra_order_0317');
	if($delete){
		return true;
	}else{
		return false;
	}
}

function getTax(){
	$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		
	$this->db->select("*");
	$this->db->from("icw_tax_0317");
	$this->db->where("icw_fk_shop_id",$shopId);
	$res=$this->db->get()->row();
	if($res){
		//return $res;
		//print_r($res); die;
		$taxid=$res->icw_id0317;
		$this->db->select("*");
		$this->db->from("icw_taxmap_0317");
		$this->db->where("icw_taxId0317",$taxid);
		$this->db->where("icw_fk_shop_id",$shopId);
		$result=$this->db->get()->result();
		return $taxDetail=array('result'=>$result,'res'=>$res);
	}else{
		return false;
	}
}

function getBill($tblNo){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
    
	$this->db->select("icw_restra_orderId_0317 as orderid,
    icw_restra_orderNo_0317 as orderno, icw_restra_tblNo0317 as tblno,icw_restra_item0317 as items,
    icw_restra_qty0317 as qty, icw_restra_price0317 as price, icw_restra_total0317 as total, 
    icw_restra_servNo0317 as servno, icw_restra_orderType0317 as ordertype, icw_restra_ordStatus_0317 as orderstatus,
    icw_restra_availStatus_0317 as availstatus");
	$this->db->from("icw_restra_order_0317");
	$this->db->where("icw_restra_tblNo0317",$tblNo);
	$this->db->where('icw_fk_shop_id', $shopId);
	$res=$this->db->get()->result();
	if($res){
		return $res;
	}else{
		return false;
	}
}

function getbillTable(){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
    
	$this->db->select("icw_restra_tblNo0317 as tblno, icw_restra_servNo0317 as servno");
	$this->db->from("icw_restra_order_0317");
	$this->db->group_by("icw_restra_tblNo0317");
	$this->db->order_by("icw_restra_orderNo_0317","asc");
	$this->db->where('icw_fk_shop_id', $shopId);
	$res=$this->db->get()->result();
	return $res;
	//print_r($res);die;
}

function getOrderr(){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
    
	$this->db->select("icw_restra_orderId_0317 as ordid,
    icw_restra_orderNo_0317 as ordno, icw_restra_tblNo0317 as tblno, 
    icw_restra_item0317 as items, icw_restra_qty0317 as qty, icw_restra_ordStatus_0317 as status, 
    icw_restra_availStatus_0317 as availstatus, icw_restra_servNo0317 as servno");
	$this->db->from("icw_restra_order_0317");
	$this->db->group_by("icw_restra_tblNo0317");
	$this->db->order_by("icw_restra_orderNo_0317","desc");
	$this->db->where('icw_fk_shop_id', $shopId);
	$res=$this->db->get()->result();
	return $res;
}

function getOrder(){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
    
	$this->db->select("icw_restra_orderId_0317 as ordid,
    icw_restra_orderNo_0317 as ordno, icw_restra_tblNo0317 as tblno, 
    icw_restra_item0317 as items, icw_restra_qty0317 as qty,icw_restra_servNo0317 as servno, 
    icw_restra_availStatus_0317 as availstatus, icw_restra_ordStatus_0317 as status");
	$this->db->from("icw_restra_order_0317");
	//$this->db->group_by("icw_restra_tblNo0317");
	$this->db->order_by("icw_restra_item0317","desc");
	$this->db->where('icw_fk_shop_id', $shopId);
	$res=$this->db->get()->result();
	return $res;
}

function getParcel(){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
    
	$this->db->select("icw_restra_orderNo_0317 as ordno, icw_restra_tblNo0317 as tblno, icw_restra_item0317 as items, icw_restra_qty0317 as qty, icw_restra_ordStatus_0317 as status");
	$this->db->from("icw_restra_order_0317");
	$this->db->like("icw_restra_tblNo0317","%P%");
	$this->db->group_by("icw_restra_tblNo0317");
	$this->db->order_by("icw_restra_orderNo_0317","desc");
	$this->db->where('icw_fk_shop_id', $shopId);
	$res=$this->db->get()->result();
	return $res;
}

function changeStatus($ord_id){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
    
    $this->db->select('icw_restra_ordStatus_0317 as sts');	
	$this->db->where("icw_restra_orderId_0317",$ord_id);
	$this->db->where('icw_fk_shop_id', $shopId);
	$dt=$this->db->get('icw_restra_order_0317')->row();
	if($dt->sts ==1){
	    $sts=0;
	}else{
	    $sts=1;
	}
	$this->db->set("icw_restra_ordStatus_0317",$sts);
	$this->db->where("icw_restra_orderId_0317",$ord_id);
	$updt=$this->db->update('icw_restra_order_0317');
	if($updt==true){
		return true;
	}else{
		return false;
	}
}

function changeAvailStatus($ord_id){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
    
    $this->db->select('icw_restra_availStatus_0317 as sts');
    $this->db->where("icw_restra_orderId_0317",$ord_id);
    $this->db->where('icw_fk_shop_id', $shopId);
    $dt=$this->db->get('icw_restra_order_0317')->row();
    if($dt->sts ==1){
        $sts=0;
    }else{
        $sts=1;
    }
    $this->db->set("icw_restra_availStatus_0317",$sts);
    $this->db->where("icw_restra_orderId_0317",$ord_id);
    $updt=$this->db->update('icw_restra_order_0317');
    if($updt==true){
        return true;
    }else{
        return false;
    }
}

function invoList(){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
    
	$this->db->select('icw_restra_invoId_0317 as invono,icw_restra_orderNo_0317 as ordno,
	icw_restra_tblNo0317 as tblno,icw_restra_orderType0317 as ordtype,
	icw_restra_servNo0317 as servno,icw_restra_total0317 as total,icw_restra_totalTax0317 as totaltax, 
	icw_restra_grandTotal0317 as grandtotal,icw_restra_disAmt_0317 as discountamt, icw_restra_payAmt_0317 as payamt,
    icw_restra_ordDate_0317 as date,
	');	
	$this->db->where('icw_fk_shop_id', $shopId);
	$this->db->from('icw_restra_invo_0317');
		$q_table=$this->db->get()->result();
		
		return $q_table;
}
function getInvoDel($invoNo){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
    $this->db->where("icw_restra_invoNo_0317",$invoNo);
    $this->db->where('icw_fk_shop_id', $shopId);
	$delete=$this->db->delete('icw_restra_invo_0317');
	
	$this->db->where("icw_restra_invoid_0317",$invoNo);
	$this->db->where('icw_fk_shop_id', $shopId);
	$delete=$this->db->delete('icw_restra_invotax_0317');
	if($delete){
		return true;
	}else{
		return false;
	}
}
function invoicePrint($ordNo,$tblNo,$date,$invono){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
    
	$this->db->select('icw_restra_invoId_0317 as invono, icw_restra_orderNo_0317 as ordno,
	icw_restra_tblNo0317 as tblno,icw_restra_orderType0317 as ordtype,
	icw_restra_total0317 as total,icw_restra_totalTax0317 as totaltax,
	icw_restra_grandTotal0317 as grandtotal,icw_restra_ordDate_0317 as date,
	icw_restra_disPer_0317 as disper,
	icw_restra_disAmt_0317 as disamt,icw_restra_payAmt_0317 as payamt
	');
	$this->db->where("icw_restra_tblNo0317",$tblNo);
	$this->db->where("icw_restra_orderNo_0317",$ordNo);
	$this->db->where("icw_restra_ordDate_0317",$date);
	$this->db->where('icw_fk_shop_id', $shopId);
	$this->db->from('icw_restra_invo_0317');
	$result_invo=$this->db->get()->result();
	
	$this->db->select('icw_restra_item_0317 as item, icw_restra_qty_0317 as qty, icw_restra_price_0317 as price, icw_restra_itemtotal_0317 as itemtotal');
	$this->db->where("icw_restra_invoNo_0317",$invono);
	//$this->db->where("icw_restra_orderNo_0317",$ordNo);
	//$this->db->where("icw_restra_ordDate_0317",$date);
	$this->db->where('icw_fk_shop_id', $shopId);
	$this->db->from('icw_restra_invo_item_0317');
	$result_item=$this->db->get()->result();
	
	$this->db->select('icw_restra_taxtype_0317 as taxtype,icw_restra_taxper_0317 as taxper,
	icw_restra_taxamt_0317 as taxamt
	');
	$this->db->where("icw_restra_invoid_0317",$invono);
	$this->db->from('icw_restra_invotax_0317');
	$result_tax=$this->db->get()->result();
	
	$dt=array('result_invo'=>$result_invo,'result_item'=>$result_item,'result_tax'=>$result_tax);
		return $dt;
	
}

function ordInvoSave($tblNo,$result, $finalCalData){
	
	$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		
// 	$last_invo_no  =$this->db->select('icw_restra_invoNo_0317')->order_by('icw_restra_invoNo_0317','desc')->limit(1)->get('icw_restra_invo_0317')->row('icw_restra_invoNo_0317');
// 		if($last_invo_no ==0){
// 			$last_invo_no=1;
// 		}else{
// 			$last_invo_no=$last_invo_no + 1;
// 		}
		
	foreach($result as $results){
		$resultss[]=$results;
	}
	$ord_items='';
	foreach($resultss as $row){}
	
	$data=array(
	  'icw_fk_shop_id'=>$shopId,
	  'icw_restra_orderNo_0317'=>$row->orderno,
      'icw_restra_tblNo0317'=>$row->tblno,
      'icw_restra_servNo0317'=>$row->servno,
      'icw_restra_orderType0317'=>$row->ordertype,
      'icw_restra_total0317'=>$finalCalData['totalAmt'],
	  'icw_restra_totalTax0317'=>$finalCalData['taxAmt'],
	  'icw_restra_grandTotal0317'=>$finalCalData['grandTotal'],	  	  
	  'icw_restra_disPer_0317'=>$finalCalData['disVal'],
	  'icw_restra_disAmt_0317'=>$finalCalData['disAmt'],
	  'icw_restra_payAmt_0317'=>$finalCalData['payAmt'],
	  'icw_restra_ordDate_0317'=>date("Y-m-d")	   
	);
	$ins=$this->db->insert('icw_restra_invo_0317', $data);
	$ins_id=$this->db->insert_id();
	
	foreach($resultss as $row_item){
	$data_item=array(
	    'icw_fk_shop_id'=>$shopId,
	    'icw_restra_invoNo_0317'=>$ins_id,
	    'icw_restra_item_0317'=>$row_item->items,
	    'icw_restra_qty_0317'=>$row_item->qty,
	    'icw_restra_price_0317'=>$row_item->price,
	    'icw_restra_itemtotal_0317'=>$row_item->qty * $row_item->price,
	);
	$ins=$this->db->insert('icw_restra_invo_item_0317', $data_item);
  } 
foreach($finalCalData['taxdtl'] as $dt){
		$dat=array(
		    'icw_restra_invoid_0317'=>$ins_id,
	      'icw_restra_taxtype_0317'=>$dt['tname'],
	      'icw_restra_taxper_0317'=>$dt['tper'],
		  'icw_restra_taxamt_0317'=>$dt['tamt']
		);
	$tax_ins=$this->db->insert('icw_restra_invoTax_0317', $dat);
	}
	if($ins){  
   $this->db->where("icw_restra_tblNo0317",$tblNo);
	$updt=$this->db->delete('icw_restra_order_0317');
		return true;
	}else{
		return false;
	}
  
}

function getCancle($tblNo){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
	$this->db->where("icw_restra_tblNo0317",$tblNo);
	$this->db->where('icw_fk_shop_id',$shopId);
	$delete=$this->db->delete('icw_restra_order_0317');
	if($delete){
		return true;
	}else{
		return false;
	}
}

public function getFilter($id,$typ){
    $settingDetails=$this->session->userdata('settingDetails');
    $shopId=$settingDetails->icw_shopId0317;
    $this->db->select('icw_restra_tblNo0317 as tblno, icw_restra_invoId_0317 as invono,
        icw_restra_servNo0317 as servno, icw_restra_payAmt_0317 as payamt,
        icw_restra_ordDate_0317 as date');
    if($typ=='t'){
        $this->db->where("icw_restra_tblNo0317",$id);
    }elseif($typ=='s'){
        $this->db->where("icw_restra_servNo0317",$id);
    }elseif($typ=='p'){
        $this->db->where("icw_restra_tblNo0317 LIKE '%P%'");
    }
   
    $this->db->from('icw_restra_invo_0317');
    $this->db->where('icw_fk_shop_id',$shopId);
    $result=$this->db->get()->result();
    if($result){
        $rslt=array('result'=>$result,'typ'=>$typ,'id'=>$id);
        return $rslt;
    }else{
        $rslt=array('result'=>$result,'typ'=>$typ,'id'=>$id);
        return $rslt;
    }
}
/*----- dashboard data display--- */
   public function resDashboardDataDetails(){
   	$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		$this->db->where('icw_fk_shop_id',$shopId);
		$this->db->select('sum(icw_restra_grandTotal0317) as grandTotal');
		$this->db->from('icw_restra_invo_0317');
				
		$grandTotAmtDt=$this->db->get()->row();		

		$this->db->select('sum(icw_restra_grandTotal0317) as grandTotal');
		$this->db->from('icw_restra_invo_0317');
		$this->db->where('icw_restra_ordDate_0317',date('Y-m-d'));
		$this->db->where('icw_fk_shop_id',$shopId);
		$todaygrandTotAmtDt=$this->db->get()->row();
					
		$this->db->select('*');
		$this->db->from('icw_restra_invo_0317');
		$this->db->where('icw_restra_ordDate_0317',date('Y-m-d'));
		$this->db->where('icw_fk_shop_id',$shopId);
		$q_order=$this->db->get();
		$todayTotalOrder=$q_order->num_rows();
		 
		$this->db->select('*');
		$this->db->from('icw_restra_invo_0317');
		$this->db->where('icw_restra_ordDate_0317',date('Y-m-d'));
		$this->db->where('icw_restra_orderType0317=',1);
		$this->db->where('icw_fk_shop_id',$shopId);
		$q_table=$this->db->get();
		$todayTotalTable=$q_table->num_rows();
		
		$this->db->select('*');
		$this->db->from('icw_restra_invo_0317');
		$this->db->where('icw_restra_ordDate_0317',date('Y-m-d'));
		$this->db->where('icw_restra_orderType0317=',2);
		$this->db->where('icw_fk_shop_id',$shopId);
		$q_parcel=$this->db->get();
		$todayTotalParcel=$q_parcel->num_rows();
		
		$this->db->select('sum(icw_restra_grandTotal0317) as weekgrandTotal,icw_restra_ordDate_0317 as date');
		$this->db->from('icw_restra_invo_0317');	
		$this->db->where('icw_restra_ordDate_0317 BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
		$this->db->where('icw_fk_shop_id',$shopId);
		$queryWeekData=$this->db->get()->result();
		
		$this->db->select('sum(icw_restra_grandTotal0317) as monthgrandTotal,icw_restra_ordDate_0317 as date');
		$this->db->from('icw_restra_invo_0317');		
		$this->db->where('icw_restra_ordDate_0317 BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()');
		$this->db->where('icw_fk_shop_id',$shopId);
		$queryMonthData=$this->db->get()->result();
		
		$TotalRegistration=$this->db->get('icw_users_0317');
		$TotalRegistration=$TotalRegistration->num_rows();
		
		$qry=array('queryWeekData'=>$queryWeekData,'queryMonthData'=>$queryMonthData,'TotalRegistration'=>$TotalRegistration,'grandTotAmtDt'=>$grandTotAmtDt,'todaygrandTotAmtDt'=>$todaygrandTotAmtDt,'todayTotalOrder'=>$todayTotalOrder,'todayTotalTable'=>$todayTotalTable,'todayTotalParcel'=>$todayTotalParcel);		
		return $qry;
   }


 

}
?>