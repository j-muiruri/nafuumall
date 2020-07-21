<!DOCTYPE html>
<html lang="en">
 
    <meta charset="utf-8">
    <title> Nafuumall | Make your order today.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">



 <?php

include 'e_header.php';
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
				<h4 class="">Thank you for shopping with us.</h4>
			<hr class="soften"/>	

		<h5>Shopped Items</h5>



<?php
$session = $_SESSION['sess_array']['1'];
$sessionemail=$_SESSION['sess_array']['0'];
			if($sessionemail=='no_email')
			{

			//below counts number of items in cart when email is not set
			$count =mysqli_query($server,"SELECT COUNT(*) FROM ordered_products WHERE session='$session'");
			$row = mysqli_fetch_array($count, MYSQLI_NUM);
			$itemscart= $row[0];	

			echo'		
				<table class="table table-bordered">
			              <thead>
			                <tr>
			                  <th>Item</th>
			                  <th>Description</th>
			                  <th>Quantity</th>
							  <th>Price</th>
			                  <th>Total</th>
							</tr>
			              </thead>
			              <tbody>';
				$ress= mysqli_query($server, "SELECT * FROM ordered_products WHERE session='$session'");
			    while($colms=mysqli_fetch_array($ress, MYSQLI_NUM))
				 {

			echo"                <tr>";
			echo"                  <td> <img width='60'  src='e_images/$colms[8]' alt=''/></td>";
			echo"                  <td>$colms[2] - $colms[7]<br/></td>";
			echo"				  <td>";

			echo"	<a href='e_summary.php?idp=$colms[0]'></a>";
			echo'
			<div class="input-append"><input class="span1" name="quantity" value="'.$colms[9].'" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text">
			
			</button>';
			
			echo "</div>";


			echo"				   </td>";
			echo"                  <td>ksh.$colms[5]</td>";
			
			$total = $colms[5]*$colms[9];
			echo"                  <td>ksh.$total</td>";
			echo"                </tr>";


				 }
			
			echo'               <tr>';
			//BELOW CALCULATE THE TOTAL PRICE OF SHOPPING LIST
			$total =  mysqli_query($server, "SELECT SUM(current_price*quantity) AS value_sum FROM ordered_products WHERE session='$session' AND email='$sessionemail'  ");
			$row = mysqli_fetch_array($total);
			$sum = $row['value_sum'];
			echo'                </tr>';

			echo'			 <tr>';
			echo'                </tr>';
			echo"		 <tr>
			<td colspan='4' style='text-align:right'><strong>TOTAL ($sum) =</strong></td>";
			               
			$totalcash= ($sum);
			echo"              <td class='label label-important' style='display:block'> <strong>ksh.$totalcash </strong></td>
			                </tr>
							</tbody>
			            </table>";

			//////////////


			}
			else
			{


			//below counts number of items in cart when email has been set
			$count =mysqli_query($server,"SELECT COUNT(*) FROM ordered_products WHERE session='$session' AND email='$sessionemail'");
			$row = mysqli_fetch_array($count, MYSQLI_NUM);
			$itemscart= $row[0];	

			echo'
				<table class="table table-bordered">
			              <thead>
			                <tr>
			                  <th>Item</th>
			                  <th>Description</th>
			                  <th>Quantity</th>
							  <th>Price</th>
			                  <th>Total</th>
							</tr>
			              </thead>
			              <tbody>';





				$ress= mysqli_query($server, "SELECT * FROM ordered_products WHERE session='$session' AND email='$sessionemail'");
			    while($colms=mysqli_fetch_array($ress, MYSQLI_NUM))
				{
		    echo"                <tr>";
			echo"                  <td> <img width='50'  src='e_images/$colms[8]' alt=''/></td>";
			echo"                  <td>$colms[2] - $colms[7]<br/></td>";
				echo"				  <td>";

			echo"	<a href='e_summary.php?idp=$colms[0]'></a>";
			echo'
			<div class="input-append"><input class="span1" name="quantity" value="'.$colms[9].'" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text">
			
			</button>';
			
			echo "</div>";


			echo"				   </td>";
			echo"                  <td>ksh.$colms[7]</td>";
			
			$total = $colms[5]*$colms[9];

			echo"                  <td>ksh.$total</td>";
			echo"                </tr>";
				 }
			

				 


							
			echo'               <tr>
			                  <td colspan="4" style="text-align:right">Total Price:	</td>';
			//BELOW CALCULATE THE TOTAL PRICE OF SHOPPING LIST
			$total =  mysqli_query($server, "SELECT SUM(current_price) AS value_sum FROM ordered_products WHERE session='$session' AND email='$sessionemail'  ");
			$row = mysqli_fetch_array($total);
			$sum = $row['value_sum'];
			echo"                  <td> $sum</td>";
			echo'                </tr>';

			echo'			 <tr>';
			echo'                </tr>';

			echo"		 <tr>
			<td colspan='4' style='text-align:right'><strong>TOTAL ($sum) ) =</strong></td>";
			               
			$totalcash= ($sum) ;
			echo"              <td class='label label-important' style='display:block'> <strong> ksh.$totalcash </strong></td>
			                </tr>
							</tbody>
			            </table>";

				
			}

session_destroy();

?>


		</div>
	<!--second container-->	


<!-- Third ontainer - ======-->
		<div class="span3">	
	
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