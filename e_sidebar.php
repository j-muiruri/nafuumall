<!-- Sidebar ================================================== -->
<div id="sidebar" class="span3">

<?php
echo'		<ul id="" class="nav nav-tabs nav-stacked">';
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
		<br/>
		</li>
	</div>
<!-- Sidebar end=============================================== -->








											
	

















