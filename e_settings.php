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
	<?php
	if (isset($_POST['chan_pass'])) {
		$new_pass = md5($_POST['new_pass']);
		$re_pass = md5($_POST['re_pass']);
		if ($new_pass != $re_pass) {
			echo"<div class='alert alert-block alert-error fade in'>
			<button type='button' class='close' data-dismiss='alert'>×</button>
			Failed to change. Re-enter same passwords and try again.<br/>
			</div>";
		}else{
			$update = mysqli_query($server, "UPDATE `registration_details` SET `password`='$new_pass'
				 WHERE `email`='$email' ") or die(mysql_error());
			if ($update) {
			echo"<div class='alert alert-block alert-success fade in'>
			<button type='button' class='close' data-dismiss='alert'>×</button>
			Your password was successfully changed<br/>
			</div>";	
			}else{
			echo"<div class='alert alert-block alert-error fade in'>
			<button type='button' class='close' data-dismiss='alert'>×</button>
			Failed to change. Re-enter password and try again.<br/>
			</div>";				
			}
		}
	}



	?>
		<div class="span4">
		
		</div>
			
		<div class="span4">
		


		<div class="span4" >

			<hr class="soften">
				<h4 class="">Account Settings</h4>

				<i>Click below to view</i>
			<hr class="soften"/>	

					<div class="accordion" id="accordion2">
						<div class="accordion-group">
						  <div class="accordion-heading">
							<h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
							  <h5>Change Password</h5>
							</a></h4>
						  </div>
						  <div id="collapseOne" class="accordion-body collapse"  >
							<div class="accordion-inner well">
									
									<div class="">												
										<form class="form-inline" method="POST">
										        <fieldset>

												   <div class="control-group">           
										              <input type="password" placeholder="New Password" name="new_pass" required class="input-large"/>           
										          </div>

												   <div class="control-group">          
										              <input type="password" placeholder="Re-enter Password" name="re_pass" required class="input-large"/>          
										          </div>

										            <button class="btn" type="submit" name="chan_pass">Change Password</button>

										        </fieldset>
										 </form>
									 </div>

							</div>
						  </div>
						</div>
						
						
									
						</div>


	<!--second container-->	





		</div>
		<div class="span4">
		</div>
	</div>
	<div class="row">

	</div>
</div>
</div><br/><br/><br/><br/>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php
include 'footer.php';
?>
<!--Footer==============================================================================-->
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	

</body>
</html>