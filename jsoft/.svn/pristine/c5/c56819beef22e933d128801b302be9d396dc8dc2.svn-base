
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
				<a href="<?php echo site_url('report/reports');?>" class="btn btn-default btn-js"><i class="fa fa-arrow-left" aria-hidden="true" align="left"></i></a>
            </div>
            <!-- /.box-header -->			
       <div class="box-body">
            <div class="container-fluid">				
					<div class="row">
					  <div class="col-md-12">
									<div class="row">
										<div class="col-md-4">											
											<h2 class="bg-primary" align="left" style="padding:20px;">
												<div class="row">													
													<div class="col-md-12">
														<ul class="list-unstyled" style="font-size:18px; font-weight:bold;text-align:right;">
														<li class="badge badge-warning">&nbsp;&nbsp; Total-&nbsp;<i class="fa fa-inr" aria-hidden="true"></i><span class="spnTotal"></span></li>
														<li class="badge badge-success">&nbsp;&nbsp; Paid-&nbsp;<i class="fa fa-inr" aria-hidden="true"></i><span class="spnPaid"></span></li>
														<li class="badge badge-danger">&nbsp;&nbsp; Balance-&nbsp;<i class="fa fa-inr" aria-hidden="true"></i><span class="spnBalance"></span></li>
														</ul>
													</div>
												</div>
											</h2>
										</div>
										<div class="col-md-8">
											<h2 class="bg-primary" align="center" style="padding:20px;">
											<?php 
											$getMsg=$getDaysSales['msgData'];
											//print_r($getMsg);
											if(is_array($getMsg))
											{												
												$fromDate=$getMsg['fromDate'];		
												$toDate=$getMsg['toDate'];												
												echo "Sales Summary &nbsp;<span style='font-size:20px;'>(" .getDateFormat_m($fromDate). "</span>&nbsp;-&nbsp;<span style='font-size:20px;'>" .getDateFormat_m($toDate). ")</span>";
											}
											if($getMsg=='today')
											{
												echo "Today Sales Summary";
											}
											if($getMsg=='week')
											{
												echo "Week Sales Summary";
											}
											if($getMsg=='month')
											{
												echo "Month Sales Summary";
											}
											
											?>
											 
											</h2>
										</div>																	
									</div>									
									<h6 class="bg-primary" align="center">All sales list here</h6>
									<h5 align="right"><strong><span class="badge badge-info"><?php echo date('M d, Y');?></span></strong></h5>
							<div class="row"  style="height:300px !important;overflow:auto;">
							<table class="table table-hover table-responsive panel panel-success">							 
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
							<?php
							$getSales=$getDaysSales['queryData'];							
							$sumBal=0; $sumPaid=0; $sumTotal=0; foreach($getSales as $row):?>
								<tr class="bg-success">
									<td style="text-align: center"><?php echo getDateFormat_d($row->icw_invoDate0317); ?></td><td style="text-align: center"><a href="<?php echo site_url('sale/invoicePrint?id='.$row->icw_invoiceNo_0317);?>" target="_blank"><?php echo $row->icw_invoiceNo_0317; ?></a></td><td style="text-align: center"><?php echo $row->icw_paymentMode0317; ?></td><td style="text-align: center"><?php $total=$row->icw_amtWithTax0317; echo $total; $sumTotal+=$total;?></td><td style="text-align: center"><?php $paid=$row->icw_paidAmount0317; echo $paid; $sumPaid+=$paid;?></td><td style="text-align: center"><?php $bal=$row->icw_balanceAmt0317; echo $bal; $sumBal+=$bal;?></td>
								</tr>
							<?php endforeach;?>
							</tbody>
							   <tfoot class="bg-warning">
							   <?php if($getSales){?>
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
<script>
$(document).ready(function(){
	
	$(".spnPaid").text($(".spnSumPaid").text());
	$(".spnBalance").text($(".spnSumBalance").text());
	$(".spnTotal").text($(".spnSumTotal").text());
});
</script>
	
</body>
</html>