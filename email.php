<?php
//Connecting with the server
$server = mysqli_connect("localhost","windandc","windand2017") or die('Failed to connect');
$db = mysqli_select_db($server, "windandc_nafuumall_db") or die('Failed to database connect') ;

session_start();	

$session = $_SESSION['sess_array']['1'];


$emessage="
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<!-- If you delete this meta tag, Half Life 3 will never be released. -->
<meta name='viewport' content='width=device-width' />

<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Nafuumall - Make your order today.</title>
	
<link rel='stylesheet' type='text/css' href='www.nafuumall.com/email.css' />
<style>
/* ------------------------------------- 
		GLOBAL 
------------------------------------- */
* { 
	margin:0;
	padding:0;
}
* { font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; }

img { 
	max-width: 100%; 
}
.collapse {
	margin:0;
	padding:0;
}
body {
	-webkit-font-smoothing:antialiased; 
	-webkit-text-size-adjust:none; 
	width: 100%!important; 
	height: 100%;
}


/* ------------------------------------- 
		ELEMENTS 
------------------------------------- */
a { color: #2BA6CB;}

.btn {
	text-decoration:none;
	color: #FFF;
	background-color: #666;
	padding:10px 16px;
	font-weight:bold;
	margin-right:10px;
	text-align:center;
	cursor:pointer;
	display: inline-block;
}

p.callout {
	padding:15px;
	background-color:#ECF8FF;
	margin-bottom: 15px;
}
.callout a {
	font-weight:bold;
	color: #2BA6CB;
}

table.social {
/* 	padding:15px; */
	background-color: #ebebeb;
	
}
.social .soc-btn {
	padding: 3px 7px;
	font-size:12px;
	margin-bottom:10px;
	text-decoration:none;
	color: #FFF;font-weight:bold;
	display:block;
	text-align:center;
}
a.fb { background-color: #3B5998!important; }
a.tw { background-color: #1daced!important; }
a.gp { background-color: #DB4A39!important; }
a.ms { background-color: #000!important; }

.sidebar .soc-btn { 
	display:block;
	width:100%;
}

/* ------------------------------------- 
		HEADER 
------------------------------------- */
table.head-wrap { width: 100%;}

.header.container table td.logo { padding: 15px; }
.header.container table td.label { padding: 15px; padding-left:0px;}


/* ------------------------------------- 
		BODY 
------------------------------------- */
table.body-wrap { width: 100%;}


/* ------------------------------------- 
		FOOTER 
------------------------------------- */
table.footer-wrap { width: 100%;	clear:both!important;
}
.footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
.footer-wrap .container td.content p {
	font-size:10px;
	font-weight: bold;
	
}


/* ------------------------------------- 
		TYPOGRAPHY 
------------------------------------- */
h1,h2,h3,h4,h5,h6 {
font-family: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
}
h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

h1 { font-weight:200; font-size: 44px;}
h2 { font-weight:200; font-size: 37px;}
h3 { font-weight:500; font-size: 27px;}
h4 { font-weight:500; font-size: 23px;}
h5 { font-weight:900; font-size: 17px;}
h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

.collapse { margin:0!important;}

p, ul { 
	margin-bottom: 10px; 
	font-weight: normal; 
	font-size:14px; 
	line-height:1.6;
}
p.lead { font-size:17px; }
p.last { margin-bottom:0px;}

ul li {
	margin-left:5px;
	list-style-position: inside;
}

/* ------------------------------------- 
		SIDEBAR 
------------------------------------- */
ul.sidebar {
	background:#ebebeb;
	display:block;
	list-style-type: none;
}
ul.sidebar li { display: block; margin:0;}
ul.sidebar li a {
	text-decoration:none;
	color: #666;
	padding:10px 16px;
/* 	font-weight:bold; */
	margin-right:10px;
/* 	text-align:center; */
	cursor:pointer;
	border-bottom: 1px solid #777777;
	border-top: 1px solid #FFFFFF;
	display:block;
	margin:0;
}
ul.sidebar li a.last { border-bottom-width:0px;}
ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}



/* --------------------------------------------------- 
		RESPONSIVENESS
		Nuke it from orbit. It's the only way to be sure. 
------------------------------------------------------ */

/* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
.container {
	display:block!important;
	max-width:600px!important;
	margin:0 auto!important; /* makes it centered */
	clear:both!important;
}

/* This should also be a block element, so that it will fill 100% of the .container */
.content {
	padding:15px;
	max-width:600px;
	margin:0 auto;
	display:block; 
}

/* Let's make sure tables in the content area are 100% wide */
.content table { width: 100%; }


/* Odds and ends */
.column {
	width: 300px;
	float:left;
}
.column tr td { padding: 15px; }
.column-wrap { 
	padding:0!important; 
	margin:0 auto; 
	max-width:600px!important;
}
.column table { width:100%;}
.social .column {
	width: 280px;
	min-width: 279px;
	float:left;
}

/* Be sure to place a .clear element after each set of columns, just to be safe */
.clear { display: block; clear: both; }


/* ------------------------------------------- 
		PHONE
		For clients that support media queries.
		Nothing fancy. 
-------------------------------------------- */
@media only screen and (max-width: 600px) {
	
	a[class='btn'] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

	div[class='column'] { width: auto!important; float:none!important;}
	
	table.social div[class='column'] {
		width:auto!important;
	}

}
</style>

</head>
 
<body bgcolor='#FFFFFF'>

<!-- HEADER -->
<table class='head-wrap' bgcolor=''>
	<tr>
		<td></td>
		<td class='header container' bgcolor='#F5F5F5'>
				
				<div class='content' style='margin-bottom: -20px;'>
				<table bgcolor=''>
					
			    <tr><td></td></tr>
					<tr>
						<td align='center'><img src='www.nafuumall.com/themes/images/nafuumall_logo.png' height='130px' width='130px' /><h3 style='font-style:bold;color:#A8CE58; '>Nafuumall</h3></td>
					</tr>
					<tr>
						<td align='center'><h3 class='collapse'>THANKS FOR YOUR ORDER</h3></td>
					</tr>

				<tr bgcolor='#A8CE58'><td><b>ORDER & SHIPPING INFO</b></td></tr>
				</table>
				</div>
				
		</td>
		<td></td>
	</tr>
</table><!-- /HEADER -->


<!-- BODY -->
<table class='body-wrap'>
	<tr>
		<td></td>
		<td class='container' bgcolor='#F5F5F5'>

			<div class='content'>
			<table>
				<tr align=''>
					<td>";

						$select = mysqli_query($server, "SELECT * FROM `delivery_address` WHERE session='$session'") or die(mysql_error());
						while ($co=mysqli_fetch_array($select)) 
						{
							$emessage2 = "
							<p><b>Name: </b> $co[4] </p>
							<p><b>Order no:</b> $co[0] </p>
							<p><b>Email:</b> $co[3]</p>
							<p><b>Phone no:</b> $co[6] </p>
							<p><b>Region:</b> $co[7] </p>
							<p><b>Area:</b> $co[8]</p>
							<p><b>Exact Location:</b> $co[9] </p>";	
						
							$shippingCost = $co[10];
						    	
						
							
						}

							$emessage3 = "
					</td>
			
				</tr>

				<tr bgcolor='#A8CE58'><td><b>ITEMS ORDERED</b></td></tr>
				<tr>
					<td>
						<table border='' style='margin-bottom: 10px; margin-top:10px; padding: 1px;border-right:  : 1px solid #000;'>
					 		<tr align='left'>
					 			<th>---</th>
					 			<th>Name</th>
					 			<th>Qty</th>
					 			<th>Total</th>
					 		</tr>";


					 	$emessage4 = '';
						$ress= mysqli_query($server, "SELECT * FROM ordered_products WHERE session='$session'");
							mysqli_data_seek($ress, 0);
						    while($colms=mysqli_fetch_array($ress, MYSQLI_NUM))
							 {
							 		$emessage4 .=
							 		"							 		
									<tr align='left'>
										<td><img src='www.nafuumall.com/e_images/$colms[8]' height='auto' width='50px'></td>
										<td>$colms[2]</td>
									 	<td >$colms[9]</td>
									 	<td>ksh.$colms[5]</td>
									</tr>";


							 }
							 	
							
								




						$emessage5 ="
						</table>
					</td>
				</tr>

				<tr bgcolor='#A8CE58'><td><b>PURCHASE SUMMARY</b></td></tr>";





						$selectS = mysqli_query($server, "SELECT * FROM `collective_order` WHERE session ='$session'") or die(mysql_error());
								while ($colm = mysqli_fetch_array($selectS)) {

									$totl = ($colm[3]+$shippingCost)-0;	

									$emessage6 = "
									<tr><td><b>No. of Items: </b>$colm[2]</td></tr>
									<tr><td><b>Subtotal:</b> ksh.".number_format($colm[3])."</td></tr>
									<tr><td><b>VAT:</b> Inclusive</td></tr>
									<tr><td ><b>Discount: ksh.</b>".number_format(0)."</td></tr>
									<tr><td><b>Shipping:</b> ksh.".number_format($shippingCost)."</td></tr>
									<tr><td ><b>Points awarded:</b> $colm[9]</td></tr>
									<tr><td><b>Total:</b> ksh.".number_format($totl)."</td></tr>" ;
								}

				
				$emessage7 = "
				<tr bgcolor='#A8CE58'><td><b>----</b></td></tr>
				<tr><td>
					
						<!-- Callout Panel -->
						<p class='callout'>
							Thank you for making your order. You will receive a call from one of our agents notifying you when your order is ready for shipment. For more products checkout our website: <a href='www.nafuumall.com'>Click it! &raquo;</a>
						</p><!-- /Callout Panel -->		
					</td>			
				</tr>							
						<!-- social & contact -->
						<table class='social' width='100%'>
							<tr>
								<td>
									
									<!-- column 1 -->
									<table align='left' class='column'>
										<tr>
											<td>				
												
												<h5 class='>Connect with Us:</h5>
												<p class='><a href='www.facebook.com/nafuumall' class='soc-btn fb'>Facebook</a> <a href='www.twitter.com/nafuumall' class='soc-btn tw'>Twitter</a> <a href=www.instagram.com/nafuumall class='soc-btn gp'>Instagram</a></p>
						
												
											</td>
										</tr>
									</table><!-- /column 1 -->	
									
									<!-- column 2 -->
									<table align='left' class='column'>
										<tr>
											<td>				
																			
												<h5 class=''>Contact Info:</h5>												
												<p>Phone: <strong><a href='callto:+254792176174'>(+254) 792 176 174</a></strong><br/>
                Email: <strong><a href='emailto:info@nafuumall.com'>info@nafuumall.com</a></strong><br/>
                Website: <strong><a href='www.nafuumall.com'>www.nafuumall.com</a></strong></p>
                
											</td>
										</tr>
									</table><!-- /column 2 -->
									
									<span class='clear'></span>	
									
								</td>
							</tr>
						</table><!-- /social & contact -->
						
					</td>
				</tr>
			</table>
			</div><!-- /content -->
									
		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->

<!-- FOOTER -->
<table class='footer-wrap'>
	<tr>
		<td></td>
		<td class='container'>
			
				<!-- content -->
				<div class='content'>
				<table>
				<tr>
					<td align='center'>
						<p>
							<a href='www.nafuumall.com/termsconditions.php'>Terms</a> |
							<a href='www.nafuumall.com/privacypolicy.php'>Privacy</a> |
							<a href='#'><unsubscribe>Unsubscribe</unsubscribe></a>
						</p>
					</td>
				</tr>
			</table>
				</div><!-- /content -->
				
		</td>
		<td></td>
	</tr>
</table><!-- /FOOTER -->

</body>
</html>";


					//echo $emessage ."$emessage2". $emessage3 ."$emessage4". $emessage5 ."$emessage6". $emessage7 ;

?>