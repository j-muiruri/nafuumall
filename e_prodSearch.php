<!DOCTYPE html>
<html lang="en">

    <meta charset="utf-8">
    <title>Nafuumall | Make your order today.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


  <?php

include 'e_header.php'
  ?>
<!-- Header End====================================================================== -->
<body>

<div id="mainBody">
	<div class="container">
	<div class="row">


<!-- Sidebar ================================================== -->
<?php
echo "<div id='sideManu' class='span3'>";
//sidebar
include 'e_sidebar.php';
//sidebar
echo "</div>";
?>
<!-- Sidebar end=============================================== -->


	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
	
		<li class="active"><a href="e_products.php">More Items</a></li>
    </ul>

<?php
//below counts number Items 
$count = mysqli_query($server, "SELECT COUNT(*) FROM product_details ");
$row = mysqli_fetch_array($count, MYSQLI_NUM);
$product_no= $row[0];
echo"	<h3>  <small class='pull-right'> $product_no items are available </small></h3><br/>";

?>

	

	<hr class="soft"/>
	



<div class="tab-content">
	


		
<!--Below PHP fetches new arrival================-->	

<?php	

if (isset($_POST['ok'])) {
    $search_key = $_POST['search_key'];
 	$hint = $search_key;
}	

echo '<div class="tab-pane  active" id="blockView">';
echo"		<ul class='thumbnails'>";



//BELOW CODE SORTS FETCHED ITEMS
		$ress= mysqli_query($server, "SELECT * FROM product_details WHERE name 
		LIKE '%".$hint."%' OR cat_name	LIKE '%".$hint."%' OR sub_name	LIKE '%".$hint."%' OR short_description LIKE '%".$hint."%'	OR long_description LIKE '%".$hint."%' ORDER BY  `product_details`.`name` ASC   ")  or die(mysql_error());		
	
//ABOVE CODE SORTS FETCHED ITEMS

 while($colms=mysqli_fetch_array($ress, MYSQLI_NUM))
 {

			
	echo"			<li class='span3'>";
	echo"			  <div class='thumbnail' >";
	if ($colms[15] == 'Overseas') {
	echo "<span class='label label-info'>Shipped From Overseas</span>";}
	echo"<a  href='e_product_details.php?id=$colms[0]'><img class='' style='height: 160px; width: auto;'  src='e_images/$colms[8]' alt='' /></a>";

	echo"<div class='caption' >";
	
	echo"<h5 style='text-align:left'>$colms[1]<br></h5>";

	echo"<h4 style='text-align:center'><h6 ><span>$colms[6]</span></h6>";

	echo "<span class='label label-md label-info'><strike>ksh.".number_format($colms[5])."</strike></span> <span class='label label-info'>ksh.".number_format($colms[4])."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
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
echo "</ul>";


//$count = mysqli_query($server, "SELECT count(*) FROM drink_details WHERE category LIKE '%".$searchedDrink."%' OR sub_category	LIKE '%".$searchedDrink."%' OR description_short	LIKE '%".$searchedDrink."%' OR description_full LIKE '%".$searchedDrink."%'	OR drink_name LIKE '%".$searchedDrink."%' ORDER BY  `drink_details`.`drink_id` DESC   ");

//$count = mysqli_query($server, "SELECT count(*) FROM product_details WHERE name LIKE '%".$hint."%' OR cat_name	LIKE '%".$hint."%' OR sub_name	LIKE '%".$hint."%' OR short_description LIKE '%".$hint."%'	OR long_description LIKE '%".$hint."%' ORDER BY  `product_details`.`name` ASC    ") or die('mysql_error');  

//below counts number Items 
$count = mysqli_query($server, "SELECT count(*) FROM product_details WHERE cat_name 
		LIKE '%".$hint."%' OR sub_name	LIKE '%".$hint."%' OR short_description	LIKE '%".$hint."%' OR long_description LIKE '%".$hint."%'	OR name LIKE '%".$hint."%' OR availability LIKE '%".$hint."%' ") or die('mysql_error');


$row = mysqli_fetch_array($count, MYSQLI_NUM);
$search_no= $row[0];


if ( $search_no == 0) {
echo'	<div class="alert alert-block alert-error fade in">
							<button type="button" class="close" data-dismiss="alert">×</button>
							No matching items. Try different search or type <strong>one word</strong> for more accurate results.  
					 		</div>';
					 	}
?>

	<hr class="soft"/>
	</div>
</div>


			<br class="clr"/>
</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->



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