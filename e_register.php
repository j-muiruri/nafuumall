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
<body>
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<?php
	echo "<div id='sideManu' class='span3'>";
		include 'e_sidebar.php';
	echo "</div>";
?>
<!-- Sidebar end============================================ -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
    </ul>
	<h3> Registration</h3>	
	<div class="well">


<!--PHP CODE STARTS HERE-->

<?php

if(isset($_POST['register']))
{
//define variables and set to empty values
$nameErr = $emailErr = $passwordErr = $reenter_passwordErr = $date_of_birthErr  = "";
$name = $email = $password = $reenter_password =   $date_of_birth = "";

//validating function
		function test_input($data) {
		   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		}
//validating function
	if (empty($_POST['name'])) {
			$nameErr = '<div class="alert alert-block alert-danger fade in">
			    		<button type="button" class="close" data-dismiss="alert">×</button>
		    *Name is required. 	</div>';	  	
		}
		else{
			$name  = test_input($_POST['name']);
			// check if name only contains letters and whitespace
     		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
     		  $nameErr = '<div class="alert alert-block alert-danger fade in">
			    		<button type="button" class="close" data-dismiss="alert">×</button>
		    Only letters and white space are allowed. 	</div>'; 
     		}
		}

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

$password = md5($_POST['password']);
$reenter_password = md5($_POST['reenter_password']);
$date_of_birth = $_POST['date_of_birth'];
$date= date("F, j,Y");
$time= date("G:i:s");

if ($nameErr || $emailErr != null) {
		  echo'	<div class="alert alert-block alert-danger fade in">';
	  	
			echo'	<button type="button" class="close" data-dismiss="alert">×</button>';
			echo"	<strong></strong>Invalid entry<br/>";
			echo "	 Check the details you entered and try again.";
			echo" 	</div>";
}else{
if($password != $reenter_password)
{
	  echo'	<div class="alert alert-block alert-error fade in">';
			echo'	<button type="button" class="close" data-dismiss="alert">×</button>';
			echo"	<strong>Passwords do not match!!</strong><br/>";
			echo"Registration failed" ;
			echo" 	</div>";

	
}else{
$emailCheck = mysqli_query($server, "SELECT * FROM `registration_details` WHERE email = '$email'  ");
$count=mysqli_num_rows($emailCheck);
if ($count != null) {
		    echo'	<div class="alert alert-block alert-error fade in">';
	echo'	<button type="button" class="close" data-dismiss="alert">×</button>';
	echo"	<strong>Registration failed</strong><br/>";
	echo"    Email already in use by a different account."; 
	echo" 	</div>";}else{

		if ($name == null || $email == null || $password == null 
|| $reenter_password==null || $date_of_birth == null )
{
    echo'	<div class="alert alert-block alert-error fade in">';
	echo'	<button type="button" class="close" data-dismiss="alert">×</button>';
	echo"	<strong>Registration failed</strong><br/>";
	echo"    Your Personal Information must be completely filled to complete registration."; 
	echo" 	</div>";	


}
else
{

$insert =mysqli_query($server, "INSERT INTO registration_details(`name`, `email`, `password`, `date_of_birth`, `date`, `time`) 		  
        VALUES ('$name','$email','$password','$date_of_birth','$date','$time')") or 
			die('Mysql error');


	 		if ($insert) {
	 			echo'		<div class="alert alert-info fade in">';
			echo'		<button type="button" class="close" data-dismiss="alert">×</button>';
			echo'		You have successfully Registered.  <strong><a href="#login" role="button" data-toggle="modal">Log in</a></strong> ';
	 		echo'		</div>';
	 			}
	 			else
				{

		    echo'	<div class="alert alert-block alert-error fade in">';
			echo'	<button type="button" class="close" data-dismiss="alert">×</button>';
			echo"	<strong>Registration failed</strong><br/>"; 
			echo" 	</div>";
				}
}
	}


	 			
}
}
}



?>
<!--PHP CODE ENDS HERE-->






<!--Main form-=====================================================-->
	<form class="form-horizontal" enctype="multipart/form-data" method="POST">
		<h4>Personal information</h4>
		
		<div class="control-group">
			<label class="control-label"  for="name">Name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" value=""  name="name" id="name" placeholder="e.g John Doe" required>
			</div>
		 </div>
		<div class="control-group">

		<label class="control-label"  for="email">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="email"  value="" name="email" id="email" placeholder="e.g johndoe@gmail.com"	required>
		</div>
	  </div>

	<div class="control-group">
		<label class="control-label" name="password" for="password">Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" name="password" value="" id="password" placeholder="Password"	required>
		</div>
	</div>	 

	<div class="control-group">
			<label class="control-label"  for="reenter_password">Re-enter Password <sup>*</sup></label>
		<div class="controls">
			<input type="password" value="" name="reenter_password" id="reenter_password" placeholder="Re-enter Password"		required>
		</div>
	</div>	 


	<div class="control-group">
			<label class="control-label"  for="date_of_birth">Date of Birth <sup>*</sup></label>
		<div class="controls">
			<input type="date" value="" name="date_of_birth" id="date_of_birth" placeholder="Re-enter Password"		required>
		</div>
	</div>	 

<p><sup>*</sup>Required field	</p>
	
	<div class="control-group">
			<div class="controls">
				
				<input class="btn btn-large btn-success" type="submit" name="register"  value="Register" />
			</div>
		</div>		
	</form>
<!--Main form ends here=======================================-->


<?php
if (  $_SESSION['sess_array']['0'] !== 'no_email') {
header ("location:index.php");
}
?>








</div>

</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
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