<?php
// Database configuration
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'u910363469_admin');
define('DB_PASSWORD', 'Xyanehmakie17');
define('DB_NAME', 'u910363469_wma');

// Attempt to connect to MySQL database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
