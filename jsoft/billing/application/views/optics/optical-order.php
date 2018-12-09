
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $page_title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Category</a></li>
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
              <div><h2 class="box-title"> <a href="<?php echo site_url('optics/orderList?list_type=shop');?>" class="btn btn-default btn-js"><i class="fa fa-arrow-left" aria-hidden="true" align="left"></i></a>
			  &nbsp;&nbsp;&nbsp;Order</h2></div>			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form class="form-horizontal" id="addForm" method="post" action="<?php echo site_url('optics/optOrderSave');?>">         
              <div class="box-body">
				<div class="form-group">
				  <div class="col-sm-5">
				   <label for="sl.no" class="col-sm-5 control-label">Order no.</label>
                  <div class="col-sm-3">
					
                    <input type="text" value="<?php echo $order_no;?>" class="form-control" name="orderNo" readonly >
                  </div>
				 </div>
				 <div class="col-sm-4">
                  <label for="balance" class="col-sm-2 control-label">Date</label>
                  <div class="col-sm-10">
					<span class="form-group input-group date col-md-8" data-provide="datepicker">
						<input type="text" id="datepicker1" name="date" class="form-control" placeholder="Date">
						<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
						</span>						
					</span>
                  </div>
				 </div>
                </div>
                <div class="form-group">
                  <label for="cusName" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-3">
                    <input type="text" value="" class="form-control" name="cusName" id="cusName" placeholder="Customer Name" required>
                  </div>
                </div>
				<div class="form-group">
                  <label for="cusName" class="col-sm-2 control-label">Mobile</label>
                  <div class="col-sm-3">
                    <input type="text" value="" class="form-control vision-input" name="mobile" id="mobile" placeholder="Mobile" maxlength=10 required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="frame" class="col-sm-2 control-label">Frame</label>
                  <div class="col-sm-3">
                    <input type="text" value="" class="form-control" name="frame" id="frame" placeholder="Frame Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="lenses" class="col-sm-2 control-label">Lenses</label>
                  <div class="col-sm-3">
                    <input type="text" value="" class="form-control" name="lenses" id="lenses" placeholder="Lenses" required>
                  </div>
                </div>
				<div class="form-group">
                  <label for="totalAmount" class="col-sm-2 control-label">Total Amount</label>
                  <div class="col-sm-3">
                    <input type="text" value="" class="form-control vision-input" name="totalAmount" id="totalAmount" placeholder="Total Amount" required>
                  </div>
                </div>
				<div class="form-group">
				  <div class="col-sm-5">
				   <label for="advnc" class="col-sm-5 control-label">Advanced</label>
                  <div class="col-sm-4">
                    <input type="text" value="" class="form-control vision-input" name="advnc" id="advnc" placeholder="Advanced">
                  </div>
				 </div>
				 <div class="col-sm-6">
                  <label for="balance" class="col-sm-2 control-label">Balance</label>
                  <div class="col-sm-4">
                    <input type="text" value="" class="form-control" name="balance" id="balance" readonly placeholder="Balance">
                  </div>
				 </div>
                </div>
				<div class="col-md-offset-2">
				<div class="form-group col-md-6 col-md-offset-2">
				<div class="row">
					<div class="col-md-4">						
					</div>
					<div class="col-md-8">
						<table class="table1">
						<tr>
							<th width="4%"></th>
							<th width="4%">Sphere</th>
							<th width="4%">Cylinder</th>
							<th width="4%">Axis</th>						
						</table>
					</div>
				</div>	
				<div class="row">
					<div class="col-md-4">
						<label>Right</label>
						<select id="rds">
							<option value="rd">DIST(+)</option>
							<option value="rn">NEAR(-)</option>
						</select>
					</div>
					<div class="col-md-8">
						<table class="table">
						<tr class="rtd">
							<td>DIST(+)</td>
							<td><input type="text" name="rdSph" class="form-control vision-input"></td>
							<td><input type="text" name="rdCyl" class="form-control vision-input"></td>
							<td><input type="text" name="rdAxis" class="form-control vision-input"></td>
						</tr>	
						<tr class="rtn" style="display:none">
						<td class="trn_display">NEAR(-)</td>
							<td><input type="text" name="rnSph" class="form-control vision-input"></td>
							<td><input type="text" name="rnCyl" class="form-control vision-input"></td>
							<td><input type="text" name="rnAxis" class="form-control vision-input"></td>
						</tr>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label>Left</label>
						<select id="lds">
							<option value="ld">DIST(+)</option>
							<option value="ln">NEAR(-)</option>
						</select>
					</div>
					<div class="col-md-8">
						<table class="table">
						<tr class="ltd">
							<td>DIST(+)</td>
							<td><input type="text" name="ldSph" class="form-control vision-input"></td>
							<td><input type="text" name="ldCyl" class="form-control vision-input"></td>
							<td><input type="text" name="ldAxis" class="form-control vision-input"></td>
						</tr>	
						<tr class="ltn" style="display:none">
						<td>NEAR(-)</td>
							<td><input type="text" name="lnSph" class="form-control vision-input"></td>
							<td><input type="text" name="lnCyl" class="form-control vision-input"></td>
							<td><input type="text" name="lnAxis" class="form-control vision-input"></td>
						</tr>
						</table>
					</div>
				</div>
			</div>
			   </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo site_url('optics/orderList?list_type=shop');?>" class="btn btn-default col-md-offset-4">Back</a>
                <button type="submit" class="btn btn-info">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
		  </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!--- /scripts --->
<script>
$(document).ready(function () {
 $( "#datepicker1" ).datepicker("setDate" , new Date()).on('change', function(){
        $('.datepicker').hide();
    });
});

$("#rds").on('change',function(){
	var sel=$(this).val();
	if(sel=='rd'){
		$(".rtd").show();
		$(".rtn").hide();
	 }
	if(sel=='rn'){
		$(".rtd").hide();
		$(".rtn").show();
	 }
});

$("#lds").on('change',function(){
	var sel=$(this).val();
	if(sel=='ld'){
		$(".ltd").show();
		$(".ltn").hide();
	 }
	if(sel=='ln'){
		$(".ltd").hide();
		$(".ltn").show();
	 }
});

$(function () {
    $("input[class*='vision-input']").keydown(function (event) {


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


$("#advnc").bind('keyup change',function(){
var advncd=$(this).val();
var totAmt=$("#totalAmount").val();
	 if(parseFloat(advncd) > parseFloat(totAmt)){
				swal("Entered Amount is greater than Total Amount","Esc to remove","error","closeOnEsc: false" );
				$('#advnc').val('');
				$('#advnc').focus();
				$("#balance").val('0');
				return false;
			}else{
				var bal=parseFloat(totAmt) - parseFloat(advncd);
				bal=Math.round(bal * 100)/100;
				if(isNaN(bal)){bal=0;}else{ bal=bal;}
				$("#balance").val(bal);
			}
	
});
</script>