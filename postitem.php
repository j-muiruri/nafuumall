<!DOCTYPE html>
<html lang="en">

	 <meta charset="utf-8">
    <title>Nafuumall | Make your order today.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
 <?php
include 'sp_header.php';
 ?>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<?php
include 'e_sidebar.php';
	?>
<!-- Sidebar end=============================================== -->
	<div class="span9" id="mainCol">
    <ul class="breadcrumb">
		<li><a href="controlpanel.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Control Panel</li>
    </ul>
	<h3> Control Panel</h3>	
	<hr class="soft"/>

	<a class="btn" href="postitem.php?add_item">Items Available</a>

	<hr class="soft"/>

<?php 
//CATEGORIES SECTION
if (isset($_GET['categories'])) {
	echo "
	<div class='well'>
			<h4>Available Categories</h4>";

//Displaying categories table
		echo"<table class='table table-hover'>
		    <thead>
		      <tr>
		        <th>Category Id</th>
		        <th>Category Name</th>
		      </tr>
		    </thead>
		    <tbody>";
		$select_category = mysqli_query($server, "SELECT * FROM `category`") or die('Mysql_error');
	    while($colms = mysqli_fetch_array($select_category))
		{
		 echo "   
		 <tr>
	        <td>$colms[0]</td>
	        <td>$colms[1]</td>
	        <td><a class='btn btn-info' href='postitem.php?categories&edit=$colms[0]'> edit</a></td>
	        <td><a class='btn btn-danger' href='postitem.php?categories&del=$colms[0]'> del</a></td>
	      </tr>";
		}
		echo "	</tbody>
			</table>";
//Displaying categories table

	 	echo"<h4>Add Category</h4>
		<form class='form-horizontal' enctype='multipart/form-data' method='POST'>
	 	<div class='control-group'>
				<label class='control-label'  for='cat_name'>Category<sup>*</sup></label>
				<div class='controls'>
					 <input type='text' name='cat_name'  id='cat_name' placeholder='Type Name' >
				</div>
			 </div>

			<div class='control-group'>
				<div class='controls'>
					<input class='btn btn-medium btn-success' type='submit' name='add_cat'  value='Add Category' ></input>
				</div>
			</div

		</form>
	</div>";
//adding categories
	if (isset($_POST['add_cat'])) {
		$cat_name = $_POST['cat_name'];
		$insert_cat = mysqli_query($server, "INSERT INTO `category`(`cat_name`) VALUES ('$cat_name')");
		if ($insert_cat) {
			echo "Category entered successfully";
		}else{
			echo "Unsuccessful. Try adding category Item again.";
		}
	}
//adding categories

//when edit is pressed
		    if (isset($_GET['edit'])) {
		    	$spcific_cat = $_GET['edit'];
		    	$select_edit_cat = mysqli_query($server, "SELECT * FROM `category` WHERE cat_id='$spcific_cat' ");

			    while($colms = mysqli_fetch_array($select_edit_cat))
				{
				    echo "<form method='post'>";
					echo"	<tr>	  
						       <td><input name='edit_cat' value='$colms[1]' type='text'></input></td>
						        <td><input class='btn btn-success' type='submit' name='submit_edit' value='submit'></input></td>
						    </tr>";
					echo "</form>";
				}

				if (isset($_POST['submit_edit'])) {
					
					$edit_cat = $_POST['edit_cat'];
					
					$edit_recrd = mysqli_query($server, "UPDATE `category` 
						SET `cat_name`='$edit_cat' WHERE `cat_id`='$spcific_cat' ");
					 if ($edit_recrd) {
					 	echo "success";
					 }else{echo "fail"; }
				}

			echo "<a class='btn btn-info' href='postitem.php?categories'>Done</a>";
		    }

//when edit is pressed
//when del is pressed
		    if (isset($_GET['del'])) {
		    	$spcific_rec = $_GET['del'];

					$del_rcrd = mysqli_query($server, "DELETE FROM `category` 
						WHERE `cat_id`='$spcific_rec'");
					 if ($del_rcrd) {
					 	echo "success";
					 }else{echo "fail"; }
				

			echo "<a class='btn btn-success' href='postitem.php?categories'>Done</a>";
		    }	    
//when delis pressed	    
} 
//CATEGORIES SECTION

//SUB-CATEGORIES SECTION
if (isset($_GET['sub_categories'])) {
	echo "
	<div class='well'>
		<form class='form-horizontal' enctype='multipart/form-data' method='POST'>
			<h4>Available Sub-Categories</h4>";

//Displaying sub-categories table
		echo"<table class='table table-hover'>
		    <thead>
		      <tr>
		        <th>Sub Id</th>
		        <th>Sub Name</th>
		        <th>Cat Id</th>
		      </tr>
		    </thead>
		    <tbody>";
		$select_sub = mysqli_query($server, "SELECT * FROM `sub_category`") or die('Mysql_error in sub-category');
	    while($colms = mysqli_fetch_array($select_sub))
		{
		 echo "   
		 <tr>
	        <td>$colms[0]</td>
	        <td>$colms[1]</td>
	        <td>$colms[2]</td>
	        <td><a class='btn btn-info' href='postitem.php?sub_categories&edit_sub=$colms[0]'> edit</a></td>
	        <td><a class='btn btn-danger' href='postitem.php?sub_categories&del=$colms[0]'> del</a></td>
	      </tr>";
		}
		echo "	</tbody>
			</table>";
//Displaying sub-categories table

			echo"
			<div class='control-group'>
	        	<label class='control-label' for='cat_id'>Category<sup>*</sup></label>
				<div class='controls'>
			    	<select  id='cat_id' name='cat_id' >
			    	    <option value=''>--Choose Category--</option>";
			    	    $category_sql = mysqli_query($server,"SELECT * FROM category ORDER BY  `category`.`cat_id` ASC   ") or die('Mysql_error');	
			    	    while($colms=mysqli_fetch_array($category_sql, MYSQLI_NUM))
						{
				    	echo" <option value='$colms[0]'>$colms[1]</option>";	
						}			
			echo"	</select>
				</div>
			</div>

	 		 <div class='control-group'>
				<label class='control-label'  for='sub_name'>Sub-Category<sup>*</sup></label>
				<div class='controls'>
					 <input type='text' name='sub_name'  id='sub_name' placeholder='Type Name' >
				</div>
			 </div>

			<div class='control-group'>
				<div class='controls'>
					<input class='btn btn-medium btn-success' type='submit' name='add_sub'  value='Add Category' ></input>
				</div>
			</div

		</form>
	</div>";

	if (isset($_POST['add_sub'])) {
	$cat_id = $_POST['cat_id'];
	$sub_name = $_POST['sub_name'];
	$insert_cat = mysqli_query($server, "INSERT INTO `sub_category`(`sub_name`, `cat_id`) VALUES ('$sub_name', '$cat_id')");
		if ($insert_cat) {
			echo "Category entered successfully";
		}else{
			echo "Unsuccessful. Try adding category Item again.";
		}
	}
//when edit is pressed
		    if (isset($_GET['edit_sub'])) {
		    	$specific_sub = $_GET['edit_sub'];
		    	echo $specific_sub;
		    	$select_edit_sub = mysqli_query($server, "SELECT * FROM `sub_category` WHERE sub_id='$specific_sub' ") or die('Mysql Error at sub-category editing');

			    while($colms = mysqli_fetch_array($select_edit_sub))
				{
				    echo "<form method='post'>";
					echo"	<tr>	  
						       <td><input name='edit_sub' value='$colms[1]' type='text'></input></td>
						        <td><input class='btn btn-success' type='submit' name='submit_sub_edit' value='submit'></input></td>
						    </tr>";
					echo "</form>";
				}

				if (isset($_POST['submit_sub_edit'])) {
					
					$edit_sub = $_POST['edit_sub'];
					
					$edit_recrd = mysqli_query($server, "UPDATE `sub_category` 
						SET `sub_name`='$edit_sub' WHERE `sub_id`='$specific_sub' ") or die('Mysql error inputing sub-category update');
					 if ($edit_recrd) {
					 	echo "success";
					 }else{echo "fail"; }
				}

			echo "<a class='btn btn-info' href='postitem.php?sub_categories'>Done</a>";
		    }
//when edit is pressed

//when del is pressed
		    if (isset($_GET['del'])) {
		    	$spcific_rec = $_GET['del'];

					$del_rcrd = mysqli_query($server, "DELETE FROM `sub_category` 
						WHERE `sub_id`='$spcific_rec'");
					 if ($del_rcrd) {
					 	echo "success";
					 }else{echo "fail"; }
				

			echo "<a class='btn btn-success' href='postitem.php?sub_categories'>Done</a>";
		    }	    
//when delis pressed
}

//SUB-CATEGORIES SECTION

//ADD CAT SECTION
if (isset($_GET['add_item'])) {
		 	echo"<h4>Add New Item</h4>
		<form class='form-horizontal' enctype='multipart/form-data' method='POST'>";

			echo"
			<div class='control-group'>
	        	<label class='control-label' for='cat_name'>Category<sup>*</sup></label>
				<div class='controls'>
			    	<select  id='cat_name' name='cat_name' >
			    	    <option value=''>--Choose Category--</option>";
			    	    $category_sql = mysqli_query($server,"SELECT * FROM category ORDER BY  `category`.`cat_id` ASC   ") or die('Mysql_error');	
			    	    while($colms=mysqli_fetch_array($category_sql, MYSQLI_NUM))
						{
				    	echo" <option value='$colms[1]'>$colms[1]</option>";	
						}			
			echo"	</select>
				</div>
			</div>";

			echo"
			<div class='control-group'>
	        	<label class='control-label' for='sub_name'>Sub-Category<sup>*</sup></label>
				<div class='controls'>
			    	<select  id='sub_name' name='sub_name' >
			    	    <option value=''>--Choose Sub-Category--</option>";
			    	    $category_sql = mysqli_query($server,"SELECT * FROM sub_category ORDER BY  `sub_category`.`sub_id` ASC   ") or die('Mysql_error');	
			    	    while($colms=mysqli_fetch_array($category_sql, MYSQLI_NUM))
						{
				    	echo" <option value='$colms[1]'>$colms[1]</option>";	
						}			
			echo"	</select>
				</div>
			</div>";

		echo"


	    <div class='control-group'>
        	<label class='control-label' for='type'>Type<sup>*</sup></label>
			<div class='controls'>
		    	<select  id='type' name='type' >
		    	    <option value='Normal'>Normal</option>
			    	<option value='Featured'>Featured</option>			
				</select>
			</div>
		</div>



		<div class='control-group'>
				<label class='control-label'  for='name'>Item name<sup>*</sup></label>
				<div class='controls'>
					 <input type='text' name='name'  id='name' placeholder='Item name' >
				</div>
			 </div>

			 <div class='control-group'>
				<label class='control-label'  for='curr_price'>Price<sup>*</sup></label>
				<div class='controls'>
					 <input type='number' name='curr_price'  id='curr_price' placeholder='Current Price'  >
				</div>
			 </div>

			 <div class='control-group'>
				<label class='control-label'  for='initi_price'>Ini_Price<sup>*</sup></label>
				<div class='controls'>
					 <input type='number' name='initi_price'  id='initi_price' placeholder='Initial Price' >
				</div>
			 </div>

			<div class='control-group'>
				<label class='control-label' for='short_description'>Short Description<sup>*</sup></label>
				<div class='controls'>
					<textarea name='short_description' id='short_description' placeholder='e.g Black, 32Gb, 18 mp' cols='27' rows='4' ></textarea>
					<!--<span>Sample description of filled content</span>-->
				</div>
			</div>
			
			 <div class='control-group'>
				<label class='control-label' for='long_description'>Full Description<sup>*</sup></label>
				<div class='controls'>
					<textarea name='long_description' id='long_description' placeholder='Describe item fully' cols='35' rows='6' length='10' placeholder='Full descrition'></textarea>
				</div>
			</div>

			<div class='control-group'>
				<label class='control-label'  for='image_1'>Main Photo<sup>*</sup></label>
				<div class='controls'>
					 <input type='file' name='image_1' id='image_1'>
				</div>
			 </div>

			<div class='control-group'>
				<label class='control-label'  for='image_2'>2nd Photo<sup>*</sup></label>
				<div class='controls'>
					 <input type='file' name='image_2' id='image_2'>
				</div>
			 </div>

			<div class='control-group'>
				<label class='control-label'  for='image_3'>3rd Photo<sup>*</sup></label>
				<div class='controls'>
					 <input type='file' name='image_3' id='image_3'>
				</div>
			 </div>



			<div class='control-group'>
	        	<label class='control-label' for='availability'>Availability<sup>*</sup></label>
				<div class='controls'>
			    	<select  id='availability' name='availability' >
			    	    <option value='Locally'>Locally</option>
				    	<option value='Overseas'>Overseas</option>			
					</select>
				</div>
			</div>
			
			
			<div class='control-group'>
	        	<label class='control-label' for='warranty'>Availability<sup>*</sup></label>
				<div class='controls'>
			    	<select  id='warranty' name='warranty' >
			    	
			    	    <option value=''>0 mnths/yr warranty</option>
			    	    <option value='3 months warranty'>3 months warranty</option>
				    	<option value='6 months warranty'>6 months warranty</option>		
				    	<option value='8 months warranty'>8 months warranty</option>		
				    	<option value='1 Yr Warranty'>1 Yr Warranty</option>	
				    	<option value='2 Yr Warranty'>2 Yr Warranty</option>	
					</select>
				</div>
			</div>

			<div class='control-group'>
				<div class='controls'>
					<input class='btn btn-medium btn-success' type='submit' name='add_item'  value='Add Item' ></input>
				</div>
			</div

		</form>
	</div>";
//adding new Item
	if (isset($_POST['add_item'])) {
		$name = $_POST['name'];
		$cat_name = $_POST['cat_name'];
		$sub_name = $_POST['sub_name'];
		$curr_price = $_POST['curr_price'];
		$initi_price = $_POST['initi_price'];
		$short_description = $_POST['short_description'];
		$long_description = $_POST['long_description'];
		$date_posted = date("F, j,Y");
		$time_posted = date("G:i:s");
		$type = $_POST['type'];
		$availability = $_POST['availability'];
		$warranty = $_POST['warranty'];
		$discount = (($initi_price-$curr_price)/$initi_price)*100; 

	if ($name == null || $cat_name ==null || $sub_name == null || $curr_price == null 
			|| $short_description == null || $type == null)
			{
				echo'	<div class="alert alert-block alert-error fade in">';
				echo'	<button type="button" class="close" data-dismiss="alert">×</button>';
				echo"	<strong>Uploading details failed</strong><br/>";
				echo"    Fill all the textboxes and try again"; 
				echo" 	</div>";	
				exit();
			}
		else
			{
			//below is used to upload the photos to the serverrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr
			$target_dir = "e_images/";
			$target_file1 = $target_dir.basename($_FILES["image_1"]["name"]);
			$target_file2 = $target_dir.basename($_FILES["image_2"]["name"]);
			$target_file3 = $target_dir.basename($_FILES["image_3"]["name"]);
			$uploadOk = 1;
			$imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
			$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
			$imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);
			//below checks if image file is a fake or real image

			$check1 = getimagesize($_FILES["image_1"]["tmp_name"]);
			$check2 = getimagesize($_FILES["image_2"]["tmp_name"]);
			$check3 = getimagesize($_FILES["image_3"]["tmp_name"]);
			if($check1 !== false && $check2 !== false && $check3 !== false )
				{
			
				}
			else
				{
				echo'	<div class="alert alert-block alert-error fade in">';
				echo'	<button type="button" class="close" data-dismiss="alert">×</button>';
				echo"	<strong> Upload failed!!</strong><br/>Please check if the uploaded files are images."; 
				echo" 	</div>";
				$uploadOk = 0;
				}

				//check if $uploadOk is set to 0 by an error
			if($uploadOk == 0)
				{
				echo'	<div class="alert alert-block alert-error fade in">';
				echo'	<button type="button" class="close" data-dismiss="alert">×</button>';
				echo"	Please try again. Your images <strong>failed to upload</strong><br/>"; 
				echo" 	</div>";	
				}
					//if everything is ok try to upload file
			else{
				if(move_uploaded_file($_FILES["image_1"]["tmp_name"],$target_file1) && 
					move_uploaded_file($_FILES["image_2"]["tmp_name"],$target_file2) &&
					move_uploaded_file($_FILES["image_3"]["tmp_name"],$target_file3))
					{
					echo'		<div class="alert alert-success fade in">
								<button type="button" class="close" data-dismiss="alert">×</button>
								You images have been <strong>successfully uploaded</strong>
								</div>';

					}			
				else
					{		
					echo'	<div class="alert alert-block alert-error fade in">';
					echo'	<button type="button" class="close" data-dismiss="alert">×</button>';
					echo"	<strong> Upload failed!!</strong><br/>Sorry, there was an error uploading your files."; 
					echo" 	</div>";
					}
			}		
			}
////above uploads photos to server
$image_1= basename($_FILES["image_1"]["name"]);
$image_2= basename($_FILES["image_2"]["name"]);
$image_3= basename($_FILES["image_3"]["name"]);
		$insert_cat = mysqli_query($server, "INSERT INTO `product_details`(`name`, `cat_name`, `sub_name`, `current_price`, `initial_price`, `short_description`, `long_description`, `image_1`, `image_2`, `image_3`, `date_posted`, `time_posted`, `type`,`discount`,`availability`,`warranty`) VALUES ('$name', '$cat_name', '$sub_name', '$curr_price', '$initi_price', '$short_description', '$long_description', '$image_1', '$image_2', '$image_3', '$date_posted', '$time_posted', '$type','$discount','$availability','$warranty')");

				if ($insert_cat) 
					{
			 		echo'		<div class="alert alert-success fade in">';
					echo'		<button type="button" class="close" data-dismiss="alert">×</button>';
					echo'		You have <strong>successfully uploaded</strong> drink for sale';
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
//adding items



	echo "
	<div class='well'>
			<h4>Available Categories</h4>";

//Displaying items table
		echo"<table class='table table-hover'>
		    <thead>
		      <tr>
		        <th>Id</th>
		        <th>Name</th>
		        <th>cat_name</th>
		        <th>Sub_name</th>
		        <th>Curr_Price</th>
		        <th>Ini_Price</th>
		        <th>Short</th>
		        <th>Date</th>
		        <th>Time</th>
		        <th>TYpe</th>
		        <th>Avail</th>
		      </tr>
		    </thead>
		    <tbody>";
		$select_items = mysqli_query($server, "SELECT * FROM `product_details`") or die('Mysql_error');
	    while($colms = mysqli_fetch_array($select_items))
		{
		 echo "   
		 <tr>
	        <td>$colms[0]</td>
	        <td>$colms[1]</td>
	        <td>$colms[2]</td>
	        <td>$colms[3]</td>
	        <td>$colms[4]</td>
	        <td>$colms[5]</td>
	        <td>$colms[6]</td>
	        <td>$colms[11]</td>
	        <td>$colms[12]</td>
	        <td>$colms[13]</td>
	        <td>$colms[15]</td>
	        <td><a class='btn btn-info' href='postitem.php?add_item&edit=$colms[0]'> edit</a></td>
	        <td><a class='btn btn-danger' href='postitem.php?add_item&del=$colms[0]'> del</a></td>
	      </tr>";
		}
		echo "	</tbody>
			</table>";
//Displaying items table



//when edit is pressed
		    if (isset($_GET['edit'])) {
		    	$spcific_cat = $_GET['edit'];

		echo "<form method='post'>";

			echo"
			<div class='control-group'>
	        	<label class='control-label' for='cat_name'>Category<sup>*</sup></label>
				<div class='controls'>
			    	<select  id='cat_name' name='cat_name' required>
			    	    <option value=''>--Choose Category--</option>";
			    	    $category_sql = mysqli_query($server,"SELECT * FROM category ORDER BY  `category`.`cat_id` ASC   ") or die('Mysql_error');	
			    	    while($colms=mysqli_fetch_array($category_sql, MYSQLI_NUM))
						{
				    	echo" <option value='$colms[1]'>$colms[1]</option>";	
						}			
			echo"	</select>
				</div>
			</div>";

			echo"
			<div class='control-group'>
	        	<label class='control-label' for='sub_name'>Sub-Category<sup>*</sup></label>
				<div class='controls'>
			    	<select  id='sub_name' name='sub_name' required>
			    	    <option value=''>--Choose Sub-Category--</option>";
			    	    $category_sql = mysqli_query($server,"SELECT * FROM sub_category ORDER BY  `sub_category`.`sub_id` ASC   ") or die('Mysql_error');	
			    	    while($colms=mysqli_fetch_array($category_sql, MYSQLI_NUM))
						{
				    	echo" <option value='$colms[1]'>$colms[1]</option>";	
						}			
			echo"	</select>
				</div>
			</div>";

	$select_edit_cat = mysqli_query($server, "SELECT * FROM `product_details` WHERE product_id='$spcific_cat' ");
    while($colms = mysqli_fetch_array($select_edit_cat))
	{

		echo"
		<div class='control-group'>
			<label class='control-label'  for='type'>Type<sup>*</sup></label>
			<div class='controls'>
				 <input type='text' value='$colms[13]' required name='type'  id='type' placeholder='Featured/Normal  ' >
			</div>
		 </div>

		<div class='control-group'>
				<label class='control-label'  for='name'>Item name<sup>*</sup></label>
				<div class='controls'>
					 <input type='text' name='name' value='$colms[1]' id='name' placeholder='Item name' required>
				</div>
			 </div>

			 <div class='control-group'>
				<label class='control-label'  for='curr_price'>Price<sup>*</sup></label>
				<div class='controls'>
					 <input type='number' name='curr_price' value='$colms[4]'  id='curr_price' placeholder='Current Price' required >
				</div>
			 </div>

			 <div class='control-group'>
				<label class='control-label'  for='initi_price'>Ini_Price<sup>*</sup></label>
				<div class='controls'>
					 <input type='number' name='initi_price' value='$colms[5]'  id='initi_price' placeholder='Initial Price' required>
				</div>
			 </div>

			<div class='control-group'>
				<label class='control-label' for='short_description'>Short Description<sup>*</sup></label>
				<div class='controls'>
					<textarea name='short_description' id='short_description' value='$colms[6]' placeholder='$colms[6]' cols='27' rows='4' required></textarea>
					<!--<span>Sample description of filled content</span>-->
				</div>
			</div>
			
			 <div class='control-group'>
				<label class='control-label' for='long_description'>Full Description<sup>*</sup></label>
				<div class='controls'>
					<textarea name='long_description' id='long_description' value='$colms[7]'placeholder='$colms[7]' cols='35' rows='6' length='10'></textarea>
				</div>
			</div>

			<tr>	  
			    <td><input class='btn btn-success' type='submit' name='submit_edit' value='submit'></input></td>
			 </tr>";
		echo "</form>";
				}

	if (isset($_POST['submit_edit'])) {
		$name = $_POST['name'];
		$cat_name = $_POST['cat_name'];
		$sub_name = $_POST['sub_name'];
		$curr_price = $_POST['curr_price'];
		$initi_price = $_POST['initi_price'];
		$short_description = $_POST['short_description'];
		$long_description = $_POST['long_description'];
		$date_posted = date("F, j,Y");
		$time_posted = date("G:i:s");
		$type = $_POST['type'];	

$edit_recrd = mysql_query($server, "UPDATE `product_details` SET `name`='$name',`cat_name`= '$cat_name',`sub_name`='$sub_name',`current_price`='$curr_price',`initial_price`='$initi_price' ,`short_description`='$short_description',`long_description`='$long_description', `date_posted`='$date_posted',`time_posted`='$time_posted', `type`='$type' WHERE `cat_id`='$spcific_cat'") or die('Mysql Error updating records');
/*
$edit_recrd = mysqli_query($server, "UPDATE `product_details` SET `name`='$name', `cat_name`='$cat_name', `sub_name`='$sub_name', `current_price`='$curr_price', `initial_price`='$initi_price', `short_description`='$short_description', `long_description`='$long_description', `date_posted`='$date_posted', `time_posted`='$time_posted' WHERE `cat_id`='$spcific_cat' ") or die(mysql_error());*/
					 if ($edit_recrd) {
					 	echo "success";
					 }else{echo "fail"; }
				}

			echo "<a class='btn btn-info' href='postitem.php?categories'>Done</a>";
		    }

//when edit is pressed
//when del is pressed
		    if (isset($_GET['del'])) {
		    	$spcific_rec = $_GET['del'];

		$del=mysqli_query($server, "SELECT * FROM `product_details` WHERE `product_id` ='$spcific_rec' ");

	    while($colms=mysqli_fetch_array($del))
		{
			unlink("e_images/".$colms[8]);
			unlink("e_images/".$colms[9]);
			unlink("e_images/".$colms[10]);
		}
					$del_rcrd = mysqli_query($server, "DELETE FROM `product_details` 
						WHERE `product_id`='$spcific_rec'");
					 if ($del_rcrd) {
					 	echo "success";
					 }else{echo "fail"; }
				

			echo "<a class='btn btn-success' href='postitem.php?add_item'>Done</a>";
		    }	    
//when delis pressed	    
} 
//ADD CAT SECTION
 ?>
	<h5>Compatible E-commerce site</h5><br/>
	<p>E-commerce site that compatible with all platforms.</p>


</div>
</div></div>
</div>
<!-- MainBody End ============================= -->

<!-- Footer-->
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