<!DOCTYPE html>
<html lang="en">

    <meta charset="utf-8">
    <title>Nafuumall | Make your order today.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


<!--Header start including the head tag=================-->
<?php
include 'e_header.php';

?>

<!-- Header End====================================================================== -->
<body>

<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<div id="sideManu" class="span3">
<?php
include 'e_sidebar.php';
?>
</div>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
			<form method="POST">
			<button name="previous" class="btn ">Previous Shopping</button>

				<button name="current" class="btn ">Current Shopping</button>
			</form>
  

<?php    
//MAJOR IF FUNCTION
if(isset($_GET['id']))
	{
	//if id is set, get it
	$id	= $_GET['id'];

	$res= mysqli_query($server, "DELETE FROM ordered_products WHERE product_no='$id'");
		if($res)
		{
			echo'	<div class="alert alert-block alert-success fade in">
					<button type="button" class="close" data-dismiss="alert">×</button>
					Item successfully removed from cart.
					</div>';
		}
		else
		{ 
			echo'	<div class="alert alert-block alert-error fade in">
					<button type="button" class="close" data-dismiss="alert">×</button>
					Failed to removed from cart. Try again
					</div>';
		}
	}


if(isset($_POST['previous']))
{



			$sesssionemail=$_SESSION['sess_array']['0'];

			if($sesssionemail == 'no_email')
			{	
				echo'	<div class="alert alert-block alert-error fade in">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Sorry.  </strong>No records available from previous shoppings.
						<br/>Log in or Create account to be able to keep track of your shoppings.
						<br/>Thank you for shopping with us.
				 		</div>
					';

				//exit();
			}
			else

			{
			//below counts number of items in cart when email has been set
			$count =mysqli_query($server,"SELECT COUNT(*) FROM ordered_products WHERE email='$sesssionemail'");
			$row = mysqli_fetch_array($count, MYSQLI_NUM);
			$itemscart= $row[0];	

			echo"	<h4>  DRINKS SHOPPED [ <small>$itemscart Item(s) </small>]</h4>";	
				



			echo'	<hr class="soft"/>

				<hr class="soft"/>';

			$sessionemail=$_SESSION['sess_array']['0'];
			$session=$_SESSION['sess_array']['1'];

				$ress= mysqli_query($server, "SELECT * FROM ordered_products WHERE email='$sessionemail'");
			    
			    while($colms=mysqli_fetch_array($ress, MYSQLI_NUM))

				 {

										echo "<tr>$colms[11]</tr>";	
												$group_criteria = $colms[11];
											$group= mysqli_query($server, "SELECT * FROM ordered_products WHERE email='$sessionemail' AND session = '$group_criteria'");
										  
					echo'	<table class="table table-bordered">
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






			//$sessionemail=$_SESSION['sess_array']['0'];
			$session=$_SESSION['sess_array']['1'];

				$ress= mysqli_query($server, "SELECT * FROM ordered_products WHERE session='$session'");
			    while($colms=mysqli_fetch_array($ress, MYSQLI_NUM))
				 {

			echo"                <tr>";
			echo"                  <td> <img width='30'  src='e_images/$colms[8]' alt=''/></td>";
			echo"                  <td>$colms[2] - $colms[4]<br/>$colms[7].";
			echo"				  <td>";

			echo"	<a href='e_summary.php?idp=$colms[0]'></a>";
			echo'
			<div class="input-append"><input class="span1" name="quantity" value="'.$colms[9].'" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text">
			
			</button>';
			

			echo"	<a href='e_summary.php?idp=$colms[0]'>";
			echo"	<button  class='btn' type='button'>";
			echo'	<i class="icon-plus"></i>';
			echo'	</button>';
			echo"	</a>";
			echo"	<a href='e_summary.php?id=$colms[0]'>";
			echo"	<button class='btn btn-danger'  type='button'>";
			echo'	<i class="icon-remove icon-white"></i>';
			echo'	</button>';
			echo"	</a>";
			echo "</div>";
			echo"				   </td>";
			echo"                  <td>ksh.$colms[5]</td>";
			
			$totalprice = $colms[5]*$colms[9];

			$total=($totalprice);

			echo"                  <td>ksh.$total</td>";
			echo"                </tr>";

				 }
			


			//BELOW CODE DELETES CONTENT FROM THE CAT SECTION
			//Check if id was set*/

		

			echo'<tr>';

			//BELOW CALCULATE THE TOTAL PRICE OF SHOPPING LIST
			$total =  mysqli_query($server, "SELECT SUM(current_price*quantity) AS value_sum FROM ordered_products WHERE session='$session' AND email='$sessionemail'  ");
			$row = mysqli_fetch_array($total);
			$totalcash = $row['value_sum'];
			echo"<td colspan='4' style='text-align:right'><strong>TOTAL:</strong></td>";
			echo"              <td class='label label-important' style='display:block'> <strong>ksh.".number_format($totalcash)."</strong></td>
			      </tr>
				</tbody>
			</table>";
									}







			}

			}
