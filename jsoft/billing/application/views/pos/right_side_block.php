<div class="box-j2 col-md-9 panel1 panel-info1" id="printarea"
	style="padding: 0; margin: 0">
	<div class="row jCalc panel panel-default"">
		<table border=1 class="table table-bordered jTable" id="mytbl2"
			cellspacing="0" width="100%">
			<thead class="bg-info">
				<th width="3%"><i class="fa fa-trash-o" aria-hidden="true"></i></th>
				<th width="18%">Product</th>
				<th width="16%">Description</th>
				<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_type0317 == 5){?>
				<th width="12%">Batch No.</th>
				<th width="12%">Mfg.Date</th>
				<th width="12%">Expire Date</th>
				<?php }}?>
				<th width="8%">QTY</th>
				<th width="12%">Price</th>
				<th width="12%">Total</th>
				<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_tax0317 == 2){?>
				<th width="12%">Apply Tax</th>
				<?php }}?>
			</thead>
			<tbody id="jMore">
				<tr class="item-row"></tr>
				<?php 
				foreach ($previousProducts as $key=>$getdata){
					//print_r($getdata);
					//$query=$getdata['query'];
					// $query2=$getdata['query2'];
					?>
				<tr class="jRemove">
					<td><i class="fa fa-times removeRow <?php echo $key;?>"
						aria-hidden="true" accesskey="x" style="cursor: pointer"></i></td>
					<td><input type="text" class="productName  form-control  calcpos procalc"
						alt="<?php echo $key;?>" id="productName_<?php echo $key;?>"
						class='form-control input-border' name="productName[]"
						value="<?php echo $getdata['prd_name'];?>"><input type="hidden"
						class="productId" id="productId_<?php echo $key;?>"
						name="productId[]" value="<?php echo $getdata['prd_id'];?>"></td>


					<td><input type="text" class="productDesc  form-control  calcpos"
						alt="<?php echo $key;?>" id="productDesc_<?php echo $key;?>"
						class='form-control input-border' name="productDesc[]"
						value="<?php echo $getdata['prd_desc'];?>"></td>
						
					<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_type0317 == 5){?>	
					<td align="right"><input type="text" value="<?php echo $getdata['prd_batch'];?>" name='batch[]' class='form-control'>
					</td>
					<td align="right"><input type="text" value="<?php echo $getdata['prd_mfg'];?>" name='mfg[]' class='form-control'>
					</td>
					<td align="right"><input type="text" value="<?php echo $getdata['prd_expire'];?>" name='expire[]' class='form-control'>
					</td>
					<?php }}?>

					
					<td><input type="text" id="qty_<?php echo $key;?>"
						class='form-control calcpos' alt="<?php echo $key;?>" name='qty[]'
						value='<?php echo $getdata['qty']?>' style='width: 50px'></td>
					<td><input type='text' class='selling_price form-control calcpos'
						name='selling_price[]' alt="<?php echo $key;?>"
						id="selling_price_<?php echo $key;?>"
						value='<?php echo $getdata['prd_price'];?>'></td>
					<td align="right"><?php echo getCurrencyDouble($getdata['total']);?>
					</td>
					<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_tax0317 == 2){?>
					<td><select class="calcpos1 form-control  <?php echo $key;?>"
						name="taxSel[]" id="taxId_<?php echo $key;?>">
							<option value="0">No Tax</option>
							<?php foreach($taxlist as $qry){?>
							<option <?php if($qry->icw_id0317 == $getdata['tax_id']){?>
								selected="selected" <?php }?>
								value="<?php echo $qry->icw_id0317;?>">
								<?php echo $qry->icw_taxName0317;?>
							</option>
							<?php }?>
					</select>
					</td>
					<?php }}?>
				</tr>
				<?php   } ?>
			</tbody>
		</table>
	</div>
	<div class="row sCalc panel panel-default">
		<div class="col-md-5">
			<br />
			<table width="100%" align="right">
				<tr>
					<td width="50%" height="30" style="text-align: left;">Payment Type:</td>
					<td width="50%" style="text-align: left;"><select
						name="paymentMode" class="paymentModeCls form-control" accesskey="p">
							<option value="no">Select Payment Mode</option>
							<option value="cash">Cash</option>
							<option value="cheque">Cheque</option>
							<option value="credit">Credit Card</option>
							<option value="debit">Debit Card</option>
					</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<div class="input-group" id="paidAmountDiv" style="display: none;">
							<span class="input-group-addon"><i class="fa fa-inr text-success"></i>
							</span> <input type="text" name="paidAmount" id="paidAmount"
								class="form-control inputDisp inputDisPaid"
								placeholder="Paid Amount">
						</div>
						<div class="input-group" id="balanceAmountDiv"
							style="display: none;">
							<span class="input-group-addon"><i class="fa fa-inr text-danger"></i>
							</span> <input type="text" name="balanceAmount"
								id="balanceAmount" class="form-control inputDisp inputDisBal"
								readonly placeholder="Balance Amount">
						</div>
						<div class="input-group" id="transRefIdDiv" style="display: none;">
							<span class="input-group-addon"><i class="fa fa-circle text-info"></i>
							</span> <input type="text" name="transRefId" id="transRefId"
								class="form-control inputDisp" placeholder="Transaction Ref Id">
						</div>
						<div class="input-group" id="chequeBnkDiv" style="display: none;">
							<span class="input-group-addon"><i class="fa fa-circle text-info"></i>
							</span> <input type="text" name="chequeBnk" id="chequeBnk"
								class="form-control inputDisp" placeholder="Bank Name">
						</div>
						<div class="input-group" id="chequeNoDiv" style="display: none;">
							<span class="input-group-addon"><i class="fa fa-circle text-info"></i>
							</span> <input type="text" name="chequeNo" id="chequeNo"
								class="form-control inputDisp" placeholder="Cheque No">
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div class="col-md-7 pull-right">
			<table width="100%" align="right">
				<tr>
					<td width="50%" height="30" style="text-align: left;">No of Items</td>
					<td width="50%" style="text-align: left;">&nbsp;&nbsp;&nbsp;<?php echo count($previousProducts)?>
						<input type="hidden" value="<?php echo count($previousProducts)?>"
						name="numberofitemsJ">
					</td>
				</tr>
				<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_tax0317 == 1){?>
				<tr>
					<td width="50%" height="30" style="text-align: left;">Select Tax</td>
					<td><select class="sel form-control calcpossel " name="taxsingle_id"
						id="taxsingle_id">
							<option value="0">No Tax</option>
							<?php foreach($taxlist as $qry){?>
							<option value="<?php if($taxlist !=''){echo $qry->icw_id0317;}?>"
							<?php if($_SESSION['other_calc_obj']['tax_id'] == $qry->icw_id0317){?>
								selected="selected" <?php }?>>
								<?php if($taxlist !=''){echo $qry->icw_taxName0317;}?>
							</option>
							<?php }?>
					</select>
					</td>
				</tr>
				<?php }}?>
				<tr>
					<td width="50%" height="50" style="text-align: left;">Tax Type</td>
					<td width="50%" style="text-align: left;"><select name="taxMode"
						id="taxMode" class="taxModeCls calcpossel form-control ">
							<option value="1"
							<?php if($_SESSION['other_calc_obj']['tax_type'] == 1){?>
								selected="selected" <?php }?>>Exclusive</option>
							<option value="2"
							<?php if($_SESSION['other_calc_obj']['tax_type'] == 2){?>
								selected="selected" <?php }?>>Inclusive</option>
					</select></td>
				</tr>
				<tr>
					<td width="70%" height="30" style="text-align: left;">Total Tax</td>
					<td width="30%" style="text-align: right;" id="totalTaxAmt">&nbsp;&nbsp;&nbsp;<?php echo getCurrencyDouble($finalcalc['total_tax']);?>
						<input type="hidden" id="totalTaxAmtJ" name="totalTaxAmtJ"
						value="<?php echo $finalcalc['total_tax'];?>" />
						<!-- <table width="100%" align="right">
						<?php 
						foreach($finalcalc['total_break'] as $key=>$val){
							if(isset($tax_desc[$key])){
								?>
							<tr>
								<td width="70%" style="text-align: left;"><?php echo $tax_desc[$key]?>
									<input type="hidden" name="tax_desc[]"
									value="<?php echo $tax_desc[$key]?>">
								</td>
								<td width="30%" style="text-align: right;"><?php echo $val['total']?>
									<input type="hidden" name="tax_desc_total[]"
									value="<?php echo $val['total']?>">
								</td>
							</tr>
							<?php
							}}
							?>
						</table> -->
					</td>
				</tr>

				<tr>
					<td width="70%" height="30" style="text-align: left;">Total Item
						Price</td>
					<td width="30%" style="text-align: right;">&nbsp;&nbsp;&nbsp;<?php echo getCurrencyDouble($finalcalc['total_price']);?>
						<input type="hidden" id="total_amtJ" name="total_amtJ"
						value="<?php echo $finalcalc['total_price'];?>" />
					</td>
				</tr>
				<tr>
					<td width="70%" height="30" style="text-align: left;">Grand Total
						Payable</td>
					<td width="30%" style="text-align: right;" id="grand_total">&nbsp;&nbsp;&nbsp;<?php echo getCurrencyDouble($finalcalc['total_grand']);?>
						<input type="hidden" id="grand_totalJ" name="grand_totalJ"
						value="<?php echo $finalcalc['total_grand'];?>" />
					</td>
				</tr>
			</table>
		</div>
		<div class="sCalc-box2">			
			<div class="row">
				<div class="col-md-4  col-md-offset-4"
					style="margin-top: 30px; margin-bottom: 10px;">
					<div class="action-box">
					<?php if(isset($previousProducts) && !empty($previousProducts)){?>
						<button type="submit" class="btn btn-info invoiceSave">Save</button>
						<!-- <button type="submit" class="btn btn-primary print">Print</button> -->
						<?php }else{} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</section>
