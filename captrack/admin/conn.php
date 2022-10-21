<?php
error_reporting(E_ALL);
$host="127.0.0.1:5306";
$username="root";
$password="";
$db="captrack";
//@$con=mysql_connect($host,$username,$password);
//mysql_select_db($db,$con);
try{
$conn=new PDO("mysql:host=$host;dbname=$db",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//echo "Connected";
}
catch(PDOException $e)
{
	die("Database Not Connected".$e->getMessage());
}

?>