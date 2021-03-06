<style>
</style>
<section class="content-header">
	<h1 class="h3-p">
	<?php echo $page_title?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php

echo base_url();
?>"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-md-5">
			<div class="box box-success">
				<div class="box-header with-border">
					<div class="col-md-3">
							<select class="form-control orderType">
								<option value="">Order Type</option>
								<option value="1">Dine In</option>
								<option value="2">Take Away</option>
							</select>
						</div>
						<div class="col-md-3">
							<select class="form-control tableSelect" name="table_no" id="table_no">
								<option>Table</option>
                      <?php foreach($table_list as $row){?>	
                    <option
									value="<?php
                        echo $row->tname;
                        ?>"><?php if($row->tname!=''){echo $row->tname;}?></option>
                      <?php }?>		
                    </select>
						</div>
						<div class="col-md-3">
							 <select class="form-control servingBy">
								<option>Servitor</option>
								<?php foreach($servitor_list as $servitor){ ?>
								<option value="<?php echo $servitor->sno;?>"><?php echo $servitor->sno;?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-3">
							 <select class="form-control servingBy" id="parcel_no">
								<option>Parcel</option>
								<?php foreach($parcel_list as $row){ ?>
								<option value="<?php if($parcel_list){echo $row->tblno;}else{}?>"><?php if($parcel_list){echo $row->tblno;}else{}?></option>
								<?php } ?>
							</select>
						</div>
				</div>
				
				<!-- /.box-header -->
				<div class="box-body box-danger" style="height: 400px; margin-left:0px; overflow-y: scroll;">
					<div class="as">
					<p>Free <i class="fa fa-check text-success"></i> &nbsp;&nbsp;&nbsp;Full <i class="fa fa-check text-danger"></i></p>
					<table class="table">
						<tr>
							<td>
								<ul class="list-unstyled">
								<?php foreach($table_status['free_query'] as $fre){?>
									<li>
										<?php echo $fre->tname;?>
										&nbsp;&nbsp;<i class="fa fa-check text-success"></i>
									</li>
								<?php }?>
								</ul>
							</td>
							<td>
								<ul class="list-unstyled">
								<?php foreach($table_status['full_query'] as $full){?>
									<li>
										<?php echo $full->tname;?>
										&nbsp;&nbsp;<i class="fa fa-check text-danger"></i>
									</li>
								<?php }?>
								</ul>
							</td>
						</tr>
					</table>
					
					</div>
					
					<div class="slctItemsAr"></div>
					<div class="trackArea"></div>
				</div>
				
			</div>
		</div>
		<div class="col-md-7">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title h3-p">Item List</h3>

					<div class="box-tools pull-right">
						<div class="col-md-10">
							<input type="text" placeholder="Search Item" id="search"
								onkeyup="myFunction()" class="form-control ">
						</div>
						<button type="button" class="btn btn-box-tool"
							data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body no-padding" style="height: 400px;overflow-y:scroll;">
					<ul class="users-list clearfix " id="myUL">
                    <?php foreach($getItems as $k=>$v){ ?>
                    <li class="border-all"
							onclick="addItems(<?php echo $v->pid;?>,'1','');"><img width="70px" height="70px"
							src="<?php echo base_url();if($v->img !=''){echo 'uploads/product-images/'. $v->img;}else{echo 'assets/images/no-image.gif' . $v->img;}?>"
							alt="User Image"> <a class="users-list-name" href="#"><?php echo ucwords($v->name);?></a>
							<span><i class="fa fa-inr"></i><?php echo $v->price;?></span>
						</li>
                    <?php }?>
                  </ul>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>
<div class="modal" id="billModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"
				style="background-color: green; color: #ffffff;">
				<center>
					<h4><strong>Table/Parcel Bill</strong></h4>
				</center>
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">
					<i class="fa fa-times" aria-hidden="true"></i>
				</button>
			</div>
			<div class="modal-body billgetsarea"></div>
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
<script>
	function reitem(id){
		var i= $("#item_quantity"+id).val();
		var j='m';
		if(i > 1){
		i=i-1;
		}else{
			i=1;
			}
		$("#item_quantity"+id).val(i)
		addItems(id,i,j);
		}
	function additem(id){
		var i= $("#item_quantity"+id).val();
		var j='p';		
		i=parseInt(i) + 1;
		$("#item_quantity"+id).val(i)
		addItems(id,i,j);
		
		}
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}

