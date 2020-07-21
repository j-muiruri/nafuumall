<!DOCTYPE html>
<html lang="en">

    <meta charset="utf-8">
    <title>Nafuumall | Make your order today.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


 <?php

include 'sp_header.php';
 ?>
<!-- Header End====================================================================== -->
<div id="mainBody">
<div class="container" >

	<div class="row"  >
	<!--first container-->
		<div class="span1">
		</div>
	<!--first container-->

	<!--second container-->	
		<div class="span10" >

			<hr class="soften"/>	


    <ul class="breadcrumb">
    	<li><a href="controlpanel.php">Control Panel</a></li>
		<li><a href="sp_orders.php?A0=000"><h5>Pending Orders /    </h5></a> </li>
		<li ><a href="sp_orders.php?A1=001"><h5>Delivered /    </h5></a> </li>
		<li ><a href="sp_orders.php?A2=002"><h5>Cancelled  </h5></a>  </li>
    </ul>


<?php

echo'		
<table class="table table-bordered">
    <tbody>';

    if (isset($_GET['A0'])) {
    	$ress= mysqli_query($server, "SELECT * FROM collective_order WHERE `deliveryReport`='Pending' ORDER BY  `collective_order`.`orderId` DESC 	 ");
    	
	
    }elseif (isset($_GET['A1'])) {
     	$ress= mysqli_query($server, "SELECT * FROM collective_order WHERE `deliveryReport`='Delivered' ORDER BY  `collective_order`.`orderId` DESC 	 ");
   	
    }elseif (isset($_GET['A2'])) {
    	$ress= mysqli_query($server, "SELECT * FROM collective_order WHERE `deliveryReport`='Cancelled' ORDER BY  `collective_order`.`orderId` DESC 	 ");
  	
    }else{
    	$ress= mysqli_query($server, "SELECT * FROM collective_order WHERE `deliveryReport`='Pending'  ORDER BY  `collective_order`.`orderId` DESC 	 ");

    }

 	    $ress= mysqli_query($server, "SELECT * FROM collective_order   ORDER BY  `collective_order`.`orderId` DESC 	 ");
  
	while($colms=mysqli_fetch_array($ress, MYSQLI_NUM))
		{
echo "			
    <thead><tr><td></td></tr>
        <tr>
            <th>Order Id</th>
            <th>Temp Id</th>
            <th>No of Items</th>
             <th>Total Price</th>
            <th>Total Discount</th>
            <th>Total</th><th>Email</th><th>Date</th><th>Time</th>
		</tr>
    </thead>";
		 
echo"		 	
        <tr>
             <td>$colms[0]</td>
             <td>$colms[1]</td>
             <td>$colms[2]</td>
             <td>ksh. $colms[3]</td>
             <td>ksh. $colms[4]</td>
             <td>ksh. $colms[5]</td>
             <td>$colms[7]</td>
             <td>$colms[8]</td>
             <td>$colms[9]</td>
             <td class='btn btn-mini btn-success'><a href='sp_orders.php?dR=$colms[0]'>Delivered</a></td>
        	 <td class='btn btn-mini btn-danger'><a href='sp_orders.php?dRC=$colms[0]'>Canceled</a></td>
        	 <td class='btn btn-mini'><a href='sp_orders.php?dest=$colms[0]'>Destination</a></td>
        	 <td class='btn btn-mini'><a href='sp_orders.php?drin=$colms[0]'>Drinks</a></td>
        </tr>

";

if (isset($_GET['dest'])) {
	$dest = $_GET['dest'];

				$ressD= mysqli_query($server, "SELECT * FROM delivery_address WHERE session ='$colms[4]' ") or die(mysql_error());
				while($colms=mysqli_fetch_array($ressD, MYSQLI_NUM))
				{
		echo"<tr>	
					<td></td>
					<td>First name: $colms[4]<br>
					 Second name: $colms[5]<br>
		             Email: $colms[3]
		            </td>

		             
		             <td>Telephone: $colms[6]<br>
		             </td>
		             <td>Region: $colms[7]</td>
		             <td>Area: $colms[8]</td>
		             <td>Exact Location: $colms[9]</td>
		             <td><b>GPS Location</b><br/><textarea row='4'>http://maps.google.com/maps?q=$colms[12],$colms[11]</textarea><a target='_blank' href='http://maps.google.com/maps?q=$colms[12],$colms[11]'>Clink here</a></td>
		             <td>$colms[13]</td>

		    </tr>
		    <tr>
		    <td></td><td></td><td></td><td></td>
		    <td></td><td></td>
		    </tr>";

				}
}elseif(isset($_GET['drin'])){
	$ressA= mysqli_query($server, "SELECT * FROM ordered_products WHERE session ='$colms[4]' ");
				while($colms=mysqli_fetch_array($ressA, MYSQLI_NUM))
				{



		echo"<tr>
		             <td></td>
		             <td>Name: $colms[2]</td>
		             <td>Category: $colms[3]</td>
		             <td>Volume: $colms[4]</td>
		             <td>Price: $colms[7]</td>
		             <td>Discount: $colms[8]</td>
		             <td>Quantity: $colms[9]</td>
		             <td>Date: $colms[13]</td>
		             <td>Time: $colms[14]</td>
		             <td></td>
		             <td></td>
		    </tr>";

				}
	echo "  <tr>
		    <td></td><td></td><td></td><td></td><td></td><td>
		    </td><td></td><td></td><td></td><td></td><td></td>
		    </tr>";

}

else{

//$pers = mysqli_query($server,"SELECT * FROM personaldetails INNER JOIN vehicledetails ON
// `personaldetails`.`productId`=`vehicledetails`.`productId`   
//	WHERE `personaldetails`.`productId` ='$id'  ");
				$ressA= mysqli_query($server, "SELECT * FROM ordered_products WHERE session ='$colms[4]' ");
				while($colms=mysqli_fetch_array($ressA, MYSQLI_NUM))
				{
		echo"<tr>
		             <td></td>
		             <td>Name: $colms[2]</td>
		             <td>Category: $colms[3]</td>
		             <td>Volume: $colms[4]</td>
		             <td>Price: $colms[7]</td>
		             <td>Discount: $colms[8]</td>
		             <td>Quantity: $colms[9]</td>
		             <td>Date: $colms[13]</td>
		             <td>Time: $colms[14]</td>
		             <td></td>
		             <td></td>
		    </tr>";
				}

	echo "  <tr>
		    <td></td><td></td><td></td><td></td><td></td><td>
		    </td><td></td><td></td><td></td><td></td><td></td>
		    </tr>";
}


		}

 echo"</tbody></table>";

//order report
 	if (isset($_GET['dR'])) {
 		$dR = $_GET['dR'];
 		$update = mysqli_query($server, "UPDATE `collective_order` SET `deliveryReport`='Delivered' WHERE orderId='$dR'") or die(mysql_error());
 		}elseif (isset($_GET['dRC'])) {
 		 $dRC = $_GET['dRC'];
 		$update = mysqli_query($server, "UPDATE `collective_order` SET `deliveryReport`='Cancelled' WHERE orderId='$dRC'") or die(mysql_error());
 		}
//order report

 	


			

?>


		 		
		 		
		
		</div>
	<!--second container-->	


<!-- Third ontainer - ======-->
		<div class="span1">	
	
		</div>
<!-- Third Container - =====-->

	</div>
	<div class="row">

	</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================= -->
<?php
include 'footer.php';
?>
<!-- Footer ================================= -->
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	


</body>
</html>