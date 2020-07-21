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
include 'e_sidebar.php'
?>
<!-- Sidebar end=============================================== -->


	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
	
		<li class="active"> Available Products</li>
    </ul>

<?php
//below counts number of products
$count = mysqli_query($server, "SELECT COUNT(*) FROM product_details  WHERE discount > '0'");
$row = mysqli_fetch_array($count, MYSQLI_NUM);
$prod_no= $row[0];
echo"	<h3>  <small class='pull-right'> $prod_no products are available </small></h3><br/>";

?>

	

	<hr class="soft"/>
	

	<form method="POST" class="form-horizontal span6">
		<div class="control-group">
		  <label class="control-label alignL">Sort By </label>
			<select name="sort_criteria">
              <option value="-">Choose criteria</option>
              <option value="cheapest">Lowest Price first</option>
              <option value="expensive">Highest Price first</option>
              <option value="az">Product name A - Z</option>
              <option value="za">Product name Z - A</option>

            </select>

            	
		<input class="btn " type="submit" name="sort" " value="Sort" ></input>

		</div>

	  </form>

<br class="clr"/>
<div class="tab-content">
	


		
<!--Below PHP fetches new arrival================-->	

<?php	

echo '<div class="tab-pane  active" id="blockView">';
echo"		<ul class='thumbnails'>";



//BELOW CODE SORTS FETCHED ITEMS
	if(isset($_POST['sort']))
	{
				$sort_criteria = $_POST['sort_criteria'];

				if ($sort_criteria=='az') {
					$ress= mysqli_query($server," SELECT * FROM  `product_details` WHERE discount > '0'				 ORDER BY  `product_details`.`name` ASC");

				} else if($sort_criteria=='za') {
					$ress= mysqli_query($server," SELECT * FROM  `product_details` WHERE discount > '0'				 ORDER BY  `product_details`.`name` DESC");
				
				} else if($sort_criteria=='cheapest'){
				$ress= mysqli_query($server,"SELECT * FROM  `product_details` WHERE discount > '0' 				 
					 ORDER BY  `product_details`.`current_price` ASC ");

				} else if ($sort_criteria=='expensive'){
				$ress= mysqli_query($server,"SELECT * FROM  `product_details` WHERE discount > '0' 				  
					 ORDER BY  `product_details`.`current_price` DESC ");
				
				} else {
				$ress= mysqli_query($server,"SELECT * FROM product_details  WHERE discount > '0'
				 ORDER BY  `product_details`.`product_id` DESC  ");
				}
				
		
	}
	else{
		$ress= mysqli_query($server,"SELECT * FROM product_details  WHERE discount > '0'ORDER BY  `product_details`.`product_id` ASC   ");		
	}
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


//	ADDING STUFF TO CART
//include 'e_addcart.php'

//	ADDING STUFF TO CART

?>

	<hr class="soft"/>
	</div>
</div>

	<div class="pagination">
			<ul>
			<li><a href="#">&lsaquo;</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">...</a></li>
			<li><a href="#">&rsaquo;</a></li>
			</ul>
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