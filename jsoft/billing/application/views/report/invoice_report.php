
	<section class="content-header">
			<!-- <a class="btn btn-primary"
			href="<?php// echo site_url('excel_export/export');?>">Excel export</a>-->
		<ol class="breadcrumb"> 
			<li><a href="#"><i class="fa fa-dashboard"></i>Invoice Report</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content" style="margin-top:10px;">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-xs-12">
				<div class="  box">
					<div class="box-header">
						<h3 class="box-title">Invoice Report</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example" class="table table-striped table-bordered table-hover"
							cellspacing="0" width="100%">
							<thead class="bg-danger">
								<tr>
									<th>Action</th>
									<th>Invoice No.</th>
									<th>Status</th>									
									<th>Date</th>
									<th>Name</th>
									<th>Mobile</th>
									<th>Shop Name</th>
									<th>Amount</th>
									<th>Paid</th>
									<th>Balance</th>
								</tr>
							   </thead>	
							<tbody>
							<?php foreach($getinvoiceReport as $row):?>
								<tr class="bg-success">
									<td>
									<div class="btn-group">
										 <a  title="Print" href="<?php echo site_url('sale/invoicePrint?id='.$row->invoid);?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-print" aria-hidden="true"></i></a> 
										 <a title="Delete" onclick="deleteInvoice(<?php echo $id=$row->invoid;?>);" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a> 						
									  	<a data-toggle="modal" onclick="getData('<?php echo $id=$row->invoid;?>')" title="cliet registration" data-backdrop="static" data-keyboard="false" data-target="#dueModal" id="j_form" class="btn btn-primary btn-xs" accesskey="1"><i class="fa fa-trash" aria-hidden="true"></i></a>
									</td>
									<td><?php echo $row->invoid; ?></td>
									<td>
									<?php 
									if($row->balance == 0)
									{
									echo '<span class="label label-success">Paid</span>'; 
									}else{
										echo '<span class="label label-info">Due</span>';
									}
									?></td>									
									<td><?php echo getDateFormat_dm($row->invodate); ?></td>
									<td><?php echo $row->clientname; ?></td>
									<td><?php if($row->clientmobile !=''){echo $row->clientmobile;}else{echo $row->customermobile;} ?></td>
									<td><?php echo $row->clientbtitle; ?></td>
									<td><?php echo $row->total;?></td>
									<td><?php echo $row->paid;?></td>
									<td><?php echo $bal=$row->balance;?></td>
								</tr>
							<?php endforeach;?>
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

<!-- Modal -->
<div class="modal" id="dueModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default close"
					data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<!-- ./wrapper -->
<script>
$(document).ready(function() {
    $('#example').DataTable({
    	  "scrollX": true
        });
} );

function deleteInvoice(id){
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
url = "<?php echo site_url('report/deleteInvoice?id="+id+"');?>";
 $.post(url, {id: id}, function(result){
		   if(result=='1'){
			   window.location.reload();
		   }
        });
  }});	
}

function getData(e){
	$.ajax({
	    type: "post",
	    data: {id:e} ,
	    url: "<?php echo site_url('report/getDueDetail');?>",
	    success: function (response) {
	       $(".modal-body").html(response);
	    },
	    error: function(jqXHR, textStatus, errorThrown) {
	       console.log(textStatus, errorThrown);
	    }


	});
	}
</script>

</body>
</html>
