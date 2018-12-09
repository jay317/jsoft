
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="row">
			<div class="col-md-3">
		  <a class="btn btn-primary"
			href="<?php echo site_url('restaurant/tableAdd');?>">Add Tables</a>
		 <a class="btn btn-primary"
			href="<?php echo site_url('restaurant/servitorAdd');?>">Add Servitor</a>
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
					<li><a href="#"><i class="fa fa-dashboard"></i>Table</a></li>
					<li class="active">Dashboard</li>
				</ol>
		    </div>
		</div>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-xs-6">
				<div class="  box">
					<div class="box-header">
						<h3 class="box-title">Table List</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example" class="table table-striped table-bordered table-hover"
							cellspacing="0" width="100%">
							<thead>
                <tr>
                  <th>Table No.</th>
                  <th>Seats</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody> 
					<?php  $i=1;
					foreach ($table_list as $row){ ?>					
				 <tr>
                  <td><?php echo ucfirst($row->tname); ?></td>
                  <td><?php echo ucfirst($row->seat); ?></td>
				  <td><img src="<?php echo base_url();if($row->img !=''){echo 'uploads/restaurant-images/'. $row->img;}else{echo 'assets/images/no-image.gif' . $row->img;}?>" width="100px;" height="100px;"></td>
				  <td>
				  <a class="btn btn-info btn-xs" href="<?php echo base_url();?>restaurant/tableAdd/<?php echo $id=$row->tid;?>">Edit</a>
                  <a class="btn btn-danger btn-xs" onclick="return confirm(' you want to delete?');" href="<?php echo base_url();?>restaurant/deleteTable/?id=<?php echo $id=$row->tid;?>">Delete</a></td>
                </tr>
				<?php } ?>
			   </tbody>
						</table>
					</div>
				</div>
			</div>
			
			<div class="col-xs-6">
				<div class="  box">
					<div class="box-header">
						<h3 class="box-title">Servitor List</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example2" class="table table-striped table-bordered table-hover"
							cellspacing="0" width="100%">
							<thead>
                <tr>
                  <th>Servitor No.</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody> 
					<?php  $i=1;
					foreach ($servitor_list as $row){ ?>					
				 <tr>             
                  <td><?php echo ucfirst($row->sno); ?></td>
                  <td><?php echo ucfirst($row->sname); ?></td>
				  <td><img src="<?php echo base_url();if($row->img !=''){echo 'uploads/restaurant-images/'. $row->img;}else{echo 'assets/images/no-image.gif' . $row->img;}?>" width="100px;" height="100px;"></td>
				  <td>
				  <a class="btn btn-info btn-xs" href="<?php echo base_url();?>restaurant/servitorAdd/<?php echo $id=$row->sid;?>">Edit</a>
                  <a class="btn btn-danger btn-xs" onclick="return confirm(' you want to delete?');" href="<?php echo base_url();?>restaurant/deleteServitor/?id=<?php echo $id=$row->sid;?>">Delete</a></td>
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
$(document).ready(function() {
    $('#example2').DataTable({
    	  "scrollX": true
        });
});
setTimeout(function() {
            $('.alert').hide('fast');
        }, 10000);
</script>

</body>
</html>
