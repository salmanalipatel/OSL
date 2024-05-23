<?php
define('DB_SERVER','localhost');
define('DB_USER','oslcompk');
define('DB_PASS' ,'Rahim2020');
define('DB_NAME', 'oslcompk_oriental');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

?>