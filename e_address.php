<!DOCTYPE html>
<html lang="en">

    <meta charset="utf-8">
    <title>Nafuumall | Make your order today.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">



 <?php

include 'e_header.php';
 ?>
<!-- Header End====================================================================== -->


<script>
//Fetching sub locations
function locations(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","get_sub_locations.php?q="+str,true);
  xmlhttp.send();
}
</script>





<body>

<div id="mainBody">
<div class="container" >
	<hr class="soften">
	<h4>Delivery Details</h4>
		<div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<h4>Shipping Cost will vary depending on delivery location. FREE DELIVERY available in Nairobi CBD</h4>
		</div>
	<hr class="soften"/>	
	<div class="row"  >




		<div class="span4">
		
<!--first container-->
<?php
	
		$tempId = $_SESSION['sess_array']['3'];
		if ($tempId == null) {
			header('Location:e_summary.php');
		}
?>


	<form  enctype='multipart/form-data' action='' method='POST' >
		<div class="control-group">
			<label class="control-label"  for="your_name">Enter name<sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="your_name" id="your_name" placeholder="John Doe" required>
			</div>
		 </div>

		 <div class="control-group">
			<label class="control-label"  for="telephone">Phone no.<sup>*</sup></label>
			<div class="controls">
				 <input type="text" name="telephone" id="size" value="" placeholder="0712345678" maxlength="10" required>
			</div>
		 </div>


		 <div class="control-group">
			<label class="control-label"  for="email">Email<sup>*</sup></label>
			<div class="controls">
				 <input type="email" name="email" id="email" placeholder="johndoe@gmail.com" required>
			</div>
		 </div>

</div>
<!--first container-->

		<!--second container-->	
<div class="span4" >





		<div class="control-group">
        	<label class="control-label" for="region">Region<sup>*</sup></label>
			<div class="controls">
		    	    
				<?php
				$select_locations = mysqli_query($server, "SELECT * FROM `locations` ORDER BY `locations`.`location` ASC") or die('Mysql_error fetching locations');
				echo" <select id='region'	name='region'  onchange='locations(this.value)'>
						<option value=''>Select Destination</option>";
					    while($colms = mysqli_fetch_array($select_locations))
						{echo "	<option value='$colms[1]'>$colms[1]</option>";}
				echo" </select>";
				?>	
			</div>
		</div>

		<div class="control-group">
        	<label class="control-label" for="area">Area<sup>*</sup></label>
			<div class="controls">
			
				<select id='txtHint'	name='area' >
						<option value=''>Choose Region 1st</option>
				</select>
					    					
			</div>
		</div>


</div>



<div class="span4">	
	
		 <div class="control-group">
			<label class="control-label" for="exactLocation">Exact Location<sup>*</sup></label>
			<div class="controls">
				<textarea name="exactLocation" id="exactLocation" required cols="27" rows="4" placeholder="Apartment, suit, building, floor, street etc"></textarea>
				<br><span>* Apartment, suit, building, floor, street etc</span>
			</div>
		</div>


</div>

<div>
	<div class="span4"></div>
	<div class="span4">
			<button name='enter'  class='btn btn-large btn-success' type='submit'><a >Save & Continue </a>  <i class='icon-arrow-right'></i></button>
	
	</div>
	<div class="span4"></div>

</div>
</form>
<br><br>

<?php


if(isset($_POST['enter'])){


	$select = mysqli_query($server, "SELECT `orderId` FROM `collective_order` 
	WHERE tempId = '$tempId' ") or die('mysql error');
	while ($pass=mysqli_fetch_array($select)) 
	{	


	$orderId = $pass[0];
	$tempId;

	$session = $_SESSION['sess_array']['1'];
	$email = $_POST['email'];
	$your_name = $_POST['your_name'];
	$telephone = $_POST['telephone'];
	$region = $_POST['region'];
	$area = $_POST['area'];
	$exactLocation = $_POST['exactLocation'];
	$select_cost = mysqli_query($server, "SELECT * FROM `sub_locations` WHERE `sub_name`='$area' ") or die('Mysql_error fetching locations');
	    while($colms = mysqli_fetch_array($select_cost))
		{$shippingCost = $colms[4];}
			if ($session == null || $email ==null || $your_name == null || $telephone ==null || $region ==null || $area ==null ||  $exactLocation == null )
				{
					echo'	<div class="alert alert-block alert-error fade in">';
					echo'	<button type="button" class="close" data-dismiss="alert">×</button>';
					echo"	<strong>Uploading details failed</strong><br/>";
					echo"    Enter details and try again."; 
					echo" 	</div>";	
		
				}
				
				else
				{



					$res= mysqli_query($server, "SELECT * FROM delivery_address WHERE orderId='$pass[0]'") or 
					die(mysql_error());
					//check rows returned
					$count=mysqli_num_rows($res);

					if($count<1)
					{
						$insert = mysqli_query($server, "INSERT INTO `delivery_address`(`orderId`,`tempId`,`session`, `email`, `your_name`,  `telephone`, `region`, `area`, `exactLocation`,`shippingCost`)

						VALUES ('$orderId','$tempId','$session','$email','$your_name','$telephone','$region','$area','$exactLocation','$shippingCost')") or die('mysql_error') ;
						//page redirect
						if ($insert) {
							header("location:e_checkout.php");
						}else{
							echo'	<div class="alert alert-block alert-error fade in">';
							echo'	<button type="button" class="close" data-dismiss="alert">×</button>';
							echo"	<strong>Uploading details failed</strong><br/>";
							echo"    Enter details and try again."; 
							echo" 	</div>";	
						}
						}
					else
					{
						header("location:e_checkout.php");
					}																		
				}

	}
}
?>




	</div>

</div>
</div>



<!-- Footer ==== -->
<?php
include 'footer.php';
?>
<!-- Footer End ==== -->

<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	

</body>
</html>