
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
            <?php //	echo print_r($rslt);?>        
              <div class="box-body">
				<div class="row">
					<?php $settingDetails=$this->session->userdata('settingDetails');?>
					<div class="col-md-2 panel panel-info col-md-offset-3">
						<div class="printArea">
						<table class="table1 table-responsive table-barderd">
						<tr><td colspan=2><center><ul class="list-unstyled"><li><?php if($settingDetails){ echo strtoupper($settingDetails->icw_shop_name0317);}?></li>
						<li><?php if($settingDetails){ echo ucwords($settingDetails->icw_shop_Address0317);}?></li>
						<li><?php if($settingDetails){ echo "Mob.&nbsp;" . strtoupper($settingDetails->icw_shop_mobile0317);}?></li>
							</ul></center></td></tr>						
						<tr><td width="50%">Invoice No.</td><td>#<?php echo $rslt->icw_tai_orderNo_0317;?></td></tr>
						 	<tr><td>Date: &nbsp;</td><td style="width:30%; font-size:12px;"><?php echo $today = date("d.m.Y");?></td></tr>
						 	<tr><td>GSTIN: &nbsp;</td><td><?php if($settingDetails){ echo strtoupper($settingDetails->icw_shop_gstin0317);}?></td></tr>							
							<tr><td>Paid: &nbsp;</td><td><i class="fa fa-inr" aria-hidden="true"></i><?php echo $rslt->icw_tai_totalAmt0317;?></p>
								</td>
							</tr>
							<tr><td colspan=2><center><strong>Thank You!</strong></center></td></tr>							
						</table>						
						</div>
					</div>
					</div>

				<div class="printBtnDiv">
						<button type="button" class="btn btn-info col-md-offset-4 printBtn" id="printBtn" onclick="PrintElem('.printArea');">Print</button>
				</div>
			  </div>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
            
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