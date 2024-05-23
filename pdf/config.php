<?php
define('DB_SERVER','localhost');
define('DB_USER','oslcompk');
define('DB_PASS' ,'Rahim2020');
define('DB_NAME', 'oslcompk_oriental');
//$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
try
{
$dbh = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME,DB_USER,DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch(PDOException $e)
{
echo "Failed to connect to MySQL: " . $e->getMessage();
 }

?>