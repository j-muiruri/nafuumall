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



if(!isset($_SESSION['sess_array']['0']))
{

//if email is not set

$session=$_SESSION['sess_array']['1'];

//below counts number of items placed in the cart
$count = mysqli_query($server, "SELECT COUNT(*) FROM ordered_products WHERE session='$session' ");
$row = mysqli_fetch_array($count, MYSQLI_NUM);

$total= $row[0];



echo'		<a href="e_summary.php">';
echo'		<span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white">';
//echo"		</i> View your cart </span> </a> ";

echo"		</i> [<b> $total</b>] Items in your cart </span> </a> ";
}
else
{
$session=$_SESSION['sess_array']['1'];
$sessionemail=$_SESSION['sess_array']['0'];
//below counts number of items placed in the cart
$count = mysqli_query($server, "SELECT COUNT(*) FROM ordered_products WHERE session='$session' AND email='$sessionemail' ");
$row = mysqli_fetch_array($count, MYSQLI_NUM) ;

$total= $row[0];

echo'		<a href="e_summary.php">';
echo'		<span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white">';


echo"		</i> [<b> $total</b>] Items in your cart </span> </a> ";

}

?>