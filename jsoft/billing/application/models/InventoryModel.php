<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InventoryModel extends CI_Model {

public function getSupplier()
{
$query = $this->db->get('icw_supplier_0317');
return $query->result();
}
public function getSupplierById($id)
{
	$this->db->select('*');
	$this->db->from('icw_supplier_0317');
	$this->db->where('icw_supplier_id0317', $id); 
	$query = $this->db->get()->row();
	return $query;
}

public function addSupplierDt($id='',$arrayData)
{

if($id){
	$this->db->where('icw_supplier_id0317', $id);
	$updt = $this->db->update('icw_supplier_0317', $arrayData); 
}else{
	$updt = $this->db->insert('icw_supplier_0317', $arrayData); 
}
return $updt;
}

public function deleteSupplierById($id)
{	
	$this->db->where('icw_supplier_id0317', $id);
	$delete=$this->db->delete('icw_supplier_0317'); 
		if($delete == TRUE)
		{
			return $delete;
		}
}

public function addStockDt($data,$id='',$stdata)
{
		if($id){
			$this->db->where('icw_stockId0317', $id);
			$updt = $this->db->update('icw_stock_0317', $data);
			
			$this->db->where('icw_stock_productId0317', $this->input->post('proName'));
			$stupdt = $this->db->update('icw_stockMap_0317', $stdata); 
		}else{
			$updt = $this->db->insert('icw_stock_0317', $data); 
			$stupdt = $this->db->insert('icw_stockMap_0317', $stdata);
		}
		return $updt;		
}

public function getProductStock(){
		$this->db->select('a.icw_stockMapId0317 as sid, a.icw_stock_productQty0317 as quantity, b.icw_pn0317 as product');
		$this->db->from('icw_stockMap_0317 a');
		$this->db->join('icw_pro_0317 b','a.icw_stock_productId0317=b.icw_pi0317');
		$result=$this->db->get()->result();
		return $result;
	
	}
public function getStockData(){
		$this->db->select('a.icw_stockId0317 as sid, a.icw_stock_productQty0317 as quantity, a.icw_stock_description0317 as description, a.icw_stock_date0317 as dates, b.icw_pn0317 as product, b.icw_pcod0317 as productcode, c.icw_supplier_name0317 as supplier, c.icw_supplier_companyName0317 as company');
		$this->db->from('icw_stock_0317 a');
		$this->db->join('icw_pro_0317 b','a.icw_stock_productId0317=b.icw_pi0317');
		$this->db->join('icw_supplier_0317 c','a.icw_stock_supplierId0317=c.icw_supplier_id0317');
		$this->db->order_by('a.icw_stockId0317','desc');
		$result=$this->db->get()->result();
		return $result;
	
	}
public function getStockById($id){
	
	$this->db->select('icw_stockId0317 as sid, icw_stock_productId0317 as pid, icw_stock_productQty0317 as quantity, icw_stock_supplierId0317 as supid, icw_stock_description0317 as description, icw_stock_date0317 as dates');
	$this->db->from('icw_stock_0317');
	$this->db->where('icw_stockId0317', $id); 
	$query = $this->db->get()->row();
	return $query;
}

public function deleteStockById($id)
{	
	$this->db->where('icw_stockId0317', $id);
	$delete=$this->db->delete('icw_stock_0317'); 
		if($delete == TRUE)
		{
			return $delete;
		}
}

public function addBarcodeMap($data,$bar){
	$this->db->select('*');
	$this->db->where('icw_productbarcode0317',$bar);
	$result=$this->db->get('icw_barcodemap_0317');
	if($result->num_rows()>0){
		return false;
	}else{	
	$ins=$this->db->insert('icw_barcodemap_0317',$data);
	if($ins==TRUE){
		return true;
	}else{
		return false;
	}
  }
}




}
?>