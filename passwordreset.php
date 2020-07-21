<!DOCTYPE html>
<html lang="en">

    
    <title>Nafuumall | Make your order today.</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


<!-- Header starts-->

<?php
include 'e_header.php';
?>
<!-- Header End -->
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
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Forgot password?</li>
    </ul>
	<h3> FORGOT YOUR PASSWORD?</h3>	
	<hr class="soft"/>
	
	<div class="row">
		<div class="span9" style="min-height:900px">
			<div class="well">
			<h5>Reset your password</h5><br/>
			Please enter the email address for your account. Your reset password will be sent to your email. Remember to change your password in settings. <br/><br/><br/>
			<form method="POST">
			  <div class="control-group">
				<label class="control-label" for="inputEmail1" >E-mail address</label>
				<div class="controls">
				  <input class="span3"  type="email" id="inputEmail1" name="email" placeholder="Email">
				</div>
			  </div>
			  <div class="controls">
			  <button type="submit" class="btn block" name="reset">Submit</button>
			  </div>
			</form>
			<?php








			if (isset($_POST['reset'])) {

				$email = $_POST['email'];
				$gen_pass = mt_rand(1000,900000);
				$pass_hash = md5($gen_pass);
			

			 	$update = mysqli_query($server, "UPDATE `registration_details` SET `password`='$pass_hash'
				 WHERE `email`='$email' ") or die(mysql_error());


				$subject = "Liquormart Password Reset";

				
				$select = mysqli_query($server, "SELECT `last_name`, `email`, `password` FROM `registration_details` WHERE email='$email'") or die(mysql_error());
					while ($colms = mysqli_fetch_array($select)) {
						
					$message = "Hello, ".$colms[0].". Your Liquormart Password is: ".$colms[2]. " Thank you for choosing us.";

					}
										//check rows returned
					$count=mysqli_num_rows($select);

					if($count<1)
					{

					echo"	<div class='alert alert-block alert-error fade in'>
							<button type='button' class='close' data-dismiss='alert'>×</button>
							User account does not exist.<a href='register.php'> Create account</a> to continue.<br/>
						 	</div>";
					}
					else
					{

						$sendmail = mail($email, $subject, $message);
				
						$emailInsert = mysqli_query($server,"INSERT INTO `password_reset`(`email`) VALUES ('$email')") or die(mysql_error());
						if ($sendmail) {echo'		<div class="alert alert-info fade in">
							<button type="button" class="close" data-dismiss="alert">×</button>
							Your password has been sent to your email.
			 				</div>';}else{echo'	<div class="alert alert-block alert-error fade in">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Password reset</strong> failed. Check your email and try again.
					 		</div>';}
					}
			}
			?>
		</div>
		</div>
	</div>	
	
</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer -->
<?php
include 'footer.php';
?>
<!-- Footer-->

<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	
</body>
</html>