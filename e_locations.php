<?php


$q = intval($_GET['q']);

$con = mysqli_connect('localhost','windandc','windand2017','windandc_nafuumall_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"windandc_nafuumall_db");
$sql="SELECT * FROM locations WHERE loc_id='$q'";
$result = mysqli_query($con,$sql);

while($colms = mysqli_fetch_array($result)) {
echo "<tr ><td>Shipping cost: <strong>ksh.$colms[2]</strong></td></tr>
	 <tr>        
	</tr>
";
}




mysqli_close($con);
?>