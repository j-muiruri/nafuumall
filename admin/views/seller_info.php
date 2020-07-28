<!DOCTYPE html>
<html lang="en">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Gentelella Alela! | </title>

	<!-- Bootstrap -->
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
	<!-- Select2 -->
	<link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
	<!-- Switchery -->
	<link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
	<!-- starrr -->
	<link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
<?php
  include_once 'menu_profile.php';
?>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
<?php
  include_once 'sidebar_menu.php';
?>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
<?php
  include_once 'top_navigation.php';
?>
			<!-- /top navigation -->

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Register & Start Selling Today </h3>
						</div>

						<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2><small>Create your seller account</small></h2><br><br>
									<h2><small>1. Seller business details</small></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />

									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="full-name">Full Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="name" id="full-name" required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="phone-no">Phone Number <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="tel" id="phone" name="phone" required="required" class="form-control">
											</div>
										</div>


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="referred-by">Referred by <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="referral" name="referral" required="required" class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label for="shop_name" class="col-form-label col-md-3 col-sm-3 label-align">Display Name / Shop Name</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="shop_name" class="form-control" type="text" name="display_name">
											</div>
										</div>

										<div class="item form-group">
											<label for="national_id_no" class="col-form-label col-md-3 col-sm-3 label-align">National ID number</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="national_id_no" class="form-control" type="text" name="national_id">
											</div>
										</div>


										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email Address</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="email" class="form-control" type="text" name="email">
											</div>
										</div>

										<div class="item form-group">
											<label for="re_email" class="col-form-label col-md-3 col-sm-3 label-align">Re-type Email</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="re_email" class="form-control" type="text" name="re_email">
											</div>
										</div>

										<div class="item form-group">
											<label for="password" class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="password" class="form-control" type="password" name="password">
											</div>
										</div>

										<div class="item form-group">
											<label for="re_password" class="col-form-label col-md-3 col-sm-3 label-align">Retype Password</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="re_password" class="form-control" type="password" name="re_password">
											</div>
										</div>

										<div class="item form-group">
											<label for="e_contract" class="col-form-label col-md-3 col-sm-3 label-align">E-Contract</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="e_contract" class="flat" required="" value="Accepted" type="radio" name="contract">  I have read and accepted <a class="primary" href="#">Nafuumall Contract</a>
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
											<div class="col-md-6 col-sm-6 ">
												<div id="gender" class="btn-group" data-toggle="buttons">
													<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
														<input type="radio" name="gender" value="male" class="join-btn"> &nbsp; Male &nbsp;
													</label>
													<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
														<input type="radio" name="gender" value="female" class="join-btn"> Female
													</label>
												</div>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="birthday" name="dob"class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Reset</button>
												<button class="btn btn-primary" type="reset">Skip</button>
												<button type="submit" class="btn btn-success"><a href="seller_info_summary.php">Next<a></button>
											</div>
										</div>

									</form>
								</div>
							</div>


							<div class="x_panel">
								<div class="x_title">
									<h2><small>2. Business Information</small></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>

									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />

									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="address_1">Address 1 <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="address_1" id="address_1" required="required" class="form-control ">
											</div>
										</div>


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="postal_code">Postal Code<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="postal_code" id="postal_code" required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="town">City/Town<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="town" name="town" required="required" class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="type_of_business">Type of business<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select id="type_of_business" name="type_of_business" required="required" class="form-control">
													<option value="Sole Proprietor">Sole Proprietor</option>
													<option value="Partnershp">Partnershp</option>
												</select>
											</div>
										</div>


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="person_in_charge">Person in charge<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="person_in_charge" name="person_in_charge" required="required" class="form-control">
											</div>
										</div>


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
											<div class="col-md-6 col-sm-6 ">
												<div id="gender" class="btn-group" data-toggle="buttons">
													<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
														<input type="radio" name="gender" value="male" class="join-btn"> &nbsp; Male &nbsp;
													</label>
													<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
														<input type="radio" name="gender" value="female" class="join-btn"> Female
													</label>
												</div>
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="vat_status">VAT Registered<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select id="vat_status" name="vat_status" required="required" class="form-control">
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
										</div>


										<div class="item form-group">
											<label for="business_reg_no" class="col-form-label col-md-3 col-sm-3 label-align">Business Registration No</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="business_reg_no" class="form-control" type="text" name="business_reg_no">
											</div>
										</div>

										<div class="item form-group">
											<label for="seller_vat" class="col-form-label col-md-3 col-sm-3 label-align">Seller VAT</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="seller_vat" class="form-control" type="text" name="seller_vat">
											</div>
										</div>


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="main_category">Main Category<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select id="main_category" name="main_category" required="required" class="form-control">
													<option value="Choose Category">Choose Category</option>
													<option value="Category 1">Category 1</option>
													<option value="Category 2">Category 2</option>
												</select>
											</div>
										</div>


										<div class="item form-group">
											<label for="legal_name" class="col-form-label col-md-3 col-sm-3 label-align">Legal Name / Company Name</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="legal_name" class="form-control" type="text" name="legal_name">
											</div>
										</div>



										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Reset</button>
												<button class="btn btn-primary" type="reset">Skip</button>
												<button type="submit" class="btn btn-success"><a href="seller_info_summary.php">Next<a></button>
											</div>
										</div>

									</form>
								</div>
							</div>


							<div class="x_panel">
								<div class="x_title">
									<h2><small>3. Payment Details</small></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>

									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />

									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mpesa_name">MPESA Registered Name<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="mpesa_name" id="mpesa_name" required="required" class="form-control ">
											</div>
										</div>


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mpesa_no">Mpesa Phone No<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="mpesa_no" id="mpesa_no" required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="account_name">	Bank Acount Name<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="account_name" name="account_name" required="required" class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="account_no">Bank Acount no<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="account_no" name="account_no" required="required" class="form-control">
											</div>
										</div>


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="bank_name">Bank Name<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="bank_name" name="bank_name" required="required" class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="bank_code">Bank Code<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="bank_code" name="bank_code" required="required" class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="bank_branch">Bank Branch<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="bank_branch" name="bank_branch" required="required" class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="iban">IBAN<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="iban" name="iban" required="required" class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="swift">SWIFT<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="swift" name="swift" required="required" class="form-control">
											</div>
										</div>


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="type_of_business">Preferred Mode of Payment<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select id="type_of_business" name="type_of_business" required="required" class="form-control">
													<option value="MPESA">MPESA</option>
													<option value="BANK TRANSFER">BANK TRANSFER</option>
												</select>
											</div>
										</div>




										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Reset</button>
												<button class="btn btn-primary" type="reset">Skip</button>
												<button type="submit" class="btn btn-success"><a href="seller_info_summary.php">Next<a></button>
											</div>
										</div>

									</form>
								</div>
							</div>


						</div>
					</div>


				</div>
			</div>
			<!-- /page content -->

			<!-- footer content -->
<?php
  include_once 'footer.php';
?>
			<!-- /footer content -->
		</div>
	</div>

	<!-- jQuery -->
	<script src="../vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="../vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="../vendors/nprogress/nprogress.js"></script>
	<!-- bootstrap-progressbar -->
	<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="../vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="../vendors/moment/min/moment.min.js"></script>
	<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-wysiwyg -->
	<script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="../vendors/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="../vendors/switchery/dist/switchery.min.js"></script>
	<!-- Select2 -->
	<script src="../vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="../vendors/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<script src="../vendors/starrr/dist/starrr.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="../build/js/custom.min.js"></script>

</body></html>
