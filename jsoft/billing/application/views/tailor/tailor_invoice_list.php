<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="row">
			<div class="col-md-3">
			
		    <a class="btn btn-primary" href="<?php echo site_url('tailor/order');?>">Make Order</a>
			
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
						<h3 class="box-title">Invoice List</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example" class="table table-striped table-bordered table-hover"
							cellspacing="0" width="100%">
							<thead>
                <tr>
                  <th>Order No.</th>
                  <th>Total</th>
                  <th>Advance</th>                  
                  <th>Balance</th>
                  <th>Date</th>
                   <th>Mobile</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody> 
					<?php  $i=1;
					foreach ($result as $row){ ?>					
				 <tr>
                  <td><?php echo $row->id; ?></td>
                  <td><?php echo $row->total; ?></td>
                  <td><?php echo $row->advance; ?></td>
                  <td><?php echo $row->balance; ?></td>               
                  <td><?php echo getDateFormat_d($row->date); ?></td>
                  <td><?php echo $row->mobile; ?></td>
				  <td>
						<?php 
								$balStuts=$row->balance;
								 
								if($balStuts==0)
								{
									echo '<span class="label label-success">Paid</span>';
								}else{
									echo '<span class="label label-default">Due</span>';
								}
								
								
							
						?>
				  </td>				   
				  <td>
					
						<a class="btn btn-danger btn-sm" onclick="deleteOrder(<?php echo $id=$row->id;?>);">Delete</a>
							
				  </td>
                </tr>
				<?php } ?>
			   </tbody>
			   <tfoot style="height:50px;"></tfoot>
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
	url = "<?php echo site_url('tailor/delete_Order?del_id="+id+"');?>";
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
