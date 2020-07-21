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
	<hr class="soften">
	<h1>Contact us</h1>
	<hr class="soften"/>
	<?php

		if (isset($_POST['sendMessage'])){
			$name  = $_POST['name'];
			$email  = $_POST['email'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];

			$emailM = 'info@nafuumall.co.ke';
			$messageM = "Hi, am ".$name." my email is ".$email.".\n Message: (".$message.")";
			$headers .= 'From: <customer-feedback@nafuumall.co.ke>' . "\r\n";
				
			
		
			$sendmail = mail($emailM, $subject, $messageM,$headers);
			if ($sendmail) {
			echo'		<div class="alert alert-info fade in">
						<button type="button" class="close" data-dismiss="alert">×</button>
						We have got your message and we will get back to you in less than 60 minutes. Thank you for contacting us. 
	 		    		</div>';}else{
				echo"	<div class='alert alert-block alert-error fade in'>
				<button type='button' class='close' data-dismiss='alert'>×</button>
				Message not sent. Check your email and try again.<br/>
				</div>";}
			}
?>	
	<div class="row">
		<div class="span4">
			<h4>Contact Details</h4>
			<a href="mailto:info@nafuumall.com">info@nafuumall.com</a><br/>
			﻿Tel: <a href="tel:0792176174">(+254)7-92-176-174</a><br/>
			web:<a href="www.nafuumall.com">www.nafuumall.com</a><br><br>
		

			
			
			<div id="socialMedia">
					<br/>
					<h4>Social Media</h4>
					<a href="https://www.facebook.com/nafuumall" target="_blank"><img width="30" height="30" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
					<a href="https://twitter.com/nafuumall" target="_blank"><img width="30" height="30" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
					<a href="https://instagram.com/nafuumall" target="_blank"><img width="30" height="30" src="themes/images/instagram.png" title="instagram" alt="instagram"/></a>
					
			</div>
		</div>
			
		<div class="span4">
		<h4>Working Hours</h4>
			<h5> Monday - Friday</h5>
			<p>08:00am - 08:00pm<br/></p>
			<h5>Saturday</h5>
			<p>08:00am - 5:00pm<br/></p>
			<h5>Sunday</h5>
			<p>10:00am - 4:00pm<br/></p>
		</div>
		<div class="span4">
		<h4>Email Us</h4>

		<form class="form-inline" method="POST">
        <fieldset>

          <div class="control-group">           
              <input type="text" placeholder="name"  name="name" required class="input-xlarge"/>           
          </div>

		   <div class="control-group">           
              <input type="email" placeholder="email" name="email" required class="input-xlarge"/>           
          </div>

		   <div class="control-group">          
              <input type="text" placeholder="subject" name="subject" required class="input-xlarge"/>          
          </div>

          <div class="control-group">
              <textarea rows="3" id="textarea" name="message" required placeholder="message" class="input-xlarge"></textarea>
          </div>

            <button class="btn btn-large" type="submit" name="sendMessage">Send Messages</button>

        </fieldset>
      </form>


		</div>
	</div>
	<div class="row">

	</div>
</div>
</div><br/><br/><br/><br/>
<!-- MainBody End ============================= -->
<!-- Footer  -->
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