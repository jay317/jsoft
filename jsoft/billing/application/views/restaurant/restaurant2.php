<style>
*:fullscreen
*:-ms-fullscreen, *:-webkit-full-screen, *:-moz-full-screen {
	overflow: auto !important;
}

.focused {
	opacity: 0.3;
}

@import 'https://fonts.googleapis.com/css?family=Open+Sans';

* {
	margin: 0;
	padding: 0;
}

body {
	background: radial-gradient(green, #668);
	height: 100%;
	width: 100%;
}

.dateCss {
	background: rgba(0, 0, 0, 0.1);
	color: #fff;
	font-family: "Open Sans", sas-serif;
	font-size: 2em;
	padding: 0.5em;
	text-align: center1;
}

#clock {
	align-items: center;
	-webkit-align-items: center;
	display: flex;
	display: -webkit-flex;
	height: 50px;
	justify-content: space-around;
	-webkit-justify-content: space-around;
	left: calc(80% - 50px);
	position: absolute;
	top: calc(11% - 65px);
	width: 270px;
}

.unit {
	background: linear-gradient(#10bf10, #10bf10);
	border-radius: 15px;
	box-shadow: 0 2px 2px #444;
	color: #fff;
	font-family: "Open Sans", sans-serif;
	font-size: 2em;
	height: 100%;
	line-height: 50px;
	margin: 10px;
	text-align: center;
	text-shadow: 0 2px 2px #666;
	width: 100%;
}
</style>
<?php $settingDetails=$this->session->userdata('settingDetails');?>
<div class="row">
	<span class="dateCss col-md-4"><img
		src="<?php echo base_url();if($settingDetails->icw_shop_bLogo_0317 !=''){echo 'uploads/shop-logo/'. $settingDetails->icw_shop_bLogo_0317;}else{echo 'assets/images/no-image.gif';}?>"
		width="120px;" height="40px;" style="margin-left: 30px;"></span> <span
		id="date" class="dateCss col-md-8"></span>
</div>
<div id="clock">
	<span class="unit" id="hours"></span> <span class="unit" id="minutes"></span>
	<span class="unit" id="seconds"></span> <span class="unit" id="ampm"></span>
</div>

<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-md-12 box">
			<div class="col-md-6">
				<div class="top-head" style="height: 50px;"></div>
				<div class="panel-group collapse1" id="demo">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" href="#collapse1">All Orders</a>
							</h4>
						</div>
						<div id="collapse1" class="panel-collapse collapse1">
							<div class="panel-body" style="min-height: 400px;">
								<div class="col-md-3">
									<label>Tables/Parcel</label> <select name="billSelect"
										class="form-group orderTrack">
										<option value="">Select Table</option>
								    	<?php foreach($getbillTable as $billTbl){ ?>
								    	<option
											value="<?php if($billTbl->tblno !=''){echo $billTbl->tblno;}?>"><?php if($billTbl->tblno !=''){echo $billTbl->tblno;}?></option>
								    	<?php }?>
								    </select>
								</div>
								<div class="col-md-8">
									<div class="trackArea"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="top-head">
					<input type="hidden" name="orderType" class="form-group orderType">
					<input type="hidden" name="tableSelect"
						class="form-group tableSelect"> <input type="hidden"
						name="servingBy" class="form-group servingBy">

					<button type="button" class="btn btn-info btn-lg"
						data-toggle="modal" data-target="#ordTypeModal" title="Order type">
						<i class="fa fa-first-order" style="font-weight: bold;"
							aria-hidden="true"></i>
					</button>
					<button type="button" class="btn btn-info btn-lg"
						data-toggle="modal" data-target="#tableModal"
						title="Table and servitor">
						<i class="fa fa-th" style="font-weight: bold;" aria-hidden="true"></i>
					</button>
					<button type="button" class="btn btn-info pull-right"
						onclick="toggleFullScreen(document.body)" style="margin: 5px;"
						title="Fullscreen">
						<i class="fa fa-expand" aria-hidden="true"></i>
					</button>
					<button type="button" class="btn btn-info pull-right"
						onclick="reloadPage()" style="margin: 5px;" title="Refresh">
						<i class="fa fa-refresh" aria-hidden="true"></i>
					</button>
					<button class="btn btn-info pull-right" style="margin: 5px;">
						<a title="Dashboard"
							href="<?php echo site_url('mainController/dashboard');?>"><i
							class="fa fa-dashboard" aria-hidden="true" style="color: white;"></i></a>
					</button>
				</div>

				<div class="">
					<h3 class="h3-p">SELECTED ITEMS</h3>
					<div class="slctItemsArea">
         	<?php
        
$previousItems = $this->session->userdata("add_items") ? $this->session->userdata("add_items") : array();
        foreach ($previousItems as $key => $val) {
            ;
            ?>
				   <span style="cursor: pointer;" title="Click to remove"
							onclick="removeFun(<?php echo $val['item_id'];?>)"><figure>
								<img
									src="<?php echo base_url();if($val['item_img'] !=''){ echo "uploads/product-images/" .$val['item_img'];}else{ echo "assets/images/no-image.gif" .$val['item_img'];}?>"
									width='50px;' height='50px;'>
								<figcaption><?php echo $val['item_name'];?>(<strong><?php echo $val['item_qty'];?></strong>)
								</figcaption>
							</figure></span>
			<?php }?>
			</div>
				</div>
				<div class="form-group">
					<button class="btn btn-success form-control btn-order">
						<strong>Order</strong>
					</button>
				</div>
				<div class="body">
					<h3 class="bg-primary h3-p">
			   <?php foreach($getCategory as $cat){?>
			   <button class="btn btn-primary"
							onclick="getItemByCat('<?php echo $cat->cid;?>')"><?php if($cat){echo ucwords($cat->cname);}?></button>
			   <?php } ?>
			   </h3>
					<div class="items-lists">
						<center>
							<span><img class="img_loader"
								src="<?php echo base_url();?>assets/images/spinner.gif"
								width="50px" height="50px" style="display: none;"></span>
						</center>
				   <?php foreach($getItems as $k=>$v){ ?>
				   <span class="img_spn" style="cursor: pointer;"
							title="Click to add list"
							onclick="addItems(<?php echo $v->pid;?>);"><figure
								style="color: #aaa">
								<img
									src="<?php echo base_url();if($v->img !=''){echo 'uploads/product-images/'. $v->img;}else{echo 'assets/images/no-image.gif' . $v->img;}?>"
									width="50px;" height="50px;">
								<figcaption><?php echo ucwords($v->name);?></figcaption>
							</figure></span>
				   <?php }?>
			   </div>
				</div>
			</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="control-sidebar-bg"></div>
</div>

<div class="modal" id="billModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"
				style="background-color: green; color: #ffffff;">
				<center>
					<strong>Table/Parcel Bill</strong>
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

<div class="modal ordTypeModal" id="ordTypeModal">
	<div class="modal-dialog" style="width: 30%;">
		<div class="modal-content">
			<div class="modal-body tableArea">
				<div class="row" style="margin-top: 15%;">
					<div onclick="select_ordType(0);" class="selOrdType">
						<figure class="panel panel-success">
							<img class="image selServImg" id="selServImg"
								src="<?php echo base_url();?>assets/images/dinein.png"
								width="100px;" height="100px;">
							<figcaption>Dinein</figcaption>
						</figure>
					</div>
				</div>
				<h3 style="color: #aaa">
					<center>---OR---</center>
				</h3>
				<div class="row">
					<div onclick="select_ordType(1);" class="selOrdType">
						<figure class="panel panel-success">
							<img class="image selServImg" id="selServImg"
								src="<?php echo base_url();?>assets/images/takeaway.png"
								width="100px;" height="100px;">
							<figcaption>Takeaway</figcaption>
						</figure>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal tableModal" id="tableModal" tabindex="-1"
	role="dialog" aria-hidden="false" style="overflow: hidden;">
	<div class="modal-dialog" style="width: 98%;">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #ffffff;">
				<strong>Select a Table</strong>
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">
					<i class="fa fa-times" aria-hidden="true"></i>
				</button>
			</div>
			<div class="modal-body tableArea" style="height: 450px;">

				<div class="col-md-8 col-md-8 col-sm-10 col-xs-10"
					style="background-color: #f6f6f6; margin-top: -15px; margin-left: -15px; height: 435px; padding-left: -20px; overflow-y: scroll; overflow-x: hidden">
						<?php $tb=''; foreach($getbillTable as $billTbl){ $tb[]=$billTbl->tblno ; $ser[]=$billTbl->servno ;} // print_r($tb); ?>
						   <?php $tbNo=count($tb); foreach($table_list as $row){?>					   				   
						   <span
						onclick="select_table(<?php if($row->tname!=''){echo $row->tname;}?>);"
						class="selTab"><figure class="panel panel-success">
							<img class="image selTabImg"
								id="selTabImg<?php if($row->tname!=''){echo $row->tname;}?>"
								src="<?php echo base_url();if($row->img !=''){echo 'uploads/restaurant-images/'. $row->img;}else{echo 'assets/images/no-image.gif' . $row->img;}?>"
								width="100px;" height="100px;">
							<figcaption class="figCap"><?php if($tbNo!='' && $tb!=''){for($i=0;$i<$tbNo;$i++){if($tb[$i]==$row->tname){echo "<strong style='color:#ffffff;' class='badge badge-danger'>Occupied <p>Ser- $ser[$i] </p></strong>";}}}?></figcaption>
						</figure></span>
						   <?php }?>					   
						</div>

				<div
					class="col-lg-4 col-md-4 col-sm-6 col-xs-6 cart-details hidden-xs"
					style="margin-top: -15px; height: 435px; padding-left: 0;">
					<h5 class="text-center" style="margin: 10px 0px;">
						<strong>Servitor</strong>
					</h5>
							<?php foreach($servitor_list as $servitor){ ?>
							<span onclick="select_servitor(<?php echo $servitor->sno;?>);"
						class="selServ"><figure class="panel panel-success">
							<img class="image selServImg"
								id="selServImg<?php echo $servitor->sno;?>"
								src="<?php echo base_url();if($servitor->img !=''){echo 'uploads/restaurant-images/'. $servitor->img;}else{echo 'assets/images/no-image.gif' . $servitor->img;}?>"
								width="100px;" height="100px;">
							<figcaption></figcaption>
						</figure></span>
							<?php } ?>
						</div>
			</div>
			<div class="modal-footer"
				style="margin-top: -15px; background-color: #ffffff;">
				<div class="col-md-3 alert1 alert-info">
					<strong>Info !</strong> You must select a table and servitor to
					choose the seat used.
				</div>
				<button type="button" class="btn btn-success close1"
					data-dismiss="modal" aria-hidden="true">Confirm</button>
			</div>
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
<div>
	<img src="<?php echo base_url();?>assets/images/powered-logo.png"
		width="120px;" height="50px;">
</div>
<!-- ./wrapper -->
<!-- script -->




<script>
$(document).ready(function() {
$('.orderTrack').select2({
	allowClear: true,
	placeholder:"Select T/P",
    width: "80%"
});
});
function select_table(e){
	var value=e;
	$('.tableSelect').val(value);
	$('.selTabImg').removeClass('focused');
      $('#selTabImg'+e).addClass('focused');
}
function select_servitor(e){
	var value=e;
	$('.servingBy').val(value);
	 $('.selServImg').removeClass('focused');
      $('#selServImg'+e).addClass('focused');
}
function select_ordType(e){
	var value=e; 
	$('.orderType').val(value);
	$('#ordTypeModal').modal('hide');
}

function getItemByCat(e){
	$.ajax({
	    type: "post",
	    data: {dt:e} ,
	    url: "<?php echo site_url('restaurant/getItemByCat');?>",
	    beforeSend:function (){
				$(".img_spn").hide();
				$(".img_loader").show();
		    },
	    success: function (response) {
	    	setTimeout(function() {  
	       $(".items-lists").html(response);
	    		    },
	    		    1000
	    		) ;
	    },
	    error: function(jqXHR, textStatus, errorThrown) {
	       console.log(textStatus, errorThrown);
	    }
	});
}

function addItems(e){
	url = "<?php echo site_url('restaurant/addItems?pid="+e+"');?>";
	$.ajax({
	    type: 'POST',
	    url: url,
	    data:[],
	    cache:false,
	    contentType: false,
	    processData: false,
	    success: function(response) {  	
	    	 $('.slctItemsArea').html(response);
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
	    	 $('.slctItemsArea').html(response);
	    },
	    error: function(response) {	        
	    }
	    });
}
$(".btn-order").on('click',function(){
	var sess='<?php  $preSess=$this->session->userdata("add_items")?1:0; echo $preSess;?>';
	var tbl=$('.tableSelect').val();
	var serv=$('.servingBy').val();
	var ordtype=$('.orderType').val();
	if(ordtype !=''){
	if(ordtype =='0' && tbl !='' && serv !=''){ 
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
	}else if(ordtype =='1'){
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
});

$(".orderTrack").on('change', function(){
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
function getFree(f){
var tbl=f;
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
url = "<?php echo site_url('restaurant/getFree?tblno="+tbl+"');?>";
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

</script>

<script>
$(document).ready(function() {
    $('#example').DataTable({
    	  "scrollX": true
        });
});
setTimeout(function() {
            $('.alert').hide('fast');
        }, 10000);

</script>

<script>
var $dOut = $('#date'),
$hOut = $('#hours'),
$mOut = $('#minutes'),
$sOut = $('#seconds'),
$ampmOut = $('#ampm');
var months = [
'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
];

var days = [
'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
];

function update(){
var date = new Date();

var ampm = date.getHours() < 12
         ? 'AM'
         : 'PM';

var hours = date.getHours() == 0
          ? 12
          : date.getHours() > 12
            ? date.getHours() - 12
            : date.getHours();

var minutes = date.getMinutes() < 10 
            ? '0' + date.getMinutes() 
            : date.getMinutes();

var seconds = date.getSeconds() < 10 
            ? '0' + date.getSeconds() 
            : date.getSeconds();

var dayOfWeek = days[date.getDay()];
var month = months[date.getMonth()];
var day = date.getDate();
var year = date.getFullYear();

var dateString = dayOfWeek + ', ' + month + ' ' + day + ', ' + year;

$dOut.text(dateString);
$hOut.text(hours);
$mOut.text(minutes);
$sOut.text(seconds);
$ampmOut.text(ampm);
} 

update();
window.setInterval(update, 1000);

function toggleFullScreen(elem) {
    if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (elem.requestFullScreen) {
            elem.requestFullScreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullScreen) {
            elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    }
}

function reloadPage(){
window.location.reload();	
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
<!--- /scripts --->
