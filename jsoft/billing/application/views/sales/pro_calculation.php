 <div class="box-j2 col-md-8 panel panel-default" id="printarea">      			
              <div class=" jCalc">
              <table border=1 class="table table-bordered jTable"  id="mytbl2" cellspacing="0" width="100%">
	            <thead class="bg-info">
	            	<th><i class="fa fa-trash-o" aria-hidden="true"></i></th>
	                <th>Product</th>
	                <th>QTY</th>
	                <th>Price</th>
	                <th>Total</th>
	                <th>Tax</th>
	                <th>Tax Name</th>
	                <th>Tax Type</th>
	                	                	          
	        	</thead>	        	
               <tbody id="jMore">
               <tr class="item-row"></tr>
				<tr class="jRemove">
					<td><i class="fa fa-times removeRow" aria-hidden="true" style="cursor: pointer"></i></td>
					<td><?php echo $query->icw_pn0317;?></td>
					<td><input class='qty form-control' name='qty[]' value='1' style='width:40px'></td>
					<td><input type='text' readonly='readonly' class='selling_price form-control input-border' name='selling_price[]' value='<?php echo $query->icw_prs0317;?>'></td>
					<td><input type='text' class='itemtotal form-control input-border' readonly='readonly' value="<?php echo $query->icw_prs0317;?>" /><input type='hidden' name='warehouse_id[]' value='"+warehouse_id+"' /></td>
					<td><input type='text' readonly='readonly' class='tax_rate form-control input-border' name='tax_rate[]' value=""></td> 
					<td><select class="optsel"><?php foreach($query2 as $qry){?><option value="<?php echo $qry->icw_id0317;?>"><?php echo $qry->icw_taxName0317;?></option><?php }?></select></td> 
					<td>200</td>              
                </tr>
			   </tbody>		   
              </table>
            </div>
            <div class="sCalc">
            	<div class="col-md-12">
            		<div class="taxDisplay-box">
		            	<table>
		            		<tbody class="taxBody">				            	
				            </tbody>
		            	</table>
            		</div>
            	</div>
            	<div class="sCalc-box1">
	            <div class="col-md-6">Items</div>
	            <div class="col-md-2"><strong>Items:&nbsp;</strong><span class="numberofitems">0</span></div>
	            <div class="col-md-4"><strong style="font-size:32px;">&#8377;</strong><span id="grand_total" style="font-size:24px; color:green; font-weight:bold;">00.00</span></div>
            	</div>
            	<div class="sCalc-box2">
            	<div class="col-md-6 payment-box">
            	<select name="paymentMode" class="form-control">
            		<option>Select Payment Mode</option>
            		<option value="cash">Cash</option>
            		<option value="credit">Credit Card</option>
            		<option value="debit">Debit Card</option>
            	</select>
            	</div>
            	<div class="col-md-6">
            		<div class="action-box">
		            	<button type="button" class="btn btn-info">Save</button>
		            	<button type="button" onclick="PrintBill('.jCalc,.sCalc-box1')" class="btn btn-primary print">Print</button>
            		</div>
            	</div>
            	</div>
            </div> 
          </div>