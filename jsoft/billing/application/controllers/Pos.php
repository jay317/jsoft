<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pos extends CI_Controller {

	public function __construct() {

		parent::__construct();
		if(!$this->session->userdata("username"))
		{
			redirect('welcome/index');
		}
			
		$this->load->model('ProductModel');
		$this->load->model('CategoryModel');
		$this->load->model('SaleModel');
		$this->load->model('ClientModel');
		$this->load->model('ReportModel');

	}

	public function index() {
		$data['getPcat']=$this->CategoryModel->getProductCat();
		$data['getProduct']=$this->ProductModel->getProductsDetail();
		$data['getClient']=$this->ClientModel->getClient();
		$data['getCountry']=$this->ClientModel->getCountry();
		$data['getInvoiceNo']=$this->SaleModel->getInvoiceNo();
		$dashboardDataDetails=$this->ReportModel->dashboardDataDetails();
		//$data['queryExpireDate']=$dashboardDataDetails['queryExpireDate'];
		$this->load->model('MainModel');
		$data['page_title']='Point Of Sale';
		$settings=$this->session->userdata('settingDetails');
		$previousProducts = $this->session->userdata("prev_prdcts")?$this->session->userdata("prev_prdcts"):array();
		$otherCalcObj = $this->session->userdata("other_calc_obj")?$this->session->userdata("other_calc_obj"):array();
		if(!$this->session->userdata("other_calc_obj")){
			$otherCalcObj['tax_id'] = 0;
			$otherCalcObj['tax_type'] = 1;
			$this->session->set_userdata('other_calc_obj', $otherCalcObj);
		}

		$data['settingDetails'] =$settings;
		$taxList = $this->SaleModel->getTaxes();
		$data['tax_desc']=$taxList;
		$this->session->set_userdata('tax_desc', $taxList);
		$data['previousProducts']=$previousProducts;
		$data['finalcalc']=$this->finalCalcUtil($previousProducts);
		$data['taxlist']=$this->SaleModel->getProTaxList();
		$data['req_page_name']="pos/pointofsale";
		$this->load->view('layout2',$data);
	}

	function addProdct($productId=''){
		$productId = $productId==''?$this->input->get('id'):$productId;
		$action = $this->input->get('a')?$this->input->get('a'):'';
		if($action == 'barc'){
			$barcode = $this->input->get('c_id')?$this->input->get('c_id'):'';
			$productId = $this->ProductModel->getProByBarcode($barcode);
			if($productId == ''){
				echo "no_product";
				die;
			}
		}
		$previousProducts = $this->session->userdata("prev_prdcts")?$this->session->userdata("prev_prdcts"):array();
		//$previousProducts =  array();

		$data['taxlist']=$this->SaleModel->getProTaxList();
		if($productId!=''){
			$randomNum = $productId;
			if(isset($previousProducts[$productId])){
				$prdRow = $previousProducts[$productId];
				$prdRow['qty'] = $prdRow['qty']+1;
				$prdRow['total']=$prdRow['qty'] * $prdRow['prd_price'];

			}else{
				$getdata=$this->SaleModel->getProInfo($productId);
				$prdInfo = $getdata['query'];
				$taxInfo = $getdata['query2'];
				$prdRow = array(
	 'prd_id'=>$prdInfo->icw_pi0317,
	 'prd_name'=>$prdInfo->icw_pn0317,
	 'prd_code'=>$prdInfo->icw_pcod0317,
	 'prd_barcode'=>$prdInfo->icw_pbcod0317,
	 'prd_hsn'=>$prdInfo->icw_phsn0317,
	 'prd_price'=>$prdInfo->icw_prs0317,
	 'prd_desc'=>'',
	 'prd_batch'=>$prdInfo->icw_batchNo0317,
	 'prd_mfg'=>$prdInfo->icw_mfgDate0317,
	 'prd_expire'=>$prdInfo->icw_expireDate0317,
	 'qty'=>1,
	 'tax_id'=>$prdInfo->icw_ptax0317,
	 'tax_name'=>'',
	 'total'=>$prdInfo->icw_prs0317);
			}
		}else{
			$randomNum = rand(200000, 20000090);
			$prdRow = array(
	 'prd_id'=>0,
	 'prd_name'=>'',
	 'prd_code'=>'',
	 'prd_barcode'=>'',
	 'prd_hsn'=>'',
	 'prd_price'=>0,
	 'prd_desc'=>'',
	 'prd_batch'=>'',
	 'prd_mfg'=>'',
	 'prd_expire'=>'',
	 'qty'=>1,
	 'tax_id'=>'',
			'tax_name'=>'',
	 'total'=>0);
		}
	 $previousProducts[$randomNum]=$prdRow;
		$this->load->model('MainModel');
		$data['page_title']='Point Of Sale';
		$data['settingDetails']=$this->session->userdata('settingDetails');
		$data['finalcalc']=$this->finalCalcUtil($previousProducts);
	 $this->session->set_userdata('prev_prdcts', $previousProducts);
	 $data['previousProducts']=$previousProducts;
	 $data['tax_desc']=$this->session->userdata("tax_desc");
	 $this->load->view('pos/right_side_block',$data);

	}


	function calcPos(){
		$previousProducts = $this->session->userdata("prev_prdcts")?$this->session->userdata("prev_prdcts"):array();
		$rowId = $this->input->get('id');
		if($rowId!='' && $rowId != -3){
			$productName = $this->input->get('productName');
			$productId = $this->input->get('productId');
			$productDesc = $this->input->get('productDesc');
			$qty = $this->input->get('qty');
			$selling_price = $this->input->get('selling_price');
			$taxId = $this->input->get('tax_id');
			$taxMode = $this->input->get('taxMode');
			$currentProductObj = $previousProducts[$rowId];
			$prdRow = array(
	 'prd_id'=>$currentProductObj['prd_id'],
	 'prd_name'=>$productName,
	 'prd_code'=>$currentProductObj['prd_code'],
	 'prd_barcode'=>$currentProductObj['prd_barcode'],
	 'prd_hsn'=>$currentProductObj['prd_hsn'],
	 'prd_price'=>$selling_price,
	 'prd_desc'=>trim($productDesc),
	 'qty'=>$qty,
	 'tax_id'=>$taxId,
		'tax_name'=>'',
	 'total'=>($qty*$selling_price));
			$previousProducts[$rowId]=$prdRow;
			$this->session->set_userdata('prev_prdcts', $previousProducts);
		}else{
			$taxId = $this->input->get('tax_id');
			$taxMode = $this->input->get('tax_type');
			$otherCalcObj = $this->session->userdata("other_calc_obj")?$this->session->userdata("other_calc_obj"):array();
			$otherCalcObj['tax_id'] = $taxId;
			$otherCalcObj['tax_type'] = $taxMode;
			$this->session->set_userdata('other_calc_obj', $otherCalcObj);
		}

		$this->load->model('MainModel');
		$data['taxlist']=$this->SaleModel->getProTaxList();
		$data['settingDetails']=$this->session->userdata('settingDetails');
		$data['finalcalc']=$this->finalCalcUtil($previousProducts);
	 $data['previousProducts']=$previousProducts;
	 $data['tax_desc']=$this->session->userdata("tax_desc");
	 $this->load->view('pos/right_side_block',$data);
	}

	function updateRow($rowId = ''){
		$previousProducts = $this->session->userdata("prev_prdcts")?$this->session->userdata("prev_prdcts"):array();

		unset($previousProducts[$rowId]);
	 $this->session->set_userdata('prev_prdcts', $previousProducts);

	 $data['finalcalc']=$this->finalCalcUtil($previousProducts);

		$userId=$this->session->userdata('user_id');
		$this->load->model('MainModel');
		$data['settingDetails']=$this->session->userdata('settingDetails');
		$data['taxlist']=$this->SaleModel->getProTaxList();

	 $data['previousProducts']=$previousProducts;

	 $data['tax_desc']=$this->session->userdata("tax_desc");
	 $this->load->view('pos/right_side_block',$data);
	}

	function finalCalcUtil($previousProducts){
		$totalTax = 0;
		$totalPrice = 0;
		$totalGrandTotal =0;
		$taxBreak = array();
		$taxBreakArray = isset($previousProducts['taxbreak'])?$previousProducts['taxbreak']:array();
		$other_calc_obj = $this->session->userdata('other_calc_obj');
		$settingDetails = $this->session->userdata('settingDetails');
		//print_r($other_calc_obj);
		if($this->session->userdata('settingDetails')){
			if($settingDetails->icw_shop_tax0317 == 2){
				foreach ($previousProducts as $key=>$prdRowObj){
					$taxablePrice = ($prdRowObj['prd_price'] * $prdRowObj['qty']);
					$totalRowTax = 0;

					//echo " product wise tax if..";
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
						$taxItem=0;
						if($other_calc_obj['tax_type'] == 2){
							$divider = 1 + ($taxrow->icw_subTaxPercent0317 / 100);
							$baseProductTax = $taxablePrice / $divider;
							$taxItem = $taxablePrice - $baseProductTax;
						}else{
							$taxItem = (($taxablePrice * $taxrow->icw_subTaxPercent0317) / 100);
						}

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
					if($other_calc_obj['tax_type'] == 2){
						$totalPrice=$totalPrice+$taxablePrice - ($totalRowTax);
						$totalTax=$totalTax+$totalRowTax;
						$totalGrandTotal=$totalGrandTotal+($taxablePrice);
					}else{
						$totalPrice=$totalPrice+$taxablePrice;
						$totalTax=$totalTax+$totalRowTax;
						$totalGrandTotal=$totalGrandTotal+($taxablePrice+$totalRowTax);
					}
				}
			}else if($settingDetails->icw_shop_tax0317 == 1){
				//echo " common tax if..";
				$totalPrice = 0;
				foreach ($previousProducts as $key=>$prdRowObj){
					$taxablePrice = ($prdRowObj['prd_price'] * $prdRowObj['qty']);
					$totalPrice=$totalPrice+$taxablePrice;
				}
				$taxMapObj = $this->SaleModel->getSubTaxInfo($other_calc_obj['tax_id']);
				$other_calc_obj['taMapObj'] = $taxMapObj;
				$this->session->set_userdata('other_calc_obj', $other_calc_obj);

				//print_r($taxMapObj);
				$subTaxArray = isset($taxBreak[$other_calc_obj['tax_id']])?$taxBreak[$other_calc_obj['tax_id']]:array();
				$totalRowTax = 0;
				foreach ($taxMapObj as $taxrow){
					$rowTax = 0;
					$taxItem=0;
					if($other_calc_obj['tax_type'] == 2){
						$divider = 1 + ($taxrow->icw_subTaxPercent0317 / 100);
						$baseProductTax = $totalPrice / $divider;
						$taxItem = $totalPrice - $baseProductTax;
					}else{
						$taxItem = (($totalPrice * $taxrow->icw_subTaxPercent0317) / 100);
					}
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


				if($other_calc_obj['tax_type'] == 2){
					$totalPrice=$totalPrice - ($totalRowTax);
					$totalTax=$totalTax+$totalRowTax;
					$totalGrandTotal=$totalGrandTotal+($totalTax+$totalPrice);
				}else{
					$totalTax=$totalTax+$totalRowTax;
					$totalGrandTotal=$totalGrandTotal+$totalRowTax+$totalPrice;
					
				}
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
}