
    <section class="content-header">
      <h1>
        <?php echo $page_title;?>
        <a href="<?php echo site_url('inventory/barcode_generate');?>" class="btn btn-primary">Barcode Generator</a>
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
            <div class="box-header with-border">
              <div><h2 class="box-title"> Stock</h2></div>			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->		
			 <div class="box-body">
			 <div class="col-md-12">
				<div class="1form-group">
                  <label for="proName" class="col-sm-1 control-label">Product</label>
                  <div class="col-sm-3">        
                     <select class="proId" id="jSelect" style="width:100%;">
					<option></option>
				<?php	foreach ($getProduct as $row){ ?>
					<option value="<?php echo $row->icw_pi0317; ?>" <?php if($getStockById !=''){if($row->icw_pi0317 == $getStockById->pid){ echo " selected";}}?>><?php echo $row->icw_pn0317; ?> </option>
				<?php } ?>
					</select>             
                  </div>
				</div>
				<div class="1form-group">
                  <label for="barcode" class="col-sm-1 control-label">Barcode</label>
                  <div class="col-sm-3">                	      
                    <input class="form-control barcode" required="required"/> 
                    <span class="spnMsg"></span>           
                  </div>
				</div>
              </div></div>

              <!-- /.box-body -->
            
              <!-- /.box-footer -->
           
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
});

$('.barcode').on('change',function(){
	var bar=$('.barcode').val();
	var proId=$('.proId').val();
	if(bar !='' && proId !=''){
    $.ajax({
	    type: 'POST',
	    url: "<?php echo site_url('inventory/addProStock/?pid="+proId+"&bar="+bar+"');?>",
	    data:[],
	    cache:false,
	    contentType: false,
	    processData: false,
	    success: function(response) {   	
	    if(response==1){
		    $('.spnMsg').text("successfully added.").css("color","green");
	    	$('.barcode').val('');
	    	$('.barcode').focus();
	    	
	    	}else{
	    		$('.spnMsg').text("all ready exist.").css("color","red");
	    		
		    	}
	    },
	    error: function(response) {
	        
	    }
	    });
	}else{
		$('.spnMsg').text("product and barcode should not be empty.").css("color","red");
		
		}
});
setTimeout(function() {
    $('.spnMsg').val('');
}, 3000);
</script>
