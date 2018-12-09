
    <section class="content-header">
      <h1>
        Dashboard
        <small>Generate Invoice</small>
		
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Generate Invoice</a></li>
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
            <div class="box-header with-border">              
            </div>
            <!-- /.box-header -->
       <div class="box-body">
            <div class="container-fluid">
				<h2 class="box-title">Generate Invoice By <input type="checkbox" id="toggle-two" checked ></h2>
					<div class="row">
					  <div class="panel-body panel panel-default col-md-5">
						  <div class="row box1">
						  <form class="form" action="<?php echo site_url('sale/genInvoice');?>" method="post" target="_blank">
						   <span class="col-md-4">
							<input type="text" id="invoiceNo" name="invoiceNo" class="form-control" placeholder="Invoice No.">
						   </span>						   
							<span class="col-md-2">
							<button type="submit" class="btn btn-default">Get</button>								
						    </span>
						    </form>
						  </div>						  					  
						  <div class="row box2" style="display:none">
						  <form class="form" action="<?php echo site_url('sale/genInvoiceName');?>" method="post" target="_blank">
							  <span class="form-group col-md-4">						
								<select name="clientId" class="form-control" id="jClientId">
								<option></option>
								<?php foreach ($getClient->result() as $row){ ?>	
								<option value="<?php echo ucfirst($row->icw_clientId0317);?>"><?php echo ucfirst($row->icw_clientName0317);?></option>
								<?php } ?>
								</select>						
							  </span>					 
							   <span class="form-group input-group date col-md-4" data-provide="datepicker">
								<input type="text" id="datepicker" name="date" class="form-control" placeholder="Invoice Date">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-th"></span>
								</span>						
							  </span>
							  <span class="col-md-2 col-md-offset-5">
									<button type="submit" class="btn btn-default">Get</button>
							  </span>
							  </form>
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
    $( "#datepicker" ).datepicker({
		 format: 'dd/mm/yyyy'
    });
  });
  
$(document).ready(function () {
    $('#toggle-two').bootstrapToggle({
      on: 'Invoice No.',
      off: 'Client Name'
    });
  });
 $('#toggle-two').change(function() {
  //alert($(this).prop('checked'))
  if($(this).prop('checked') == true){
	  $(".box1").show()
	  $(".box2").hide()
	 // $(".box2").load(location.href + ' .box2')
  }else{
	  $(".box2").show()
	  $(".box1").hide()
	  $("#invoiceNo").val('');
  }
});
setTimeout(function() {
$('.alert-danger').fadeOut('fast');
}, 10000);
</script>
	
</body>
</html>

