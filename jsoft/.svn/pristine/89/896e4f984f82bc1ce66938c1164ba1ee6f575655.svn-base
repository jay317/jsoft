
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
$data = isset($data) ? $data : '';
$getInvoiceQuery = isset($getInvoiceQuery) ? $getInvoiceQuery : '';

if ($getInvoiceQuery) {
    $getInvoiceQuery1 = $getInvoiceQuery['query1'];
    $getInvoiceQuery2 = $getInvoiceQuery['query2'];
    $getInvoiceQuery21 = $getInvoiceQuery['query21'];
    
    $getInvoiceQuery3 = $getInvoiceQuery['query3'];
    $getInvoiceQuery4 = $getInvoiceQuery['query4'];
    $getInvoiceQuery5 = $getInvoiceQuery['query5'];
    $getInvoicequery_tax = $getInvoiceQuery['query_tax'];
    $getInvoicequery_taxsub = $getInvoiceQuery['query_taxsub'];
}

$settingDetails = $this->session->userdata('settingDetails');
$printerType = $settingDetails->icw_shop_printer0317;
$hsnDisplay = $settingDetails->icw_shop_hsn0317;
if ($printerType == 1) {
    ?>
<style type="text/css">
@page {
	margin: 2px;
}

body {
	margin: 2px;
}

body {
	font-size: 12px;
	font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
	margin: auto;
	width: 100%;
	margin: 2px auto 2px;
	border: 4px solid #3f981f;
}

@media print {
	p {
		margin: 2px;
	}
}

#content {
	padding: 0.2em 1% 0.2em 1%;
	min-height: 15em;
}

table.change_order_items {
	width: 100%;
	border-collapse: collapse;
	margin-top: 2em;
	margin-bottom: 2em;
}

p {
	margin: 0;
	padding: 0;
	margin-top: 4px;
}

h2 {
	font-size: 13px;
	margin: 0;
	padding: 0;
}

h3 {
	font-size: 14px;
	margin: 0;
	padding: 0;
	margin: 0;
	text-align: left;
	margin-left: 8px;
	font-weight: bold;
}

table.change_order_items1>tbody>tr>td {
	padding: 5px;
}

table.change_order_items>tbody {
	
}

table.change_order_items>tbody>tr>th {
	border: 1px solid #787a7b;
	background: #ccc;
	padding: 5px;
}

table.change_order_items>tbody>tr>td {
	border: 1px solid #787a7b;
	padding: 5px;
}

table.change_order_items td {
	padding-left: 5px;
}

td.change_order_total_col {
	padding-right: 4pt;
	text-align: right;
}

td.change_order_unit_col {
	padding-left: 2pt;
	text-align: left;
}

.text-right {
	text-align: right;
}

.taxDisTable  td {
	width: 100%;
	font-size: 10px;
	font-family: arial;
}

.comp_logo {
	height: 60px;
	width: 160px;
}
</style>
</head>

