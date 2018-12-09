<?php if($type=='ord'){?>
<table
	class="table table-responsive panel panel-default table-bordered p210">
	<tr>
		<th style="width: 10px">#</th>
		<th>Name</th>
		<th>Quantity</th>
		<th>Remove</th>
	</tr>
<?php $i=1; foreach($bill_data as $row){?>
<tr style="margin: 15px;">
		<td><?php echo $i++;?></td>
		<td style="width: 50%;"><span style="margin: 10px;"><?php echo substr(ucwords($row->items),0,15);?></span></td>
		<td style="width: 2%;"><?php echo $row->qty;?></td>
		<td style="width: 2%;"><span class="badge badge-danger" style="cursor:pointer;" title="Remove Items"
			onclick="deleteOrd('<?php echo $row->orderid;?>','<?php echo $row->items;?>')"><i
				class="fa fa-trash"></i></span>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="">
			<?php if($row->orderstatus==0){?>
			<i class="fa fa-ellipsis-h text-danger"></i>
			<?php }else{?>
			<i class="fa fa-check text-success"></i>
			<?php } ?>
			</span>
			<span class="pull-right">
			<?php if($row->availstatus==1){?>
			<i class=" text-danger">N/A</i>
			<?php }else{?>
			<i class="fa fa-check text-success"></i>
			<?php } ?>
			</span>
		</td>
	</tr>
<?php } ?>
</table>
<input type="hidden" value="<?php echo $row->tblno;?>" id="hidden_tblno">
<div class="panel-footer">
	<span class="badge badge-info">servitor:&nbsp;<?php echo $row->servno;?></span>&nbsp;&nbsp;<?php if($row->orderstatus == 1){echo '<span class="badge badge-success">Ready</span>';}else{echo '<span class="badge badge-danger">Processing</span>';}?>
	
</div>
<div class="box-footer">
					<button class="btn btn-danger pull-right1" onclick="confirmCancle()">Cancel Order</button>
					<button class="btn btn-success pull-right" onclick="getBill('<?php echo $row->tblno;?>')">Pay Bill</button>				
				</div>
<script>
function confirmCancle(){
	swal({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, cancel it!',
		  cancelButtonText: 'No, cancel!',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: false,
		  preConfirm: function(){ 
		  	url = "<?php echo site_url();?>restaurant/getCancle/?tblno=<?php echo $row->tblno;?>";
			$.ajax({
			    type: 'POST',
			    url: url,
			    data:[],
			    success: function(response) { 
			        if(response=='1'){
			        	swal(
			        		    'Cancelled!',
			        		    'Your order has been Cancelled.',
			        		    'success'
			        	).then(function () {
			        		 window.location.reload();
			        	})
			            }else{
			            	swal(
						   		      'Not Cancelled',
						   		      'Your order is safe :)',
						   		      'error'
						   		    )
						   	} 
			    },
			    error: function(response) {	
			    	         
			    }
			    });

			
		}
	})
}
</script>
<?php } ?>

