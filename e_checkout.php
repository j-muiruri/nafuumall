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

include 'email2.php';
include 'send_sms.php';
 ?>
<!-- Header End====================================================================== -->
<body>

<div id="mainBody">
<div class="container" >

	<div class="row"  >
	<!--first container-->
		<div class="span3">
	


		

		</div>
	<!--first container-->

	<!--second container-->	
		<div class="span6" >

			<hr class="soften">
				<h4 class="">Shopping and details summary.</h4>

				<i>Click below to view</i>
			<hr class="soften"/>	


						
						<div class="accordion-group">
						  <div class="accordion-heading">
							<h4><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
							  <h5>Delivery Address</h5>
							</a></h4>
						  </div>
						  <div id="collapseTwo" class="accordion-body collapse"  >
							<div class="accordion-inner well">
									
									<div class="">
		<?php
	

$tempId = $_SESSION['sess_array']['3'];

if($tempId == null){
    header('location:e_address.php');
}

if(isset($tempId)){
//	SELECT `orderId`, `tempId`, `session`, `email`, `your_name`, `second_name`, `telephone`, `region`, `area`, `exactLocation`, `shippingCost`, `long`, `lat` FROM `delivery_address` WHERE 1

		$select = mysqli_query($server, "SELECT * FROM `delivery_address` 
			WHERE tempId = '$tempId' ") or die(mysql_error());
			while ($colm=mysqli_fetch_array($select)) 
			{	
			
	$orderId = $colm[0];

	$session = $colm[2];
	$email = $colm[3];
	$your_name = $colm[4];
	$telephone = $colm[6];
	$region = $colm[7];
	$area = $colm[8];
	$exactLocation = $colm[9];
	$shippingCost = $colm[10];
	    	
	
		
	}
}

				 		echo'	
								<strong>'.$region.', '.$area.'<br> </strong>'.$exactLocation.'';


?>
									</div>					

							</div>
						  </div>
						</div>

						<div class="accordion-group">
						  <div class="accordion-heading">
							<h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
							 <h5>Contact Details</h5>
							</a></h4>
						  </div>
						  <div id="collapseThree" class="accordion-body collapse"  >
							<div class="accordion-inner well">

								<div class="">
								<?php
									echo"<label><strong>Phone No:&nbsp;</strong>".$telephone." </label>
										 <label><strong>Email:&nbsp;</strong>".$email." </label>";
								?>

								 </div>						

							</div>
						  </div>
						</div>

					<div class="accordion" id="accordion2">
						<div class="accordion-group">
						  <div class="accordion-heading">
							<h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
							  <h5>Shopping Cost</h5>
							</a></h4>
						  </div>
						  <div id="collapseOne" class="accordion-body collapse"  >
							<div class="accordion-inner well">
									
									<div class="">
									    						<?php

            
            						$ress= mysqli_query($server, "SELECT * FROM ordered_products WHERE session='$session'");
            
            							 	echo "							 		<table border='1'>
            							 	    <tr>
            							 	        <th></th>
            							 	        <th>Item Name</th>
            							 	        <th>Quantity</th>
            							 	        <th>Price</th>
            							 	    </tr>";
            						    while($colms=mysqli_fetch_array($ress, MYSQLI_NUM))
            							 {
            							 	 echo"
            									<tr>
            										<td><img src='e_images/$colms[8]' height='auto' width='50px'></td>
            										<td>$colms[2]</td>
            									 	<td >$colms[9]</td>
            									 	<td>ksh.".number_format($colms[5])."</td>
            									</tr>";
            							 }
            							 echo "</table>";            						?>
									<?php

									$selectS = mysqli_query($server, "SELECT * FROM `collective_order` WHERE tempId ='$tempId'") or die(mysql_error());
										while ($colms = mysqli_fetch_array($selectS)) {
											$mOrderId = $colms[0];
											$mNoItems = $colms[2];
											$mPrice = $colms[3];
											$mDiscount = $colms[4];
											$totalAmnt = $colms[3] + $shippingCost;
										echo"<label>No. of Items: $colms[2]</label>
											 <label>Price: kshs.".number_format($colms[3])."</label>
											 <label>Discount: kshs.".number_format(0)."</label>
											 <label>Points awarded:".number_format($colms[9])."</label>
											 <label>Shipping Cost: kshs.".number_format($shippingCost)."</label>		 				 
											 <label>Amount Payable: kshs.".number_format($totalAmnt)."</label>";


										}

									?>

									 </div>

							</div>
						  </div>
						</div>						



						<div class="accordion-group">
						  <div class="accordion-heading">
							<h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
							 <h5>Payment Method</h5>
							</a></h4>
						  </div>
						  <div id="collapseFour" class="accordion-body collapse"  >
							<div class="accordion-inner well">
							
								<div class="">
								<form>
									<input type="checkbox" required> Pay on Delivery</input>
								</form>

								 </div>

								
								</div>

							</div>
						  </div>
						</div>
<?php
//mail Content
$html_msg = $emessage ."$emessage2". $emessage3 ."$emessage4". $emessage5 ."$emessage6". $emessage7 ;				
$sessionemail=$_SESSION['sess_array']['0'];

			if($sessionemail=='no_email')

			{
			$session=$_SESSION['sess_array']['1'];

				$ress= mysqli_query($server, "SELECT * FROM ordered_products WHERE session='$session'");
			
		

				//fetching records from database
				
			    while($colms=mysqli_fetch_array($ress, MYSQLI_NUM))
				 {	
					$totalprice = $colms[7]*$colms[9];
					$totaldiscount = $colms[8]*$colms[9];

					$total=($totalprice-$totaldiscount);
				}

				
//$msg = "Dear ".$your_name.",\nOrder number".$mOrderId.". \nNo of Items:".$mNoItems." \nPrice: ksh.".$mPrice." Discount: ksh.".$mDiscount." Shipping Cost: ksh.".$shippingCost." \nAmount Payable: ksh.".$totalAmnt." \nGoods will be delivered at ".$region.",".$area." ".$exactLocation." \nThank you for shopping with us.". $html_msg ;

$msg = $html_msg;
			
			
			
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";				
$headers .= 'From: Nafuumall <orders@nafuumall.com>' . "\r\n";
				
				
			}
			else
			{
	




			$sessionemail=$_SESSION['sess_array']['0'];
			$session=$_SESSION['sess_array']['1'];

				$ress= mysqli_query($server, "SELECT * FROM ordered_products WHERE session='$session' AND email='$sessionemail'");
			    while($colms=mysqli_fetch_array($ress, MYSQLI_NUM))
				{
		

			$totalprice = $colms[7]*$colms[9];
			$totaldiscount = $colms[8]*$colms[9];

			$total=($totalprice-$totaldiscount);


//$msg = "Dear ".$your_name.",\nOrder number".$mOrderId.". \nNo of Items:".$mNoItems." \nPrice: ksh.".$mPrice." Discount: ksh.".$mDiscount." Shipping Cost: ksh.".$shippingCost." \nAmount Payable: ksh.".$totalAmnt." \nGoods will be delivered at ".$region.",".$area." ".$exactLocation." \nThank you for shopping with us.". $html_msg;

$msg = $html_msg;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";		
$headers .= 'From: Nafuumall <orders@nafuumall.com>' . "\r\n";

				
				}



				
			}

$mail = mail("$email, orders@nafuumall.com","ORDER ON NAFUUMALL",$msg,$headers);
if ($mail) {
	echo'		<div class="alert alert-info fade in">
				<button type="button" class="close" data-dismiss="alert">×</button>
				A summary of your shopping has been sent to your email. Thank you for Shopping with us. 
	    		</div>';
}else {
	echo'	<div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Invoice not sent to your email but your order has been received</strong><br/>
		</div>';
}
//mail content											
?>

							<!--Checkout-->
							<div class="span2"></div>
							<a name='enter'  href="e_end.php"  class='btn btn-large btn-success' type='submit'>&nbsp;&nbsp;&nbsp;Checkout&nbsp;&nbsp;&nbsp; </a>
							<!--checkout-->		

	<!--second container-->	





	</div>
	
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer-->
<?php
include 'footer.php';
?>
<!--Footer-->
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	


</body>
</html>