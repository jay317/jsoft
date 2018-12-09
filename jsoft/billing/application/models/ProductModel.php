<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model {

	public function addProduct($data, $images)
	{
		$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
	
	$data = array(
   'icw_cid0317' => $data['categoryName'],
   'icw_scid0317' => $data['subcategoryName'],
   'icw_pn0317' => $data['productName'],
   'icw_pcod0317' => $data['productCode'],
   'icw_pbcod0317' => $data['productBarCode'],
   'icw_phsn0317' => $data['productHsn'],
   'icw_prs0317' => $data['productPrice'],
	    'icw_batchNo0317' => $data['productBatchNo'],
	    'icw_mfgDate0317' => $data['productMfgDate'],
	    'icw_expireDate0317' => $data['productExpireDate'],
   'icw_ptax0317' => $data['pTax'], 
   'icw_pd0317' => $data['productDescription'],
	'icw_fk_shop_id'=>$shopId,
   'icw_pisa0317' => 1
		);
		$ins = $this->db->insert('icw_pro_0317', $data);
		$pid=$this->db->insert_id();
			$img_dt = array('icw_pid0317'=>$pid,'icw_imgname0317'=>$images,'icw_fk_shop_id'=>$shopId);
			$img_ins = $this->db->insert('icw_img_0317', $img_dt);
		
		if($ins == TRUE && $img_ins == TRUE)
		{
			return true;
		}else{
			return false;
		}			
	}

	public function getProductsDetail()
	{	
		$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
				
		$this->db->select('icw_pi0317,icw_pn0317,icw_pisa0317');
		$this->db->from('icw_pro_0317');
		$this->db->order_by('icw_pi0317','desc');
		$this->db->where('icw_fk_shop_id', $shopId);
		$query = $this->db->get();
		if($query->num_rows() != 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}	
	}

	public function getProDetail($id){
		$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		
		$this->db->select('a.*,b.icw_cn0318,c.icw_scn0318');
		$this->db->from('icw_pro_0317 a');
		$this->db->join('icw_cat_0317 b', 'b.icw_ci0317=a.icw_cid0317');
		$this->db->join('icw_subcat_0317 c', 'c.icw_sci0317=a.icw_scid0317');
		$this->db->where('a.icw_pi0317',$id);
		$this->db->where('a.icw_fk_shop_id',$shopId);
		$detail_query = $this->db->get()->row();
			
		$this->db->select('icw_imgname0317');
		$this->db->from('icw_img_0317');
		$this->db->where('icw_pid0317',$id);
		$this->db->where('icw_fk_shop_id',$shopId);
		$image_query = $this->db->get()->row();

		if(count($detail_query)> 0)
		{			
			return $detail=array('detail_query'=>$detail_query,'image_query'=>$image_query);
		}
		else
		{
			return false;
		}
	}
	
	public function getProductById($id)
	{
		$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		
		$this->db->select('a.*,b.icw_cn0318,c.icw_scn0318');
		$this->db->from('icw_pro_0317 a');
		$this->db->join('icw_cat_0317 b', 'b.icw_ci0317=a.icw_cid0317');
		$this->db->join('icw_subcat_0317 c', 'c.icw_sci0317=a.icw_scid0317');
		$this->db->where('a.icw_pi0317',$id);
		$this->db->where('a.icw_fk_shop_id',$shopId);
		$detail_query = $this->db->get()->row();
		//print_r($detail_query);
		$this->db->select('icw_imgname0317');
		$this->db->from('icw_img_0317');
		$this->db->where('icw_pid0317',$id);
		$this->db->where('icw_fk_shop_id',$shopId);
		$image_query = $this->db->get()->row();

		//echo $this->db->last_query();
		if(count($detail_query)> 0)
		{
			return array('detail_query' => $detail_query, 'image_query' => $image_query);
		}
		else
		{
			return false;
		}
	}

	public function editProduct($id, $data, $images)
	{
		$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		$data = array(
			   'icw_cid0317' => $data['categoryName'],
			   'icw_scid0317' => $data['subcategoryName'],
			   'icw_pn0317' => $data['productName'],
			   'icw_pcod0317' => $data['productCode'],
			   'icw_pbcod0317' => $data['productBarCode'],
			   'icw_phsn0317' => $data['productHsn'],
			   'icw_prs0317' => $data['productPrice'],
        		    'icw_batchNo0317' => $data['productBatchNo'],
        		    'icw_mfgDate0317' => $data['productMfgDate'],
        		    'icw_expireDate0317' => $data['productExpireDate'],
			   'icw_ptax0317' => $data['pTax'], 
			   'icw_pd0317' => $data['productDescription'],
				'icw_fk_shop_id'=>$shopId,
			   'icw_pisa0317' => $data['isactive']
			);
		$this->db->where('icw_pi0317', $id);
		$this->db->where('icw_fk_shop_id',$shopId);
		$updt = $this->db->update('icw_pro_0317', $data);
		$pid=$id;
		// delete file
		$this->db->select('icw_imgname0317');
		$this->db->where('icw_pid0317', $id);
		$this->db->where('icw_fk_shop_id',$shopId);
		$this->db->from('icw_img_0317');
		$qrt=$this->db->get()->row();

		//$dir='uploads/product-images/';
		//unlink(FCPATH.$dir.$qrt->icw_imgname0317);
		
		$this->db->where('icw_pid0317', $id);
		$this->db->where('icw_fk_shop_id',$shopId);
		$this->db->delete('icw_img_0317');
		
			$img_dt = array('icw_pid0317'=>$pid,'icw_imgname0317'=>$images,'icw_fk_shop_id'=>$shopId);
			$img_ins = $this->db->insert('icw_img_0317', $img_dt);
		
		if($updt == TRUE && $img_ins == TRUE)
		{
			return true;
		}else{
			return false;
		}			
	}

	public function deleteProductById($id)
	{	
		$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		
		$this->db->where('icw_pi0317', $id);
		$this->db->where('icw_fk_shop_id',$shopId);
		$delete1=$this->db->delete('icw_pro_0317');
		
		$this->db->where('icw_pid0317', $id);
		$this->db->where('icw_fk_shop_id',$shopId);
		$delete2=$this->db->delete('icw_img_0317');
		if($delete1 == TRUE && $delete2 == TRUE)
		{
			return TRUE;
		}
	}

	public function getProByBarcode($barcode){
		$this->db->select('icw_pi0317');
		$this->db->from('icw_pro_0317');
		$this->db->where('icw_pbcod0317',$barcode);
		$query = $this->db->get();
		if($query->num_rows() >0 ){
			$query=$query->row();
			$proId=$query->icw_pi0317;
			return $proId;
		}else{
			return '';
		}
	}

	public function getProByCat($id)
	{	
		$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		
		$this->db->select('icw_pi0317,icw_pn0317,icw_pisa0317');
		$this->db->where('icw_cid0317',$id);
		$this->db->where('icw_fk_shop_id',$shopId);
		$this->db->from('icw_pro_0317');
		$query1 = $this->db->get();
		if($query1->num_rows() != 0)
		{
			echo "<ul style=\"list-style:none;margin:10px;\">";
			foreach($query1->result() as $qry)
			{
				$imgid=$qry->icw_pi0317;
				$this->db->select('*');
				$this->db->where('icw_pid0317',$imgid);
				$this->db->where('icw_fk_shop_id',$shopId);
				$this->db->from('icw_img_0317');
				$query2 = $this->db->get()->row();
				?>
<li style="margin-left: -40px; margin-top: 10px;"><a
	href="javascript:void(0);"
	onclick="refreshPosBlock(<?php echo $qry->icw_pi0317;?>)">
	<?php if($query2->icw_imgname0317 !=''){?> 
	   <img src="<?php echo base_url();?>uploads/product-images/<?php echo $query2->icw_imgname0317;?>" width="25px;" height="25px;" /> 
	   <?php }else{?>
	   <img src="<?php echo base_url();?>assets/images/no-image.gif" width="25px;" height="25px;" />
	   <?php }?>
	  <?php echo substr(ucfirst($qry->icw_pn0317),0,10);?>
</a>
</li>
				<?php
			}
			echo "</ul>";
		}
		else
		{
			return false;
		}

	}

	/* -----------Tax-------*/
	public function getProductTax()
	{	
		$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		
		$this->db->where('icw_fk_shop_id',$shopId);
		$query = $this->db->get('icw_tax_0317');
		return $query;
	}
	public function getSubTaxById($id){
		$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		
		$this->db->select('*');
		$this->db->from('icw_taxmap_0317');
		$this->db->where('icw_taxId0317', $id);
		$this->db->where('icw_fk_shop_id',$shopId);
		$query = $this->db->get()->result();
		return $query;
	}
	public function getProductTaxById($id)
	{	
		$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		
		$this->db->select('*');
		$this->db->from('icw_tax_0317');
		$this->db->where('icw_id0317', $id);
		$this->db->where('icw_fk_shop_id',$shopId);
		$query1 = $this->db->get()->row();
		
		$this->db->select('icw_subTaxName0317,icw_subTaxPercent0317');
		$this->db->from('icw_taxmap_0317');
		$this->db->where('icw_taxId0317', $id);
		$this->db->where('icw_fk_shop_id',$shopId);
		$query2 = $this->db->get()->result();
		$query=array('$query1'=>$query1,'$query2'=>$query2);
		return $query;
	}

	public function addProductTax($id='',$data)
	{
		$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		
		if($data['taxName'] !=''){
			$dataSave = array(
   'icw_taxName0317' => $data['taxName'],
   'icw_taxNote0317' => $data['taxDescription'],
   'icw_taxStatus0317' => $data['isactive'],
	 'icw_fk_shop_id' => $shopId
			);
			if($id){
				$this->db->where('icw_id0317', $id);
				$this->db->where('icw_fk_shop_id',$shopId);
				$ins = $this->db->update('icw_tax_0317', $dataSave);
				$data2 = array(
   'icw_taxId0317' => $id,
   'icw_subTaxName0317' => $data['subTaxName'],
   'icw_subTaxPercent0317' => $data['subTaxPercent'],
   'icw_fk_shop_id' => $shopId
				);
				$this->db->where('icw_taxId0317', $id);
				$this->db->where('icw_fk_shop_id',$shopId);
				$this->db->delete('icw_taxmap_0317');
				$i = 0;
				foreach($data['subTaxName'] as $row){
					$data2['icw_taxId0317'] = $id;
					$data2['icw_subTaxName0317'] = $data['subTaxName'][$i];
					$data2['icw_subTaxPercent0317'] = $data['subTaxPercent'][$i];
					$data2['icw_fk_shop_id'] =$shopId;
					$sub_ins = $this->db->insert('icw_taxmap_0317', $data2);
					$i++;
				}
			}else{
				$ins = $this->db->insert('icw_tax_0317', $dataSave);
				$taxId= $this->db->insert_id();
				$i = 0;
				foreach($data['subTaxName'] as $row){
					$data2['icw_taxId0317'] = $taxId;
					$data2['icw_subTaxName0317'] = $data['subTaxName'][$i];
					$data2['icw_subTaxPercent0317'] = $data['subTaxPercent'][$i];
					$data2['icw_fk_shop_id'] =$shopId;
					$sub_ins = $this->db->insert('icw_taxmap_0317', $data2);
					$i++;
				}
			}
			return $ins;
		}else{
			$this->session->set_flashdata('message_empty', 'Tax Name Should Not Be Empty!');
			redirect('Product/proTax');
		}
	}

	public function deleteProductTaxById($id)
	{	
		$settingDetails=$this->session->userdata('settingDetails');
		$shopId=$settingDetails->icw_shopId0317;
		
		$this->db->where('icw_id0317', $id);
		$this->db->where('icw_fk_shop_id',$shopId);
		
		$delete1=$this->db->delete('icw_tax_0317');
		$this->db->where('icw_taxId0317', $id);
		$this->db->where('icw_fk_shop_id',$shopId);
		$delete2=$this->db->delete('icw_taxmap_0317');
		if($delete1 == TRUE && $delete2 == TRUE)
		{
			return true;
		}
	}



}
?>