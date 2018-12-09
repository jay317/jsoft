<style>
.meTable >tr >td{
width:20%;
}

</style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $page_title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tailor</a></li>
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
              <div><h2 class="box-title"><a href="<?php echo site_url('tailor/orderList?list_type=shop');?>" class="btn btn-default btn-js"><i class="fa fa-arrow-left" aria-hidden="true" align="left"></i></a>
			  &nbsp;&nbsp;&nbsp;Order</h2></div>			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form class="form-horizontal" id="addForm" method="post" action="<?php echo site_url('tailor/taiOrderSave');?>">         
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
                	<label for="qty" class="col-sm-2 control-label">Cloth</label>
					<div class="col-md-2">
					<select id="selectMe" class="form-control" name="type">
					  <option>Select Type</option>
					  <option value="paint">Paint</option>
					  <option value="shirt">Shirt</option>
					  <option value="suit">Kurtha/Suit</option>
					</select>
					</div>
					<div class="col-md-6 group-col" style="display:none">
					 <div class="tab-content">
					    <div id="paint" class="group">
					    		<div class="col-md-6">
					    			<table class="table table-responsive meTable bg-success">
					    					<tr><td>Length</td><td><input name="p_length" class="form-control rest-input"></td></tr>
					    					<tr><td>Fork</td><td><input name="p_fork" class="form-control rest-input"></td></tr>
					    					<tr><td>Waist</td><td><input name="p_waist" class="form-control rest-input"></td></tr>
					    					<tr><td>Hip</td><td><input name="p_hip" class="form-control rest-input"></td></tr>
					    					<tr><td>Thighs</td><td><input name="p_thighs" class="form-control rest-input"></td></tr>
					    					<tr><td>Knee</td><td><input name="p_knee" class="form-control rest-input"></td></tr>
					    					<tr><td>Bottom</td><td><input name="p_bottom" class="form-control rest-input"></td></tr>
					    			</table>	
					    		</div>
					    </div>
						<div id="shirt" class="group">
							  <div class="col-md-6">
					    			<table class="table table-responsive meTable bg-success">
					    					<tr><td>Length</td><td><input name="sh_length" class="form-control rest-input"></td></tr>
					    					<tr><td>Shoulder</td><td><input name="sh_shoulder" class="form-control rest-input"></td></tr>
					    					<tr><td>Hand Length</td><td><input name="sh_hLength" class="form-control rest-input"></td></tr>
					    					<tr><td>Front</td><td><input name="sh_front" class="form-control rest-input"></td></tr>
					    					<tr><td>Collor</td><td><input name="sh_collor" class="form-control rest-input"></td></tr>
					    					<tr><td>Back</td><td><input name="sh_back" class="form-control rest-input"></td></tr>
					    			</table>	
					    		</div>
					    </div>
						<div id="suit" class="group">
							<div class="col-md-6">
					    			<table class="table table-responsive meTable bg-success">
					    					<tr><td>Length</td><td><input name="sk_length" class="form-control rest-input"></td></tr>
					    					<tr><td>Shoulder</td><td><input name="sk_shoulder" class="form-control rest-input"></td></tr>
					    					<tr><td>Hand Length</td><td><input name="sk_hLength" class="form-control rest-input"></td></tr>
					    					<tr><td>Chest</td><td><input name="sk_chest" class="form-control rest-input"></td></tr>
					    					<tr><td>Stomach</td><td><input name="sk_stomach" class="form-control rest-input"></td></tr>
					    					<tr><td>Hip</td><td><input name="sk_hip" class="form-control rest-input"></td></tr>
					    			</table>	
					    	</div>
						</div>
					  </div>
					
					</div>
				</div>
                
                 <div class="form-group">
                  <label for="qty" class="col-sm-2 control-label">Quantity</label>
                  <div class="col-sm-1">
                    <input type="number" value="1" class="form-control" name="qty" id="qty" placeholder="" required>
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
                    <input type="text" value="" class="form-control rest-input" name="mobile" id="mobile" placeholder="Mobile" maxlength=10 required>
                  </div>
                </div>              
				<div class="form-group">
                  <label for="totalAmount" class="col-sm-2 control-label">Total Amount</label>
                  <div class="col-sm-3">
                    <input type="text" value="" class="form-control rest-input" name="totalAmount" id="totalAmount" placeholder="Total Amount" required>
                  </div>
                </div>
				<div class="form-group">
				  <div class="col-sm-5">
				   <label for="advnc" class="col-sm-5 control-label rest-input">Advanced</label>
                  <div class="col-sm-4">
                    <input type="text" value="" class="form-control rest-input" name="advnc" id="advnc" placeholder="Advanced">
                  </div>
				 </div>
				 <div class="col-sm-6">
                  <label for="balance" class="col-sm-2 control-label">Balance</label>
                  <div class="col-sm-4">
                    <input type="text" value="" class="form-control" name="balance" id="balance" readonly placeholder="Balance">
                  </div>
				 </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo site_url('tailor/orderList?list_type=shop');?>" class="btn btn-default col-md-offset-4">Back</a>
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
	  $('.group').hide();
	  $('#option1').show();
	  $('#selectMe').change(function () {
	    $('.group-col').show();
		$('.group').hide();
	    $('#'+$(this).val()).show();
	  })
	});

$(document).ready(function () {
 $( "#datepicker1" ).datepicker("setDate" , new Date()).on('change', function(){
        $('.datepicker').hide();
    });
});

$(function () {
    $("input[class*='rest-input']").keydown(function (event) {


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