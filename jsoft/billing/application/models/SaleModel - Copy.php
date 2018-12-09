<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaleModel extends CI_Model {

	public function getProInfo($id){

		$this->db->select('*');
		$this->db->from('icw_pro_0317');
		$this->db->where('icw_pi0317',$id);
		$query = $this->db->get()->row();
		$query2 = $this->db->get('icw_tax_0317')->result();
		$rtdata= array('query'=>$query,'query2'=>$query2);
		return $rtdata;
	}

	public function getTaxes(){
		$resulttax = $this->db->get('icw_tax_0317')->result();
		$taxArray = array();
		foreach ($resulttax as $row){
			$taxArray[$row->icw_id0317]=$row->icw_taxName0317;
		}
		return $taxArray;
	}

	public function getTaxById($id){
		$this->db->where('icw_id0317',$id);
		$query2 = $this->db->get('icw_tax_0317')->row();
		return $query2;
	}

	public function getProTaxList(){
		$query2 = $this->db->get('icw_tax_0317')->result();
		return $query2;
	}

	public function getSubTaxInfo($id){
		$this->db->select('icw_taxMapId_0317,icw_subTaxName0317,icw_subTaxPercent0317');
		$this->db->from('icw_taxmap_0317');
		$this->db->where('icw_taxId0317',$id);
		$query = $this->db->get()->result();
		//echo $this->db->last_query();
		return $query;
			
	}
	public function getInvoiceNo(){
		$query = $this->db->query('select max(icw_invoId0317) as maxid from icw_invoice_0317')->row();
		return $query;
	}

	public function invoiceSave($invoiceData,$invo_date,$last_invo_no){

		$ins1=$this->db->insert('icw_invoice_0317', $invoiceData);
		 
	$clientId=$_POST['client_id'];
	if(!empty($clientId)){
		$clientId=$clientId;
	}else{
		$clientId=0;
	}
	$previousProducts = $this->session->userdata("prev_prdcts")?$this->session->userdata("prev_prdcts"):array(); 
	 foreach($previousProducts as $row) {
      $invoiceProData= array(
      'icw_client_Id0317'=>$clientId,
      'icw_invoiceNo_0317'=>$last_invo_no,
      'icw_invoice_productId_0317'=>$row['prd_id'],
      'icw_invoice_proname0317'=>$row['prd_name'],
      'icw_invoice_sellingPrice0317'=>$row['prd_price'],
      'icw_invoice_qty0317'=>$row['qty'],
      'icw_invoice_itemTotal0317'=>$row['total'],
      'icw_invoice_proDate0317'=>trim($invo_date),
	  'icw_invoice_proHsn0317'=>$row['prd_hsn'],
		);
		$ins2=$this->db->insert('icw_invoice_prodetails_0317', $invoiceProData);
		
		$this->db->select('icw_stock_productQty0317');
		$this->db->from('icw_stockMap_0317');
		$this->db->where('icw_stock_productId0317',$row['prd_id']);
		$qry=$this->db->get()->row();
		if(count($qry)>0){
		$stqty=$qry->icw_stock_productQty0317;
		$stdata=array('icw_stock_productQty0317'=>$stqty - $row['qty']);
		$this->db->where('icw_stock_productId0317',$row['prd_id']);
		$stdataUpdt=$this->db->update('icw_stockMap_0317', $stdata);
		}
}
	$finalcalc=$this->finalCalcUtil($previousProducts);
	 $tax_desc=$this->session->userdata("tax_desc");
 		foreach($finalcalc['total_break'] as $key=>$val){
				if(isset($tax_desc[$key])){
			$invoiceTaxData= array(
		'icw_client_Id0317'=>$clientId,
		'icw_invoiceNo_0317'=>$last_invo_no,
		'icw_client_taxDetail0317'=>trim($key),
		'icw_client_taxSum0317'=>trim($val['total']),
		'icw_client_InvoDate0317'=>trim($invo_date)			
			);
			$ins3=$this->db->insert('icw_invoice_taxdetails_0317', $invoiceTaxData);
		}
 		}
		//if($ins1 && $ins2 && $ins3){
	 $this->session->set_userdata('prev_prdcts', null);
			return true;
	}
function finalCalcUtil($previousProducts){
		$totalTax = 0;
		$totalPrice = 0;
		$totalGrandTotal =0;
		$taxBreak = array();
		$taxBreakArray = isset($previousProducts['taxbreak'])?$previousProducts['taxbreak']:array();
		$other_calc_obj = $this->session->userdata('other_calc_obj');
		$settingDetails = $this->session->userdata('settingDetails');
		foreach ($previousProducts as $key=>$prdRowObj){
			$taxablePrice = ($prdRowObj['prd_price'] * $prdRowObj['qty']);
			$totalRowTax = 0;
			if($this->session->userdata('settingDetails')){
			if($settingDetails->icw_shop_tax0317 == 2){
				if(isset($prdRowObj['taMapObj'])){
					$taxMapObj=$prdRowObj['taMapObj'];
				}else{
					$taxMapObj = $this->SaleModel->getSubTaxInfo($prdRowObj['tax_id']);
					$prdRowObj['taMapObj'] = $taxMapObj;
					$previousProducts = $this->session->userdata("prev_prdcts")?$this->session->userdata("prev_prdcts"):array();
					$previousProducts[$key] = $prdRowObj;
					$this->session->set_userdata('prev_prdcts', $previousProducts);
				}
				$subTaxArray = isset($taxBreak[$prdRowObj['tax_id']])?$taxBreak[$prdRowObj['tax_id']]:array();
				foreach ($taxMapObj as $taxrow){
					$rowTax = 0;
					$taxItem = (($taxablePrice * $taxrow->icw_subTaxPercent0317) / 100);
					$totalRowTax = $totalRowTax + $taxItem;
					$subTaxArray[$prdRowObj['tax_id']] = array(
				'name'=>$taxrow->icw_subTaxName0317,
				'percentage'=>$taxrow->icw_subTaxPercent0317,
				'total_tax'=>$taxItem);
				}
				if(isset($taxBreak[$prdRowObj['tax_id']])){
					$taxtoalArray = $taxBreak[$prdRowObj['tax_id']];
					$taxtoalArray['total']=$taxtoalArray['total']+$totalRowTax;
					$taxBreak[$prdRowObj['tax_id']] = $taxtoalArray;
				}else{
					$taxtoalArray = array();
					$taxMapObj=$prdRowObj['taMapObj'];
					$taxtoalArray['total']=$totalRowTax;
					$taxBreak[$prdRowObj['tax_id']] = $taxtoalArray;
				}
			}}
			$totalPrice=$totalPrice+$taxablePrice;
			$totalTax=$totalTax+$totalRowTax;
			$totalGrandTotal=$totalGrandTotal+($taxablePrice+$totalRowTax);
		}
		if($this->session->userdata('settingDetails')){
		if($settingDetails->icw_shop_tax0317 == 1){
			$taxMapObj = $this->SaleModel->getSubTaxInfo($other_calc_obj['tax_id']);
			$other_calc_obj['taMapObj'] = $taxMapObj;
			$this->session->set_userdata('other_calc_obj', $other_calc_obj);

			//print_r($taxMapObj);
			$subTaxArray = isset($taxBreak[$other_calc_obj['tax_id']])?$taxBreak[$other_calc_obj['tax_id']]:array();
			$totalRowTax = 0;
			foreach ($taxMapObj as $taxrow){
				$rowTax = 0;
				$taxItem = (($totalPrice * $taxrow->icw_subTaxPercent0317) / 100);
				//echo $taxItem;
				$totalRowTax = $totalRowTax + $taxItem;
				$subTaxArray[$other_calc_obj['tax_id']] = array(
				'name'=>$taxrow->icw_subTaxName0317,
				'percentage'=>$taxrow->icw_subTaxPercent0317,
				'total_tax'=>$taxItem);
			}
			if(isset($taxBreak[$other_calc_obj['tax_id']])){
				$taxtoalArray = $taxBreak[$other_calc_obj['tax_id']];
				$taxtoalArray['total']=$taxtoalArray['total']+$totalRowTax;
				$taxBreak[$other_calc_obj['tax_id']] = $taxtoalArray;
			}else{
				$taxtoalArray = array();
				$taxMapObj=$other_calc_obj['taMapObj'];
				$taxtoalArray['total']=$totalRowTax;
				$taxBreak[$other_calc_obj['tax_id']] = $taxtoalArray;
			}
			//echo "<br/>".$totalRowTax;
			$totalTax=$totalTax+$totalRowTax;
			$totalGrandTotal=$totalGrandTotal+$totalRowTax;
		}
		}


		$finalCalcObj = array(
		'total_tax'=>$totalTax,
		'total_price'=>$totalPrice,
		'total_grand'=>$totalGrandTotal,
		'total_break'=>$taxBreak
		);
		//print_r($finalCalcObj);

	 return $finalCalcObj;
	}

	public function genInvoice($invoiceNo)
	{							
			$this->db->select('*');
			$this->db->from('icw_invoice_0317');
			$this->db->where('icw_invoiceNo_0317',$invoiceNo);
			$query1 = $this->db->get()->row();
				
				if(count($query1) >0){
					$clientId=$query1->icw_clientId0317;
					$shopId=$query1->icw_shopId0317;
				
				$this->db->select('*');
				$this->db->from('icw_invoice_prodetails_0317');
				$this->db->where('icw_invoiceNo_0317',$invoiceNo);
				$query2 = $this->db->get()->result();
				
				/*$this->db->select('*');
				$this->db->from('icw_invoice_taxdetails_0317 a');
				$this->db->join('icw_tax_0317 b','b.icw_id0317=a.icw_client_taxDetail0317','left');
				$this->db->join('icw_taxmap_0317 c','c.icw_taxId0317=b.icw_id0317','left');
				$this->db->where('icw_invoiceNo_0317',$invoiceNo);
				$this->db->group_by('icw_invoiceNo_0317','a.icw_client_taxDetail0317');
				$query3 = $this->db->get()->result();*/
				
				$this->db->select('*');
				$this->db->from('icw_invoice_taxdetails_0317');
				$this->db->where('icw_invoiceNo_0317',$invoiceNo);
				//$this->db->group_by('icw_client_taxSum0317');
				//$this->db->limit(1);
				$query3 = $this->db->get()->result();
				//print_r($query3); die;
								
				foreach($query3 as $qr){$v[]=$qr->icw_client_taxDetail0317;}				
				$this->db->select('*');
				$this->db->from('icw_tax_0317');
				$this->db->where_in('icw_id0317',$v);
				$query_tax = $this->db->get()->result();
				 
					$this->db->select('*');
				$this->db->from('icw_taxmap_0317');
				$this->db->where_in('icw_taxId0317',$v);
				$query_taxsub = $this->db->get()->result();

				$this->db->select('*');
				$this->db->from('icw_clients_0317');
				$this->db->where('icw_clientId0317',$clientId);
				$query4 = $this->db->get()->row();

				$this->db->select('*');
				$this->db->from('icw_shop_0317');
				$this->db->where('icw_shopId0317',$shopId);
				$query5 = $this->db->get()->row();

					$resultData= array('query1'=>$query1,'query2'=>$query2,'query3'=>$query3,'query4'=>$query4,'query5'=>$query5,'query_tax'=>$query_tax,'query_taxsub'=>$query_taxsub);
					
					return $resultData;	
					}else{
					return false;
				}			
	}
	
	public function genInvoiceName($clientId,$invo_date)
	{		
							
			$this->db->select('*');
			$this->db->from('icw_invoice_0317');
			$this->db->where('icw_clientId0317',$clientId);
			$this->db->where('icw_invoDate0317',$invo_date);
			$query1 = $this->db->get()->row();
			
			if(count($query1) >0){					
					$shopId=$query1->icw_shopId0317;

			$this->db->select('*');
			$this->db->from('icw_invoice_prodetails_0317');
			$this->db->where('icw_client_Id0317',$clientId);
			$this->db->where('icw_invoice_proDate0317',$invo_date);
			$query2 = $this->db->get()->result();

			$this->db->select('*');
			$this->db->from('icw_invoice_taxdetails_0317');
			$this->db->where('icw_client_Id0317',$clientId);
			$this->db->where('icw_client_InvoDate0317',$invo_date);
			$query3 = $this->db->get()->result();
			
			foreach($query3 as $qr){$v[]=$qr->icw_client_taxDetail0317;}				
				$this->db->select('*');
				$this->db->from('icw_tax_0317');
				$this->db->where_in('icw_id0317',$v);
				$query_tax = $this->db->get()->result();
				 
					$this->db->select('*');
				$this->db->from('icw_taxmap_0317');
				$this->db->where_in('icw_taxId0317',$v);
				$query_taxsub = $this->db->get()->result();

			$this->db->select('*');
			$this->db->from('icw_clients_0317');
			$this->db->where('icw_clientId0317',$clientId);
			$query4 = $this->db->get()->row();
			$this->db->select('*');
			$this->db->from('icw_shop_0317');
			$this->db->where('icw_shopId0317',$shopId);
			$query5 = $this->db->get()->row();

				$resultData= array('query1'=>$query1,'query2'=>$query2,'query3'=>$query3,'query4'=>$query4,'query5'=>$query5,'query_tax'=>$query_tax,'query_taxsub'=>$query_taxsub);
				return $resultData;
				}else{
					return false;
				}	
			
		}	
	





}
?>