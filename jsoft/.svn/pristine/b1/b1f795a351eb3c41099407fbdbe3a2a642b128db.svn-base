
	<section class="content-header">
		<div class="row">
			<div class="col-md-9">
			<a class="btn btn-primary"
				href="<?php echo site_url('inventory/getStock');?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
			</div>
			<div class="col-md-3">
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i>Product Stock</a></li>
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
						<h3 class="box-title">Product Stock</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example" class="table table-striped table-bordered table-hover"
							cellspacing="0" width="100%">
							<thead>
                <tr>
                  <th>Product</th>
                  <th>Quantity</th>
                </tr>
                </thead>
                <tbody> 
					<?php  $i=1;
					foreach ($getProductStock as $row){ ?>					
				 <tr>             
                  <td><?php echo ucfirst($row->product); ?></td>
                  <td><?php echo $row->quantity; ?></td>
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
