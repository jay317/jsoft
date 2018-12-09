<?php $settingDetails=$this->session->userdata('settingDetails');?>
<section class="content-header ">
<div class="row">
	<span class="col-md-3">
    	<span class="col-md-6">
    		<img src="<?php echo base_url();?>uploads/shop-logo/<?php echo $settingDetails->icw_shop_bLogo_0317;?>" height="100px;" width="100px;">
    	</span>
    	<span class="col-md-6">
    		<h4><?php echo $settingDetails->icw_shop_name0317;?></h4>
    		<h6><?php echo $settingDetails->icw_shop_Address0317;?></h6>
    	</span>
	</span>
	 <span class="col-md-3">
        	<a class="btn btn-primary btn-xs" title="Dashboard" href="<?php echo site_url('mainController/dashboard');?>">
        	<i class="fa fa-arrow-left" style="font-size:20px; cursor:pointer; margin-top:0px;"></i>
        	</a>
	 <a data-toggle="modal"
		title="cliet registration" data-backdrop="static"
		data-keyboard="false" data-target="#jayModal" id="j_form"
		class="btn btn-primary btn-xs" accesskey="1">New Client</a>&nbsp;<a data-toggle="modal"
		title="cliet registration" data-backdrop="static"
		data-keyboard="false" data-target="#searchModal" id=""
		class="btn btn-primary btn-xs" accesskey="2">Client Search</a>
		<a href="javaScript:void(0)" class="btn btn-primary btn-xs"
		onclick="refreshPosBlock('')" accesskey="a">Add Product</a> 
		</span>
		<span class="col-md-2">
			<input type="text" class="form-control" id="uMob" accesskey="3" maxlength=10 placeholder="Mobile no.">
		</span>
		<span class="">
			<i class="fa fa-question-circle-o pull-right text-primary" data-toggle="modal" 
			data-target="#helpModal" accesskey="h" style="font-size:20px; cursor:pointer; margin-left:20px;" 
			title="keyboard shortcut keys" aria-hidden="true"></i>
		</span>
		<span class="">
        		<a title="Dashboard" href="<?php echo site_url('mainController/dashboard');?>">
        			<i class="fa fa-dashboard pull-right" style="font-size:20px; cursor:pointer; margin-top:0px;"></i>
        		</a>
		</span>
		<span class="">
    		<a  title="Print" href="<?php echo site_url('report/invoice_report');?>">
    		<i class="fa fa-print text-success pull-right" aria-hidden="true" 
    		style="font-size:20px; cursor:pointer; margin-top:0px;"></i>
    		</a>
		</span>
		
</div>
</section>

