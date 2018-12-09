<style>
input[type="radio"] {
  -webkit-appearance: checkbox; /* Chrome, Safari, Opera */
  -moz-appearance: checkbox;    /* Firefox */
  -ms-appearance: checkbox;     /* not currently supported */
}
</style>

<table class="table table-responsive">
<?php if(isset($getData) && $getData !=''){
echo "<p style=\"text-align:center\">All results</p>";	
foreach($getData as $data){ ?>
<tr>
<td style="width:60px;text-align: left;"><input type="radio" value="<?php if(!empty($data)){echo ucwords($data->icw_clientId0317);}?>" name="radioClnt" class="radioClnt" onclick="clientFun()" style="height:18px; width:18px;"></td>
<td style="text-align: left;"><?php if(!empty($data)){echo ucwords($data->icw_clientName0317);}?></td>
<td style="text-align: left;"><?php if(!empty($data)){echo $data->icw_clientMobile0317;}?></td>
</tr>
<?php }}else{ ?>
<p style="text-align:center"> No result found.</p>
<?php } ?>
</table>