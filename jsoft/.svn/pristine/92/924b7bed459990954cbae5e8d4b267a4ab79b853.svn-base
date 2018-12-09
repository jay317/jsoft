<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="row">
			<div class="col-md-3">
			<?php if($list_type=='shop'){ ?>
		    <a class="btn btn-primary" href="<?php echo site_url('optics/order');?>">Make Order</a>
			<?php }else{}?>
		    </div>
			<div class="col-md-6">
					 <?php if ($this->session->flashdata('msg_error')) { ?>
						<div class="alert alert-danger col-md-6"> <?= $this->session->flashdata('msg_error') ?> </div>
					<?php } ?>
					<?php if ($this->session->flashdata('msg_success')) { ?>
						<div class="alert alert-info col-md-6"> <?= $this->session->flashdata('msg_success') ?> </div>
					<?php } ?>
					<?php if ($this->session->flashdata('msg_delete')) { ?>
					<div class="alert alert-danger col-md-6"> <?= $this->session->flashdata('msg_delete') ?> </div>
				<?php } ?>
			</div>
			<div class="col-md-3">
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Order</a></li>
					<li class="active">Dashboard</li>
				</ol>
		    </div>
		</div>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-xs-12">
				<div class="  box">
					<div class="box-header">
						<h3 class="box-title">Order List</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example" class="table table-striped table-bordered table-hover"
							cellspacing="0" width="100%">
							<thead>
                <tr>
                  <th>Order No.</th>
                  <th>Name</th>
                  <th>Mobile</th>                  
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody> 
					<?php  $i=1;
					foreach ($orderList as $row){ ?>					
				 <tr>
                  <td><?php echo $row->icw_opt_Id0317; ?></td>
                  <td><?php echo ucfirst($row->icw_opt_cName0317); ?></td>
                  <td><?php echo ucfirst($row->icw_opt_cMobile0317); ?></td>
                                  
                  <td><?php echo getDateFormat_d($row->icw_opt_date0317); ?></td>
				  <td>
						<?php if($list_type=='shop'){
								$balStuts=$row->icw_opt_balance0317;
								$dispStuts=$row->icw_opt_dispatch0317; 
								if($balStuts==0)
								{
									echo '<span class="label label-success">Paid</span>';
								}else{
									echo '<span class="label label-default">Due</span>';
								}
								if($dispStuts==1)
								{
									echo '&nbsp;<span class="label label-success">Dispatched</span>';
								}else{
									echo '&nbsp;<span class="label label-default">Pending</span>';
								}
								
							}else{
								$dispStuts=$row->icw_opt_dispatch0317; 
								if($dispStuts==1)
								{
									echo '<span class="label label-success">Dispatched</span>';
								}else{
									echo '<span class="label label-default">Pending</span>';
								}
						}?>
				  </td>				   
				  <td>
					<?php if($list_type=='lab'){ ?>
						<a class="btn btn-info btn-sm" href="<?php echo base_url();?>optics/orderComplete/?ord_no=<?php echo $id=$row->icw_opt_orderNo_0317;?>&print=ord_check">Check Order</a>
						<?php }else{?>
							<a class="btn btn-info btn-sm"  href="<?php echo base_url();?>optics/orderComplete/?ord_no=<?php echo $id=$row->icw_opt_orderNo_0317;?>&print="><?php if($balStuts==0){echo "Delivered";}else{echo "Delivery";}?></a>
							<a class="btn btn-danger btn-sm" onclick="deleteOrder(<?php echo $id=$row->icw_opt_Id0317;?>);">Delete</a>
							<?php }?>
				  </td>
                </tr>
				<?php } ?>
			   </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</section>
	<!-- /.content -->
</div>


<!-- /.content-wrapper -->
<div class="control-sidebar-bg"></div>
</div>

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

function deleteOrder(id){
	var id=id;
	swal({
		  title: 'Are you sure?',
		  text: "Do you want to delete",
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
	url = "<?php echo site_url('optics/delete_Order?del_id="+id+"');?>";
	 $.post(url, {id: id}, function(result){
			   if(result=='1'){
				   window.location.reload();
			   }
	        });
	  }});	
	}


</script>

</body>
</html>
