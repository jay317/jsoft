
	<section class="content-header">
		<a class="btn btn-primary"
			href="<?php echo site_url('mainController/newUser');?>">Add User</a>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">User List</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body" >
						<table id="example" class="table table-striped table-bordered table-hover"
							cellspacing="0" width="100%" style="height: 50px;">
							<thead>
                <tr>
                  <th>Sr No.</th>
				  <th>Name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>User Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr> 
               </thead>
               <tbody>
					<?php  $i=1; if($allUser!=''){
					foreach ($allUser as $row){ ?>					
				 <tr>
                  <td><?php echo $i++; ?></td>
				  <td><?php echo ucfirst($row->icw_userFname0317);?></td>
				  <td><?php echo ucfirst($row->icw_userMobile0317);?></td>
				  <td><?php echo ucfirst($row->icw_userEmail0317);?></td>
                  <td><?php echo ucfirst($row->icw_userName0317);?></td>
				  <td>
						<?php $stuts=$row->icw_user_is_active0317; 
							if($stuts==1)
							{
								echo '<span class="label label-success">Active</span>';
							}else{
								echo '<span class="label label-default">InActive</span>';
							} ?>
				  </td>
				  <td>
				  <div class="btn-group">
					  <button type="button" class="btn btn-danger btn-sm">Action</button>
					  <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu" role="menu">						
						<li><a onclick="actionUser(<?php echo $id=$row->icw_userId0317;?>);" style="cursor:pointer"><i class="fa fa-refresh text-success" aria-hidden="true"></i><span class="text-success"><?php if($stuts==1){ echo "InActive User";}else{ echo "Active User";} ?></span></a></li>
						<li><a onclick="deleteUser(<?php echo $id=$row->icw_userId0317;?>);" style="cursor:pointer"><i class="fa fa-trash text-danger" aria-hidden="true"></i><span class="text-danger">Delete User</span></a></li>						
					  </ul>
					</div>
				  </td>
				  </tr>
				<?php }} ?>
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

function actionUser(id){
	var id=id;
	swal({
		  title: 'Are you sure?',
		  text: "Do you want to change mode",
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
	url = "<?php echo site_url('mainController/actionUser?act_id="+id+"');?>";
	 $.post(url, {id: id}, function(result){
			   if(result=='1'){
				   window.location.reload();
			   }
	        });
	  }});	
	}

function deleteUser(id){
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
	url = "<?php echo site_url('mainController/deleteUser?del_id="+id+"');?>";
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
