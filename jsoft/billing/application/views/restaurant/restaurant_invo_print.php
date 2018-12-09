
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css"></link>
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css"></link>
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/plugins/billingCss/invoice2.css"></link>

<?php
//print_r($invo_data); 

$settingDetails = $this->session->userdata('settingDetails');
$printerType = $settingDetails->icw_shop_printer0317;
$hsnDisplay = $settingDetails->icw_shop_hsn0317;
?>
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

td {
	height: 12px;
	font-size: 11px;
}
</style>			
		<div class="" style="width: 20%; margin-left: 30%; border:1px;">
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
<?php foreach ($invo_data as $dts) {}?>
			
			<tr>
				<td>Date:</td>
				<td colspan=1><?php if($invo_data){ $date=$dts->date; echo $newDate = date("d/m/Y", strtotime($date));}?>
				</td>
			</tr>
			<tr>
				<td>Invo No:</td>
				<td colspan=1><?php if($invo_data){ echo $dts->invono;}?>
				</td>
			</tr>
			<tr>
				<td colspan=2><?php if($invo_data){ if($dts->ordtype==1)echo "Dine In";}if($dts->ordtype==2){echo "Parcel";}?></td><td colspan=2><?php  if($dts->ordtype ==2){echo "Parcel-" .$dts->tblno;}else{echo "Table-" . $dts->tblno;}?></td>
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
if ($item_data) {
           foreach ($item_data as $dt) {
            ?>
			<tr>
				<td><?php if($item_data){ echo ucfirst(substr($dt->item,0,6));}?>
				</td>
				<td style="text-align: center;"><?php if($item_data){ echo $dt->qty;}?>
				</td>
				<td><?php if($item_data){ echo $dt->price;}?>
				</td>
				<td><?php if($item_data){ echo $dt->itemtotal;}?>
				</td>
			</tr>
			<?php if($item_data){ $qty +=$dt->qty;}}}?>

			<tr>
				<td colspan=4><hr></td>
			</tr>
			<tr>
				<td>Items:&nbsp;<?php if($item_data){ echo count($item_data);}?>
				</td>
				<td>Qty:&nbsp;<?php echo $qty;?></td>
				<td colspan=2>&nbsp;&nbsp;&nbsp;&nbsp;Amt:&nbsp;<?php if($invo_data){ echo getCurrencyDouble($dts->total);}?>
				</td>
			</tr>
			<tr>
				<td colspan=4><hr></td>
			</tr>
			<?php foreach ($tax_data as $td) {?>
			<tr>
				<td colspan=2><?php if($tax_data){ echo $td->taxtype ."&nbsp" . $td->taxper ."%";}?></td><td colspan=2><?php if($tax_data){ echo $td->taxamt;}?></td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan=4><hr></td>
			</tr>
			<tr>
				<td colspan=2>Total Tax:&nbsp;&nbsp;<?php if($invo_data){ echo getCurrencyDouble($dts->totaltax);}?>
				</td>
				<td colspan=2>&nbsp;&nbsp;&nbsp;&nbsp;Total:&nbsp;<?php if($invo_data){ echo getCurrencyDouble($dts->grandtotal);}?>
				</td>
			</tr>
			<tr>
				<td colspan=1>Discount%:&nbsp;&nbsp;<?php if($invo_data){ echo $dts->disper;}?>
				</td>
				<td colspan=3>&nbsp;&nbsp;&nbsp;&nbsp;Dis Amt:&nbsp;<?php if($invo_data){ echo getCurrencyDouble($dts->disamt);}?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td colspan=3><strong>Payable Amt:&nbsp;&nbsp;<?php if($invo_data){ echo getCurrencyDouble($dts->payamt);}?></strong>
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
	
</body>
</html>
