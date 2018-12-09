
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
											<h2 class="bg-primary" align="left" style="padding:20px;">Bal-&nbsp;<i class="fa fa-inr" aria-hidden="true"></i><span class="spnBal"></span></h2>									
										</div>
										<div class="col-md-8">
											<h2 class="bg-primary" align="center" style="padding:20px;">All Customers Balance Summary</h2>
										</div>																	
									</div>
									<h6 class="bg-primary" align="center">All Dues listed here</h6>
									<h5 align="right"><strong><span><?php echo date('M d, Y');?></span></strong></h5>
						<div class="row" style="height:300px !important;overflow:auto;">
						<table class="table table-hover panel panel-success">							  
							  <thead class="bg-danger">
								<tr>
									<th>Name</th>
									<th>Bussiness Title</th>
									<th>Balance</th>								
								</tr>
							   </thead>	
							<tbody>
							<?php $sumBal=0; $sumPaid=0; foreach($getAllBalance as $row):?>
								<tr class="bg-success">
									<td style="text-align: center"><?php echo ucwords($row->icw_clientName0317); ?></td><td style="text-align: center"><?php echo ucwords($row->icw_clientBtitle0317); ?></td><td style="text-align: center"><?php $bal=$row->icw_balanceAmt0317; echo $bal; $sumBal+=$bal;?></td>
								</tr>
							<?php endforeach;?>
							</tbody>
							   <tfoot class="bg-warning">
							   <?php if($getAllBalance){?>
								<tr>
									<th></th>
									<th></th>									
									<th class="text-danger">Total&nbsp;<i class="fa fa-inr"></i><span class="spnSumBal"><?php echo $sumBal; ?></span></th>									
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
	
	$(".spnBal").text($(".spnSumBal").text());
});
</script>
	
</body>
</html>