
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="row">
			<div class="col-md-3">
		  <a class="btn btn-primary"
			href="<?php echo site_url('Category/addProsubCat');?>">Add Product Sub Category</a>
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
					<li><a href="#"><i class="fa fa-dashboard"></i> Category</a></li>
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
						<h3 class="box-title">Product Sub Category List</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example" class="table table-striped table-bordered table-hover"
							cellspacing="0" width="100%">
							<thead>
                <tr>
                  <th>Sr No.</th>
				  <th>Sub Category Name</th>
                  <th>Product Category Name</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody> 
					<?php  $i=1;
					foreach ($getPsubcat as $row){ ?>					
				 <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo ucfirst($row->icw_scn0318); ?></td>
                  <td><?php echo ucfirst($row->icw_cn0318); ?></td>
				  <td><?php echo ucfirst($row->icw_scd0319); ?></td>
				  <td>
						<?php $stuts=$row->icw_isa0320; 
							if($stuts==1)
							{
								echo '<span class="label label-success">Active</span>';
							}else{
								echo '<span class="label label-default">InActive</span>';
							} ?>
				  </td>
				  <td>
				  <a class="btn btn-info btn-xs" href="<?php echo base_url();?>Category/addProsubCat/<?php echo $id=$row->icw_sci0317;?>">Edit</a>
                  <a class="btn btn-danger btn-xs" onclick="deleteSubCategory('<?php echo $id=$row->icw_sci0317;?>');">Delete</a></td>
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
		
function deleteSubCategory(id){
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
url = "<?php echo site_url('Category/deleteProductsubCat?id="+id+"');?>";
 $.post(url, {id: id}, function(result){
		   if(result=='1'){
			   window.location.reload();
		   }
		   if(result=='0'){
			swal('Sorry!','Delete products of this sub category first .','error');    
		   }
        });
  }});	
}
</script>

</body>
</html>
