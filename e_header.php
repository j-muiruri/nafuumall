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
?>
  <head>
      
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">

<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>

<body>

<div id="header">
<div class="container">


<div id="welcomeLine" class="row" width="100%">

<div class="span6">


<!--Below contains content for logged in users-->
<?php

if (  $_SESSION['sess_array']['0'] !== 'no_email') {
	$myemail = $_SESSION['sess_array']['0'];
//account menu
$select =  mysqli_query($server, "SELECT * FROM `registration_details` WHERE email='$myemail'");
		while ($colms =mysqli_fetch_array($select, MYSQLI_NUM)) {


			echo "
		<div class='dropdown pills'>
  		<a class='dropdown-toggle' data-toggle='dropdown' href='#' >Logged in as:<strong> $colms[1] </strong><span class='icon-user'></span></a>
        <ul class='dropdown-menu' role='menu' aria-labelledby='menu1'>
        <li role='presentation'><a role='menuitem' tabindex='-1' href='#'>Account info <span class'icon-use'></span></a></li>
          <li role'presentatio'><a role'menuite' tabindex'-' href='e_settings.php'>Settings   <span class='icon-wrench'></span></a></li>
          <li role='presentation'><a role='menuitem' tabindex='-1' href='e_summary.php'>Orderd<span class='icon-shopping-cart'></span></a></li>
          <li role='presentation' class='divider'></li>
          <li role='presentation'><a role='menuitem' tabindex='-1' onclick='logoutPrompt()' href='index.php?log_out'>Log out</a></li>
        </ul>
		</div>";
		}
//account menu


}
else
{

echo "Welcome";
}

?>
<!--Above contains content for logged in users-->


<!--code destroying sesions-->
<?php

if(isset($_GET['log_out']))
{
$log_out = $_GET['log_out'];

session_destroy();
header("location:index.php");
}

?>





</div>

 


	<div class="span6">
	<div class="pull-right">

<script >
//reload cart section
var timeout = setInterval(reloadCart, 1000);    
function reloadCart () {

$('#cartCount').load('e_cartCount.php');
}
</script>

<!--Displays no  of items in cart-->
<body onload="cartCount()">
<a href="tel:0792176174"><span class="btn btn-mini">In a hurry? Call Us & 0rder: 0792176174</span></a>
<span id="cartCount">


</span>
</body>

	</div>
	</div>
</div>


<!-- Navbar ================================================== -->


<div id="logoArea" class="navbar navbar">
<a id="smallScreen" data-target="#myNavbar" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>



  <div class="navbar-inner">
    <a class="brand" href="index.php"><img src="themes/images/nafuumall.png" alt="Nafuumall"/></a>

<!--trying================================================================================-->

	<ul id="sideManu" class="">
		
		
    
<form   class="form-inline navbar-search" enctype='multipart/form-data'  action="e_prodSearch.php" method="post">
    <div class="search-box form-control">

        <!--<input id="srchFld" class="srchTxt" type="text"  name="search_key" autocomplete="off" placeholder="       Search by name..." />-->

        <input  type="text"  name="search_key" autocomplete="off" placeholder="       Search by name..." />


        <div class="result"></div>
    </div>

        <button name="ok" type="submit" id="submitButton" class="btn btn-primary">Go</button>
</form>



    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="e_products.php">More Items</a></li>
	 <li class=""><a href="offers.php">Offers</a></li>
	 <li class=""><a href="e_contact.php">Contact Us</a></li>
	 
<?php

if($_SESSION['sess_array']['0'] == 'no_email')
{
echo'
	 <li class="">
	 <a href="#login" role="button" data-toggle="modal" style="padding-right:0">
	 <span class="btn btn-medium btn-success">Login</span></a>
	 </li>
	 ';
	}
	else
	{
	}

