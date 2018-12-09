
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
            <form class="form-horizontal" id="addForm" method="post" action="<?php echo site_url('optics/optOrderSave');?>">         
              <div class="box-body">
				<div class="row">
					<div class="col-md-5 col-md-offset-3">
						<div class="bg-info" style="padding:10px;"><center><strong style="font-size:34px;">Delivery Order</h2></strong></div>
						<table class="table table-responsive panel panel-info" style="margin-top:0px">
							<tr><td>
								<strong>Order no</strong>&nbsp;<p><?php echo $rslt->icw_opt_orderNo_0317;?></p>
								</td>
								<td><strong>Date</strong>&nbsp;<p><?php $date=$rslt->icw_opt_date0317; echo $date=date("d/m/Y", strtotime($date))?></p>
								</td>
							</tr>
							<tr><td>
								<strong>Frame</strong>&nbsp;<p><?php echo ucwords($rslt->icw_opt_frame0317);?></p>
								</td>
								<td><strong>Lenses</strong>&nbsp;<p><?php echo ucwords($rslt->icw_opt_lense0317);?></p>
								</td>							
							</tr>							
							</table>
							<table class="table table-responsive table-bordered">
								<tr><td><i class="fa fa-eye" style="font-size:18px;"></i></td><td><strong>Right</strong></td><td><strong>Left</strong></td></tr>
								<tr><td><strong>Sph</strong></td><td><?php if($rslt->icw_rdSph0317 !=0){echo "+" . $rslt->icw_rdSph0317;}?><?php if($rslt->icw_rnSph0317 !=0){echo "-" . $rslt->icw_rnSph0317;}?></td><td><?php if($rslt->icw_ldSph0317 !=0){echo "+" . $rslt->icw_ldSph0317;}?><?php if($rslt->icw_lnSph0317 !=0){echo "-" . $rslt->icw_lnSph0317;}?></td></tr>
								<tr><td><strong>Cyl</strong></td><td><?php if($rslt->icw_rdCyl0317 !=0){echo "+" . $rslt->icw_rdCyl0317;}?><?php if($rslt->icw_rnCyl0317 !=0){echo "-" . $rslt->icw_rnCyl0317;}?></td><td><?php if($rslt->icw_ldCyl0317 !=0){echo "+" .$rslt->icw_ldCyl0317;}?><?php if($rslt->icw_lnCyl0317 !=0){echo "-" . $rslt->icw_lnCyl0317;}?></td></tr>
								<tr><td><strong>Axis</strong></td><td><?php if($rslt->icw_rdAxis0317 !=0){echo "+" . $rslt->icw_rdAxis0317;}?><?php if($rslt->icw_rnAxis0317 !=0){echo "-" . $rslt->icw_rnAxis0317;}?></td><td><?php if($rslt->icw_ldAxis0317 !=0){echo "+" .$rslt->icw_ldAxis0317;}?><?php if($rslt->icw_lnAxis0317 !=0){echo "-" .$rslt->icw_lnAxis0317;}?></td></tr>
							</table>
							
							
						<div class="form-group">
						<a href="<?php echo site_url('optics/orderList?list_type=lab');?>" class="btn btn-info col-md-offset-4">Back</a>
						<?php if($rslt->icw_opt_dispatch0317==0){?>
						<a href="<?php echo site_url('optics/orderDispatch/?ord_no='.$rslt->icw_opt_orderNo_0317.'&print=lab');?>" type="button" class="btn btn-success">Dispatch</a>
						<?php } ?>
						</div>
					</div>
				</div>
			  </div>
              <!-- /.box-body -->
              
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

</script>