<?php
/**
 * Database Class
 *
 * Connects to database
 *
 * @author John Muiruri <jontedev@gmail.com>
 */

class Database
{
    public function getConn()
    {
        $servername = "localhost";
        $username = "test";
        $password = "";
        $dbname = "nafuumall";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            // echo "Connected";
            return $conn;
        }
    }
}
