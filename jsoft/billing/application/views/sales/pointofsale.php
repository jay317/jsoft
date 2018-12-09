<!-- header -->
<?php include "/../includes/header_main.php";?>
<!-- /header -->

<!-- Left side column. contains the logo and sidebar -->
<?php include "/../includes/sidebar_left.php";?>
<!-- /Left sidebar -->
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      	<?php echo $page_title;?>			
      </h1>
      <div class="row">
       <span class="col-md-3">
		<a  data-toggle="modal" title="cliet registration" data-backdrop="static" data-keyboard="false" data-target="#jayModal" id="j_form"  class="btn btn-primary">New Client</a>
		</span>
		<span class="col-md-3">
		<select class="jClientSearch" name="jClientSearch" id="jClientSearch" placeholder="Search Client" style="width:100%;">
			<option></option>
			<?php foreach ($getClient->result() as $row){ ?>	
			<option value="<?php echo ucfirst($row->icw_clientId0317);?>"><?php echo ucfirst($row->icw_clientName0317);?></option>
			<?php } ?>
		</select>
       </span>
      </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Sale</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
          	 
            <div class="box-j1 with-border col-md-5 panel panel-info">            
			   <div class="form-group select-div">
                  <div class="col-sm-6">
                    <select  name="categoryName" id="jSelect" style="width:100%;">
					<option></option>
				<?php	foreach ($getPcat->result() as $row){ ?>
					<option onclick="getProData(<?php echo $row->icw_ci0317; ?>)" value="<?php echo $row->icw_ci0317; ?>"><?php echo $row->icw_cn0318; ?> </option>
				<?php } ?>
					</select>
                  </div>
                  <div class="col-sm-6 form-group">
                  <input type="text" class="form-control" id="jSearch" placeholder="Barcode or Product-code">
                  </div>
               
                </div>
                
                <div class="form-group">
                  <div class="col-sm-12 j_body"></div>
				  <div class="col-sm-12 divSpn">
					<span class="icon-spinner"><img src="<?php echo base_url();?>assets/images/spinner.gif"  class="fa fa-spinner fa-spin spn"></span>
				  </div>
               </div> 
             </div>
            
            <!-- /.box-header -->
 <!-- Horizontal Form -->
 <form name="frmInvoice" method="post" id="frmInvoice" action="<?php echo site_url('sale/invoicePrint');?>">
       <div class="box-j2 col-md-7 panel1 panel-info1" id="printarea"> 
	       <!-- j hidden data -->
	       		<input type="hidden" name="client_id" id="client_id">
	       		<input type="hidden" name="client_name" id="client_name">
	       		<input type="hidden" name="client_bTittle" id="client_bTittle">
	       		<input type="hidden" name="client_mob" id="client_mob">
	       		<input type="hidden" name="client_email" id="client_email">
	       		<input type="hidden" name="client_addr1" id="client_addr1">
	       		<input type="hidden" name="client_addr2" id="client_addr2">
	       		<input type="hidden" name="client_city" id="client_city">
	       		<input type="hidden" name="client_state" id="client_state">
	       		<input type="hidden" name="client_zip" id="client_zip">
	       		<input type="hidden" name="client_country" id="client_country">
	       		   			
	       		   	<?php 
	       		   	 $invoCount=($getInvoiceNo->maxid)+1;
	       		   	?>
	       		   	<input type="hidden" name="invoiceNo" id="invoiceNo" value="<?php echo $invoCount; ?>">
					<input type="hidden" name="shopId" id="shopId" value="<?php if($settingDetails->icw_shopId0317!=''){echo $settingDetails->icw_shopId0317;}?>">
					
             <div class="row jCalc panel panel-default"">
              <table border=1 class="table table-bordered jTable"  id="mytbl2" cellspacing="0" width="100%">
              	<caption class="tblCaption">
              	    <span class="client_nameSpn"></span>&nbsp;&nbsp;&nbsp;
       				<span class="client_mobSpn"></span>
       			</caption>
	            <thead class="bg-info">
	            	<th><i class="fa fa-trash-o" aria-hidden="true"></i></th>
	                <th>Product</th>
	                <th>QTY</th>
	                <th>Price</th>
	                <th>Total</th>
	                <th>Apply Tax</th>
	                
	                	                	          
	        	</thead>	        	
               <tbody id="jMore">
               <tr class="item-row"></tr> <?php
 								foreach ($previousProducts as $key=>$getdata){
			$query=$getdata['query'];
			$query2=$getdata['query2'];
			?> 
<tr class="jRemove">
	<td><i class="fa fa-times removeRow <?php echo $key;?>" aria-hidden="true"
		style="cursor: pointer"></i></td>
	<td><?php echo $query->icw_pn0317;?><input type="hidden"
		class="productName" name="productName[]"
		value="<?php echo $query->icw_pn0317;?>"><input type="hidden"
		class="productId" name="productId[]"
		value="<?php echo $query->icw_pi0317;?>"></td>
	<td><input type="text" class='qty form-control' name='qty[]' value='1'
		style='width: 40px'></td>
	<td><input type='text' class='selling_price form-control input-border'
		name='selling_price[]' value='<?php echo $query->icw_prs0317;?>'></td>
	<td><input type='text' name='itemTotal[]'
		class='itemtotal form-control input-border' readonly='readonly'
		value="<?php echo $query->icw_prs0317;?>" /><input type='hidden'
		name='warehouse_id[]' value='"+warehouse_id+"' /></td>
	<td><select class="optsel ">
			<option>No Tax</option>
			<?php foreach($query2 as $qry){?>
			<option value="<?php echo $qry->icw_id0317;?>">
			<?php echo $qry->icw_taxName0317;?>
			</option>
			<?php }?>
	</select>
	</td>

</tr>
			<?php   } ?>
			   </tbody>		   
              </table>
            </div>
            <div class="row pCalc panel panel-default">
            	<div class="col-md-12">
            		<div class="taxDisplay-box">
		            	<table id="taxTable">
							<tbody class="taxBody">
								
							</tbody>
						</table>	
            		</div>
            		<hr>
            	</div>
            </div>
            <div class="row sCalc panel panel-default">
            	<div class="sCalc-box1">
	            <div class="col-md-6"><strong>Total Tax:&nbsp;</strong><span id="totalTaxAmt" style="color:#6EDBED; font-weight:bold;">0</span><input type="hidden" id="totalTaxAmtJ" name="totalTaxAmtJ" value="" ></div>
	            <div class="col-md-2"><strong>Items:&nbsp;</strong><span class="numberofitems" style="color:#6EDBED; font-weight:bold;">0</span><input type="hidden" id="numberofitemsJ" name="numberofitemsJ" value="" ></div>
	            <div class="col-md-4"><strong style="font-size:18px;"><i class="fa fa-inr"></i></strong><span id="grand_total" style="font-size:18px; color:green; font-weight:bold;">00.00</span><input type="hidden" id="grand_totalJ" name="grand_totalJ" value="" ></div>
            	</div>
            	<div class="sCalc-box3">
	            <div class="col-md-4" style="margin-top:10px;">
	            		<select name="taxMode" class="taxModeCls">
		            		<option value="">No Type</option>
		            		<option value="inclusive">Inclusive</option>
		            		<option value="exclusive">Exclusive</option>		            		
		            	</select>	            		
	            </div>
	            <div class="col-md-8" style="margin-top:10px;"><strong>Receivables :&nbsp;</strong><strong style="font-size:20px;"><i class="fa fa-inr"></i></strong><span id="total_jTax" style="font-size:20px; color:green; font-weight:bold;">00.00</span><input type="hidden" id="total_jTaxJ" name="total_jTaxJ" value="" ></div>
            	</div>
            	<div class="sCalc-box2">
            	<div class="row">
            	<div class="col-md-4 payment-box" style="margin-top:10px;">
	            	<span class="col-md-4">
		            	<select name="paymentMode" class="paymentModeCls">
		            		<option value="no">Select Payment Mode</option>
		            		<option value="cash">Cash</option>
		            		<option value="credit">Credit Card</option>
		            		<option value="debit">Debit Card</option>
		            	</select>
	            	</span>	            	
            	</div>
            	<div class="col-md-8" style="margin-top:10px;">
	            	<div class="row">
	            		<div class="col-md-12">
			            	<input type="text" name="transRefId" id="transRefId" class="inputDisp" size="10" placeholder="Transaction Reference Id">			            
			            	<input type="text" name="paidAmount" id="paidAmount" class="inputDisp inputDisPaid" size="10" placeholder="Paid Amount">			           
			            	<input type="text" name="balanceAmount" id="balanceAmount" class="inputDisp inputDisBal" size="10" placeholder="Balance Amount">		            			            	
	            		</div>
	            	</div>
            	</div>
            	</div>
            	<div class="row">
            	<div class="col-md-4  col-md-offset-4" style="margin-top:30px;margin-bottom:10px;">           		
            		<div class="action-box">
		            	<button type="button" class="btn btn-info invoiceSave">Save</button>
		            	<!-- <button type="submit" class="btn btn-primary print">Print</button> -->
		            	 <a class="btn btn-primary print" href="<?php echo site_url('sale/invoicePrint?id='.$invoCount);?>" target="_blank">Print</a> 
            		</div>
            	</div>
               </div>
             </div>
            </div> 
          </div>
        </div>
	  </div>
    </section>
    </form>
    <!-- /.content --><div class="panel panel-default autocompDisplay"></div>
  </div>
  
  
  <!-- Modal -->