?>	 


	 </ul>

	 


	<div id="login" class="modal hide fade in span4 " tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login </h3>
		  </div>

		  <div class="modal-body">

			<!--below is the log in form=====================-->	
				
				
			<form method="POST" class="center">

			  <div class="control-group">
				<label class="control-label" for="inputEmail1">Email</label>
				<div class="controls">
				  <input class="span3"  name="email" type="email" id="inputEmail1" placeholder="johndoe@gmail.com" required="" >
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword1">Password</label>
				<div class="controls">
				  <input name="password" type="password" class="span3"  id="inputPassword1" placeholder="Password" >
				</div>
			  </div>


 			<div class="control-group">
				<label class="checkbox">
				<input type="checkbox"> Remember me
				</label>
			  </div>

			  <div class="control-group">
				<div class="controls">
				  <button name="enter" type="submit" class="btn btn-success">Sign in</button> <a href="passwordreset.php">Forgot password?</a></br>
				   <a  href="e_register.php">Create account</a>
				</div>
			  </div>
			</form>
		
		


			<!--PHP CODE STARTS HERE-->
<?php
if (isset($_POST['enter']))
{
//variables defined & set to empty
$emailerr = $passworderr = "";
$email = $password = "";

		//validating function
		function test_input($data) {
		   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		}
		//validating function

   		if (empty($_POST["email"])) {
   		  $emailErr = '<div class="alert alert-block alert-danger fade in">
			    		<button type="button" class="close" data-dismiss="alert">×</button>
		    *Email is required. 	</div>';
   		} else {
   		  $email = test_input($_POST["email"]);
   		  // check if e-mail address is well-formed
   		  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   		    $emailErr = '<div class="alert alert-block alert-danger fade in">
			    		<button type="button" class="close" data-dismiss="alert">×</button>
		    Invalid email format. 	</div>'; 
   		  }
   		}

$password=md5($_POST['password']);

if ($emailerr != null) {
		  echo'	<div class="alert alert-block alert-danger fade in">';
	  	
			echo'	<button type="button" class="close" data-dismiss="alert">×</button>';
			echo"	<strong></strong>Invalid entry<br/>";
			echo "	 Check the details you entered and try again.";
			echo" 	</div>";
}else{

$res= mysqli_query($server, "SELECT * FROM registration_details WHERE email='$email' AND password='$password'");
//check rows returned
$count= mysqli_num_rows($res);

if($count<1)
{





echo'	<div class="alert alert-block alert-error fade in">';
echo'	<button type="button" class="close" data-dismiss="alert">×</button>';
echo"	<strong>Failed to log in.</strong>Wrong email or password.<br/>"; 
echo" 	</div>";
}
else
{
//on success, redirect
//Create a session
//session_start ();



$_SESSION['sess_array']=array();
$_SESSION['sess_array']['0']=$email;
$_SESSION['sess_array']['1']=date('r');


$url = $_SERVER['REQUEST_URI'];
	echo'<meta http-equiv="REFRESH" content="0;url='.$url.'">';

}
}

}
?>
<!--PHP CODE ENDS HERE-->


		
		  </div>



	</div>
	</li>
    </ul>
</ul>

<!--End trying==================================================================-->




<div class="collapse navbar-collapse" id="myNavbar">




<form   class="form-inline navbar-search" enctype='multipart/form-data'  action="e_prodSearch.php" method="post">
    <div class="search-box form-control">

        <!--<input id="srchFld" class="srchTxt" type="text"  name="search_key" autocomplete="off" placeholder="       Search by name..." />-->

        <input  type="text"  name="search_key" autocomplete="off" placeholder="       Search by name..." />


        <div class="result"></div>
    </div>

        <button name="ok" type="submit" id="submitButton" class="btn btn-primary">Go</button>
</form>



    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="e_products.php">More Items</a></li>
	 <li class=""><a href="offers.php">Offers</a></li>
	 <li class=""><a href="e_contact.php">Contact</a></li>
	 
<?php

if($_SESSION['sess_array']['0'] == 'no_email')
{

	echo'<li class="">
	 <a href="#login" role="button" data-toggle="modal" style="padding-right:0">
	 <span class="btn btn-medium btn-success">Login</span></a>
	 </li>';
	}
	else
	{
	 echo'<li class="">
	 <a href="header.php?log_out" onclick="logoutPrompt()" style="padding-right:0" >
	 <span class="btn btn-medium btn-success">Log Out</span></a>
	 </li>';
	 }
