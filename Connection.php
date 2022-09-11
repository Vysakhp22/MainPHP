<?php

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST");
header("Access-Control-Allow-Headers:*");


$Servername = "localhost";
$Username = "root";
$Password = "";
$DB = "db_exconvict";

$Conn= mysqli_connect($Servername,$Username,$Password,$DB);

?>