<body>
	<div id="body">
		<div id="content">
			<div class="page">
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
						<tr>
							<h1 align="center"
								style="padding-top: 10px; padding-bottom: 10px; background-color: #3F981F">INVOICE</h1>
						</tr>
						<tr>
							<td align="center"><span class="">
									<table>
										<tr>
											<td><strong>Invoice No.</strong></td>
											<td align="center">#<?php if($getInvoiceQuery1){ echo $getInvoiceQuery1->icw_invoiceNo_0317;}?>
											</td>
										</tr>
										<tr>
											<td><strong>Invoice Date. &nbsp;</strong></td>
											<td align="center"><?php if($getInvoiceQuery1){ $date=$getInvoiceQuery1->icw_invoDate0317; echo $newDate = date("d/m/Y", strtotime($date));}?>
											</td>
										</tr>
										<tr>
											<td><strong>GSTIN. &nbsp;</strong></td>
											<td align="center"><?php if($getInvoiceQuery5){ echo strtoupper($getInvoiceQuery5->icw_shop_gstin0317);}?>
											</td>
										</tr>
									</table>
							</span></td>
							<td align="right"><span class=""> <?php if($getInvoiceQuery5){ ?>
									<img
									src="<?php echo base_url();?>uploads/shop-logo/<?php if($getInvoiceQuery5){ echo $getInvoiceQuery5->icw_shop_bLogo_0317;}?>"
									class="comp_logo" /> <?php }else{ ?> <img
									src="<?php echo base_url();?>assets/images/profile-icon.png"
									class="comp_logo" /> <?php } ?> </span></td>
						</tr>
					</tbody>
				</table>

				<div style="border-bottom: 1px solid black;">&nbsp;</div>
				<table border="0" cellpadding="0" cellspacing="0" height="140"
					class="change_order_items" width="100%">
					<tr>
						<th><h3>Invoice From</h3></th>
						<th><h3>Invoice To</h3></th>
						<th><h3>Customer Information</h3></th>
					</tr>
					<tbody>
						<tr>
							<td align="left" valign="top" width="25%">
								<p>
									<strong><?php if($getInvoiceQuery5){ echo $getInvoiceQuery5->icw_shop_name0317;}?>
									</strong>
								</p>
								<p>
								<?php if($getInvoiceQuery5){ echo $getInvoiceQuery5->icw_shop_Address0317;}?>
								</p>
								<p>
									Mobile:
									<?php if($getInvoiceQuery5){ echo $getInvoiceQuery5->icw_shop_mobile0317;}?>
								</p>
								<p>
									Phone:
									<?php if($getInvoiceQuery5){ echo $getInvoiceQuery5->icw_shop_phone0317;}?>
								</p>
							</td>
							<td valign="top" width="25%">
								<p>
									<strong><?php if($getInvoiceQuery4){ echo ucfirst($getInvoiceQuery4->icw_clientBtitle0317);}?>
									</strong>
								</p>
								<p>
								<?php if($getInvoiceQuery4){ echo ucfirst($getInvoiceQuery4->icw_clientAddr10317);}?>
								<?php if($getInvoiceQuery4){ echo "," . ucfirst($getInvoiceQuery4->icw_clientAddr20317);}?>
								</p>
								<p>
								<?php if($getInvoiceQuery4){ echo ucfirst($getInvoiceQuery4->icw_clientCity0317);}?>
								<?php if($getInvoiceQuery4){ echo "-" . $getInvoiceQuery4->icw_clientZipCode0317;}?>
								</p>
								<p>
								<?php if($getInvoiceQuery4){ echo ucfirst($getInvoiceQuery4->icw_clientState0317);}?>
								</p>
								<p>
								<?php if($getInvoiceQuery4){ echo ucfirst($getInvoiceQuery4->icw_clientCountry0317);}?>
								</p>
							</td>
							<td width="25%" valign="top">
								<table border="0" cellpadding="0" class="change_order_items1"
									cellspacing="0" width="100%">
									<tr>
										<td>Customer No</td>
										<td><?php if($getInvoiceQuery1){ echo $getInvoiceQuery1->icw_clientId0317;}?>
										</td>
									</tr>
									<tr>
										<td>Customer Name</td>
										<td><?php if($getInvoiceQuery4){ echo ucfirst($getInvoiceQuery4->icw_clientName0317);}?>
										</td>
									</tr>
									<tr>
										<td>Customer Mobile No.</td>
										<td><?php if($getInvoiceQuery4){ echo $getInvoiceQuery4->icw_clientMobile0317;}else{echo $getInvoiceQuery1->icw_customerMob0317;}?>
										</td>
									</tr>
									<tr>
										<td>Customer Email</td>
										<td><?php if($getInvoiceQuery4){ echo $getInvoiceQuery4->icw_clientEmail0317;}?>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<table class="change_order_items" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<?php if($hsnDisplay==1){ ?>
							<th>HSN</th>
							<?php } ?>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Total</th>
						</tr>

						<?php
    if ($getInvoiceQuery2) {
        foreach ($getInvoiceQuery2 as $getInvoQuery2) {
            ?>
						<tr class="even_row">
							<?php if($hsnDisplay == 1){ ?>
							<td><?php if($getInvoQuery2){ echo $getInvoQuery2->icw_invoice_proHsn0317;}?>
							</td>
							<?php } ?>
							<td><?php if($getInvoQuery2){ echo $getInvoQuery2->icw_invoice_proname0317;}?>
							</td>
							<td style="text-align: center"><?php if($getInvoQuery2){ echo $getInvoQuery2->icw_invoice_qty0317;}?>
							</td>
							<td style="text-align: right; border-right-style: none;"><?php if($getInvoQuery2){ echo $getInvoQuery2->icw_invoice_sellingPrice0317;}?>
							</td>
							<td class="change_order_total_col"><?php if($getInvoQuery2){ echo ($getInvoQuery2->icw_invoice_itemTotal0317);}?>
							</td>
						</tr>
						<?php }}?>

						<tr class="even_row">
							<td colspan="4" class="text-right">
								<div class="col-md-12 pull-right"></div>
							</td>
						</tr>

						<tr class="even_row">
							<th colspan="<?php if($hsnDisplay == 1){ echo 2;}else{echo 1;}?>" class="text-right"><b>No. of Items &nbsp;</b> <?php if($getInvoiceQuery1){ echo $getInvoiceQuery1->icw_noOfItems0317;}?>
							</th>
							<th colspan="2" class="text-right"><b>Total</b></th>
							<th class="text-right"><strong style="font-size: 12px;">Rs.
									&nbsp; <strong><?php if($getInvoiceQuery1){ echo $getInvoiceQuery1->icw_totalAmt0317;}?>
								</strong></th>
						</tr>
						<?php  foreach ($getInvoiceQuery21 as $getInvoQuery21) {  ?>
						<tr class="even_row">
							<td colspan="<?php if($hsnDisplay == 1){ echo 4;}else{echo 3;}?>" class="text-right"><b><?php echo $getInvoQuery21->icw_invoTaxName_0317."  :  ";echo $getInvoQuery21->icw_invo_taxPercent_0317." %";?></b></td>
							<td class="text-right">
								&nbsp;&nbsp;&nbsp;&nbsp; Rs.&nbsp;<?php echo $getInvoQuery21->icw_invoTaxAmt_0317;?>
							</td>
						</tr>
						<?php }?>

						<tr class="even_row">
							<td colspan="<?php if($hsnDisplay == 1){ echo 4;}else{echo 3;}?>" class="text-right"><b>Total Tax</b></td>
							<td class="text-right"><?php if($getInvoiceQuery1){ echo $getInvoiceQuery1->icw_taxType0317;}?>
								&nbsp;&nbsp;&nbsp;&nbsp; Rs.&nbsp;<?php if($getInvoiceQuery1){ echo $getInvoiceQuery1->icw_totalTax0317;}?>
							</td>
						</tr>
						<tr class="even_row">
							<th colspan="<?php if($hsnDisplay == 1){ echo 4;}else{echo 3;}?>" class="text-right"><b>Grand Total</b></th>
							<th class="text-right"><strong style="font-size: 12px;">Rs.
									&nbsp;</strong><strong><?php if($getInvoiceQuery1){ echo $getInvoiceQuery1->icw_amtWithTax0317;}?>
							</strong></th>
						</tr>
						<tr>
							<td colspan="<?php if($hsnDisplay == 1){ echo 4;}else{echo 3;}?>" class="text-right"><b>Paid</b></td>
							<td class="text-right"><?php
    
    if ($getInvoiceQuery1) {
        echo $getInvoiceQuery1->icw_paymentMode0317;
        if ($getInvoiceQuery1->icw_paymentMode0317 == 'debit' || $getInvoiceQuery1->icw_paymentMode0317 == 'credit') {
            echo "(" . $getInvoiceQuery1->icw_transactionId0317 . ")";
        }
        if ($getInvoiceQuery1->icw_paymentMode0317 == 'cheque') {
            echo "-" . $getInvoiceQuery1->icw_chequeBnk0317 . "&nbsp;'" . $getInvoiceQuery1->icw_chequeNo0317 . "'";
        }
    }
    ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong
								style="color: green">Rs. <?php if($getInvoiceQuery1){ echo $getInvoiceQuery1->icw_paidAmount0317;}?>
							</strong></td>
						</tr>
						<tr>
							<td colspan="<?php if($hsnDisplay == 1){ echo 4;}else{echo 3;}?>" class="text-right"><b>Balance Due</b></td>
							<td class="text-right" style="color: red"><strong>Rs. <?php if($getInvoiceQuery1){ echo $getInvoiceQuery1->icw_balanceAmt0317;}?>
							</strong></td>
						</tr>
					</tbody>
				</table>
				<p>

				<p>Terms and Conditions:</p>

				<ul>
					<p>
					<?php if($getInvoiceQuery5){ echo ucfirst($getInvoiceQuery5->icw_shop_TermCondition0317);}?>
					</p>
				</ul>
				</p>
				<table cellpadding="0" cellspacing="0" class="table_css"
					width="100%" style="width: 100%;">
					<tbody>
						<tr>
							<td colspan="5" align="left" valign="top"
								style="border-top: solid 1px #999; padding-top: 10px; line-height: 20px;"></td>
						</tr>
					</tbody>
				</table>
				<br />
			</div>
		</div>
		<p align="center">***This is computer generated receipt no signature
			required***</p>
	</div>
	<?php }else{ ?><?php if($hsnDisplay == 0){?>
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
<?php }if($hsnDisplay == 1){?>
	<style>
hr {
	border: none;
	border-top: 1px dotted black;
	color: #fff;
	background-color: #fff;
	height: 1px;
	width: 120%;
	margin: 0em;
}

td {
	height: 12px;
	font-size: 11px;
}
</style>
<?php } ?>

					
		<div class="" style="width: 10%; margin-left: 30%; border:1px;">
		<table class="icwprint">
			<tr>
			<?php if($hsnDisplay == 1){?>
				<td></td>
				<?php } ?>
				<td colspan=2><center>
						<ul class="list-unstyled">
							<li><?php if($settingDetails){ echo strtoupper($settingDetails->icw_shop_name0317);}?>
							</li>
							<li><?php if($settingDetails){ echo ucwords($settingDetails->icw_shop_Address0317);}?>
							</li>
						</ul>
					</center></td>
				<td></td>
			</tr>
			<tr>
				<td colspan=4><hr></td>
			</tr>

			<tr>
				<td>Bill No:</td>
				<td colspan=1><?php if($getInvoiceQuery1){ echo $getInvoiceQuery1->icw_invoiceNo_0317;}?>
				</td>
			</tr>
			<tr>
				<td>BillDate:</td>
				<td colspan=1><?php if($getInvoiceQuery1){ $date=$getInvoiceQuery1->icw_invoDate0317; echo $newDate = date("d/m/Y", strtotime($date));}?>
				</td>
			</tr>
			<tr>
				<td>GSTIN:</td>
				<td colspan=1><?php if($getInvoiceQuery5){ echo strtoupper($getInvoiceQuery5->icw_shop_gstin0317);}?>
				</td>
			</tr>
			<?php if($getInvoiceQuery4){?>
			<td colspan=4><hr></td>
					<tr>
										<td>CNo.</td>
										<td><?php if($getInvoiceQuery1){ echo $getInvoiceQuery1->icw_clientId0317;}?>
										</td>
									</tr>
									<tr>
										<td>Name</td>
										<td><?php if($getInvoiceQuery4){ echo ucfirst($getInvoiceQuery4->icw_clientName0317);}?>
										</td>
									</tr>
									<tr>
										<td>Mob.</td>
										<td><?php if($getInvoiceQuery4){ echo $getInvoiceQuery4->icw_clientMobile0317;}else{echo $getInvoiceQuery1->icw_customerMob0317;}?>
										</td>
									</tr>
									<tr>
										<td>Email</td>
										<td><?php if($getInvoiceQuery4){ echo $getInvoiceQuery4->icw_clientEmail0317;}?>
										</td>
				</tr>
			
			
			<?php } ?>

			<tr>
				<td colspan=4><hr></td>
			</tr>
			<tr>
			<?php if($hsnDisplay==1){ ?>
				<td>HSN</td>
				<?php } ?>
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
    if ($getInvoiceQuery2) {
        
        foreach ($getInvoiceQuery2 as $getInvoQuery2) {
            ?>
			<tr>
			<?php if($hsnDisplay == 1){ ?>
				<td><?php if($getInvoQuery2){ echo $getInvoQuery2->icw_invoice_proHsn0317;}?>
				</td>
				<?php } ?>
				<td><?php if($getInvoQuery2){ echo ucfirst(substr($getInvoQuery2->icw_invoice_proname0317,0,6));}?>
				</td>
				<td style="text-align: center;"><?php if($getInvoQuery2){ echo $getInvoQuery2->icw_invoice_qty0317;}?>
				</td>
				<td><?php if($getInvoQuery2){ echo $getInvoQuery2->icw_invoice_sellingPrice0317;}?>
				</td>
				<td><?php if($getInvoQuery2){ echo $getInvoQuery2->icw_invoice_itemTotal0317;}?>
				</td>
			</tr>
			<?php if($getInvoQuery2){ $qty +=$getInvoQuery2->icw_invoice_qty0317;}}}?>

			<tr>
				<td colspan=4><hr></td>
			</tr>
			<tr>
				<td>Items:&nbsp;<?php if($getInvoiceQuery1){ echo $getInvoiceQuery1->icw_noOfItems0317;}?>
				</td>
				<td>Qty:&nbsp;<?php echo $qty;?></td>
				<td colspan=2>&nbsp;&nbsp;&nbsp;&nbsp;Amt:&nbsp;<?php if($getInvoiceQuery1){ echo $getInvoiceQuery1->icw_totalAmt0317;}?>
				</td>
			</tr>
			<tr>
				<td colspan=4><hr></td>
			</tr>
			<tr>
				<td colspan=2>Total Tax:&nbsp;&nbsp;<?php if($getInvoiceQuery1){ echo $getInvoiceQuery1->icw_totalTax0317;}?>
				</td>
				<td colspan=2>&nbsp;&nbsp;&nbsp;&nbsp;Total:&nbsp;<?php if($getInvoiceQuery1){ echo $getInvoiceQuery1->icw_amtWithTax0317;}?>
				</td>
			</tr>
			<tr>
				<td colspan=4><hr></td>
			</tr>
			<tr>
				<td colspan=4>GST Breakup Details (Amt INR)</td>
			</tr>
			<tr>
				<td colspan=4>
					<table width="100%">
					
    <?php  foreach ($getInvoiceQuery21 as $getInvoQuery21) {  ?>
						<tr class="even_row">
							<td colspan="3" class="text-right"><b><?php echo $getInvoQuery21->icw_invoTaxName_0317."  :  ";echo $getInvoQuery21->icw_invo_taxPercent_0317." %";?></b></td>
							<td class="text-right">
								&nbsp;&nbsp;&nbsp;&nbsp; Rs.&nbsp;<?php echo $getInvoQuery21->icw_invoTaxAmt_0317;?>
							</td>
						</tr>
						<?php }?>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan=4><hr></td>
			</tr>
			<tr>
				<td colspan=4>Above prices are inclusive of all taxes</td>
			</tr>
			<tr>
				<td colspan=4>This is computer generated invoice and hence no
					signature is required.</td>
			</tr>
			<tr>
				<td colspan=4><center>***Thank You***</center></td>
			</tr>

		</table>
	</div>
	<?php } ?>
</body>
</html>