?>	 


	 </ul>

	 




	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login Block</h3>
		  </div>

		  <div class="modal-body">

			<!--below is the log in form=====================-->			
			<form method="POST">
			  <div class="control-group">
				<label class="control-label" for="inputEmail1">Email</label>
				<div class="controls">
				  <input class="span3"  name="email"type="email" id="inputEmail1" placeholder="e.g johndoe@gmail.com" >
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword1">Password</label>
				<div class="controls">
				  <input name="password" type="password" class="span3"  id="inputPassword1" placeholder="Password" >
				</div>
			  </div>


 			<div class="control-group">
				<label class="checkbox">
				<input type="checkbox"> Remember me
				</label>
			  </div>

			  <div class="control-group">
				<div class="controls">
				  <button name="enter" type="submit" class="btn btn-success">Sign in</button> <a href="passwordreset.php">Forgot password?</a>
				   <a  href="registertrial.php"><button class="btn">Sign up</button></a>
				</div>
			  </div>
			</form>


		
		  </div>



	</div>
	</li>
    </ul>
  </div>
</div>
</div>
</div>
</div>

<!--pop up on added to cart-->
	<div id="cartAdded" class="modal hide fade in " tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >

		  <div class="modal-body">

		 	<div class="alert alert-block alert-success fade in">
				 Item was successfully <strong>added to cart</strong>. Please note that delivery takes 1-3 days.
		 	</div>

			  <div class="control-group">
				<div class="controls">
				<a class="btn btn-default">  <button type="button" class="close" data-dismiss="modal">Continue shopping</button></a>
				   <a  href="e_summary.php" class="btn btn-success">Checkout</a>
				</div>
			  </div>
		  </div>
  </div>

  <div id="cartAddedOverseas" class="modal hide fade in " tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >

		  <div class="modal-body">

		 	<div class="alert alert-block alert-success fade in">
				 Item was successfully <strong>added to cart</strong>. Please note that items shipped from overseas takes 3 - 7 days to be delivered.
		 	</div>

			  <div class="control-group">
				<div class="controls">
				<a class="btn btn-default">  <button type="button" class="close" data-dismiss="modal">Continue shopping</button></a>
				   <a  href="e_summary.php" class="btn btn-success">Checkout</a>
				</div>
			  </div>
		  </div>
  </div>

<!--end pop up-->

<script>
//when user wants to log out
function logoutPrompt() {
    var x;
    if (confirm("Are you sure you want to log out?") == true) {
        x = "OK!";
    } else {
        x = "Cancel!";
    }
    document.getElementById("demo").innerHTML = x;
}
</script>

 <script>

//AJAX adding to cart
function addCart(str) {
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
	    if (this.readyState == 4 && this.status == 200) {
	      document.getElementById("txtHint").innerHTML=this.responseText;
		  alert("Item added to cart.");
	    }
  }
  xmlhttp.open("GET","e_addcart.php?idcart="+str,true);
  xmlhttp.send();

  cartCount();
}
//END AJAX adding to cart


//AJAX Counting items  in cart
function cartCount() {

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
	    if (this.readyState == 4 && this.status == 200) {
	      document.getElementById("cartCount").innerHTML=this.responseText;
	    }
  }
  xmlhttp.open("GET","e_cartCount.php",true);
  xmlhttp.send();
}
//END AJAX Counting items  in cart

//AJAx location cost
function locations(str) {
  if (str=="") {
    document.getElementById("locationCost").innerHTML="";
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
      document.getElementById("locationCost").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","e_locations.php?q="+str,true);
  xmlhttp.send();
}
//END Ajax location cost
</script>


<!--Searching products-->

<style type="text/css">
  
    /* Formatting search box */
    .search-box{
        width: 250px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: relative;        
        z-index: 999;
        top: 100%;
        left: 0;
        background: #ffffff;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

<!--search products-->



<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117934641-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-117934641-1');
</script>

