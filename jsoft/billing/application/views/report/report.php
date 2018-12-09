
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
           
            <!-- /.box-header -->
       <div class="box-body">
            <div class="container-fluid">
				<h2 class="box-title"></h2>
					<div class="row">
					  <div class="col-md-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h4 align="center">Customers Balance and Receiveables</h4>
							</div>
							<div style="padding:0px;" class="panel-body list-group">
								<div class="list-group-item"><a href="<?php echo site_url('report/customers_balance_report');?>"> <span class="badge badge-primary">Customer Balance Summary</span></a></div>
								<div class="list-group-item"><a href="<?php echo site_url('report/customer_balance');?>"><span class="badge badge-primary">Customer Balance Ledger</span></a></div>
							</div>
						</div>
					  </div>
					  <div class="col-md-6">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h4 align="center">Sale Reports</h4>
							</div>
							<div style="padding:0px;" class="panel-body list-group">
							  <div class="row">
							    <div class="col-md-6">
									<div class="list-group-item"><a href="<?php echo site_url('report/between_days_sales');?>?data=today"><span class="badge badge-info">Today's Sale Report</span></a></div>
									<div class="list-group-item"><a href="<?php echo site_url('report/between_days_sales');?>?data=week"><span class="badge badge-info">Last 7 Days Report</span></a></div>
									<div class="list-group-item"><a href="<?php echo site_url('report/between_days_sales');?>?data=month"><span class="badge badge-info">Last 30 Days Report</span></a></div>
							    </div>
								 <div class="col-md-6">
									 <div class="row">
										<div class="form-group">
										<form action="<?php echo site_url('report/between_days_sales');?>?data=between_date" method="post">
										<h4 class="">Sales Report By Date Range</h4>
										  <span class="form-group input-group date col-md-8" data-provide="datepicker">
											<input type="text" id="datepicker1" name="fromDate" class="form-control" placeholder="From-Date">
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>						
										  </span>
										  <span class="form-group input-group date col-md-8" data-provide="datepicker">
											<input type="text" id="datepicker2" name="toDate" class="form-control" placeholder="To-Date">
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>						
										  </span>
										  <button type="submit" class="btn btn-primary">Submit</button>
										  </form>
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
		  </div>
    </section>
    <!-- /.content -->
	<?php if ($this->session->flashdata('flash_msg')) { ?>
		<div class="alert alert-danger col-md-4 col-md-offset-4"> <?= $this->session->flashdata('flash_msg') ?> </div>
	<?php } ?>
	
  </div>
  <!-- /.content-wrapper -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script>
$(document).ready(function() {
    $('#jClientId').select2({
    	allowClear: true,
    	placeholder:"Client Id",
    	width:"resolve"  
    });
});
$(document).ready(function () {
    $( "#datepicker1" ).datepicker({
		 format: 'dd/mm/yyyy'
    }).on('change', function(){
        $('.datepicker').hide();
    });
	$( "#datepicker2" ).datepicker({
		 format: 'dd/mm/yyyy'		
    }).on('change', function(){
        $('.datepicker').hide();
    });
  });
</script>
	
</body>
</html>

