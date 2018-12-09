
	<section class="content-header">
		<a class="btn btn-primary"
			href="<?php echo site_url('Product/addProTax');?>">Add Product Tax</a>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Tax</a></li>
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
						<h3 class="box-title">Tax List</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example" class="table table-striped table-bordered table-hover"
							cellspacing="0" width="100%">
							 <thead>
                <tr>
                  <th>Sr No.</th>
                  <th>Tax Name</th>
                  <th>Sub Type</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody> 
					<?php  $i=1;
					foreach ($getPtax->result() as $row){ ?>					
				 <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo ucfirst($row->icw_taxName0317); ?></td>
                  <td>
                  <span id="btnView<?php echo $id=$row->icw_id0317;?>"><button class="btn btn-warning btn-xs" type="button" onclick="getSubTax(<?php echo $id=$row->icw_id0317;?>)">view</button></span>
                  <span class="" id="btnData<?php echo $id=$row->icw_id0317;?>" style="display:none;"><h6><i class="fa fa-window-close" aria-hidden="true" style="cursor:pointer;" onclick="closeTab(<?php echo $id=$row->icw_id0317;?>)"></i></h6><span id="btnData2<?php echo $id=$row->icw_id0317;?>"></span></span>
                  </td>
				  <td><?php echo ucfirst($row->icw_taxNote0317); ?></td>
				  <td>
						<?php $stuts=$row->icw_taxStatus0317; 
							if($stuts==1)
							{
								echo '<span class="label label-success">Active</span>';
							}else{
								echo '<span class="label label-default">InActive</span>';
							} ?>
				  </td>
				  <td>
				  <a class="btn btn-info btn-xs" href="<?php echo base_url();?>/product/addProTax/<?php echo $id=$row->icw_id0317;?>">Edit</a>
                  <a class="btn btn-danger btn-xs" onclick="deleteTax(<?php echo $id=$row->icw_id0317;?>)">Delete</a></td>
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
</script>
<script>
function getSubTax(j){
	$.ajax({
	    type: "post",
	    data: {dt:j} ,
	    url: "<?php echo site_url('product/getSubTaxById');?>",
	    success: function (response) {
		//alert(response);
		$("#btnData2"+j).html(response);
		$("#btnData"+j).show();
		$("#btnView"+j).hide();
	    },
	    error: function(jqXHR, textStatus, errorThrown) {
	       console.log(textStatus, errorThrown);
	    }
	});
}

function closeTab(e){
	$("#btnData"+e).hide();
	$("#btnView"+e).show();
	$("#btnData"+e).hide();
	$('#mytbl').load(document.URL +  ' #mytbl');
}

function deleteTax(id){
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
url = "<?php echo site_url('product/deleteProductTax?id="+id+"');?>";
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