elseif(isset($_POST['current']))
{
	//echo "current";

		$sesssionemail = $_SESSION['sess_array']['0'];
		$session = $_SESSION['sess_array']['1'];
			if($sesssionemail=='no_email')

			{


			//below counts number of items in cart when email is not set
			$count =mysqli_query($server,"SELECT COUNT(*) FROM ordered_products WHERE session='$session'");
			$row = mysqli_fetch_array($count, MYSQLI_NUM);
			$itemscart= $row[0];	

			echo"	<h4>  SHOPPING CART [ <small>$itemscart Item(s) </small>]</h4>";	
				
			echo'	<hr class="soft"/>


				


				<hr class="soft"/>


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






			//$sessionemail=$_SESSION['sess_array']['0'];
			$session=$_SESSION['sess_array']['1'];

				$ress= mysqli_query($server, "SELECT * FROM ordered_products WHERE session='$session'");
			    while($colms=mysqli_fetch_array($ress, MYSQLI_NUM))
				 {

			echo"                <tr>";
			echo"                  <td> <img width='30'  src='e_images/$colms[8]' alt=''/></td>";
			echo"                  <td>$colms[2] - $colms[4]<br/>$colms[7].";
			echo"				  <td>";

			echo"	<a href='e_summary.php?idp=$colms[0]'></a>";
			echo'
			<div class="input-append"><input class="span1" name="quantity" value="'.$colms[9].'" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text">
			
			</button>';
			

			echo"	<a href='e_summary.php?idp=$colms[0]'>";
			echo"	<button  class='btn' type='button'>";
			echo'	<i class="icon-plus"></i>';
			echo'	</button>';
			echo"	</a>";
			echo"	<a href='e_summary.php?id=$colms[0]'>";
			echo"	<button class='btn btn-danger'  type='button'>";
			echo'	<i class="icon-remove icon-white"></i>';
			echo'	</button>';
			echo"	</a>";
			echo "</div>";
			echo"				   </td>";
			echo"                  <td>ksh.$colms[5]</td>";
			
			$totalprice = $colms[5]*$colms[9];

			$total=($totalprice);

			echo"                  <td>ksh.$total</td>";
			echo"                </tr>";

				 }
			


			//BELOW CODE DELETES CONTENT FROM THE CAT SECTION
			//Check if id was set*/

		

			echo'<tr>';

			//BELOW CALCULATE THE TOTAL PRICE OF SHOPPING LIST
			$total =  mysqli_query($server, "SELECT SUM(current_price*quantity) AS value_sum FROM ordered_products WHERE session='$session' AND email='$sesssionemail'  ");
			$row = mysqli_fetch_array($total);
			$totalcash = $row['value_sum'];
			echo"<td colspan='4' style='text-align:right'><strong>TOTAL:</strong></td>";
			echo"              <td class='label label-important' style='display:block'> <strong>ksh.".number_format($totalcash)."</strong></td>
			      </tr>
				</tbody>
			</table>";

				//Recording order
				     $tempIdO = md5($totalcash+$session);
			         $no_products = $itemscart;
			         $total = $totalcash;
			         $session = $session;
			         $email = $sesssionemail;
			         $date = date("d M Y");
			         $time  = date("H:i:s a"); 
			         $deliveryReport = 'Pending';

			         $order =  mysqli_query($server, "INSERT INTO `collective_order`(`tempId`,
			          `no_products`, `total`, `session`, `email`, `date`, `time`, `deliveryReport`) VALUES ('$tempIdO','$no_products', '$total','$session','$email','$date','$time', '$deliveryReport')") ;
			         	//prevent next steps
			         		$count =mysqli_query($server,"SELECT COUNT(*) FROM ordered_products WHERE session='$session'");
							$row = mysqli_fetch_array($count, MYSQLI_NUM);
							$itemscart= $row[0];

							if ($itemscart == 0) {
							echo'	<div class="alert alert-block alert-error fade in">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Cart is empty.  </strong><br>
							Please select an item to continue shopping.</div>';
							}else{
								if($totalcash < 500){
								echo'	<div class="alert alert-block alert-error fade in">
								<button type="button" class="close" data-dismiss="alert">×</button>
								Your items should exceed <strong>Sh.500</strong> to proceed to cart. Please add more items to cart.</div>';
								
								}else{
									echo "	
									<label class='control-label'><strong>Estimate Shipping Cost: </strong> </label>
													
									<table class='table table-bordered'>
						              <thead>
						                <tr >
						                <td>
											<form class='form-horizontal' method='post'>
												<div class='control-group'>
													<div class='controls'>";
$select_locations = mysqli_query($server, "SELECT * FROM `locations` ORDER BY `locations`.`location` ASC") or die('Mysql_error fetching locations');
echo" <select name='location' onchange='locations(this.value)'>
		<option value=''>Select Destination:</option>";
	    while($colms = mysqli_fetch_array($select_locations))
		{echo "	<option value='$colms[0]'>$colms[1]</option>";}
echo" </select>";
										echo"		</div>
												</div>
											</form>
											
										</td>
										</tr>

										<tr id='locationCost'>

										</tr>

						               </thead>
						            </table>";
									
						     	echo "<a href='e_address.php' class='btn pull-right btn-success'>Next <i class='icon-arrow-right'></i></a>";
								}
							}
				//Recording order
			



			}
			else
			{


			//below counts number of items in cart when email has been set
			$count =mysqli_query($server,"SELECT COUNT(*) FROM ordered_products WHERE session='$session' AND email='$sesssionemail'");
			$row = mysqli_fetch_array($count, MYSQLI_NUM);
			$itemscart= $row[0];	

			echo"	<h4>  SHOPPING CART [ <small>$itemscart Item(s) </small>]</h4>";	
				
			echo'	<hr class="soft"/>

			


				<hr class="soft"/>



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






			//$sessionemail=$_SESSION['sess_array']['0'];
			$session=$_SESSION['sess_array']['1'];

				$ress= mysqli_query($server, "SELECT * FROM ordered_products WHERE session='$session'");
			    while($colms=mysqli_fetch_array($ress, MYSQLI_NUM))
				 {

			echo"                <tr>";
			echo"                  <td> <img width='30'  src='e_images/$colms[8]' alt=''/></td>";
			echo"                  <td>$colms[2] - $colms[4]<br/>$colms[7].";
			echo"				  <td>";

			echo"	<a href='e_summary.php?idp=$colms[0]'></a>";
			echo'
			<div class="input-append"><input class="span1" name="quantity" value="'.$colms[9].'" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text">
			
			</button>';
			

			echo"	<a href='e_summary.php?idp=$colms[0]'>";
			echo"	<button  class='btn' type='button'>";
			echo'	<i class="icon-plus"></i>';
			echo'	</button>';
			echo"	</a>";
			echo"	<a href='e_summary.php?id=$colms[0]'>";
			echo"	<button class='btn btn-danger'  type='button'>";
			echo'	<i class="icon-remove icon-white"></i>';
			echo'	</button>';
			echo"	</a>";
			echo "</div>";
			echo"				   </td>";
			echo"                  <td>ksh.$colms[5]</td>";
			
			$totalprice = $colms[5]*$colms[9];

			$total=($totalprice);

			echo"                  <td>ksh.$total</td>";
			echo"                </tr>";

				 }
			


			//BELOW CODE DELETES CONTENT FROM THE CAT SECTION
			//Check if id was set*/

		

			echo'<tr>';

			//BELOW CALCULATE THE TOTAL PRICE OF SHOPPING LIST
			$total =  mysqli_query($server, "SELECT SUM(current_price*quantity) AS value_sum FROM ordered_products WHERE session='$session' AND email='$sesssionemail'  ");
			$row = mysqli_fetch_array($total);
			$totalcash = $row['value_sum'];
			echo"<td colspan='4' style='text-align:right'><strong>TOTAL:</strong></td>";
			echo"              <td class='label label-important' style='display:block'> <strong>ksh.".number_format($totalcash)."</strong></td>
			      </tr>
				</tbody>
			</table>";

			    ///////////////
				//Recording order
				//Recording order
				     $tempIdO = md5($totalcash+$session);
			         $no_products = $itemscart;
			         $total = $totalcash;
			         $session = $session;
			         $email = $sesssionemail;
			         $date = date("d M Y");
			         $time  = date("H:i:s a"); 
			         $deliveryReport = 'Pending';
			         $points = ($total/100);

			         $order =  mysqli_query($server, "INSERT INTO `collective_order`(`tempId`,
			          `no_products`, `total`, `session`, `email`, `date`, `time`, `deliveryReport`, `points` ) VALUES ('$tempIdO','$no_products', '$total','$session','$email','$date','$time', '$deliveryReport', '$points')") ;


			         		//prevent next steps
			         		$count =mysqli_query($server,"SELECT COUNT(*) FROM ordered_products WHERE session='$session' AND email='$sesssionemail'");
							$row = mysqli_fetch_array($count, MYSQLI_NUM);
							$itemscart= $row[0];
				
	
							if ($itemscart == 0) {
							echo'	<div class="alert alert-block alert-error fade in">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Cart is empty.  </strong><br>
							Please select an item to continue shopping.</div>';
							}else{
								if($totalcash < 500){
								echo'	<div class="alert alert-block alert-error fade in">
								<button type="button" class="close" data-dismiss="alert">×</button>
								Yor items should exceed <strong>Sh.500</strong> to proceed to cart. Please add more items to cart.</div>';
								
								}else{
									echo "	
									<label class='control-label'><strong>Estimate Shipping Cost: </strong> </label>
													
									<table class='table table-bordered'>
						              <thead>
						                <tr >
						                <td>
											<form class='form-horizontal' method='post'>
												<div class='control-group'>
													<div class='controls'>";
$select_locations = mysqli_query($server, "SELECT * FROM `locations` ORDER BY `locations`.`location` ASC") or die('Mysql_error fetching locations');
echo" <select name='location' onchange='locations(this.value)'>
		<option value=''>Select Destination:</option>";
	    while($colms = mysqli_fetch_array($select_locations))
		{echo "	<option value='$colms[0]'>$colms[1]</option>";}
echo" </select>";
										echo"		</div>
												</div>
											</form>
											
										</td>
										</tr>

										<tr id='locationCost'>

										</tr>

						               </thead>
						            </table>";
									
						     	echo "<a href='e_address.php' class='btn pull-right btn-success'>Next <i class='icon-arrow-right'></i></a>";
								}
							}
	//Recording order

			}
}
//MAJOR IF FUNCTION
else{


			$sesssionemail=$_SESSION['sess_array']['0'];
			$session = $_SESSION['sess_array']['1'];
			if($sesssionemail=='no_email')

			{
			//below counts number of items in cart when email is not set
			$count =mysqli_query($server,"SELECT COUNT(*) FROM ordered_products WHERE session='$session'");
			$row = mysqli_fetch_array($count, MYSQLI_NUM);
			$itemscart= $row[0];	
			echo"	<h4>  SHOPPING CART [ <small>$itemscart Item(s) </small>]</h4>";	
			echo'	<hr class="soft"/>
				<hr class="soft"/>
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

			$session=$_SESSION['sess_array']['1'];

				$ress= mysqli_query($server, "SELECT * FROM ordered_products WHERE session='$session'");
			    while($colms=mysqli_fetch_array($ress, MYSQLI_NUM))
				 {

			echo"                <tr>";
			echo"                  <td> <img width='30'  src='e_images/$colms[8]' alt=''/></td>";
			echo"                  <td>$colms[2] - $colms[4]<br/>$colms[7].";
			echo"				  <td>";

			echo"	<a href='e_summary.php?idp=$colms[0]'></a>";
			echo'
			<div class="input-append"><input class="span1" name="quantity" value="'.$colms[9].'" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text">
			</button>';

			echo"	<a href='e_summary.php?idp=$colms[0]'>";
			echo"	<button  class='btn' type='button'>";
			echo'	<i class="icon-plus"></i>';
			echo'	</button>';
			echo"	</a>";
			echo"	<a href='e_summary.php?id=$colms[0]'>";
			echo"	<button class='btn btn-danger'  type='button'>";
			echo'	<i class="icon-remove icon-white"></i>';
			echo'	</button>';
			echo"	</a>";
			echo "</div>";
			echo"				   </td>";
			echo"                  <td>ksh.$colms[5]</td>";
			
			$totalprice = $colms[5]*$colms[9];

			$total=($totalprice);

			echo"                  <td>ksh.$total</td>";
			echo"                </tr>";

				 }
			//BELOW CODE DELETES CONTENT FROM THE CAT SECTION

			echo'<tr>';

			//BELOW CALCULATE THE TOTAL PRICE OF SHOPPING LIST
			$total =  mysqli_query($server, "SELECT SUM(current_price*quantity) AS value_sum FROM ordered_products WHERE session='$session' AND email='$sesssionemail'  ");
			$row = mysqli_fetch_array($total);
			$totalcash = $row['value_sum'];
			echo"<td colspan='4' style='text-align:right'><strong>TOTAL:</strong></td>";
			echo"              <td class='label label-important' style='display:block'> <strong>ksh.".number_format($totalcash)."</strong></td>
			      </tr>
				</tbody>
			</table>";

			//////////////////

				//Recording order
			         $tempIdO = md5($totalcash+$session);
			         $no_products = $itemscart;
			         $total = $totalcash;
			         $session = $session;
			         $email = $sesssionemail;
			         $date = date("d M Y");
			         $time  = date("H:i:s a"); 
			         $deliveryReport = 'Pending';


			         $order =  mysqli_query($server, "INSERT INTO `collective_order`(`tempId`,
			          `no_products`, `total`, `session`, `email`, `date`, `time`, `deliveryReport` ) VALUES ('$tempIdO','$no_products', '$total','$session','$email','$date','$time', '$deliveryReport')") ;

			         	//prevent next step
	
							if ($itemscart == 0) {
							echo'	<div class="alert alert-block alert-error fade in">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Cart is empty.  </strong><br>
							Please select an item to continue shopping.</div>';
							}else{
								if($totalcash < 500){
								echo'	<div class="alert alert-block alert-error fade in">
								<button type="button" class="close" data-dismiss="alert">×</button>
								Yor items should exceed <strong>Sh.500</strong> to proceed to cart. Please add more items to cart.</div>';
								
								}else{
									echo "	
									<label class='control-label'><strong>Estimate Shipping Cost: </strong> </label>
													
									<table class='table table-bordered'>
						              <thead>
						                <tr >
						                <td>
											<form class='form-horizontal' method='post'>
												<div class='control-group'>
													<div class='controls'>";
$select_locations = mysqli_query($server, "SELECT * FROM `locations` ORDER BY `locations`.`location` ASC") or die('Mysql_error fetching locations');
echo" <select name='location' onchange='locations(this.value)'>
		<option value=''>Select Destination:</option>";
	    while($colms = mysqli_fetch_array($select_locations))
		{echo "	<option value='$colms[0]'>$colms[1]</option>";}
echo" </select>";
										echo"		</div>
												</div>
											</form>
											
										</td>
										</tr>

										<tr id='locationCost'>

										</tr>

						               </thead>
						            </table>";
									
						     	echo "<a  href='e_address.php' class='btn pull-right btn-success'>Next <i class='icon-arrow-right'></i></a>";
								}
							}
			//Recording order
			



			}
			else
			{


			//below counts number of items in cart when email has been set
			$count =mysqli_query($server,"SELECT COUNT(*) FROM ordered_products WHERE session='$session' AND email='$sesssionemail'");
			$row = mysqli_fetch_array($count, MYSQLI_NUM);
			$itemscart= $row[0];	

			echo"	<h4>  SHOPPING CART [ <small>$itemscart Item(s) </small>]</h4>";	
				
			echo'	<hr class="soft"/>

			


				<hr class="soft"/>



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






			//$sessionemail=$_SESSION['sess_array']['0'];
			$session=$_SESSION['sess_array']['1'];

				$ress= mysqli_query($server, "SELECT * FROM ordered_products WHERE session='$session'");
			    while($colms=mysqli_fetch_array($ress, MYSQLI_NUM))
				 {

			echo"                <tr>";
			echo"                  <td> <img width='30'  src='e_images/$colms[8]' alt=''/></td>";
			echo"                  <td>$colms[2] - $colms[4]<br/>$colms[7].";
			echo"				  <td>";

			echo"	<a href='e_summary.php?idp=$colms[0]'></a>";
			echo'
			<div class="input-append"><input class="span1" name="quantity" value="'.$colms[9].'" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text">
			
			</button>';
			

			echo"	<a href='e_summary.php?idp=$colms[0]'>";
			echo"	<button  class='btn' type='button'>";
			echo'	<i class="icon-plus"></i>';
			echo'	</button>';
			echo"	</a>";
			echo"	<a href='e_summary.php?id=$colms[0]'>";
			echo"	<button class='btn btn-danger'  type='button'>";
			echo'	<i class="icon-remove icon-white"></i>';
			echo'	</button>';
			echo"	</a>";
			echo "</div>";
			echo"				   </td>";
			echo"                  <td>ksh.$colms[5]</td>";
			
			$totalprice = $colms[5]*$colms[9];

			$total=($totalprice);

			echo"                  <td>ksh.$total</td>";
			echo"                </tr>";

				 }
			


			//BELOW CODE DELETES CONTENT FROM THE CAT SECTION		

			echo'<tr>';

			//BELOW CALCULATE THE TOTAL PRICE OF SHOPPING LIST
			$total =  mysqli_query($server, "SELECT SUM(current_price*quantity) AS value_sum FROM ordered_products WHERE session='$session' AND email='$sesssionemail'  ");
			$row = mysqli_fetch_array($total);
			$totalcash = $row['value_sum'];
			echo"<td colspan='4' style='text-align:right'><strong>TOTAL:</strong></td>";
			echo"              <td class='label label-important' style='display:block'> <strong>ksh.".number_format($totalcash)."</strong></td>
			      </tr>
				</tbody>
			</table>";

				//Recording order
				     $tempIdO = md5($totalcash+$session);
			         $no_products = $itemscart;
			         $total = $totalcash;
			         $session = $session;
			         $email = $sesssionemail;
			         $date = date("d M Y");
			         $time  = date("H:i:s a"); 
			         $deliveryReport = 'Pending';
			         $points = ($total/100);

			         $order =  mysqli_query($server, "INSERT INTO `collective_order`(`tempId`,
			          `no_products`, `total`, `session`, `email`, `date`, `time`, `deliveryReport`, `points` ) VALUES ('$tempIdO','$no_products', '$total','$session','$email','$date','$time', '$deliveryReport', '$points')") ;

			 			$count =mysqli_query($server,"SELECT COUNT(*) FROM ordered_products WHERE session='$session' AND email='$sesssionemail'");
						$row = mysqli_fetch_array($count, MYSQLI_NUM);
						$itemscart= $row[0];	
							if ($itemscart == 0) {
							echo'	<div class="alert alert-block alert-error fade in">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Cart is empty.  </strong><br>
							Please select an item to continue shopping.</div>';
							}else{
								if($totalcash < 500){
								echo'	<div class="alert alert-block alert-error fade in">
								<button type="button" class="close" data-dismiss="alert">×</button>
								Yor items should exceed <strong>Sh.500</strong> to proceed to cart. Please add more items to cart.</div>';
								
								}else{
									echo "	
									<label class='control-label'><strong>Estimate Shipping Cost: </strong> </label>
													
									<table class='table table-bordered'>
						              <thead>
						                <tr >
						                <td>
											<form class='form-horizontal' method='post'>
												<div class='control-group'>
													<div class='controls'>";
$select_locations = mysqli_query($server, "SELECT * FROM `locations` ORDER BY `locations`.`location` ASC") or die('Mysql_error fetching locations');
echo" <select name='location' onchange='locations(this.value)'>
		<option value=''>Select Destination:</option>";
	    while($colms = mysqli_fetch_array($select_locations))
		{echo "	<option value='$colms[0]'>$colms[1]</option>";}
echo" </select>";
										echo"		</div>
												</div>
											</form>
											
										</td>
										</tr>

										<tr id='locationCost'>

										</tr>

						               </thead>
						            </table>";
									
							     	//echo "<a  onclick='getLocationS()' class='btn pull-right btn-success'>Next <i class='icon-arrow-right'></i></a>";
							     	echo "<a href='e_address.php' class='btn pull-right btn-success'>Next <i class='icon-arrow-right'></i></a>";
								}
							}
			
			//Recording order

			}
}
echo "<a href='e_products.php' class='btn  pull-left'><i class='icon-arrow-left'></i> Continue Shopping </a><br/><br/>";

 

$_SESSION['sess_array']['3']= $tempIdO; 	
			

?>

<!--location-->                                                                                                                                                                           
<p id="demo"></p>
<script>
var x = document.getElementById("demo");


//send location to server
function getLocationS() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPositionC);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPositionC(position) {
    //x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
	
	window.location.href = "e_address.php?lat=" + position.coords.latitude + "&long=" +position.coords.longitude; 	
}
//end send location to server

//error handling
function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}
//end error handling
</script>
<!--Location-->

            <table class="table table-bordered">
			<tbody>
				 <tr>
                  <td> 
				<form class="form-horizontal">
				<div class="control-group">
				<label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
				<div class="controls">
				<input type="text" class="input-medium" placeholder="CODE">
				<button type="submit" class="btn"> Redeem </button>
				</div>
				</div>
				</form>
				</td>
                </tr>
				
			</tbody>
			</table>
			
			
	 


			
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->


<!-- Footer ================================================================== -->
<?php
include 'footer.php';
?>
<!-- Footer ================================================================== -->




<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	




</body>
</html>