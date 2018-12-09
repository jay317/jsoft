
	<section class="content-header">
			<!-- <a class="btn btn-primary"
			href="<?php// echo site_url('excel_export/export');?>">Excel export</a>-->
			<div class="col-sm-3">
					<span class="form-group input-group date col-md-8" data-provide="datepicker">
						<input type="text" id="datepicker" name="date" class="form-control" placeholder="Date">
						<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
						</span>						
					</span>
                  </div>
			<div class="col-sm-2">
							<select class="form-control tableSelect" name="table_no" id="sel_tbl" my-data="t">
								<option value=''>Table/Parcel</option>
								<option value='p'>Parcel</option>
                      <?php foreach($table_list as $row){?>	
                    <option
									value="<?php
                        echo $row->tname;
                        ?>"><?php if($row->tname!=''){echo $row->tname;}?></option>
                      <?php }?>		
                    </select>
						</div>
						<div class="col-sm-2">
							 <select class="form-control servingBy" id="sel_serv" my-data="s">
								<option value=''>Servitor</option>
								<?php foreach($servitor_list as $servitor){ ?>
								<option value="<?php echo $servitor->sno;?>"><?php echo $servitor->sno;?></option>
								<?php } ?>
							</select>
						</div>
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
									<th>Date</th>
									<th>Invoice No.</th>
									<th>Table/Parcel</th>									
									<th>Order Type</th>
									<th>Servitor</th>
									<th>Amount</th>
									<th>Tax Amount</th>
									<th>Discount Amt</th>
									<th>Pay Amount</th>									
								</tr>
							   </thead>	
							<tbody>
							<?php foreach($invo_list as $row):?>
								<tr class="bg-success">
									<td>
									<div class="btn-group">
										 <a  title="Print" href="<?php echo site_url('restaurant/invoicePrint?ordno='.$row->ordno.'&tblno='.$row->tblno.'&date='.$row->date.'&invono='.$row->invono);?>" target="_blank" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i></a> 
										 <a title="Delete" onclick="getInvoDel('<?php echo $invoNo=$row->invono;?>');" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> 						
									  
									</td>
									<td><?php echo getDateFormat_d($row->date);?></td>
									<td><?php echo $row->invono; ?></td>
									<td><?php echo $row->tblno; ?></td>									
									<td><?php  if($row->ordtype ==2){echo "Parcel";}else{echo "DineIn";}; ?></td>
									<td><?php  echo $row->servno; ?></td>
									<td><?php  echo $row->total; ?></td>
									<td><?php  echo $row->totaltax; ?></td>
									<td><?php  echo $row->discountamt; ?></td>
									<td><i class="fa fa-inr"></i><?php  echo round( $row->payamt); ?></td>		
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
<div class="modal" id="filterModal">

</div>

<!-- ./wrapper -->
<script>
$(document).ready(function() {
    $('#example').DataTable({
    	  "scrollX": true
        });
    $( "#datepicker" ).datepicker("setDate" , new Date()).on('change', function(){
        $('.datepicker').hide();
    });
});

function getInvoDel(invoNo){
	swal({
		  title: 'Are you sure?',
		  text: "You want to delete this record " + invoNo,
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
				$.post( "<?php echo site_url('restaurant/getInvoDel?invoNo="+invoNo+"');?>", function( data ) {
					if(data==1){
						window.location.reload();
						}else{}
					});
	  }});

}

$('#sel_tbl,#sel_serv').on('change',function(){
	
	var tblno=$(this).val();alert(tblno);
	var typ=$(this).attr('my-data');
	if(tblno !=''){
    	if(tblno == 'p'){
    		typ='p';
    		}
    	$.post("<?php echo site_url('restaurant/getFilter?id="+tblno+"&typ="+typ+"');?>",function(dt){
        	$("#filterModal").modal('show');
        	$("#filterModal").html(dt);
    		//alert(dt);
    		});
	}else{
		return false;
		}
});

</script>

</body>
</html>
