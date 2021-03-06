
    <section class="content-header">
      <h1>
        <?php echo $page_title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Tax</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
	<?php
	if($getTaxByIds){
	 $getTaxById=$getTaxByIds['$query1'];
	 $getSubTaxByIds=$getTaxByIds['$query2'];
	}else{
		$getTaxById='';
	 $getSubTaxByIds='';
	}
	 ?>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border bg-success">
              <div><h2 class="box-title"> 
			  <a href="<?php echo site_url('product/proTax');?>" class="btn btn-default btn-js"><i class="fa fa-arrow-left" aria-hidden="true" align="left"></i></a>
			  &nbsp;&nbsp;&nbsp;
			  <?php if($getTaxById!=''){ echo "Edit";}else { echo "Add";}?> Product Tax</h2></div>
			  <?php if ($this->session->flashdata('message_error')) { ?>
				<div class="alert alert-danger col-md-4 col-md-offset-4"> <?= $this->session->flashdata('message_error') ?> </div>
			<?php } ?>
			<?php if ($this->session->flashdata('message_success')) { ?>
				<div class="alert alert-info col-md-4 col-md-offset-4"> <?= $this->session->flashdata('message_success') ?> </div>
			<?php } ?>
			<?php if ($this->session->flashdata('message_empty')) { ?>
				<div class="alert alert-danger col-md-4 col-md-offset-4"> <?= $this->session->flashdata('message_empty') ?> </div>
			<?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if($getTaxById!=''){?>
            <form class="form-horizontal" id="addForm" method="post" action="<?php echo site_url('product/addProductTax');?>?updt=update">
            <input type="hidden" name="hidden_id" value="<?php echo $getTaxById->icw_id0317; ?>">
             <?php }else{?>
             <form class="form-horizontal" id="addForm" method="post" action="<?php echo site_url('product/addProductTax');?>">
             <?php }?>
              <div class="box-body">
                <div class="form-group">
                  <label for="categoryName" class="col-sm-2 control-label">Tax Name*</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php if($getTaxById){echo $getTaxById->icw_taxName0317;} ?>" class="form-control" name="taxName" id="taxName" placeholder="Tax Name" required>
                  </div>
                </div>
				 <div class="form-group">
                  <label for="" class="col-sm-2 control-label"></label>
                  <div class="col-sm-4">
                  <div class="moreDiv">
                    <button type="button" class="btn btn-primary jAdd" onclick="jMoreRows()" id="jAdd">+ Add</button>
                  </div> 
                  <div class="moreTableDiv">
                    <table class="table table-responsive">
                    <thead class="bg-info">
                    <th><i class="fa fa-trash-o" aria-hidden="true"></th>
                    <th>Name</th>
                    <th>Percent</th>
                    </thead>
                    <tbody id="subTable">
                    <?php if($getSubTaxByIds ==''){?>
	                    <tr>
		                    <td><button id="remove" class="btn btn-round btn-danger btn-xs" type="button"><i class="fa fa-close"></i></button></td>
		                    <td><input class="form-control" name="subTaxName[]" id=""></td>
		                    <td><input type="text" class="form-control taxperc" name="subTaxPercent[]" id=""></td>
	                    </tr>
	                  <?php }else{ foreach($getSubTaxByIds as $getSubTaxById):?>
	                   <tr>
		                    <td><button id="remove" class="btn btn-round btn-danger btn-xs" type="button"><i class="fa fa-close"></i></button></td>
		                    <td><input type="text" class="form-control" name="subTaxName[]" value="<?php if($getSubTaxById){echo $getSubTaxById->icw_subTaxName0317;}?>"></td>
		                    <td><input type="text" class="form-control taxperc" name="subTaxPercent[]" value="<?php if($getSubTaxById){echo $getSubTaxById->icw_subTaxPercent0317;}?>"></td>
	                    </tr>
	                  <?php endforeach;}?>
                    </tbody>
                    </table>
                   </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="categoryDescription" class="col-sm-2 control-label">Tax Description</label>

                  <div class="col-sm-6">
                    <textarea name="taxDescription" class="form-control" id="taxDescription" placeholder="Product Category Description"> <?php if($getTaxById){echo $getTaxById->icw_taxNote0317;}?></textarea>
                  </div>
                </div>
                
                 <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-6">
					 <select name="isactive" class="form-control">					 
					  <option value="1" <?php if($getTaxById){ if($getTaxById->icw_taxStatus0317==1){echo " selected"; }}?> >Active</option>
					  <option value="0" <?php if($getTaxById){if($getTaxById->icw_taxStatus0317==0){echo " selected"; }}?> >InActive</option>
                     </select> 
				  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo site_url('product/proTax');?>" class="btn btn-default col-md-offset-4" id="frmRest">Back</a>
                <button type="submit" class="btn btn-info">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
		  </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!--- /scripts --->

<script>
	 $('#frmRest').click(function(){ 
        $('#addForm')[0].reset();
	 });
</script>
<script>
var rowCount = 1;
function jMoreRows(e) {
		rowCount ++;
		var recRow = '<tr id="rowCount'+rowCount+'" class="get"><tr><td><button id="remove"  getId="'+rowCount+'" class="btn btn-round btn-danger btn-xs" type="button"><i class="fa fa-close"></i></button></td><td class="row_number"> <input class="form-control" type="text" name="subTaxName[]"  id="subTaxName'+rowCount+'" ></td><td ><input class="form-control taxperc" type="text" name="subTaxPercent[]"  id="subTaxPercent'+rowCount+'" ></td></tr></tr>';
		jQuery('#subTable').append(recRow); 
		return false;		
		} 
		
 $(document).on('click', 'button#remove', function () {
    $(this).closest('tr').remove();
	 
     return false;
 });

 $(function () {
     $("input[class*='taxperc']").keydown(function (event) {


         if (event.shiftKey == true) {
             event.preventDefault();
         }

         if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

         } else {
             event.preventDefault();
         }
         
         if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
             event.preventDefault();

     });
 });
</script>