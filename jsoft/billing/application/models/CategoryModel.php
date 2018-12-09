<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends CI_Model {


public function addProductCat($id='',$categoryName, $categoryDescription, $isactive)
{
	$settingDetails=$this->session->userdata('settingDetails');
	$shopId=$settingDetails->icw_shopId0317;
if($categoryName !=''){

$data = array(
   'icw_cn0318' => $categoryName ,
   'icw_cd0319' => $categoryDescription,
   'icw_isa0320' => $isactive,
   'icw_fk_shop_id0317'=>$shopId
);
if($id){
	$this->db->where('icw_ci0317', $id);
	$this->db->where('icw_fk_shop_id0317', $shopId);
	$ins = $this->db->update('icw_cat_0317', $data); 
}else{
	$ins = $this->db->insert('icw_cat_0317', $data); 
}

return $ins;

}else{
	$this->session->set_flashdata('message_empty', 'Category Name Should Not Be Empty!');
	redirect('Category/addProductCat');
}

}

public function getProductCat()
{
	$settingDetails=$this->session->userdata('settingDetails');
	$shopId=$settingDetails->icw_shopId0317;
	
$this->db->where('icw_fk_shop_id0317', $shopId);
$query = $this->db->get('icw_cat_0317');
return $query;
}
public function getProductCatById($id)
{
	$settingDetails=$this->session->userdata('settingDetails');
	$shopId=$settingDetails->icw_shopId0317;
	
	$this->db->select('*');
	$this->db->from('icw_cat_0317');
	$this->db->where('icw_fk_shop_id0317', $shopId);
	$this->db->where('icw_ci0317', $id); 
$query = $this->db->get()->row();
return $query;
}

public function editProductCat($id, $categoryName, $categoryDescription, $isactive) {
	$settingDetails=$this->session->userdata('settingDetails');
	$shopId=$settingDetails->icw_shopId0317;
	
if($categoryName !=''){
$data = array(
   'icw_cn0318' => $categoryName ,
   'icw_cd0319' => $categoryDescription,
   'icw_isa0320' =>$isactive  
);
$this->db->where('icw_ci0317', $id);
$this->db->where('icw_fk_shop_id0317', $shopId);
$updt=$this->db->update('icw_cat_0317', $data);
}else{
	//$this->session->set_flashdata('message_empty', 'Category Name Should Not Be Empty!');
	//redirect('product/editProCat');
}	
	
}

public function deleteProductCatById($id)
{				
	$settingDetails=$this->session->userdata('settingDetails');
	$shopId=$settingDetails->icw_shopId0317;
	
				$this->db->where('icw_ci0317', $id);
				$this->db->where('icw_fk_shop_id0317', $shopId);
				$delete=$this->db->delete('icw_cat_0317');
				$this->db->db_debug = FALSE;
					if (!$delete){
					return false;			
				}
					return true;
}


public function getProductsubCat()
{		
	$settingDetails=$this->session->userdata('settingDetails');
	$shopId=$settingDetails->icw_shopId0317;
	
		 $this->db->select('a.*,b.*');
		 $this->db->from('icw_subcat_0317 a');
		 $this->db->join('icw_cat_0317 b','b.icw_ci0317=a.icw_fk_ci0317');
		 $this->db->where('a.icw_fk_shop_id', $shopId);
		$query = $this->db->get()->result();
return $query;
}

public function getSubcat($id){
	$settingDetails=$this->session->userdata('settingDetails');
	$shopId=$settingDetails->icw_shopId0317;
	
	$this->db->select('*');
	$this->db->from('icw_subcat_0317');
	$this->db->where('icw_fk_ci0317', $id);
	$this->db->where('icw_fk_shop_id', $shopId); 
$query = $this->db->get()->result();
return $query;
}
public function getSubcatss(){
	$settingDetails=$this->session->userdata('settingDetails');
	$shopId=$settingDetails->icw_shopId0317;
	
	$this->db->select('*');
	$this->db->from('icw_subcat_0317');
	$this->db->where('icw_fk_shop_id', $shopId);
$query = $this->db->get()->result();
return $query;
//print_r($query);die;
}
public function getProductsubCatById($id)
{
	$settingDetails=$this->session->userdata('settingDetails');
	$shopId=$settingDetails->icw_shopId0317;
	
	$this->db->select('*');
	$this->db->from('icw_subcat_0317');
	$this->db->where('icw_sci0317', $id); 
	$this->db->where('icw_fk_shop_id', $shopId);
$query = $this->db->get()->row();
return $query;
}

public function addProductsubCat($id='',$categoryName,$subcategoryName, $subcategoryDescription, $isactive)
{
	$settingDetails=$this->session->userdata('settingDetails');
	$shopId=$settingDetails->icw_shopId0317;
	
if($categoryName !=''){

$data = array(
   'icw_fk_ci0317' => $categoryName ,
   'icw_scn0318' => $subcategoryName ,
   'icw_scd0319' => $subcategoryDescription,
   'icw_isa0320' => $isactive,
	'icw_fk_shop_id' => $shopId,
  
);
if($id){
	$this->db->where('icw_sci0317', $id);
	$this->db->where('icw_fk_shop_id', $shopId);
	$ins = $this->db->update('icw_subcat_0317', $data); 
}else{
	$ins = $this->db->insert('icw_subcat_0317', $data); 
}
return $ins;
}else{
	$this->session->set_flashdata('message_empty', 'Category Name Should Not Be Empty!');
	redirect('Category/addProductsubCat');
}

}

public function deleteProductsubCatById($id)
{
	$settingDetails=$this->session->userdata('settingDetails');
	$shopId=$settingDetails->icw_shopId0317;
	
		$this->db->where('icw_sci0317', $id);
		$this->db->where('icw_fk_shop_id', $shopId);
		$delete=$this->db->delete('icw_subcat_0317');
		$this->db->db_debug = FALSE;
		if (!$delete){
		return false;			
	}
		return true;
}


}
?>