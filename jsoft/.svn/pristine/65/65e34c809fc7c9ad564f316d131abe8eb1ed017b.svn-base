
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $page_title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Order</a></li>
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
            <!-- form start -->
            <?php  //print_r($rslt);?>        
              <div class="box-body">
				<div class="row">
					<div class="col-md-5 panel panel-info col-md-offset-3 printArea">
						<?php $settingDetails=$this->session->userdata('settingDetails');?>
						<h4 style="padding:0px; margin:0px;"><center><?php if($settingDetails){ echo strtoupper($settingDetails->icw_shop_name0317);}?></center></h4>
						<p style="padding:0px; margin:0px;"><center><?php if($settingDetails){ echo ucwords($settingDetails->icw_shop_Address0317);}?></center></p>
						<p style="padding:0px; margin:-12px;"><center><?php if($settingDetails){ echo "Mob.&nbsp;" . $settingDetails->icw_shop_mobile0317;}?></center></p>
						<h5 style="padding:0px; margin:0px;"><center><u>Receipt</u></center></h5>
						<table class="table table-responsive">
							<tr><td>
								<strong>Order no.</strong>&nbsp;<p><?php echo $rslt->icw_tai_orderNo_0317;?></p>
								</td>
								<td><strong>Date</strong>&nbsp;<p><?php echo getDateFormat_d($rslt->icw_tai_date0317);?></p>
								</td>
							</tr>
							<tr><td>
								<strong>Cloth</strong>&nbsp;<p><?php echo ucwords($rslt->icw_tai_type_0317);?></p>
								</td>
								<td>
								<strong>Quantity</strong>&nbsp;<p><?php echo ucwords($rslt->icw_tai_qty_0317);?></p>
								</td>
							</tr>
							<tr><td>
								<strong>Name</strong>&nbsp;<p><?php echo ucwords($rslt->icw_tai_cName0317);?></p>
								</td>
								<td><strong>Mobile</strong>&nbsp;<p><?php echo $rslt->icw_tai_cMobile0317;?></p>
								</td>
							</tr>
							<tr>
									
							</tr>
							<tr><td>
								<strong>Total Amount</strong>&nbsp;<p><?php echo getCurrencyDouble($rslt->icw_tai_totalAmt0317);?></p>
								</td><td></td>
							</tr>
							<tr><td>
								<strong>Advanced</strong>&nbsp;<p><?php echo getCurrencyDouble($rslt->icw_tai_advance0317);?></p>
								</td>
								<td><strong>Balance</strong>&nbsp;<p><?php echo getCurrencyDouble($rslt->icw_tai_balance0317);?></p>
								</td>
							</tr>
						</table>
					</div>
				</div>
			  </div>
              <!-- /.box-body -->
              <div class="row" style="padding-bottom:20px;">
						<a href="<?php echo site_url('tailor/orderList?list_type=shop');?>" class="btn btn-default col-md-offset-5">Back</a>
						<button type="button" class="btn btn-info" onclick="PrintElem('.printArea');" >Print</button>
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
function PrintElem(elem) {
    Popup($(elem).html());
}

function Popup(data) {
      var mywindow = window.open('', 'new div', 'height=400,width=600');
      mywindow.document.write('<html><head><title></title>');
      mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" type="text/css" />');
	  mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" type="text/css" />');
      mywindow.document.write('</head><body >');
      mywindow.document.write(data);
      mywindow.document.write('</body></html>');
      mywindow.document.close();
      mywindow.focus();
      setTimeout(function(){mywindow.print();},1000);
      //mywindow.close();

      return true;
}
</script>