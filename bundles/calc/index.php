<!DOCTYPE html>
<?php


ini_set("include_path", "//home/a3704579/public_html/:".ini_get("include_path"));
require_once("config.php");
require_once("view/header.php");

//var_dump($_GET);
$add=$_GET["add"];
//echo "$add";
$per=$_GET["per"];
//echo $per;

$address="517 Pinecrest Ct.";
$price="399,900";
$tax=2550;
$insurance=1000;
/**
 * Ideas:
 * make a slider that uses a table of costs, points, etc.
 * "Your Factor" - net price adjustments.
 *
 * Rates, Points, Terms
 *
 *
 * Conventions:
 *   CamelCase
 *   please indent code, something like this:
	*   if($you->have($questions)){
	*   	if{
		   $there=="lmgtfy://google.com";
	*          $that==$you->HaveBeen($there);
	*       }
	*       else{
	*   	   $you->Call($me).
	*       }
	*   
	* //rgrigga
 */

?>

	

<!--<h1 style="text-align: center">FOO</h1>-->


<!-- Home -->
<!-- PAGE 1 -->
<div data-theme="b" data-role="header">

<?php
   echo "<h3>
	  $address
	  <br>
	  $price
	</h3>";
?>	
    </div> <!-- eader -->


	
    
   <div data-role="content">
    <form>
	<div id="myform">
		
		<div data-role="fieldcontain">
			<label for="mcDown">%Down: $<span id="foo" name="foo">88980</span></label>
			<input type="range" name="mcDown" id="mcDown" value="20" min="0" max="50" step="5" data-highlight="true" />
			
		</div>
		
		<div style="display: none;" data-role="fieldcontain" class="myclass">
			<label for="mcPrice">Price:</label>
			<input type="range" name="mcPrice" id="mcPrice" data-highlight="true" value="444900" min="25000" max="1000000" step="5000" />
		</div>
		<div data-role="fieldcontain">
		   <label for="mcRate">Rate:</label>
		   <input type="range" name="mcRate" id="mcRate" value="4" min="2" max="10" step =".125%" data-highlight="true"  />
		</div>
		
		<div data-role="fieldcontain">
			<label for="mcTerm">Term:</label>
			<input type="range" name="mcTerm" id="mcTerm" value="15" min="5" max="30" step="5" data-highlight="true" />
		</div>
		
		<script type="application/x-javascript"><![CDATA[
		//////$(function () {
		//	var ageInput = $("#mcDown");
		//	var ageDisplay = $("#mcDown > div");
		//    
		//	var updateSliderValue = function (event, ui) {
		//	    ageDisplay.text(ui.value);
		//	    $("#mcDown .ui-btn-text").text("Mark New");
		//	};
		//    
		//	ageInput.slider({
		//	    min: 0, max: 122,
		//	    slide: updateSliderValue
		//	});        
		//    });	
		////]]>
		</script>
		

		
		<div data-role="fieldcontain">
			<label for="mcTax">Tax:</label>
			<input type="range"
				     name="mcTax"
				     id="mcTax"
				     value="2550" min="0"
				     max="10000" step="50" data-highlight="true" />
		</div>
		
		<div data-role="fieldcontain">
			<label for="mcTax">Ins:</label>
			<input type="range"
				     name="mcIns"
				     id="mcIns"
				     value="1000" min="0"
				     max="4000" step="50" data-highlight="true" />
		</div>
		<!-------------------------------------->
		</div><!--myform-->
			
		<!--<button id="mortgageCalc" class="smallButton" onclick="return false">Calculate Monthly Payment</button>-->
		<hr />

		<div class="myclass2" data-role="fieldcontain">
			<label for="mcBal">Balance:</label>
			<input id="mcBal"  name="mcBal" type="text" value="$355921"/>
		</div>
		
		<div class="myclass2" data-role="fieldcontain">
			<label for="mcPayment">P&I:</label>
			<input id="mcPayment"  name="mcPayment" type="text" value="$2632.70"/>
		</div>
		
		<div class="myclass2" data-role="fieldcontain">
			<label for="mcTI">T&I:</label>
			<input id="mcTI"  name="mcTI" type="text" value="$275.00" />
		</div>
		
		<div class="myclass2" data-role="fieldcontain">
			<label for="mcPITI">PITI:</label>
			<input id="mcPITI"  name="mcPITI" type="text" value="$2907.70"/>
		</div>
		
		<!--<div class="myclass2" data-role="fieldcontain">-->
		<!--	<label for="mcTotalInterest">PITI:</label>-->
		<!--	<input id="mcPITI"  name="mcPITI" type="text" value="$1625.17"/>-->
		<!--</div>-->
		
    </form>
        
<!--<p>Coming soon: Costs & Points</p>-->
<p>
<script type="text/javascript"><!--
	

		
		$("#myform").change(function(){
		var L,P,T,n,c,dp,dpval,t,i,pmi,ti;
		L = parseInt($("#mcPrice").val());
		n = parseInt($("#mcTerm").val()) * 12;
		c = parseFloat($("#mcRate").val())/1200;
		dp = 1 - parseFloat($("#mcDown").val())/100;
		dpval=parseFloat($("#mcDown").val()/100)*L;
		t = parseInt($("#mcTax").val()) / 12;
		i = parseInt($("#mcIns").val()) / 12;
		L = L * dp;
		P = (L*(c*Math.pow(1+c,n)))/(Math.pow(1+c,n)-1);
		ti= t+i
		T = P + ti;
		if(!isNaN(P))
		{
			//alert("P: "+P+" t: "+t+" i: "+i+"T: "+T);
			$("#mcBal").val("$"+(L+dp).toFixed(0));
			$("#mcPayment").val("$"+P.toFixed(2));
			$("#mcTI").val("$"+((t+i)).toFixed(2));
			$("#mcPITI").val("$"+T.toFixed(2));
			//$("#foo").val(dp);
			//$("#mcDown .ui-btn-text").val("1");
			//$("#foo").innerHTML("bar");
			document.getElementById("foo").innerHTML=dpval;
			
		//Number.prototype.toCurrencyString=function(){
		//    return this.toFixed(2).replace(/(\d)(?=(\d{3})+\b)/g,'$1 ');
		//}

		}
		else
		{
			$("#mcPayment").val('There was an error');
		}
		

		return false;
	});
	
	//$("#myform").change(function(){
	//var i,t,P;
	//t = parseInt($("#mcTerm").val())
	//i = parseInt($("#mcIns").val())
	//if(!isNaN(P))
	//	{
	//		$("#mcPITI").val(P.toFixed(2));
	//	}
	//	else
	//	{
	//		$("#mcPITI").val('There was an error');
	//	}
	//	return false;
	//});
	
	
	//var el = document.getElementById("myform");
	//el.addEventListener("change", amort, false);
// --></script>
</p>

   </div><!-- content -->
    <div data-role="footer">
	<!--<nav data-role="navbar">-->
	<!--    <ul>-->
	<!--	<li><a href="home" data-icon="home">home</a></li>-->
	<!--	<li><a href="photos" data-icon="grid">photos</a></li>-->
	<!--	<li><a href="info" data-icon="info">info</a></li>-->
	<!--    </ul>-->
	<!--</nav>-->
	<!--<h3>Your Payment = $x,xxx.xx/month</h3>-->
	

	<h4>
		<input type="button" value="Save" onclick="alert('Saves to the cookie or the cloud!')">
		<input type="button" value="Call" onclick="alert('Dials Phone!')">
		<input type="button" value="Email" onclick="alert('Emails You!')">
		<input type="button" value="Apply Online Now" onclick="alert('Opens Application Instructions!')">
		<input type="button" value="More Calculators" onclick="alert('More Calculators!')">
	</h4>
	
	
    </div><!--footer-->
   
    </div><!-- Page -->
        
    
<!--<iframe src="http://archive.org/embed/gd89-07-07.aud.wiley.7855.sbeok.shnf&playlist=1&autoplay=1" width="500" height="300" frameborder="0" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen></iframe>-->
</div><!-- Page Gummy Bears -->



<?php
//http://www.era.com/property/70132029-150018332/37-E-Stewart-Ave-Columbus-OH-43206/
//https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=Hello%20world

require_once("view/footer.php");
//</body>
//</html>
?>