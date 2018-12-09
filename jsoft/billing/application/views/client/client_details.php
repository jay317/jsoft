
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Report</small>
		
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Report</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border bg-success">
				<h2 class="box-title"><a href="<?php echo site_url('client/index');?>" class="btn btn-default btn-js"><i class="fa fa-arrow-left" aria-hidden="true" align="left"></i></a>&nbsp;&nbsp;<strong>Client Information</strong></h2>
            </div>
            <!-- /.box-header -->
			<?php
			$clientDuesList=$clientPurchaseDetails['dueList'];
			$purchaseLastDate=$clientPurchaseDetails['lastDate'];
			$blncData=$clientPurchaseDetails['blncData'];
			
			?>
       <div class="box-body">
            <div class="container-fluid">						
					<div class="row">
					  <div class="col-md-3 panel panel-default">
						<div class="row">
						   <center>
							<span class="fig"style="margin-top:10px;">
								<?php if($clientDt->icw_clientImg0317!=''){ ?>
								<img class="scaled img-circle" src="<?php echo base_url();?>uploads/client-images/<?php echo $clientDt->icw_clientImg0317;?>" style="width:150px;height:150px;float:none;"/>
								<?php }else{ ?>
								<img class="scaled img-circle" src="<?php echo base_url();?>assets/images/profile-icon.png" style="width:150px;height:150px;"/>
								<?php } ?>
								<figcaption class="list-size-weight"><?php echo ucfirst($clientDt->icw_clientName0317);?></figcaption>
								</figure>
							</span>
							<?php $stuts=$clientDt->icw_isa0317; 
							if($stuts==1)
							{
								echo '<span class="label label-success">Active</span>';
							}else{
								echo '<span class="label label-default">InActive</span>';
							} ?>
						   </center>
						</div>
						<div class="row">
						   <center>
							<ul class="list-unstyled">
							    <li class="list-size-weight1"><i class="fa fa-mobile fa-style" aria-hidden="true"></i>&nbsp;&nbsp;<?php if($clientDt){echo ucwords($clientDt->icw_clientMobile0317);} ?></li>
								<li class="list-size-weight1"><i class="fa fa-envelope fa-style" aria-hidden="true"></i>&nbsp;&nbsp;<?php if($clientDt){echo ucwords($clientDt->icw_clientEmail0317);} ?></li>				
							</ul>
						   </center>
						</div>
					
					  </div>
					  <div class="col-md-9 panel panel-default1">
						<!--<div class="row">
						  <center>
							<h2 class="badge badge-info">Business Title
							<li class=""><?php //if($clientDt){echo ucwords($clientDt->icw_clientBtitle0317);} ?></li></h2>
						  <center>
						</div>-->
						<div class="mainBox">
							<div>

							  <!-- Nav tabs -->
							  <ul class="nav nav-tabs" role="tablist">
							    <li role="presentation" class="active"><a href="#basicInfo" aria-controls="basicInfo" role="tab" data-toggle="tab">Basic Information</a></li>
								<li role="presentation"><a href="#purchase" aria-controls="purchase" role="tab" data-toggle="tab">All Purchase</a></li>
								<li role="presentation"><a href="#purchaseDues" aria-controls="purchaseDues" role="tab" data-toggle="tab">Purchase Dues</a></li>
								<li role="presentation"><a href="#totalBussiness" aria-controls="totalBussiness" role="tab" data-toggle="tab">Total Bussiness</a></li>																
							  </ul>

							  <!-- Tab panes -->
							  <div class="tab-content">
								<div role="tabpanel  table-responsive" class="tab-pane" id="purchase">
									<div class="row" style="margin:20px;height:300px !important;overflow:auto;">
									<table class="table table-hover panel panel-success">							  
									  <thead class="bg-danger">
										<tr>
											<th>Date</th>
											<th>Invoice No.</th>
											<th>Payment Type</th>
											<th>Total</th>
											<th>Paid</th>
											<th>Balance</th>
										</tr>
									   </thead>	
									<tbody>
									<?php $sumTotal=0; $sumBal=0; $sumPaid=0; foreach($balSummary as $row):?>
										<tr class="bg-success">
											<td style="text-align:center"><?php echo getDateFormat_d($row->icw_invoDate0317); ?></td><td style="text-align:center"><?php echo $row->icw_invoiceNo_0317; ?></td><td style="text-align:center"><?php echo $row->icw_paymentMode0317; ?></td><td style="text-align:center"><?php $total=$row->icw_amtWithTax0317; echo $total; $sumTotal+=$total; ?></td><td style="text-align:center"><?php $paid=$row->icw_paidAmount0317; echo $paid; $sumPaid+=$paid;?></td><td style="text-align:center"><?php $bal=$row->icw_balanceAmt0317; echo $bal; $sumBal+=$bal;?></td>
										</tr>
									<?php endforeach;?>
									</tbody>
									   <tfoot class="bg-warning">
									   <?php if($balSummary){?>
										<tr>
											<th></th>
											<th></th>
											<th></th>
											<th class="text-success"><i class="fa fa-inr"></i><span class="spnSumPaid badge badge-success"><?php echo $sumTotal; ?></span></th>
											<th class="text-success"><i class="fa fa-inr"></i><span class="spnSumPaid badge badge-success"><?php echo $sumPaid; ?></span></th>
											<th class="text-danger"><i class="fa fa-inr"></i><span class="spnSumBalance badge badge-danger"><?php echo $sumBal; ?></span></th>									
										</tr>
										<?php } ?>
									  </tfoot>
								   </table>
								</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="purchaseDues">
								   <div class="row" style="margin:20px;height:300px !important;overflow:auto;">
									<table class="table table-hover panel panel-success">							  
									  <thead class="bg-danger">
										<tr>
											<th>Date</th>
											<th>Invoice No.</th>
											<th>Payment Type</th>
											<th>Total</th>
											<th>Paid</th>
											<th>Balance</th>
										</tr>
									   </thead>	
									<tbody>
									<?php $sumTotal=0; $sumBal=0; $sumPaid=0; foreach($clientDuesList as $row):?>
										<tr class="bg-success">
											<td style="text-align: center"><?php echo getDateFormat_d($row->icw_invoDate0317); ?></td><td style="text-align: center"><?php echo $row->icw_invoiceNo_0317; ?></td><td style="text-align: center"><?php echo $row->icw_paymentMode0317; ?></td><td style="text-align: center"><?php $total=$row->icw_amtWithTax0317; echo $total; $sumTotal+=$total;?></td><td style="text-align: center"><?php $paid=$row->icw_paidAmount0317; echo $bal; $sumPaid+=$paid;?></td><td style="text-align: center"><?php $bal=$row->icw_balanceAmt0317; echo $bal; $sumBal+=$bal;?></td>
										</tr>
									<?php endforeach;?>
									</tbody>
									   <tfoot class="bg-warning">
									   <?php if($clientDuesList){?>
										<tr>
											<th></th>
											<th></th>
											<th></th>
											<th class="text-success"><i class="fa fa-inr"></i><span class="spnSumTotal badge badge-success"><?php echo $sumTotal; ?></span></th>
											<th class="text-success"><i class="fa fa-inr"></i><span class="spnSumPaid badge badge-success"><?php echo $sumPaid; ?></span></th>
											<th class="text-danger"><i class="fa fa-inr"></i><span class="spnSumBalance badge badge-danger"><?php echo $sumBal; ?></span></th>									
										</tr>
										<?php } ?>
									  </tfoot>
								   </table>
								  </div>
								</div>
								<div role="tabpanel" class="tab-pane" id="totalBussiness">
									<div class="row" style="margin:20px;">
									    <div class="col-md-3">
											<center>
												<ul class="list-unstyled">
												   <li class="badge badge-info">Total Bussiness</li>
												   <li class="list-size-weight text-info"><i class="fa fa-inr"></i><?php if($blncData){echo round($blncData->icw_amtWithTax0317,2);} ?></li>
												   <hr>
												   <li class="badge badge-success">Total Received</li>
												   <li class="list-size-weight text-success"><i class="fa fa-inr"></i><?php if($blncData){echo round($blncData->icw_paidAmount0317,2);} ?></li>
								                   <hr>
												   <li class="badge badge-danger">Total Balance</li>
												   <li class="list-size-weight text-danger"><i class="fa fa-inr"></i><?php if($blncData){echo round($blncData->icw_balanceAmt0317);} ?></li>
												</ul>					
											</center>
										</div>										
									</div>
								
								</div>
								<div role="tabpanel" class="tab-pane active" id="basicInfo">
									<div class="row" style="margin:20px;">
										
										  <div class="col-md-3">
											<center>
												<ul class="list-unstyled">										   
												   <li class="list-size-weight text-success"><?php if($clientDt){echo ucwords($clientDt->icw_clientName0317);} ?></li>
												   <li class="list-size-weight1"><i class="fa fa-mobile fa-style" aria-hidden="true"></i>&nbsp;&nbsp;<?php if($clientDt){echo ucwords($clientDt->icw_clientMobile0317);} ?></li>
								                   <li class="list-size-weight1"><i class="fa fa-envelope fa-style" aria-hidden="true"></i>&nbsp;&nbsp;<?php if($clientDt){echo ucwords($clientDt->icw_clientEmail0317);} ?></li>
												</ul>
												<hr>
												<ul class="list-unstyled">										   
												   <li class="badge badge-info">Bussiness Title</li>
												   <li class="list-size-weight"><?php if($clientDt){echo ucwords($clientDt->icw_clientBtitle0317);} ?></li>
												   <li class="list-size-weight1">GRN-&nbsp;&nbsp;<?php if($clientDt){echo ucwords($clientDt->icw_clientGrn0317);} ?></li>				                   
												</ul>
											</center>
										   </div>
										  <div class="col-md-6">
											<center>
												<ul class="list-unstyled">
													<li class="badge badge-info">Address</li>	
													<li class="list-size-weight1"><?php if($clientDt){echo ucwords($clientDt->icw_clientAddr10317);} ?></li>
													<li class="list-size-weight1"><?php if($clientDt){echo ucwords($clientDt->icw_clientAddr20317);} ?></li>
													<li class="list-size-weight1"><?php if($clientDt){echo ucwords($clientDt->icw_clientCity0317);} ?><?php if($clientDt){echo "-". ucwords($clientDt->icw_clientZipCode0317);} ?></li>
													<li class="list-size-weight1"><?php if($clientDt){echo ucwords($clientDt->icw_clientCountry0317);} ?></li>
												</ul>
										   </center>
										  </div>
										  <div class="col-md-3">
											<center>
												<ul class="list-unstyled">
													<li class="badge badge-info">Registration Date</li>	
													<li class="list-size-weight1"><?php if($clientDt){echo getDateFormat_dt($clientDt->icw_clientDate0317);} ?></li>
													<li class="badge badge-info">Last Purchase</li>
													<li class="list-size-weight1"><?php if($purchaseLastDate!=''){echo getDateFormat_d($purchaseLastDate->icw_invoDate0317);} ?></li>					
												</ul>
										   </center>
										  </div>
									    </div>								    
							    </div>								
							</div>
						</div>
					  </div>
					</div>								    
            </div>
          </div>
          </div>
		  </div>
    </section>
    <!-- /.content -->	
  </div>
  <!-- /.content-wrapper -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->	
</body>
</html>