<script>
    $(document).ready(function(e) {    
    	$('.calcpos').on('change', function() {
    		var rowId =  this.alt;
    		calcPos(rowId);
    	});
    	$('.calcpossel').on('change', function() {
    		calcPos(-3);
    	});
    	$('.calcpos1').on('change', function() {
    		var className = this.className;
    		var rowId = className.replace('calcpos1 ','');
    		rowId = rowId.replace('form-control','').trim();
    		//alert($(this).val());
    		calcPos(rowId);
    	}); 	
    	
    	$('#mytbl2').on('click', '.removeRow', function() {
    		var className = this.className;
    		var rowid = className.replace('fa fa-times removeRow ','');
    		 rowid = rowid.replace('form-control','').trim();
    		$.ajax({
        	    type: 'POST',
        	    url: "<?php echo site_url('pos/updateRow/"+rowid+"');?>",
        	    data:[],
        	    cache:false,
        	    contentType: false,
        	    processData: false,
        	    success: function(response) {   	
        	    	$('#pos_ref_blk').html(response);
        	    	$("#jSearch").focus();
        	    },
        	    error: function(response) {
        	        
        	    }
        	    });
   	    	
    		});
        }); 


    $('.paymentModeCls').on('change',function(){
    	var mode=$(this).val();
    	if(mode =='no'){
    		$('#transRefIdDiv').hide().val('');
    		$('#paidAmountDiv').hide().val('');
    		$('#balanceAmountDiv').hide().val('');
			$('#chequeBnkDiv').hide().val('');
			$('#chequeNoDiv').hide().val('');
    	}
    	if(mode =='cash'){
    		$('#transRefIdDiv').hide();
    		$('#paidAmountDiv').show();
    		$('#paidAmountDiv').focus();
    		$('#balanceAmountDiv').show();
			$('#chequeBnkDiv').hide().val('');
			$('#chequeNoDiv').hide().val('');
    	}
		if(mode =='cheque'){
    		$('#transRefIdDiv').hide();
    		$('#paidAmountDiv').show();
    		$('#paidAmountDiv').focus();
    		$('#balanceAmountDiv').show();
			$('#chequeBnkDiv').show();
			$('#chequeNoDiv').show();
    	}
    	if(mode =='debit'){
    		$('#transRefIdDiv').show();
    		$('#paidAmountDiv').show().focus();
    		$('#balanceAmountDiv').show();
			$('#chequeBnkDiv').hide().val('');
			$('#chequeNoDiv').hide().val('');
    	}
    	if(mode =='credit'){
    		$('#transRefIdDiv').show();
    		$('#paidAmountDiv').show().focus();
    		$('#balanceAmountDiv').show();
			$('#chequeBnkDiv').hide().val('');
			$('#chequeNoDiv').hide().val('');
    	}	
    });

    $('#paidAmount').bind('keyup change',function(){
    	var paid=$(this).val();
    	var tot=$("#grand_totalJ").val();
		$("#balanceAmount").val('0');
    	if(tot==0){
    		swal("Receivables amounts should not be empty","Esc to remove","info","closeOnEsc: false");
    		$('#paidAmount').val('0');
    		} else if(parseFloat(paid) > parseFloat(tot)){
					swal("Entered Amount is greater than Payable Amount","Esc to remove","error","closeOnEsc: false" );
					$('#paidAmount').val('');
					$('#paidAmount').focus();
					$("#balanceAmount").val('0');
					return false;
				}else{
					var bal=parseFloat(tot) - parseFloat(paid);
					bal=Math.round(bal * 100)/100;
					if(isNaN(bal)){bal=0;}else{ bal=bal;}
					$("#balanceAmount").val(bal);
				}
    	
    	
    });

    $(function () {
        $("input[id*='paidAmount']").keydown(function (event) {


            if (event.shiftKey == true) {
                event.preventDefault();
            }

            if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

            } else {
                event.preventDefault();
            }
            
            if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
                event.preventDefault();

        });
    });

    </script>