function removeFun(e){
	url = "<?php echo site_url('restaurant/removeItems?pid="+e+"');?>";
	$.ajax({
	    type: 'POST',
	    url: url,
	    data:[],
	    cache:false,
	    contentType: false,
	    processData: false,
	    success: function(response) {  	
	    	 $('.slctItemsAr').html(response);
	    },
	    error: function(response) {	        
	    }
	    });
}
function addItems(e,i,j){

	url = "<?php echo site_url('restaurant/addItems?pid="+e+"&qty="+i+"&typ="+j+"');?>";
	$.ajax({
	    type: 'POST',
	    url: url,
	    data:[],
	    cache:false,
	    contentType: false,
	    processData: false,
	    success: function(response) {  	
	    	 $('.slctItemsAr').html(response);
	    },
	    error: function(response) {    
	    }
	    });
}

function removeFun(e){
	url = "<?php echo site_url('restaurant/removeItems?pid="+e+"');?>";
	$.ajax({
	    type: 'POST',
	    url: url,
	    data:[],
	    cache:false,
	    contentType: false,
	    processData: false,
	    success: function(response) {  	
	    	 $('.slctItemsAr').html(response);
	    },
	    error: function(response) {	        
	    }
	    });
}
$("#table_no,#parcel_no").on('change', function(){
	var tbl=$(this).val();
	url = "<?php echo site_url('restaurant/getBill?tblno="+tbl+"&type=ord');?>";
	$.ajax({
	    type: 'POST',
	    url: url,
	    data:[],
	    success: function(response) {  
		    $('.trackArea').html(response);
	    },
	    error: function(response) {	        
	    }
	    });
});


	function makeOrder(){
	var tbl=$('.tableSelect').val();
	var serv=$('.servingBy').val();
	var ordtype=$('.orderType').val();
	if(ordtype !=''){
	if(ordtype =='1' && tbl !='' && serv !=''){ 
	url = "<?php echo site_url('restaurant/orderSave?tblno="+tbl+"&servno="+serv+"&ordtype="+ordtype+"');?>";
	$.ajax({
	    type: 'POST',
	    url: url,
	    data:[],
	    cache:false,
	    contentType: false,
	    processData: false,
	    success: function(response) {  
		    if(response=='1'){
				swal("Congrats!", "Your order has been placed", "success").then(function (){
					window.location.reload();
				});
				}else if(response=='0'){
					swal("Oops...", "Please try again you did not selected any items!", "error");
				}
	    },
	    error: function(response) {	        
	    }
	    });
	}else if(ordtype =='2'){
		rand=Math.floor((Math.random(5,99) * 100) + 1);
		
		tbl="P"+ rand;
		swal({
				title: 'Your parcel order No is:' + tbl, 
				text: 'abc', 
				type: 'info', 
				closeOnCancel: true, 
				html:true ,
				preConfirm: function(){
		 url = "<?php echo site_url('restaurant/orderSave?tblno="+tbl+"&servno="+serv+"&ordtype="+ordtype+"');?>";
		$.ajax({
		    type: 'POST',
		    url: url,
		    data:[],
		    cache:false,
		    contentType: false,
		    processData: false,
		    success: function(response) {  
			    if(response=='1'){
				    window.location.reload();}else{}
		    },
		    error: function(response) {	        
		    }
		    }); 
		}}); 
		}else{
			swal("Oops...", "Table and Servitor Should Not Be Empty !", "error");
		}		
	}else{
		swal("Oops...", "Please Choose Order Type!", "error");}
}

	function deleteOrd(e,j){
		swal({
			  title: 'Are you sure?',
			  text: "You want to do remove " + j,
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes',
			  cancelButtonText: 'No',
			  confirmButtonClass: 'btn btn-success',
			  cancelButtonClass: 'btn btn-danger',
			  buttonsStyling: false,
			  preConfirm: function(){ 
					$.post( "<?php echo site_url('restaurant/deleteOrd?orderid="+e+"');?>", function( data ) {
						if(data==1){
							window.location.reload();
							}else{}
						});
		  }});

	}

	function getBill(e){
		var tbl=e;
		$('#billModal').modal('show');
		url = "<?php echo site_url('restaurant/getBill?tblno="+tbl+"&type=bil');?>";
		$.ajax({
		    type: 'POST',
		    url: url,
		    data:[],
		    cache:false,
		    contentType: false,
		    processData: false,
		    success: function(response) {  
			    $('.billgetsarea').html(response);
		    },
		    error: function(response) {	        
		    }
		    });
	}