<!-- Main content -->
<section class="content"> <!-- Small boxes (Stat box) -->
	<div class="col-md-12 box box-info">
		<div class="">
			<div class="box-j1 col-md-3">
				<div class="form-group select-div">
					<div class="col-sm-12 form-group">
						<input type="text" class="form-control" id="jSearch"
							placeholder="Barcode">
					</div>
					or
					<div class="col-sm-12">
						<select name="categoryName" id="jSelect" style="width: 100%;">
							<option></option>
							<?php	foreach ($getPcat->result() as $row){ ?>
							<option onclick="getProData(<?php echo $row->icw_ci0317; ?>)"
								value="<?php echo $row->icw_ci0317; ?>">
								<?php echo $row->icw_cn0318; ?>
							</option>
							<?php } ?>
						</select>
					</div>


				</div>

				<div class="form-group">
					<div class="col-sm-12 j_body"></div>
					<div class="col-sm-12 divSpn">
						<span class="icon-spinner"><img
							src="<?php echo base_url();?>assets/images/spinner.gif"
							class="fa fa-spinner fa-spin spn"> </span>
					</div>
				</div>
			</div>
			<form name="frmInvoice" method="post" id="frmInvoice"
				action="<?php echo site_url('sale/invoiceSave');?>">
				<!-- /.box-header -->
				<!-- Horizontal Form -->
				<?php
				$settingDetails=isset($settingDetails)?$settingDetails:'';
				?>
				<input type="hidden" name="customerMob" id="customerMob">
				<input type="hidden" name="client_id" id="client_id">
				<input type="hidden" name="shopId" id="shopId"
					value="<?php if($this->session->userdata('settingDetails')){echo $settingDetails->icw_shopId0317;}?>">
				<caption class="tblCaption">
					<span class="client_nameSpn"></span>&nbsp;&nbsp;&nbsp; <span
						class="client_mobSpn"></span>
				</caption>
				<div id="pos_ref_blk">
				<?php require_once 'right_side_block.php';?>
				</div>
			</form>
			<!-- /.content -->
			
		</div></div></section>

		<!-- Modal -->
		<div class="modal" id="jayModal" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h3 class="h3Registration1">
							Client Registration <i class="fa fa-check icnSuccess"
								aria-hidden="true" style="display: none;"></i> <i
								class="icon-remove-sign icnNotSuccess" aria-hidden="true"
								style="display: none;"></i>

							<button type="button" class="close" data-dismiss="modal"
								aria-label="Close">
								<i class="fa fa-times" aria-hidden="true"></i>
							</button>
						</h3>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<!-- Horizontal Form -->
								<!-- /.box-header -->
								<!-- form start -->
								<form class="form-horizontal" id="addForm"
									action="<?php echo site_url('client/addClient');?>"
									enctype="multipart/form-data">
									<input type="hidden" name="hidden_ajax" value="ajaxData">
									<div class="col-md-10 box-body"
										style="height: 400px; overflow: auto;">
										<div class="form-group">
											<label for="cName" class="col-sm-4 control-label">Full Name*</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="cName"
													id="cName" value="" placeholder="Full Name"
													required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="cMobile" class="col-sm-4 control-label">Mobile*</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" maxlength="10"
													minlength="10" name="cMobile" id="cMobile" value=""
													placeholder="Mobile No.">
											</div>
										</div>
										<div class="form-group">
											<label for="cEmail" class="col-sm-4 control-label">Email</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="cEmail"
													id="cEmail" value="" placeholder="Email Id">
											</div>
										</div>
										<div class="form-group">
											<label for="cBusinessTitle" class="col-sm-4 control-label">Business
												Title</label>
											<div class="col-sm-6">
												<input type="text" class="form-control"
													name="cBusinessTitle" id="cBusinessTitle" value=""
													placeholder="Business Title">
											</div>
										</div>
										<div class="form-group">
											<label for="cGrn" class="col-sm-4 control-label">GRN</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="cGrn"
													id="cGrn" value="" placeholder="GRN">
											</div>
										</div>
										<div class="form-group">
											<label for="cAddress1" class="col-sm-4 control-label">Address
												Line 1</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="cAddress1"
													id="cAddress1" value=""
													placeholder="Street address, P.O. box, company name, c/o">
											</div>
										</div>
										<div class="form-group">
											<label for="cAddress2" class="col-sm-4 control-label">Address
												Line 2</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="cAddress2"
													id="cAddress2" value=""
													placeholder="Apartment, suite , unit, building, floor, etc.">
											</div>
										</div>
										<div class="form-group">
											<label for="city" class="col-sm-4 control-label">City / Town</label>
											<div class="col-sm-4">
												<input type="text" class="form-control" name="city"
													id="city" value="" placeholder="City">
											</div>
										</div>
										<div class="form-group">
											<label for="state" class="col-sm-4 control-label">State /
												Province / Region</label>
											<div class="col-sm-4">
												<input type="text" class="form-control" name="state"
													id="state" value="" placeholder="State/Province/Region">
											</div>
										</div>
										<div class="form-group">
											<label for="postalCode" class="col-sm-4 control-label">Zip /
												Postal Code</label>
											<div class="col-sm-4">
												<input type="text" class="form-control" name="postalCode"
													id="postalCode" value="" placeholder="Zip/Postal Code">
											</div>
										</div>
										<div class="form-group">
											<label for="country" class="col-sm-4 control-label">Country</label>
											<div class="col-sm-4">
												<select name="country" id="CountrySelect" value="">
													<option value="">Select Country</option>
													<?php	foreach ($getCountry->result() as $row){ ?>
													<option value="<?php echo $row->country_name; ?>">
													<?php echo $row->country_name; ?>
													</option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label for="productDescription"
												class="col-sm-4 control-label">Upload Image</label>
											<div class="col-sm-6">
												<input type="file" name="image" id="image">
											</div>
										</div>

									</div>
									<!-- /.box-body -->
									<div class="box-footer">
										<button type="submit"
											class="col-md-offset-5 btn btn-info frmSubmitJ">Submit</button>
									</div>
									<!-- /.box-footer -->
								</form>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default close"
								data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>

			<!-- /.content-wrapper -->

			<!-- Control Sidebar -->


			<!-- /.control-sidebar -->
			<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		</div>

		<div class="modal" id="searchModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">
							<i class="fa fa-times" aria-hidden="true"></i>
						</button>
						<h4 class="modal-title">Search Client</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-4">
								<span class="radio"><label><input type="radio" name="optradio"
										checked value="1">Search By Name</label> </span> <span
									class="radio"><label><input type="radio" name="optradio"
										value="2">Search By Mobile</label> </span>
							</div>
							<div class="col-md-6">
								<h3 class="" style="margin: 20x;">
									<input class="searchClnt form-control" id="clntName"
										type="text" placeholder="Search Name"> <input
										class="searchClnt form-control" id="clntMobile"
										style="display: none;" type="text" placeholder="Search Mobile">
								</h3>
							</div>
						</div>
					</div>
					<div class="modal-footer modal-footer-ajaxDt"
						style="height: 400px; overflow: auto;"></div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div></div>
			
<div class="modal" id="helpModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">
							<i class="fa fa-times" aria-hidden="true"></i>
						</button>
						<h4 class="modal-title">keyboard shortcut keys</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<table class="table" border="none">
									<th>Accesskey</th><th>Action</th>
									<tr>
										<td>1</td><td>New Client Registration</td>
									</tr>
									<tr>
										<td>2</td><td>Search Client</td>
									</tr>
									<tr>
										<td>3</td><td>Mobile</td>
									</tr>
									<tr>
										<td>A</td><td>Add Product Row</td>
									</tr>
									<tr>
										<td>X</td><td>Remove Product Row</td>
									</tr>
									<tr>
										<td>H</td><td>Open help desk</td>
									</tr>
								</table>
								<table class="table" border="none">
									<tbody><tr>
									<th style="width:19%">Browser</th>
									<th style="width:27%">Windows</th>
									<th style="width:27%">Linux</th>
									<th style="width:27%">Mac</th>
									</tr>
									<tr>
									<td>Internet Explorer</td>
									<td>[Alt] + <em>accesskey</em></td>
									<td>N/A</td>
									<td></td>
									</tr>
									<tr>
									<td>Chrome</td>
									<td>[Alt] + <em>accesskey</em></td>
									<td>[Alt] + <em>accesskey</em></td>
									<td>[Control] [Alt] + <em>accesskey</em></td>
									</tr>
									<tr>
									<td>Firefox</td>
									<td>[Alt] [Shift] + <em>accesskey</em></td>
									<td>[Alt] [Shift] + <em>accesskey</em></td>
									<td>[Control] [Alt] + <em>accesskey</em></td>
									</tr>
									<tr>
									<td>Safari</td>
									<td>[Alt] + <em>accesskey</em></td>
									<td>N/A</td>
									<td>[Control] [Alt] + <em>accesskey</em></td>
									</tr>
									<tr>
									<td>Opera</td>
									<td colspan="3">Opera 15 or newer: [Alt] + <em>accesskey<br></em>Opera 12.1 or older: [Shift] [Esc] + <em>accesskey</em></td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>					
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
	</div>
</div>
<div class="modal" id="printInvoModal" data-backdrop="static">
			<div class="modal-dialog">
				<div class="modal-content">					
					<div class="modal-body print-invoDiv">
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-info col-md-offset-4 printBtn" id="printBtn" onclick="PrintElem('.printArea');">Print</button>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
	</div>
</div>


			<!-- ./scripts -->
<script type="text/javascript">
$('.searchClnt').on('keyup',function(){
	var clntName=$("#clntName").val(); 
	var clntMobile=$("#clntMobile").val();// alert(clntMobile);
	clientSerch(clntName,clntMobile);
});
function clientSerch(clntName,clntMobile){
$.ajax({
    type: 'POST',
    url: "<?php echo site_url('client/getClientByDt?clntName="+clntName+"&clntMobile="+clntMobile+"');?>",
    data:[],
    cache:false,
    contentType: false,
    processData: false,
    success: function(response) {  
	    //alert(response); 	
    	 $('.modal-footer-ajaxDt').html(response);
    },
    error: function(response) {
        
    }
    });
}

$('.radio input[type=radio]').change(function() {       
    //alert(this.value);
    var radioVal=$(this).val();
    if(radioVal==1){
        $("#clntName").show();
        $("#clntMobile").hide().val('');
        clientSerch(clntName,clntMobile);
        }
    if(radioVal==2){
    	$("#clntName").hide().val('');
        $("#clntMobile").show();
        clientSerch(clntName,clntMobile);
        }
});

function clientFun() { 
	var clientId=$('.radioClnt').val();
	//alert(clientId);
	$("#searchModal").modal('hide');
	 $("#clntName").val('');
     $("#clntMobile").val('');
     $("#client_id").val(clientId);
	clientSerch(clntName,clntMobile);
	getClnt(clientId)
}

$("#uMob").on('keyup',function(){
	var dt=$(this).val();
	$("#customerMob").val(dt);
});

</script>


<script>
$('#addForm').submit(function(evt) {
    evt.preventDefault();
    var formData = new FormData(this);
    $.ajax({
    type: 'POST',
    url: $(this).attr('action'),
    data:formData,
    cache:false,
    contentType: false,
    processData: false,
    success: function(data) {   	
    	if(data == 1)
    	{
        	$(".icnSuccess").show();
        	$(".icnSuccess").css("color","green").css("font-size","24px");
        	$("#jayModal").animate({ scrollTop: 0 }, "slow");
        	location.reload();
        	  //return false;
        	  $('#addForm')[0].reset();
        	}else{
        	$(".icnNotSuccess").show();
        	$(".icnNotSuccess").css("color","red");
            	}
    },
    error: function(data) {
        
    }
    });
});
/*
$('#frmInvoice').submit(function(evt) {
    evt.preventDefault();
    var formData = new FormData(this);
    $.ajax({
    type: 'POST',
    url: $(this).attr('action'),
    data:formData,
    cache:false,
    contentType: false,
    processData: false,
    success: function(data) {   	    	   
			$(".print-invoDiv").html(data);
			$("#printInvoModal").modal('show');
    },
    error: function(data) {
        
    }
    });
});*/
</script>
			<script>
$(document).ready(function() {
    $('#CountrySelect').select2({
    	allowClear: true,
    	placeholder:"Select Country",
        width: "100%"
    });

$("#jSearch").focus();
});
</script>
			<script>
$(document).ready(function() {
    $('#jSelect').select2({
    	allowClear: true,
    	placeholder:"Select Category",
        width: "100%"
    });
});
</script>
			<script>
$("#jSelect").on('change',function (){
	var e=$("#jSelect option:selected").val();
	$(".j_body").html('');
	
	var delay = 1000;
	
		$(".spn").show();
		$(".spn").addClass('spin');
	    $(".divSpn").show();
	    
    	
$.ajax({
    type: "post",
    data: {dt:e,ser:''} ,
    url: "<?php echo site_url('product/getProByCat');?>",
    success: function (response) {
    	setTimeout(function() 
    		    {  
    	$(".spn").hide(); 
    	$(".divSpn").hide();
    	$(".j_body").show();
       $(".j_body").html(response);
    		    },
    		    delay
    		) ;
    },
    error: function(jqXHR, textStatus, errorThrown) {
       console.log(textStatus, errorThrown);
    }
});

});
</script>
			<script>
var flag =true;
$("#jSearch").on('change',function (){
	var e=$("#jSearch").val(); 
if(flag && e!=''){
	flag=false;
	
	var formData = { id : ''}
	 $.ajax({
		    type: 'POST',
		    url: "<?php echo site_url('pos/addProdct?a=barc&c_id="+e+"');?>",
		    data:formData,
		    cache:false,
		    contentType: false,
		    processData: false,
		    success: function(response) {   
			    if( response == 'no_product'){	
		    	 alert("No product found with barcode.");
		    	 $("#jSearch").val('').focus();
			    }else{
			    	$('#pos_ref_blk').html(response);
			    	 $("#jSearch").val('').focus();
				    }
		    	 flag=true;
		    },
		    error: function(response) {
		    	flag=true;
		    }
		    });
}
});
</script>
			<script>

function getClnt(clientId){
			$.ajax({
			    type: "post",
			    data: {term:clientId},
			    url: "<?php echo site_url('client/getClientInfo');?>",
			    success: function (response) { 			    	
			    	var response= JSON.parse(response);
			    	
			    	var clnt_id=response.icw_clientId0317;
			    	var clnt_name=response.icw_clientName0317;
			    	var clnt_mob=response.icw_clientMobile0317;
		    	
					//$("#client_id").val(clnt_id);
					$("#client_name").val(clnt_name);
					$("#client_mob").val(clnt_mob);
				
					$(".tblCaption").show();
					$(".tblCaption").addClass('bg-danger');
					$(".client_nameSpn").html(clnt_name);
					$(".client_mobSpn").html(clnt_mob);					
			    }
			});
			
}

function refreshPosBlock(val){
	var formData = { id : val}
	 $.ajax({
		    type: 'POST',
		    url: "<?php echo site_url('pos/addProdct?id="+val+"');?>",
		    data:formData,
		    cache:false,
		    contentType: false,
		    processData: false,
		    success: function(response) {   	
		    	 $('#pos_ref_blk').html(response);
		    	 //$("#jSearch").val('').focus();
		    	 $('.procalc').focus();
		    },
		    error: function(response) {
		        
		    }
		    });
}
function calcPos(rowId){
	var productName = $('#productName_'+rowId).val();
	var productId = $('#productId_'+rowId).val();
	var productDesc = $('#productDesc_'+rowId).val();
	var qty = $('#qty_'+rowId).val();
	var selling_price = $('#selling_price_'+rowId).val();

	var tax_type = $('#taxMode').val();
	var url = '';
	if(document.getElementById('taxId_'+rowId)){
		var tax_id = $('#taxId_'+rowId+'').val();
		}else{
		var tax_id = $('#taxsingle_id').val();
	}
	url = "<?php echo site_url('pos/calcPos?id="+rowId+"&productName="+productName+"&productId="+productId+"&productDesc="+productDesc+"&qty="+qty+"&selling_price="+selling_price+"&tax_id="+tax_id+"&tax_type="+tax_type+"');?>";
	
	//alert(tax_id);
	 $.ajax({
		    type: 'POST',
		    url: url,
		    data:[],
		    cache:false,
		    contentType: false,
		    processData: false,
		    success: function(response) {  
			    //alert(response); 	
		    	 $('#pos_ref_blk').html(response);
		    },
		    error: function(response) {
		        
		    }
		    });
}

$('#jayModal').on('shown.bs.modal', function () {
    $('#cName').focus();
});
$('#searchModal').on('shown.bs.modal', function () {
    $('#clntName').focus();
});

function PrintElem(elem) {
    Popup($(elem).html());
}

function Popup(data) {
      var mywindow = window.open('', 'new div', 'height=400,width=600');
      mywindow.document.write('<html><head><title></title>');
      mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" type="text/css" />');
      mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" type="text/css" />');
	   mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/billingCss/invoice2.css"></link>');
	  mywindow.document.write('</head><body >');
      mywindow.document.write(data);
      mywindow.document.write('</body></html>');
      mywindow.document.close();
      mywindow.focus();
      setTimeout(function(){mywindow.print();},1000);
      mywindow.close();
	  return true;
	  window.location.reload();

      
}
</script>