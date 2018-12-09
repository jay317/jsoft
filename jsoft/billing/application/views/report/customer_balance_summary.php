
    <section class="content-header">
      <h1>
        <?php echo $page_title;?>
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
				<h2 class="box-title"></h2>
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
											<?php foreach($balSummary as $rows){} $rows=isset($rows)?$rows:'';?>
											<h3 align="center" class="bg-primary" style="padding:20px;">
											<span class="badge badge-warning size-weight"><?php if($rows){echo ucwords($rows->icw_clientBtitle0317);} ?></span>										
												<ul class="list-unstyled" style="padding-top:10px;">
												<li class="list-size-weight">Mob-<?php if($rows){echo ucwords($rows->icw_clientMobile0317);} ?></li>
												<li class="list-size-weight"><?php if($rows){echo ucwords($rows->icw_clientAddr10317);} ?></li>
												<li class="list-size-weight"><?php if($rows){echo ucwords($rows->icw_clientAddr20317);} ?></li>
												<li class="list-size-weight"><?php if($rows){echo ucwords($rows->icw_clientCity0317);} ?></li>
												</ul>								
											</h3>										
										</div>
									</div>
									<h6 align="center"class="bg-primary">Customer ledger report</h6>
									<h5 align="right"><strong><span class="badge badge-info"><?php echo date('M d, Y');?></span></strong></h5>																
						<div class="row" style="height:300px !important;overflow:auto;">
							<table class="table table-hover panel panel-success">							  
							  <thead class="bg-danger">
								<tr>
									<th>Date</th>
									<th>Invoice No.</th>
									<th>Payment Type</th>
									<th>Paid</th>
									<th>Balance</th>
								</tr>
							   </thead>	
							<tbody>
							<?php $sumBal=0; $sumPaid=0; foreach($balSummary as $row):?>
								<tr class="bg-success">
									<td style="text-align:center"><?php echo getDateFormat_d($row->icw_invoDate0317); ?></td><td style="text-align:center"><?php echo $row->icw_invoiceNo_0317; ?></td><td style="text-align:center"><?php echo $row->icw_paymentMode0317; ?></td><td style="text-align:center"><?php $paid=$row->icw_paidAmount0317; echo $sumPaid+=$paid;?></td><td style="text-align:center"><?php $bal=$row->icw_balanceAmt0317; echo $bal; $sumBal+=$bal;?></td>
								</tr>
							<?php endforeach;?>
							</tbody>
							   <tfoot class="bg-warning">
							   <?php if($balSummary){?>
								<tr>
									<th></th>
									<th></th>
									<th></th>
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
	$(".spnTotal").text(parseInt($(".spnSumPaid").text()) + parseInt($(".spnSumBalance").text()));
});
</script>
	
</body>
</html>