<div class="clear-fix" ></div>
	<!-- Three panes -->
			<?php require_once 'templates.php';?>
			
					<div class="col-md-8 admin-grid">
					<div class="panel admin-grid-panel" id="mc_11">
						<form action="<?php echo site_url('mainController/template?a=update&tmp_id='.$_REQUEST['tmp_id']);?>"
							class="form-horizontal admin-form basic_form_page1" method="post"
							id="renewalform">
							<div class="panel-heading">
								<span class="panel-title">
									<?php if($rslt_temp !=''){echo strtoupper($rslt_temp->icw_template_name0317);} ?>
								</span>							
							</div>
							<div class="panel-body">
								<div class="row">
									<!-- Multi Text Column -->
									<div class="col-md-6">
										<label for="sms_template" class="field-label">Template</label>
										<input name="template_name" value="<?php if($rslt_temp !=''){echo $rslt_temp->icw_template_name0317;} ?>">
									</div>
									<div class="col-md-6">
									<input type="hidden" id="hidden_id" name="hidden_id" value="<?php echo $_REQUEST['tmp_id']; ?>">
											<label for="sms_template" class="field-label">SMS Template</label>
											<input id="sms_template" name="sms_template" class="" value="<?php if($rslt_temp !=''){echo $rslt_temp->icw_sms_tmplt0317;} ?>">
									</div>
							  </div>
							  <div class="row">
							   <div class="col-md-12" style="margin-top:10px;">
								<label for="" class="">Email Subject <em>*</em> </label>
								<input type="text" id="email_sub" name="email_sub" value="<?php if($rslt_temp !=''){echo $rslt_temp->icw_email_sub0317;} ?>" style="width:582px;" required >		
								</div>
							  </div>	
							  <div class="row">									
								<div class="col-md-12" style="margin-top:10px;">
									<label for="email_body" class="field-label">Email Body</label>
									<textarea class="email_template" name="email_template" id="ckeditor1" rows="12"><?php if($rslt_temp !=''){echo $rslt_temp->icw_email_tmplt0317;} ?></textarea>
								</div>
							</div>
										<div class="row">
											
											<div class="col-md-7" style="margin-top:10px;">
												<label for="status" class="field-label col-md-5">Status<em class="text-danger">*</em> </label>
												<div class="btn-group" id="status" data-toggle="buttons">
									              <label class="btn btn-info btn-on btn-sm <?php if($rslt_temp !='' && $rslt_temp->icw_template_status0317 ==1){echo 'active';}?>">									             
									              <input type="radio" value="1" name="chk_status" >ON</label>         
									              <label class="btn btn-default btn-off btn-sm <?php if($rslt_temp !='' && $rslt_temp->icw_template_status0317 ==0){echo 'active';}?>">
									              <input type="radio" value="0" name="chk_status">OFF</label>									            
									            </div>
											</div>
										</div>
								</div>
								<div class="panel-footer" align="right">
									<a href="<?php echo site_url('mainController/tmpltArea');?>" class="btn btn-danger ">Cancel</a>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
							
						</form>
					</div>
				</div>

<script>
CKEDITOR.replace('ckeditor1', {
    height: 210,
    on: {
        instanceReady: function(evt) {
            $('.cke').addClass('admin-skin cke-hide-bottom');
        }
    },
});
</script>
