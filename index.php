<!DOCTYPE html>
<html lang="en">

    <title>Nafuumall | Make your order today.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">

<?php
include 'e_header.php';
?>

<!-- Header End====================================================================== -->
<body>

<div id="carouselBlk">
	<div class="container">
		<?php
		include 'wowslider.html';
		?>		
	</div>
</div>

<div id="mainBody" >
	<div class="container ">
	<div class="row">
<!-- Sidebar ================================================== -->
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
	<ul id="sideManu" class="nav nav-tabs nav-stacked">
<?php
//counting number of items 
$count = mysqli_query($server,"SELECT COUNT(*) FROM `product_details`");
$row = mysqli_fetch_array($count, MYSQLI_NUM);
$total_products = $row[0];

echo"		<div class='well well-small'>
		<a id='myCart' href='e_products.php'>
		<span class='badge badge-info'>$total_products</span>&nbsp;&nbsp;Different Items Available
		</a>
		</div>";


$category_sql = mysqli_query($server,"SELECT * FROM category ORDER BY  `category`.`cat_id` ASC   ") or die('Mysql_error');		

	while($colms=mysqli_fetch_array($category_sql, MYSQLI_NUM))
	{
		//counting number of items according to category
	$count = mysqli_query($server,"SELECT COUNT(*) FROM `product_details` WHERE 
		`cat_name` = '$colms[1]'");
	$row = mysqli_fetch_array($count, MYSQLI_NUM);
	$total= $row[0];


	echo"<li class='subMenu open'><a> $colms[1] [$total]</a>";
		echo"<ul style='display:none'>";
		$sub_category_sql = mysqli_query($server,"SELECT * FROM sub_category WHERE cat_id='$colms[0]' ORDER BY  `sub_category`.`sub_id` ASC   ") or die('Mysql_error');		
			while($colms=mysqli_fetch_array($sub_category_sql, MYSQLI_NUM))
			{
			//counting number of items according to category
			$count = mysqli_query($server,"SELECT COUNT(*) FROM `product_details` WHERE 
				`sub_name` = '$colms[1]'");
			$row = mysqli_fetch_array($count, MYSQLI_NUM);
			$total= $row[0];

			echo"<li><a class='active' href='e_prods_sub.php?sub=$colms[1]'><i class='icon-chevron-right'></i>$colms[1] ($total) </a></li>";
			}
		echo"</ul>";
	echo"</li>";
	}

?>	
<!-- Sidebar end=============================================== -->

		</ul>
			  <div class="thumbnail">
			  	<a href="e_prods_cat.php?cat=Mobile Phones">
				<img src="themes/images/products/phones.jpg" title="Mobile Phones" alt="Mobile Phones">
				</a>
				<div class="caption">
				   <h3 align="center">
			 <a class="label" href="e_prods_cat.php?cat=Mobile Phones">Mobile Phones</a>

			 <a class="label" href="e_prods_cat.php?cat=Mobile Phones">Shop Now</a>
			 </h3>
				 
				</div>
			  </div><br/>

			  <div class="thumbnail">
			  	<a href="e_prods_cat.php?cat=Mobile Accessories">
				<img src="themes/images/products/accessories.jpg" title="Mobile Accessories " alt="Phones Accessories ">
				</a>
				<div class="caption">
				   <h3 align="center">
			 <a class="label" href="e_prods_cat.php?cat=Mobile Accessories">Mobile Accessories </a>

			 <a class="label" href="e_prods_cat.php?cat=Mobile Accessories">Shop Now</a>
			 </h3>
				
				</div>
			  </div><br/>	



			  <div class="thumbnail">
			  	<a href="e_prods_cat.php?cat=TVs and Accessories">
				<img src="themes/images/products/tvs.jpg" title="TVs and Accessories" alt="TVs and Accessories">
				</a>
				<div class="caption">
				   <h3 align="center">
			 <a class="label" href="e_prods_cat.php?cat=TVs and Accessories">TVs and Accessories</a>

			 <a class="label" href="e_prods_cat.php?cat=TVs and Accessories">Shop Now</a>
			 </h3>
				
				</div>
			  </div><br/>			  

		  


	</div>
<!-- Sidebar end=============================================== -->
		<div class="span9">		
			<div class="well well-small">
			<h4>Featured Products <small class="pull-right">4 of the week</small></h4>
			<div class="row-fluid">

			  <ul class="thumbnails">

<?php
//BELOW FETCHES CONTENT DISPLAYED AT THE FEATURED CATEGORY
			$ress= mysqli_query($server, "SELECT * FROM product_details WHERE type='Featured' ORDER BY  `product_details`.`product_id` DESC LIMIT 0 , 4  ");

			    while($colms= mysqli_fetch_array($ress, MYSQLI_NUM))
				 {
				

				echo"			<li class='span3'>";
				echo"			  <div class='thumbnail' >";
				if ($colms[15] == 'Overseas') {
				echo "<span class='label label-info'>Shipped From Overseas</span>";}
				echo"<a  href='e_product_details.php?id=$colms[0]'><img class='' style='height: 160px; width: auto;'  src='e_images/$colms[8]' alt='' /></a>";

				echo"<div class='caption' >";
				
				echo"<h5 style='text-align:left'>$colms[1]<br></h5>";

				echo"<h4 style='text-align:center'><h6 ><span>$colms[6]</span></h6>";
				if ($colms[5] == 0) {}
				else{echo "<span class='label label-md label-info'><strike>ksh.".number_format($colms[5])."</strike>";}

				echo "</span> <span class='label label-info'>ksh.".number_format($colms[4])."</span>";
				
				if ($colms[14] == 0) {}	else{
				echo "	<span class='badge badge-warning'>-$colms[14]%</span>";}
				echo" <br></h4>";		

				echo" <a class='btn' href='e_product_details.php?id=$colms[0]'>More&nbsp;<i class='icon-dashboard'></i></a></h4>&nbsp;";		

				if ($colms[15] == 'Overseas') {
				echo "<a href='#cartAddedOverseas' role='button' data-toggle='modal' style='margin-right:0'><button class='btn' type='button' value='$colms[0]'
				 onclick='addCart(this.value)''>
				<b>Add </b><i class='icon-shopping-cart'></i>
				</button></a>";
				}else{
				echo "<a href='#cartAdded' role='button' data-toggle='modal' style='margin-right:0'><button class='btn' type='button' value='$colms[0]'
				 onclick='addCart(this.value)''>
				<b>Add </b><i class='icon-shopping-cart'></i>
				</button></a>";
				}

				echo"				</div>";
				echo"			  </div>";
				echo"			</li>";
			}
				
		?>

			  


			  </ul>

			

		
			  </div>
		</div>





<!--PHP CODE below fetches content on the latest products section==================================================-->
<?php
//CONTENT DISPLAYED AT LATEST CATEGORY
			$ress= mysqli_query($server, "SELECT * FROM product_details ORDER BY  `product_details`.`product_id` DESC LIMIT 0, 9");

			echo"	<h4>Latest Products</h4>";
			echo"		  <ul class='thumbnails'>";
			    while($colms= mysqli_fetch_array($ress, MYSQLI_NUM))
				 {
				echo"			<li class='span3'>";
				echo"			  <div class='thumbnail' >";
				if ($colms[15] == 'Overseas') {
				echo "<span class='label label-info'>Shipped From Overseas</span>";}
				echo"<a  href='e_product_details.php?id=$colms[0]'><img class='' style='height: 160px; width: auto;'  src='e_images/$colms[8]' alt='' /></a>";

				echo"<div class='caption' >";
				
				echo"<h5 style='text-align:left'>$colms[1]<br></h5>";

				echo"<h4 style='text-align:center'><h6 ><span>$colms[6]</span></h6>";

				if ($colms[5] == 0) {}
				else{echo "<span class='label label-md label-info'><strike>ksh.".number_format($colms[5])."</strike>";}

				echo"</span> <span class='label label-info'>ksh.".number_format($colms[4])."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
				if ($colms[14] == 0) {}	else{
				echo "	<span class='badge badge-warning'>-$colms[14]%</span>";}
				echo"	<br><a class='btn' href='e_product_details.php?id=$colms[0]'>More Details</a></h4>&nbsp;&nbsp;";		

				if ($colms[15] == 'Overseas') {
				echo "<a href='#cartAddedOverseas' role='button' data-toggle='modal' style='margin-right:0'><button class='btn' type='button' value='$colms[0]'
				 onclick='addCart(this.value)''>
				<b>Add to </b><i class='icon-shopping-cart'></i>
				</button></a>";
				}else{
				echo "<a href='#cartAdded' role='button' data-toggle='modal' style='margin-right:0'><button class='btn' type='button' value='$colms[0]'
				 onclick='addCart(this.value)''>
				<b>Add to </b><i class='icon-shopping-cart'></i>
				</button></a>";
				}



				echo"				</div>";
				echo"			  </div>";
				echo"			</li>";
			
			}
				echo"			<ul>";

		?>
		</div>
		</div>
	</div>
</div>


<!-- Footer ================================================================== -->
<?php
include 'footer.php';
?>
<!-- Footer ================================================================== -->


<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	

</body>
</html>