<?php if($type=='bil'){?>
<style>
hr {
	border: none;
	border-top: 1px dotted black;
	color: #fff;
	background-color: #fff;
	height: 1px;
	width: 100%;
	margin: 0em;
}
</style>
<?php $settingDetails=$this->session->userdata('settingDetails');?>
<?php foreach($bill_data as $row){} ?>
<table class="table-responsive print-table">
	<tr>
	<td style="width: 30% !important">Date:<?php echo $today = date("F j, Y, g:i a");?>
	</td>
	<td style="width: 20%"><strong><?php  if($row->ordertype ==2){echo "Parcel-" .$row->tblno;}else{echo "Table-" . $row->tblno;}?></strong></td>
	</tr>
	<tr><td colspan="4"><hr></td></tr>
<?php $totSum=0; foreach($bill_data as $row){ //print_r($row);?>
<tr>
		<td ><?php echo ucwords($row->items);?></td>
		<td ><?php echo $row->qty;?></td>
		<td ><?php echo $row->price;?></td>
		<td ><?php echo $row->total;?></td>
	</tr>
<?php } ?>
<tr><td colspan="4"><hr></td></tr>
<tr>
		<td ></td>
		<td ></td>
		<td><strong>Total:</strong></td>
		<td><strong><?php echo getCurrencyDouble($finalCalData['totalAmt']);?><strong></td>
	</tr>
	
		<?php  $tmt='';
			foreach($finalCalData['taxdtl'] as $dt){
		?>
	<tr>
		<td ></td>
		<td></td>
		<td ><?php  echo $dt['tname'] ."&nbsp;" . $dt['tper'] ."%"; ?></td>
		<td ><?php  echo getCurrencyDouble($dt['tamt']);?></td>
	</tr>
	<?php } ?>
	<!--<tr><td style="width:10%;"></td><td style="width:2%;"></td><td style="width:2%;" colspan=2><span class="list-unstyled" style="font-size:10px;"><?php //$subtaxType=$finalCalData['subtaxType']; foreach($subtaxType as $rec){ ?> <span><?php// echo $rec->icw_subTaxName0317 . "&nbsp;" . $rec->icw_subTaxPercent0317 ."%&nbsp;&nbsp;";?></span><?php //} ?> </span></td></tr>-->
	<tr>
		<td></td>
		<td ></td>
		<td ><strong>Grand Total:</strong></td>
		<td >
		<strong><span class="grandT"><?php echo getCurrencyDouble($finalCalData['grandTotal']);?></span></strong>
		</td>
	</tr>
	<tr><td colspan="4"><hr></td></tr>
	<tr>
			<td></td>
			<td><span style="text-align: center; margin-top:10px;">Discount(%): &nbsp;</span></td>
			<td><input type="number" placeholder="eg. 5" id="discount" class="discount" onkeyup="disc()" style="margin-top:10px; width:65%"></td>
			<td><i class="fa fa-inr"></i><span class="disAmt">0</span></td>
		</tr>
	<tr>
			<td></td>
			<td></td>
			<td style="text-align: center;"><strong>Payable Amt: &nbsp;</strong></td>			
			<td><i class="fa fa-inr"></i><strong><span class="payAmt"><?php echo $finalCalData['grandTotal'];?></span></strong></td>
		</tr>
</table>

<div class="printArea" style="width: 10%; margin-left: 30%; border:1px; display: none;">
		<table class="icwprint">
			<tr>
				<td colspan=2><center>
						<ul class="list-unstyled">
							<li><?php if($settingDetails){ echo strtoupper($settingDetails->icw_shop_name0317);}?>
							</li>
							<li><?php if($settingDetails){ echo ucwords($settingDetails->icw_shop_Address0317);}?>
							</li>
							<li><?php if($settingDetails){ echo "Phone-" . $settingDetails->icw_shop_phone0317;}?>
							</li>
						</ul>
					</center></td>
				<td></td>
			</tr>
			<tr>
				<td>GSTIN:</td>
				<td colspan=1><?php if($settingDetails){ echo strtoupper($settingDetails->icw_shop_gstin0317);}?>
				</td>
			</tr>
			<tr>
				<td colspan=4><hr></td>
			</tr>
			<tr>
				<td colspan=4><hr></td>
			</tr>
<?php foreach ($bill_data as $dt) {}?>
			
			<tr>
				<td colspan=4>Date:&nbsp;<?php echo $today = date("F j, Y, g:i a");?>
				</td>
			</tr>
			<tr>
				<td>Order No:</td>
				<td colspan=2><?php if($bill_data){ echo $dt->orderno;}?>
				</td>
			</tr>
			<tr>
				<td colspan=2><?php if($bill_data){ if($dt->ordertype==1)echo "Dine In";}if($dt->ordertype==2){echo "Parcel";}?></td><td colspan=2><?php  if($dt->ordertype ==2){echo "Parcel-" .$dt->tblno;}else{echo "Table-" . $dt->tblno;}?></td>
			</tr>
			<tr>
				<td colspan=4><hr></td>
			</tr>
			<tr>
				<td>Particular</td>
				<td style="text-align: center;">Qty</td>
				<td>Rate</td>
				<td>Value</td>
			</tr>
			<tr>
				<td colspan=4><hr></td>
			</tr>
			<?php
    
$qty = 0;
    if ($bill_data) { 
           foreach ($bill_data as $dt) {
            ?>
			<tr>
				<td><?php if($bill_data){ echo ucfirst(substr($dt->items,0,6));}?>
				</td>
				<td style="text-align: center;"><?php if($bill_data){ echo $dt->qty;}?>
				</td>
				<td><?php if($bill_data){ echo $dt->total;}?>
				</td>
				<td><?php if($bill_data){ echo $dt->total * $dt->qty;}?>
				</td>
			</tr>
			<?php if($bill_data){ $qty +=$dt->qty;}}}?>

			<tr>
				<td colspan=4><hr></td>
			</tr>
			<tr>
				<td>Items:&nbsp;<?php if($bill_data){ echo count($bill_data);}?>
				</td>
				<td>Qty:&nbsp;<?php echo $qty;?></td>
				<td colspan=2>&nbsp;&nbsp;&nbsp;&nbsp;Amt:&nbsp;<?php if($bill_data){ echo $dt->total;}?>
				</td>
			</tr>
			<tr>
				<td colspan=4><hr></td>
			</tr>
	
		<?php  $tmt='';
			foreach($finalCalData['taxdtl'] as $dt){
		?>
	<tr>
		<td colspan=2><?php  echo $dt['tname'] ."&nbsp;" . $dt['tper'] ."%"; ?></td>
		<td colspan=2><?php  echo getCurrencyDouble($dt['tamt']);?></td>
	</tr>
	<?php } ?>
			<tr>
				<td colspan=4><hr></td>
			</tr>
			<tr>
				<td colspan=2>Total Tax:&nbsp;&nbsp;<?php //if($bill_data){ echo $dt->totaltax;}?>
				</td>
				<td colspan=2>&nbsp;&nbsp;&nbsp;&nbsp;Total:&nbsp;<?php echo getCurrencyDouble($finalCalData['grandTotal']);?>
				</td>
			</tr>
			<tr>
				<td colspan=1>Discount%:&nbsp;&nbsp;<span class="disperc"></span>
				</td>
				<td colspan=3>&nbsp;&nbsp;&nbsp;&nbsp;Dis Amt:&nbsp;<span class="disamts"></span>
				</td>
			</tr>
			<tr>
				<td></td>
				<td colspan=3><strong>Payable Amt:&nbsp;&nbsp;<i class="fa fa-inr"></i><span class="payamts"><?php echo $finalCalData['grandTotal'];?></span></strong>
				</td>
			</tr>
			<tr>
				<td colspan=4><hr></td>
			</tr>
			<tr>
				<td colspan=4><center>***Thank You***</center></td>
			</tr>

		</table>
	</div>
<div class="modal-footer">
	<button class="btn btn-primary" onclick="PrintElem('.printArea');">Print
		Bill</button>
	<button class="btn btn-success"
		onclick="getFree('<?php echo $row->tblno;?>')">Make Payment</button>
</div>
<?php }?>