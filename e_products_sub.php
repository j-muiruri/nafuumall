<!DOCTYPE html>
<html lang="en">

    <meta charset="utf-8">
    <title>Pamkenya | Make your order today.</title>
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
	
		<li class="active"> Products</li>
    </ul>

<?php
$sub_name = $_GET['sub'];
//below counts number of products
$count = mysqli_query($server, "SELECT COUNT(*) FROM product_details WHERE sub_name='$sub_name' ");
$row = mysqli_fetch_array($count, MYSQLI_NUM);
$sub_no= $row[0];
echo"	<h3>  <small class='pull-right'> $sub_no products are available </small></h3><br/>";

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
					$ress= mysqli_query($server," SELECT * FROM  `product_details`WHERE sub_name='$sub_name'
					 
	 				ORDER BY  `product_details`.`name` ASC");

				} else if($sort_criteria=='za') {
					$ress= mysqli_query($server," SELECT * FROM  `product_details`WHERE sub_name='$sub_name'
					 
	 				ORDER BY  `product_details`.`name` DESC");
				
				} else if($sort_criteria=='cheapest'){
				$ress= mysqli_query($server,"SELECT * FROM  `product_details` WHERE sub_name='$sub_name'
					 
					 ORDER BY  `product_details`.`price` ASC ");

				} else if ($sort_criteria=='expensive'){
				$ress= mysqli_query($server,"SELECT * FROM  `product_details` WHERE sub_name='$sub_name'
					  
					 ORDER BY  `product_details`.`price` DESC ");
				
				} else {
				$ress= mysqli_query($server,"SELECT * FROM product_details WHERE sub_name='$sub_name'
				 ORDER BY  `product_details`.`product_id` DESC  ");
				}
				
		
	}
	else{
		$ress= mysqli_query($server,"SELECT * FROM product_details WHERE category='Beer'
		 ORDER BY  `product_details`.`product_id` ASC   ");		
	}
//ABOVE CODE SORTS FETCHED ITEMS

 while($colms=mysqli_fetch_array($ress, MYSQLI_NUM))
 {

				echo"			<li class='span3'>";
				echo"			  <div class='thumbnail'>";
				
				echo"<a  href='e_product_details.php?id=$colms[0]'><img class='' style='height: 160px; width: auto;'  src='_images/$colms[12]' alt='' /></a>";

				echo"				<div class='caption'>";
				
				echo"				  <h5>$colms[1]-$colms[3] <span>($colms[4])</span</h5>";


				
				echo"<h4 style='text-align:center'>
			";

			

				echo "<a class='btn'  href='beers.php?idcart=$colms[0]'>
				<b>Add to </b><i class='icon-shopping-cart'></i>
				</a>";


				echo"	<button class='btn btn-primary' href='#'>ksh.$colms[6]</button></h4>";
				echo"				</div>";
				echo"			  </div>";
				echo"			</li>";

}
echo "</ul>";


//	ADDING STUFF TO CART
include 'addcartpage.php'

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