<div class="modal fade" id="jayModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h3 class="h3Registration">Client Registration 
      	<i class="fa fa-check icnSuccess" aria-hidden="true" style="display: none;"></i>
      	<i class="icon-remove-sign icnNotSuccess" aria-hidden="true" style="display: none;"></i>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </h3>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->			          
			<form class="form-horizontal" id="addForm" action="<?php echo site_url('client/addClient');?>" enctype="multipart/form-data">
				<input type="hidden" name="hidden_ajax" value="ajaxData">
			 <div class="col-md-10 panel panel-default box-body">
				<div class="form-group">
                  <label for="cName" class="col-sm-4 control-label">Full Name*</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="cName" id="cName" value="" placeholder="Full Name" required="required">			
				  </div>				  
                </div>
				<div class="form-group">
                  <label for="cMobile" class="col-sm-4 control-label">Mobile*</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" maxlength="10" minlength="10" name="cMobile" id="cMobile" value="" placeholder="Mobile No.">
                  </div>
                </div>
				<div class="form-group">
                  <label for="cEmail" class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="cEmail" id="cEmail" value="" placeholder="Email Id">
                  </div>
                </div>
				<div class="form-group">
                  <label for="cBusinessTitle" class="col-sm-4 control-label">Business Title</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="cBusinessTitle" id="cBusinessTitle" value="" placeholder="Business Title">
                  </div>
                </div>
                <div class="form-group">
                  <label for="cGrn" class="col-sm-4 control-label">GRN</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="cGrn" id="cGrn" value="" placeholder="GRN">
                  </div>
                </div>
                <div class="form-group">
                  <label for="cAddress1" class="col-sm-4 control-label">Address Line 1</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="cAddress1" id="cAddress1" value="" placeholder="Street address, P.O. box, company name, c/o">
                  </div>
                </div>
				<div class="form-group">
                  <label for="cAddress2" class="col-sm-4 control-label">Address Line 2</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="cAddress2" id="cAddress2" value="" placeholder="Apartment, suite , unit, building, floor, etc.">
                  </div>
                </div>
				<div class="form-group">
                  <label for="city" class="col-sm-4 control-label">City / Town</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="city" id="city" value="" placeholder="City">
                  </div>
                </div>
				<div class="form-group">
                  <label for="state" class="col-sm-4 control-label">State / Province / Region</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="state" id="state" value="" placeholder="State/Province/Region">
                  </div>
                </div>
				<div class="form-group">
                  <label for="postalCode" class="col-sm-4 control-label">Zip / Postal Code</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="postalCode" id="postalCode" value="" placeholder="Zip/Postal Code">
                  </div>
                </div>
				<div class="form-group">
                  <label for="country" class="col-sm-4 control-label">Country</label>
                  <div class="col-sm-4">
                    <select name="country" id="CountrySelect" value="">
					<option value="">Select Country</option>
				<?php	foreach ($getCountry->result() as $row){ ?>
					<option value="<?php echo $row->id; ?>"><?php echo $row->country_name; ?></option>
				<?php } ?>
					</select>
                  </div>
                </div>
            
				<div class="form-group">
                  <label for="productDescription" class="col-sm-4 control-label">Upload Image</label>
                  <div class="col-sm-6">
                     <input type="file" name="image" id="image">
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="col-md-offset-5 btn btn-info frmSubmitJ">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
		  </div>      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  
  <!-- /.content-wrapper -->
	 
  <!-- Control Sidebar -->
  
  <!-- footer -->
  <?php include "/../includes/footer.php";?>
  <!-- /footer -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<!-- ./scripts -->

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
        	$('#jClientSearch').load(document.URL +  ' #jClientSearch');
        	}else{
        	$(".icnNotSuccess").show();
        	$(".icnNotSuccess").css("color","red");
            	}
    },
    error: function(data) {
        
    }
    });
});
</script>



