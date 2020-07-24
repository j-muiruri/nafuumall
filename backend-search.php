<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "nafuumall", "ecommerce_2020_", "nafuumall_db");



// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$term = mysqli_real_escape_string($link, $_REQUEST['term']);
 
if (isset($term)) {
    // Attempt select query execution
    //    $ress= mysqli_query($server, "SELECT * FROM product_details WHERE name
    // LIKE '%".$hint."%' OR cat_name  LIKE '%".$hint."%' OR sub_name  LIKE '%".$hint."%' OR short_description LIKE '%".$hint."%'  OR long_description LIKE '%".$hint."%' ORDER BY  `product_details`.`name` ASC   ")  or die(mysql_error());

    $sql = "SELECT * FROM product_details WHERE name 
        LIKE '%".$term."%' OR cat_name  LIKE '%".$term."%' OR sub_name  LIKE '%".$term."%' OR short_description LIKE '%".$term."%'  OR long_description LIKE '%".$term."%' ORDER BY  `product_details`.`name` ASC   ";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<p>" . $row['name'] . "</p>";
            }
            // Close result set
            mysqli_free_result($result);
        } else {
            echo "<p>No matches found</p>";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
 
// close connection
mysqli_close($link);
