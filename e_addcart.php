 <?php

//Connecting with the server
$server = mysqli_connect("localhost","nafuumall","ecommerce_2020_") or die('Failed to connect');
$db = mysqli_select_db($server, "nafuumall_db") or die('Failed to database connect');

//starting session
session_start();


$ipaddress = $_SERVER['REMOTE_ADDR'];


if(!isset($_SESSION['sess_array']['0']) )
													
{
$_SESSION['sess_array']['0']= 'no_email';
$_SESSION['sess_array']['1']= date('s:r'.$ipaddress);
$_SESSION['sess_array']['2']= $ipaddress;

}
else
{
//There is session
$email = $_SESSION['sess_array']['0'];
}

//	ADDING STUFF TO CART
if(isset($_GET['idcart']))
{		
			
	$idcart= intval($_GET['idcart']);
	
	$ess=mysqli_query($server, "SELECT * FROM product_details WHERE product_id='$idcart'");


		    while($colms= mysqli_fetch_array($ess))
			 {
	$product_id = $idcart;
	$name = $colms[1];
	$cat_name = $colms[2];
	$sub_name = $colms[3];
	$current_price = $colms[4];
	$short_description = $colms[6];
	$image_1 = $colms[8];
	$quantity= 1;
	$session = $_SESSION['sess_array']['1'];
	$email = $_SESSION ['sess_array']['0'];
	$date=date('D:d,M,Y ');
	$time= date("G:i:s");
	$ipsession = $_SESSION['sess_array']['2'];
	$discount = $colms[14];
			}
	$insert = mysqli_query($server, "INSERT INTO `ordered_products`(`product_id`, `name`, `cat_name`, `sub_name`, `current_price`, `short_description`, `image_1`, `quantity`, `session`, `email`, `ipsession`, `date`, `time`, `discount`) VALUES ('$product_id','$name','$cat_name','$sub_name','$current_price','$short_description','$image_1','$quantity','$session','$email','$date','$time','$ipsession', '$discount')") or die('mysql_error');
}

//	ADDING STUFF TO CART
?>
