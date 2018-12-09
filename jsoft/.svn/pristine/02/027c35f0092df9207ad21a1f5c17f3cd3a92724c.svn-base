<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class  ClientModel extends CI_Model{

function addClient($id='',$data){
	$settingDetails=$this->session->userdata('settingDetails');
	$shopId=$settingDetails->icw_shopId0317;
	$data=Array( 
	'icw_clientName0317' =>$data['cName'],
	'icw_clientMobile0317' =>$data['cMobile'],
	'icw_clientEmail0317' =>$data['cEmail'],
	'icw_clientBtitle0317 ' =>$data['cBusinessTitle'],
	'icw_clientGrn0317' =>$data['cGrn'],
	'icw_clientAddr10317 ' =>$data['cAddress1'],
	'icw_clientAddr20317' =>$data['cAddress2'],
	'icw_clientCity0317' =>$data['city'],
	'icw_clientState0317' =>$data['state'],
	'icw_clientZipCode0317' =>$data['postalCode'],
	'icw_clientCountry0317' =>$data['country'],
	'icw_clientImg0317' =>$data['image'],
	'icw_isa0317' =>1,
	'icw_fk_shop_id'=>$shopId
	);
	
	if($id)
	{
		$this->db->where('icw_clientId0317', $id);
		$this->db->where('icw_fk_shop_id', $shopId);
	    $updts = $this->db->update('icw_clients_0317', $data); 
	    return $updts;
	}else{
	    $ins = $this->db->insert('icw_clients_0317', $data);
	    return $ins;
	}
	
}

public function getClient()
{		$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		$this->db->select('*');
		$this->db->from('icw_clients_0317');
		$this->db->order_by("icw_clientId0317",'desc');
		$this->db->where('icw_fk_shop_id', $shopId);
		$query = $this->db->get();
		//print_r($query);
		
		return $query;
}

public function getClientById($id)
{	
	$settingDetails=$this->session->userdata('settingDetails');
	$shopId=$settingDetails->icw_shopId0317;
	//$this->db->select('a.*,b.id,b.country_name');
	//$this->db->from('icw_clients_0317 a');
	//$this->db->join('icw_countries b','a.icw_clientCountry0317=b.id');
	$this->db->select('*');
	$this->db->from('icw_clients_0317 a');
	$this->db->where('icw_clientId0317', $id); 
	$this->db->where('icw_fk_shop_id', $shopId);
$query = $this->db->get()->row();
return $query;
}
public function purchaseDetails($client_id){
		$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		
        $this->db->select('*');
		$this->db->from('icw_invoice_0317');
		 //$this->db->from('icw_invoice_prodetails_0317');
		$this->db->where('icw_balanceAmt0317 >',0);
		$this->db->where('icw_clientId0317',$client_id);
		$this->db->where('icw_shopId0317', $shopId);
		$purchaseDuesList=$this->db->get()->result();

		$this->db->select('max(icw_invoDate0317) as icw_invoDate0317');
		$this->db->from('icw_invoice_0317');
		$this->db->where('icw_clientId0317',$client_id);
		$this->db->where('icw_shopId0317', $shopId);
		$purchaseLastDate=$this->db->get()->row();
		
		$this->db->select('sum(icw_totalAmt0317) as icw_totalAmt0317,sum(icw_amtWithTax0317) as icw_amtWithTax0317,sum(icw_paidAmount0317) as icw_paidAmount0317,sum(icw_balanceAmt0317) as icw_balanceAmt0317');
		$this->db->from('icw_invoice_0317');
		$this->db->where('icw_clientId0317',$client_id);
		$this->db->where('icw_shopId0317', $shopId);
		$blncData=$this->db->get()->row();
		
		
		$qry=array('dueList'=>$purchaseDuesList,'lastDate'=>$purchaseLastDate,'blncData'=>$blncData);
		return $qry;
}


public function getCountry()
{
$query = $this->db->get('icw_countries');
return $query;
}

public function getClientInfo($data){
	$settingDetails=$this->session->userdata('settingDetails');
	$shopId=$settingDetails->icw_shopId0317;
	
	$this->db->select('*');
	$this->db->from('icw_clients_0317');
	$this->db->where('icw_fk_shop_id', $shopId);
	$this->db->like('icw_clientName0317',$data);
	//$this->db->where('icw_clientName0317', $data); 
$query = $this->db->get()->result();
return $query;
}

public function getClntByDt($clntName,$clntMobile){
	$settingDetails=$this->session->userdata('settingDetails');
	$shopId=$settingDetails->icw_shopId0317;
	
	if($clntName !=''){ 
	$this->db->select('*');
	$this->db->from('icw_clients_0317');
	$this->db->where('icw_fk_shop_id', $shopId);
	$this->db->like('icw_clientName0317',$clntName); 
$query = $this->db->get()->result();
	if($query){
	return $query;
	}else{
		return false;
	}
}elseif($clntMobile !='') { 
	$this->db->select('*');
	$this->db->from('icw_clients_0317');
	$this->db->where('icw_fk_shop_id', $shopId);
	$this->db->like('icw_clientMobile0317',$clntMobile); 
$query = $this->db->get()->result();
	if($query){
	return $query;
	}else{
		return false;
	}
}else{
	return false;
}
}

public function deleteClient($id){
	$settingDetails=$this->session->userdata('settingDetails');
	$shopId=$settingDetails->icw_shopId0317;
	
	$this->db->where('icw_clientId0317', $id);
	$this->db->where('icw_fk_shop_id', $shopId);
	$delete=$this->db->delete('icw_clients_0317');
	if($delete==true){return true;}else{return false;}
}

} 
?>