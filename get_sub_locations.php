<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','windandc','windand2017','windandc_nafuumall_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"windandc_nafuumall_db");
$sql="SELECT * FROM `sub_locations` WHERE `loc_name`='$q' ORDER BY `sub_locations`.`sub_name` ASC";
$result = mysqli_query($con,$sql);
echo"<option  value=''>Select Area</option>";
while($colms = mysqli_fetch_array($result)) {
echo "<option value='$colms[1]'>$colms[1]<option>";}
echo"<option  value='Other'>Other</option>";



mysqli_close($con);
?>