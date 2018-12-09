

<style>
* {
color: #7F7F7F;
font-family: Arial, sans-serif;
font-size: 12px;
font-weight: normal;
}
#config {
overflow: none;
margin-bottom: 10px;
}
.config {
    float: left;
    width: 200px;
    height: 335px;
    border: 1px solid #000;
    margin: 10px;
    padding: 10px;
}
.config .title {
font-weight: bold;
text-align: center;
}
.config .barcode2D,  #miscCanvas {
display: none;
}
#submit {
clear: both;
}
#barcodeTarget,  #canvasTarget {
margin-top: 20px;
}
</style>
    <script type="text/javascript">
      function generateBarcode(){
        var value = $("#barcodeValue").val();
        var btype = $("input[name=btype]:checked").val();
        var renderer = $("input[name=renderer]:checked").val();
        
		var quietZone = false;
        if ($("#quietzone").is(':checked') || $("#quietzone").attr('checked')){
          quietZone = true;
        }
		
        var settings = {
          output:renderer,
          bgColor: $("#bgColor").val(),
          color: $("#color").val(),
          barWidth: $("#barWidth").val(),
          barHeight: $("#barHeight").val(),
          moduleSize: $("#moduleSize").val(),
          posX: $("#posX").val(),
          posY: $("#posY").val(),
          addQuietZone: $("#quietZoneSize").val()
        };
        if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
          value = {code:value, rect: true};
        }
        if (renderer == 'canvas'){
          clearCanvas();
          $("#barcodeTarget").hide();
          $("#canvasTarget").show().barcode(value, btype, settings);
          nWin2();
        } else {
          $("#canvasTarget").hide();
          var qty=$("#qty").val();
          //var iNum = parseInt(qty);
          $(".barcodeTarget").html("").show().barcode(value, btype, settings);
			var txt=[]; 
			for(i=1; i<=iNum; i++){ 
				
				txt[i] ='<table><tr><td><div id="barcodeTarget" class="barcodeTarget" style="display: none; width:200px;"></div></td><td><div id="barcodeTarget" class="barcodeTarget" style="display: none; width:200px;"></div></td></tr></table>';
				$('#toNewWindow').append(txt[i]);
				}
			//$('#toNewWindow').append(txt[i]);
         // alert(txt);
          nWin();
        }
      }
          
      function showConfig1D(){
        $('.config .barcode1D').show();
        $('.config .barcode2D').hide();
      }
      
      function showConfig2D(){
        $('.config .barcode1D').hide();
        $('.config .barcode2D').show();
      }
      
      function clearCanvas(){
        var canvas = $('#canvasTarget').get(0);
        var ctx = canvas.getContext('2d');
        ctx.lineWidth = 1;
        ctx.lineCap = 'butt';
        ctx.fillStyle = '#FFFFFF';
        ctx.strokeStyle  = '#000000';
        ctx.clearRect (0, 0, canvas.width, canvas.height);
        ctx.strokeRect (0, 0, canvas.width, canvas.height);
      }
      
      $(function(){
        $('input[name=btype]').click(function(){
          if ($(this).attr('id') == 'datamatrix') showConfig2D(); else showConfig1D();
        });
        $('input[name=renderer]').click(function(){
          if ($(this).attr('id') == 'canvas') $('#miscCanvas').show(); else $('#miscCanvas').hide();
        });
        generateBarcode();
      });

      function nWin() {
    	  var w = window.open();
    	  var html = $("#toNewWindow").html();
    	    $(w.document.body).html(html);
    	    $(".barcodeTarget").show();
			//$("#barcodeValue").val('');
			$(".barcodeTarget").hide();
    	}
      function nWin2() {
    	  var w = window.open();
    	  var html = $("#toNewWindow2").html();
    	    $(w.document.body).html(html);
    	    $(".canvasTarget").show();
			$("#barcodeValue").val('');
    	}
  	
    </script>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<a href="#" class="btn btn-primary">Back</a>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Barcode</a></li>
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
						<h3 class="box-title"></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						
							 <h1 style="">Generate Barcode</h1>
								<div id="generator"> Please fill in the code :
								<input type="text" id="barcodeValue" value="">
								<br>
								<div id="config">
								<div class="config">
								<div class="title">Type</div>
								<input type="radio" name="btype" id="ean8" value="ean8" checked="checked">
								<label for="ean8">EAN 8</label>
								<br />
								<input type="radio" name="btype" id="ean13" value="ean13">
								<label for="ean13">EAN 13</label>
								<br />
								<input type="radio" name="btype" id="upc" value="upc">
								<label for="upc">UPC</label>
								<br />
								<input type="radio" name="btype" id="std25" value="std25">
								<label for="std25">standard 2 of 5 (industrial)</label>
								<br />
								<input type="radio" name="btype" id="int25" value="int25">
								<label for="int25">interleaved 2 of 5</label>
								<br />
								<input type="radio" name="btype" id="code11" value="code11">
								<label for="code11">code 11</label>
								<br />
								<input type="radio" name="btype" id="code39" value="code39">
								<label for="code39">code 39</label>
								<br />
								<input type="radio" name="btype" id="code93" value="code93">
								<label for="code93">code 93</label>
								<br />
								<input type="radio" name="btype" id="code128" value="code128">
								<label for="code128">code 128</label>
								<br />
								<input type="radio" name="btype" id="codabar" value="codabar">
								<label for="codabar">codabar</label>
								<br />
								<input type="radio" name="btype" id="msi" value="msi">
								<label for="msi">MSI</label>
								<br />
								<input type="radio" name="btype" id="datamatrix" value="datamatrix">
								<label for="datamatrix">Data Matrix</label>
								<br />
								<br />
								</div>
								<div class="config">
									<div class="title">Misc</div>
									<table>
									  <tr><td>Background :</td><td><input type="text" id="bgColor" value="#FFFFFF" size="7"></td></tr>
									  <tr><td>"1" Bars :</td><td><input type="text" id="color" value="#000000" size="7"></td></tr>
									<tr><td>
									<div class="barcode1D">
									<table>
									  <tr><td>Bar width:</td><td><input type="text" id="barWidth" value="1" size="3"></td></tr>
									  <tr><td>Bar height:</td><td><input type="text" id="barHeight" value="50" size="3"><td><tr>
									</table>
									</div>
									</td></tr>
									<tr><td>
									<div class="barcode2D"> 
									<table>
									  <tr><td> Module Size:</td><td><input type="text" id="moduleSize" value="5" size="3"></td></tr>
									  <tr><td>Quiet Zone Modules:</td><td><input type="text" id="quietZoneSize" value="1" size="3"></td></tr>
									  <tr><td>Form:</td><td><input type="checkbox" name="rectangular" id="rectangular"><label for="rectangular">Rectangular</label></td></tr>
									</table>
									</div>
									</td></tr>
									<tr><td>
									<div id="miscCanvas"> 
									<table>
									  <tr><td> x :</td><td><input type="text" id="posX" value="10" size="3"></td></tr>
									  <tr><td>y :</td><td><input type="text" id="posY" value="20" size="3"></td></tr>
									</table>
									</div>
									</td></tr>
									<tr><td>qty</td><td><input type="text" id="qty" value="1" size="3"></td></tr>
									</table>
									</div>
								<div class="config">
								<div class="title">Format</div>
								<input type="radio" id="css" name="renderer" value="css" checked="checked">
								<label for="css">CSS</label>
								<br />
								<input type="radio" id="bmp" name="renderer" value="bmp">
								<label for="bmp">BMP </label>
								<br />
								<input type="radio" id="svg" name="renderer" value="svg">
								<label for="svg">SVG </label>
								<br />
								<input type="radio" id="canvas" name="renderer" value="canvas">
								<label for="canvas">Canvas </label>
								<br />
								</div>
								</div>
								<div id="submit">
								<input type="button" onclick="generateBarcode();" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Generate the barcode&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
								</div>
								</div>
								<div id="toNewWindow">
								
								</div>
								<div id="toNewWindow2">
								<canvas id="canvasTarget" width="150" height="150"></canvas>
								</div>
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


</body>
</html>
