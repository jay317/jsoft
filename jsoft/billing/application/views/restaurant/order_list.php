
<style>
.list_ord{
	max-height:80%;
	overflow:auto;
}

@import 'https://fonts.googleapis.com/css?family=Open+Sans';
*{
  margin: 0;
  padding: 0;
}
body{
  background: radial-gradient(green, #668);
  height: 100%;
  width: 100%;
}
.dateCss{
  background: rgba(0, 0, 0, 0.1);
  color: #fff;
  font-family: "Open Sans", sas-serif;
  font-size: 2em;
  padding: 0.5em;
  text-align: center;
}
#clock{
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
.unit{
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
<span class="dateCss col-md-4"><img src="<?php echo base_url();if($settingDetails->icw_shop_bLogo_0317 !=''){echo 'uploads/shop-logo/'. $settingDetails->icw_shop_bLogo_0317;}else{echo 'assets/images/no-image.gif';}?>" width="120px;" height="40px;" style="margin-left:-300px;" ></span>
<span class="dateCss col-md-8"><span id="date" style="margin-left:-300px;"></span></span></div>
<div id="clock">
  <span class="unit" id="hours"></span>
  <span class="unit" id="minutes"></span>
  <span class="unit" id="seconds"></span>
  <span class="unit" id="ampm"></span>
</div>


<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="row">
			<div class="col-md-3">
		    </div>
			<div class="col-md-6">
			</div>
			<div class="col-md-3">
		    </div>
		</div>
	</section>

<!-- Main content -->
<section class="content">
		<!-- Small boxes (Stat box) -->
	<div class="row list_ord" style="height:80%;overflow:auto;">
		<?php foreach ($ord_list1 as $orders){?>
		<div class="col-md-3">
          <div class="panel panel-success" style="margin:10px;">
            <div class="box-header with-border">
              <h3 class="box-title "><span class="badge badge-info" style="margin-top:-40px;">ser:&nbsp;<?php echo $orders->servno;?></span><span class="badge1 bg-light-blue">&nbsp;&nbsp;<?php  echo "Order No :" . $orders->ordno;?></span><span class="badge badge-primary pull-right" style="margin-top:-15px;"><?php if(!is_numeric($orders->tblno)){echo "Parcel:&nbsp;" . $orders->tblno;}else{ echo "Table:&nbsp;" . $orders->tblno;}?></span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">                              
                  <table class="table " style="margin:20px;">
                  <thead class="bg-info">
                  <th>#</th><th>Item</th><th>Qty</th><th>Status</th><th>Available</th>
                  </thead>
                  <?php $i=1; foreach($ord_list as $keys=>$val){ if($orders->tblno==$val->tblno){?>                  
                 <tr>
                 <td><?php echo $i++;?></td>
                 <td><?php echo $val->items;?></td>
                 <td> <?php echo $val->qty;?></td>
                 <td> 
            				<span>
            				 <?php $status=$val->status;
                                    if($status==0){ ?>
            					<a href="<?php echo site_url();?>restaurant/changeStatus?ord_id=<?php echo $val->ordid;?>" class="" >
            					<i class="fa fa-ellipsis-h text-danger"></i></a>
            					 <?php }else{ ?>
                        	<a href="<?php echo site_url();?>restaurant/changeStatus?ord_id=<?php echo $val->ordid;?>" class="" >
                        	<i class="fa fa-check text-success"></i></a>		  
                        <?php } ?>
            				</span>
                                        
                 </td>
                   <td> 
            				<span>
            				 <?php $availStatus=$val->availstatus;
                                    if($status==0){ ?>
            					<a href="<?php echo site_url();?>restaurant/changeAvailStatus?ord_id=<?php echo $val->ordid;?>" class="" >
            					<i class="fa fa-times text-danger"></i></a>
            					 <?php }else{ ?>
                        	<a href="<?php echo site_url();?>restaurant/changeAvailStatus?ord_id=<?php echo $val->ordid;?>" class="" >
                        	<i class="fa fa-check text-success"></i></a>		  
                        <?php } ?>
            				</span>
                                        
                 </td>
                 </tr>
                  <?php }} ?>
                  </table>                            
            </div>
            
           
		  </div>
        </div>	
		<?php } ?>	  
    </div>
</section>
	<!-- /.content -->
<div class="clear-fix"></div>
<div><img class="pull-right" src="<?php echo base_url();?>assets/images/powered-logo.png" width="120px;" height="50px;"></div>
<!-- ./wrapper -->
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
</script>
<script type="text/javascript">
    setTimeout(function () { 
      location.reload();
    }, 60 * 500);
</script>
</body>
</html>