<script>
$(document).ready(function() {
    $('#CountrySelect').select2({
    	allowClear: true,
    	placeholder:"Select Country",
        width: "resolve"
    });
});
</script>
<script>
$(document).ready(function() {
    $('#jSelect').select2({
    	allowClear: true,
    	placeholder:"Select Category",
        width: "resolve"
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
$("#jSearch").on('keyup',function (){
	var e=$("#jSearch").val();
	$(".j_body").html('');
	
	var delay = 1000;
	
		$(".spn").show();
		$(".spn").addClass('spin');
	    $(".divSpn").show();
	    
    	
$.ajax({
    type: "post",
    data: {dt:e, ser:'barcode'} ,
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
function getDtinfo(e)
{
//alert(e);
$.ajax({
    type: "post",
    data: {dt:e},
    url: "<?php echo site_url('sale/getProInfo');?>",
    success: function (response) { //alert(response);
    	
    	$("#jMore").append(response);
    	
	  	update_total();
	  	update_aft_tax();
    },
    error: function(jqXHR, textStatus, errorThrown) {
       console.log(textStatus, errorThrown);
    }
});

}

$('#mytbl2').on('change', '.optsel', function() { 
    var optId=$(this).val();
    var j_index = $(this).index('.optsel');
	var itemtotal=$(".itemtotal").get(j_index).value;
	var proId=$(".productId").get(j_index).value;
	var proName=$(".productName").get(j_index).value;
	//alert(proId);
$.ajax({
    type: "post",
    data: {dt:optId,dt2:itemtotal,dt3:j_index,dt4:proId,dt5:proName},
    url: "<?php echo site_url('sale/getSubTaxInfo');?>",
    success: function (response) { 

    	var j_check=jQuery(".taxBody").find("tr").length;
    	if(j_check >=0){
        	$(".taxDisplay-box").show();
        	  }else{
        		  $(".taxDisplay-box").hide();
           }
    	
    if(jQuery(".ntr"+j_index).length){
    	$(".ntr"+j_index).remove();
    	$(".taxBody").append(response);
    	update_tax();		
	    update_total();
	    update_aft_tax();
        }else{
    	$(".taxBody").append(response)
		update_tax();		
	    update_total();
	    update_aft_tax();
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
       console.log(textStatus, errorThrown);
    }
});

});

function update_tax(){
	var grand_tax = 0;
	i = 1;	
	$('.totalTaxAmount').each(function(i) {
        var TxtTotal = $(this).val();
		
        TxtTotal = parseFloat(TxtTotal);		
        grand_tax = parseFloat(TxtTotal+grand_tax);
    });
	$('#totalTaxAmt').html(grand_tax.toFixed(2));
	$('#totalTaxAmtJ').val(grand_tax.toFixed(2));
}

function update_total() { 
	var grand_total = 0;
	i = 1;	
	$('.itemtotal').each(function(i) {
        var total = $(this).val();
		
		total = parseFloat(total);		
		grand_total = parseFloat(total+grand_total);
    });
	$('#grand_total').html(grand_total.toFixed(2));
	$('#grand_totalJ').val(grand_total.toFixed(2));
	
	//Updating total Field.
	var items_total = 0;
	var taxes_total = 0;
	i = 1;
	$('.selling_price').each(function(i) {
        var item_total = $(this).val();
		var array_index = $(this).index('.selling_price');		
		var quantity = $(".qty").get(array_index).value;

		item_total = parseFloat(item_total)*parseFloat(quantity);
		items_total = parseFloat(items_total+item_total);
    	
	});
	$('.totalamount').html(items_total.toFixed(2));
	$('.numberofitems').html($(".selling_price").length);
	$('#numberofitemsJ').val($(".selling_price").length);
	
}

$('#mytbl2').on('keyup', '.qty', function() { 
	var array_index = $(this).index('.qty');
	var product_price = $(".selling_price").get(array_index).value;
	var product_quantity = $(".qty").get(array_index).value; 
	if(isNaN(product_quantity)) { 
		alert("Quantity needs to be a number!");
		$(".qty").get(array_index).value = 1;
		$(".qty").get(array_index).focus();
		return true;
	}
	
	var total = parseFloat(product_price)*parseFloat(product_quantity);
    var grand_total = total;
    
	$(".itemtotal").get(array_index).value = grand_total;
	update_tax();
	update_total();
	update_aft_tax();
});

$(".taxModeCls").on('change','',function(){
	//var optMode=$(this).val();
	update_aft_tax();
});
function roundToTwo(num) {    
    return +(Math.round(num + "e+2")  + "e-2");
}
function update_aft_tax()
{	
	var optMode=$(".taxModeCls").val();
	var grand_total=$("#grand_total").text();
	var totalTaxAmt=$("#totalTaxAmt").text(); 
	if(optMode=='')
	 {
		 var amtAftrTax = grand_total;
		 $("#total_jTax").html(roundToTwo(amtAftrTax));
		 $("#total_jTaxJ").val(roundToTwo(amtAftrTax));
	 }
	if(optMode=='inclusive')
	 {
		 var amtAftrTax = parseFloat(grand_total);
		 $("#total_jTax").html(roundToTwo(amtAftrTax));
		 $("#total_jTaxJ").val(roundToTwo(amtAftrTax));
	 }
	if(optMode=='exclusive')
	 {
		 var amtAftrTax = parseFloat(grand_total) + parseFloat(totalTaxAmt);
		 $("#total_jTax").html(roundToTwo(amtAftrTax));
		 $("#total_jTaxJ").val(roundToTwo(amtAftrTax));		
	 }	 	

}

$(document).ready(function(e) {  
	$('#mytbl2').on('click', '.removeRow', function() {
		var className = this.className;
		var rowid = className.replace('fa fa-times removeRow ','');
		$.ajax({
    	    type: 'POST',
    	    url: "<?php echo site_url('sale/updateRow/"+rowid+"');?>",
    	    data:[],
    	    cache:false,
    	    contentType: false,
    	    processData: false,
    	    success: function(response) {   	
    	    	if(response ==1)
    	    	{
    	    		 
    		    }
    	    },
    	    error: function(response) {
    	        
    	    }
    	    });
		//alert(rowid)
		var del_index=$(this).index('.removeRow');
		   $(this).parents('.jRemove').remove();
		   $(".ntr"+del_index).remove();
		    update_tax();
		    update_total();
		    update_aft_tax(); 
		    var j_check=jQuery(".taxBody").find("tr").length;
	    	if(j_check >0){
	        	$(".taxDisplay-box").show();
	        	  }else{
	        		  $(".taxDisplay-box").hide();
	           }

	    	
		});
    });



function PrintBill()
{
	var div1=$(".pCalc");
	var div2=$(".jCalc");
	//var prt=div1+div2;
    Popup($(div).html(div1,div2));
}

function Popup(data)
{
    var mywindow = window.open('', 'new div', 'height=400,width=600');
    mywindow.document.write('<html><head><title>Icon Billing</title>');
    /*optional stylesheet*/ mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/billingCss/billingCss.css"></link>');
    mywindow.document.write('</head><body >');
    mywindow.document.write(data);
    mywindow.document.write('</body></html>');

    mywindow.print();
    mywindow.close();

    return true;
}


$(document).ready(function() {
    $('#jClientSearch').select2({
    	allowClear: true,
    	placeholder:"Search Client",
    	width:"resolve"  
    });
});

$(function(){
	$("#jClientSearch").on('change',function(){ 
	  var clientId=$("#jClientSearch option:selected").val(); 

			$.ajax({
			    type: "post",
			    data: {term:clientId},
			    url: "<?php echo site_url('client/getClientInfo');?>",
			    success: function (response) { 			    	
			    	var response= JSON.parse(response);
			    	
			    	var clnt_id=response.icw_clientId0317;
			    	var clnt_name=response.icw_clientName0317;
			    	var clnt_bTittle=response.icw_clientBtitle0317;
			    	var clnt_mob=response.icw_clientMobile0317;
			    	var clnt_email=response.icw_clientEmail0317;
			    	var clnt_addr1=response.icw_clientAddr10317;
			    	var clnt_addr2=response.icw_clientAddr20317;
			    	var clnt_city=response.icw_clientCity0317;
			    	var clnt_state=response.icw_clientState0317;
			    	var clnt_zip=response.icw_clientZipCode0317;
			    	var clnt_country=response.country_name;
			    	
					$("#client_id").val(clnt_id);
					$("#client_name").val(clnt_name);
					$("#client_bTittle").val(clnt_bTittle);
					$("#client_mob").val(clnt_mob);
					$("#client_email").val(clnt_email);
					$("#client_addr1").val(clnt_addr1);
					$("#client_addr2").val(clnt_addr2);
					$("#client_city").val(clnt_city);
					$("#client_state").val(clnt_state);
					$("#client_zip").val(clnt_zip);
					$("#client_country").val(clnt_country);

					$(".tblCaption").show();
					$(".tblCaption").addClass('bg-danger');
					$(".client_nameSpn").html(clnt_name);
					$(".client_mobSpn").html(clnt_mob);

					if($("#client_name").val()==''){
						$(".invoiceSave").prop('disabled', true);
						//$(".print").prop('disabled', true);
						}else{
						$(".invoiceSave").prop('disabled', false);
						
							}
					
			    }
			});
			
		});
});

$(document).ready(function(){
		$(".invoiceSave").prop('disabled', true);		
		$(".print").css('display', 'none');
});


$('.invoiceSave').on('click',function(evt) {
    evt.preventDefault();
    var frm=$("#frmInvoice");
    var formData = new FormData(frm[0]);
    $.ajax({
    type: 'POST',
    url: "<?php echo site_url('sale/invoiceSave');?>",
    data:formData,
    cache:false,
    contentType: false,
    processData: false,
    success: function(response) {   	
    	if(response ==1)
    	{
    		alert("Invoice has been saved.");
    		$(".invoiceSave").hide();
    		$(".print").css('display', 'block');
	    }
    },
    error: function(response) {
        
    }
    });
    
});

$('.paymentModeCls').on('change',function(){
	var mode=$(this).val();
	if(mode =='no'){
		$('#transRefId').hide().val('');
		$('#paidAmount').hide().val('');
		$('#balanceAmount').hide().val('');
	}
	if(mode =='cash'){
		$('#transRefId').hide();
		$('#paidAmount').show();
		$('#balanceAmount').show();
	}
	if(mode =='debit'){
		$('#transRefId').show();
		$('#paidAmount').show();
		$('#balanceAmount').show();
	}
	if(mode =='credit'){
		$('#transRefId').show();
		$('#paidAmount').show();
		$('#balanceAmount').show();
	}	
});

$('#paidAmount').on('keyup',function(){
	var paid=$(this).val();
	var tot=$("#total_jTaxJ").val();
	if(tot==''){
		alert("Receivables amounts should not be empty");
		$('#paidAmount').val('');
		}else{
		var bal=parseInt(tot) - parseInt(paid);
		$("#balanceAmount").val(bal);
	}
});
</script>


	
</body>
</html>

