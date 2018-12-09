
    <section class="content-header">
      <h1>
        <?php echo $page_title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Stock</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border bg-success">
              <div><h2 class="box-title">
			  <a href="<?php echo site_url('inventory/getStock');?>" class="btn btn-default btn-js"><i class="fa fa-arrow-left" aria-hidden="true" align="left"></i></a>
			  <?php if($getStockById!=''){echo "Edit";}else{echo "Add";}?> Stock</h2></div>
			 

            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?php if($getStockById!=''){?>
            <form class="form-horizontal" id="addForm" method="post" action="<?php echo site_url('inventory/addStockDt');?>?act=update" enctype="multipart/form-data">
             <input type="hidden" name="hidden_id" value="<?php echo $getStockById->sid;?>">
			 <?php }else{?>
			<form class="form-horizontal" id="addForm" method="post" action="<?php echo site_url('inventory/addStockDt');?>" enctype="multipart/form-data">
			 <?php } ?>
			 <div class="box-body">
				<div class="form-group">
                  <label for="proName" class="col-sm-2 control-label">Product</label>
                  <div class="col-sm-3">         
					  <select name="proName" id="jSelect" style="width:100%;">
					<option></option>
				<?php	foreach ($getProduct as $row){ ?>
					<option value="<?php echo $row->icw_pi0317; ?>" <?php if($getStockById !=''){if($row->icw_pi0317 == $getStockById->pid){ echo " selected";}}?>><?php echo $row->icw_pn0317; ?> </option>
				<?php } ?>
					</select>
                  </div>
				</div>
				<div class="form-group">
				<label for="quantity" class="col-sm-2 control-label">Quantity</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="quantity" id="quantity" value="<?php if($getStockById !=''){echo $getStockById->quantity;}?>"  required="required">			
				  </div>				  
                </div>
				<div class="form-group">
				<label for="suppName" class="col-sm-2 control-label">Supplier Name</label>
                  <div class="col-sm-3">         
					  <select  name="suppName" id="jSelect2" style="width:100%;">
					<option></option>
				<?php	foreach ($getSupplier as $row){ ?>
					<option value="<?php echo $row->icw_supplier_id0317; ?>" <?php if($getStockById !=''){ if($row->icw_supplier_id0317 == $getStockById->supid){ echo " selected";}}?>><?php echo $row->icw_supplier_name0317; ?> </option>
				<?php } ?>
					</select>
                  </div>				  
                </div>
				<div class="form-group">
				<label for="date" class="col-sm-2 control-label">Date</label>
                  <div class="col-sm-2 input-group1">
                    <div class="input-group">
                    <input type="text" class="form-control" value="<?php if($getStockById !=''){echo $getStockById->dates;} ?>"name="date" id="datepicker" placeholder="date"  required="required">			
					<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				  </span>
				  </div>
				  </div>				  
                </div>
				<div class="form-group">
                  <label for="Description" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-6">                	      
                    <textarea id="editor1" name="description" rows="10" cols="72"><?php if($getStockById !=''){echo $getStockById->description;}?></textarea>            
                  </div>
				</div>
				 
              </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo site_url('inventory/getStock');?>" class="btn btn-default col-md-offset-5">Back</a>
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
$(document).ready(function() {
    $('#jSelect').select2({
    	allowClear: true,
    	placeholder:"Select Product",
        width: "resolve"
    });
	$('#jSelect2').select2({
    	allowClear: true,
    	placeholder:"Select Product",
        width: "resolve"
    });
	$( "#datepicker" ).datepicker({
		 format: 'dd/mm/yyyy',
		 autoclose: true
    }).datepicker("setDate", "0");
});

  $(function () {
    CKEDITOR.replace('editor1')
    $('.textarea').wysihtml5()
  });
    $(function () {
    CKEDITOR.replace('editor2')
    $('.textarea').wysihtml5()
  });
  
</script>

