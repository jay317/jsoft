
	<section class="content-header">
	    <div class="row">
			<div class="col-md-3">
			<a class="btn btn-primary"
				href="<?php echo site_url('inventory/addSupplier');?>">Add Supplier</a>
			</div>
			<div class="col-md-6">
					 <?php if ($this->session->flashdata('msg_error')) { ?>
						<div class="alert alert-danger col-md-6 col-md-offset1-2"> <?= $this->session->flashdata('msg_error') ?> </div>
					<?php } ?>
					<?php if ($this->session->flashdata('msg_success')) { ?>
						<div class="alert alert-info col-md-6 col-md-offset1-2"> <?= $this->session->flashdata('msg_success') ?> </div>
					<?php } ?>
					<?php if ($this->session->flashdata('msg_delete')) { ?>
					<div class="alert alert-danger col-md-6"> <?= $this->session->flashdata('msg_delete') ?> </div>
				<?php } ?>
			</div>
			<div class="col-md-3">
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i>Supplier</a></li>
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
						<h3 class="box-title">Supplier List</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example" class="table table-striped table-bordered table-hover"
							cellspacing="0" width="100%">
							<thead>
                <tr>
                  <th>Action</th>
                  <th>Supplier Name</th>
                  <th>Mobile</th>
				  <th>Email</th>
				  <th>Company Name</th>
				  <th>Address</th>
                  <th>Status</th>
                  
                </tr>
                </thead>
                <tbody> 
					<?php  $i=1;
					foreach ($getSupplier as $row){ ?>					
				 <tr>
                  <td>
                  <div class="btn-group">
					  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
						Action &nbsp;<span class="caret"></span>						
					  </button>
					  <ul class="dropdown-menu" role="menu">						
						<li><a href="<?php echo base_url();?>inventory/addSupplier/?sup_id=<?php echo $row->icw_supplier_id0317;?>"><i class="fa fa-pencil-square-o text-success" aria-hidden="true"></i><span class="text-success">Edit Supplier</span></a></li>
						<li><a onclick="return confirm(' you want to delete?');" href="<?php echo base_url();?>inventory/deleteSupplier/?sup_id=<?php echo $row->icw_supplier_id0317;?>"><i class="fa fa-trash text-danger" aria-hidden="true"></i><span class="text-danger">Delete Supplier</span></a></li>						
					  </ul>
					</div>
					</td>
                  <td><?php echo ucfirst($row->icw_supplier_name0317); ?></td>
                  <td><?php echo $row->icw_supplier_mobile0317; ?></td>
				  <td><?php echo ucfirst($row->icw_supplier_email0317); ?></td>
				  <td><?php echo ucfirst($row->icw_supplier_companyName0317); ?></td>
				  <td><?php echo ucfirst($row->icw_supplier_companyAddr0317); ?></td>
				  <td>
						<?php $stuts=$row->icw_supplier_isactive0317; 
							if($stuts==1)
							{
								echo '<span class="label label-success">Active</span>';
							}else{
								echo '<span class="label label-default">InActive</span>';
							} ?>
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
} );
setTimeout(function() {
            $('.alert').hide('fast');
        }, 10000);
</script>

</body>
</html>
