
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
            <form class="form-horizontal" id="addForm" method="post" action="<?php echo site_url('taiics/taiOrderSave');?>">         
              <div class="box-body">
				<div class="row">
					<div class="col-md-5 col-md-offset-3">
						<div class="bg-info" style="padding:10px;"><center><strong style="font-size:34px;">Oreder Receipt</h2></strong></div>
						<table class="table table-responsive panel panel-default">
							<tr><td>
								<strong>Order no.</strong>&nbsp;<p><?php echo $rslt->icw_tai_orderNo_0317;?></p>
								</td>
								<td><strong>Date</strong>&nbsp;<p><?php $date=$rslt->icw_tai_date0317; echo $date=date("d/m/Y", strtotime($date))?></p>
								</td>
							</tr>
							<tr><td>
								<strong>Cloth</strong>&nbsp;<p><?php echo ucwords($rslt->icw_tai_type_0317);?></p>
								<strong>Quantity</strong>&nbsp;<p><?php echo ucwords($rslt->icw_tai_qty_0317);?></p>
								</td>
								<td><h4><u>Measurement</u></h4>
									<ul class="list-unstyled">
									<?php if($rslt->icw_tai_length_0317 !=0){?>
									  <li>Length &nbsp;&nbsp; <?php echo $rslt->icw_tai_length_0317;?></li>
									  <?php } ?>
									  <?php if($rslt->icw_tai_fork_0317 !=0){?>
									  <li>Fork &nbsp;&nbsp; <?php echo $rslt->icw_tai_fork_0317;?></li>
									  <?php } ?>
									  <?php if($rslt->icw_tai_waist_0317 !=0){?>
									  <li>Waist &nbsp;&nbsp; <?php echo $rslt->icw_tai_waist_0317;?></li>
									  <?php } ?>
									  <?php if($rslt->icw_tai_thighs_0317 !=0){?>
									  <li>Thighs &nbsp;&nbsp; <?php echo $rslt->icw_tai_thighs_0317;?></li>
									  <?php } ?>
									  <?php if($rslt->icw_tai_hip_0317 !=0){?>
									  <li>Hip &nbsp;&nbsp; <?php echo $rslt->icw_tai_hip_0317;?></li>
									  <?php } ?>
									  <?php if($rslt->icw_tai_knee_0317 !=0){?>
									  <li>Knee &nbsp;&nbsp; <?php echo $rslt->icw_tai_knee_0317;?></li>
									  <?php } ?>
									  <?php if($rslt->icw_tai_bottom_0317 !=0){?>
									  <li>Bottom &nbsp;&nbsp; <?php echo $rslt->icw_tai_bottom_0317;?></li>
									  <?php } ?>
									  <?php if($rslt->icw_tai_shoulder_0317 !=0){?>
									  <li>Shoulder &nbsp;&nbsp; <?php echo $rslt->icw_tai_shoulder_0317;?></li>
									  <?php } ?>
									  <?php if($rslt->icw_tai_chest_0317 !=0){?>
									  <li>Chest &nbsp;&nbsp; <?php echo $rslt->icw_tai_chest_0317;?></li>
									  <?php } ?>
									  <?php if($rslt->icw_tai_stomach_0317 !=0){?>
									  <li>Stomach &nbsp;&nbsp; <?php echo $rslt->icw_tai_stomach_0317;?></li>
									  <?php } ?>
									  <?php if($rslt->icw_tai_hLength_0317 !=0){?>
									  <li>Hand Length &nbsp;&nbsp; <?php echo $rslt->icw_tai_hLength_0317;?></li>
									  <?php } ?>
									  <?php if($rslt->icw_tai_front_0317 !=0){?>
									  <li>Front &nbsp;&nbsp; <?php echo $rslt->icw_tai_front_0317;?></li>
									  <?php } ?>
									  <?php if($rslt->icw_tai_collor_0317 !=0){?>
									  <li>Collor &nbsp;&nbsp; <?php echo $rslt->icw_tai_collor_0317;?></li>
									  <?php } ?>
									  <?php if($rslt->icw_tai_back_0317 !=0){?>
									  <li>Back &nbsp;&nbsp; <?php echo $rslt->icw_tai_back_0317;?></li>
									  <?php } ?>
									</ul>
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
								</td>
								<td><?php if($rslt->icw_tai_advance0317==0 && $rslt->icw_tai_balance0317==0){?><span class="badge badge-success">Paid &nbsp;<i class="fa fa-check" aria-hidden="true"></i></span><?php }?></td>
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
						<a href="<?php echo site_url('tailor/orderList?list_type=shop');?>" class="btn btn-info col-md-offset-5">Back</a>
						<?php if($rslt->icw_tai_balance0317 !=0 AND $rslt->icw_tai_dispatch0317 ==1){?>
						<a href="<?php echo site_url('tailor/orderComplete/?ord_no='.$rslt->icw_tai_orderNo_0317.'&print=invoice');?>" type="button" class="btn btn-success">Paid</a>
						<?php }else{}?>
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

</script>