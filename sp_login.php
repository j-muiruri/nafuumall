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
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->

<!-- Sidebar end============================================ -->
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Login</li>
    </ul>
	<h3 align="center">Welcome to Nafuumall Seller Point.</h3>	
	<hr class="soft"/>


<?php
if (isset($_POST['enter']))
{
 	

//variables defined & set to empty
$emailerr = $passworderr = "";
$email = $password = "";

		//validating function
		function test_inputL($data) {
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
   		  $email = test_inputL($_POST["email"]);
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

$res= mysqli_query($server, "SELECT * FROM seller_details WHERE email='$email' AND password='$password'") or 
die(mysql_error());
//check rows returned
$count=mysqli_num_rows($res);

if($count<1)
{

echo'	<div class="alert alert-block alert-error fade in">';
echo'	<button type="button" class="close" data-dismiss="alert">×</button>';
echo"	<strong>Failed to log in.</strong>Wrong email or password.<br/>"; 
echo" 	</div>";
}
else
{


$_SESSION['eliud']=array();
$_SESSION['eliud']['0']=$email;
$_SESSION['eliud']['1']=date('r');



//header("location:sp_contpanl.php");
header("location:postitem.php");
}
}

}
?>
	
	<div class="row">
		<div class="span2"></div>
		<div class="span4"> 
			<div class="well">
			<h5>CREATE YOUR ACCOUNT</h5><br/>
			Enter your e-mail address to create an account.<br/><br/><br/>

			<form method="POST" action="sp_register.php">
			  <div class="control-group">
				<label class="control-label" for="inputEmail0">E-mail address</label>
				<div class="controls">
				  <input class="span3"  type="email" id="inputEmail0" name="regEmail" placeholder="Email" required="">
				</div>
			  </div>
			  <div class="controls">
			  <button type="submit" class="btn block">Create Your Account</button>
			  </div>
			</form>

		</div> 
		</div>
		<div class="span1"> &nbsp;</div>
		<div class="span4">
			<div class="well">




			<h5>ALREADY REGISTERED ?</h5>




<!--below is the log in form=====================-->			
			<form method="POST">
			  <div class="control-group">
				<label class="control-label" for="inputEmail1">Email</label>
				<div class="controls">
				  <input class="span3"  name="email"type="email" id="inputEmail1" placeholder="johndoe@gmail.com" required>
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword1">Password</label>
				<div class="controls">
				  <input name="password" type="password" class="span3"  id="inputPassword1" placeholder="Password" required>
				</div>
			  </div>
			  <div class="control-group">
				<div class="controls">
				  <button name="enter" type="submit" class="btn">Sign in</button> <a href="passwordreset.php">Forgot password?</a>
				</div>
			  </div>
			</form>
<!--The log in form ends here======================-->	


		</div>
		</div>
		<div class="span2"></div>
	</div>	
	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

<?php
include 'footer.php';
?>


<!--Footer ends here-->
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	
	<!-- Themes switcher section ============================================================================================= -->



	<!--Theme switcher ends here-->

</body>
</html>