</script>
<script>
function getFree(f){
var tbl=f;
var disVal=$(".discount").val();
var disAmt=$(".disAmt").text();
var payAmt=$(".payAmt").text();
swal({
	  title: 'Are you sure?',
	  text: "You want to do free table",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, free it!',
	  cancelButtonText: 'No, cancel!',
	  confirmButtonClass: 'btn btn-success',
	  cancelButtonClass: 'btn btn-danger',
	  buttonsStyling: false,
	  preConfirm: function(){ 
url = "<?php echo site_url('restaurant/getFree?tblno="+tbl+"&disVal="+disVal+"&disAmt="+disAmt+"&payAmt="+payAmt+"');?>";
$.ajax({
    type: 'POST',
    url: url,
    data:[],
    success: function(response) { 
        if(response=='1'){
        	window.location.reload();
            } 
    },
    error: function(response) {	        
    }
    });
  }});
}

function disc(event){
      
	var dis_val=$(".discount").val();
	var grandT=$(".grandT").text();
	//alert(dis_val);
	if(dis_val =='0' || dis_val ==''){
		$(".payAmt").text(grandT);
		$(".disAmt").text('0');
		}else{
	if(dis_val > 100){
		$(".discount").val('');
		$(".disAmt").text('0');
		swal("Oops...", "Discount percent value should not be greater then 100.", "error");
		
		}
	var disAmts=parseInt(grandT)* parseInt(dis_val)/100;
	var dis=grandT-disAmts;
	disAmts=Math.round(disAmts * 100)/100;
	dis=Math.round(dis * 100)/100;
	if(isNaN(disAmts)){disAmts=0;}else{ disAmts=disAmts;}
	if(isNaN(dis)){dis=0;}else{ dis=dis;}
	$(".disAmt").text(disAmts);
	$(".payAmt").text(dis);

//print data
	$(".disperc").text(dis_val);
	$(".disamts").text(disAmts);
	$(".payamts").text(dis);
	
		}	
}
</script>
<script>
function PrintElem(elem) {
    Popup($(elem).html());
}
function Popup(data) {
      var mywindow = window.open('', 'new div', 'height=400,width=600');
      mywindow.document.write('<html><head><title></title>');
      mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" type="text/css" />');
      mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" type="text/css" />');
      mywindow.document.write('<style>hr {border: none;border-top: 1px dotted black;color: #fff;background-color: #fff;height: 1px;width: 100%;margin: 0em;}</style>');
	  mywindow.document.write('</head><body >');
      mywindow.document.write(data);
      mywindow.document.write('</body></html>');
      mywindow.document.close();
      mywindow.focus();
      setTimeout(function(){mywindow.print();},1000);
     // mywindow.close();

      return true;
}
</script>