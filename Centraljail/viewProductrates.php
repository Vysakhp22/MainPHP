<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST");
header("Access-Control-Allow-Headers:*");
$con=mysqli_connect("127.0.0.1","root","","db_exconvict");
$Datalist=array();
$query=mysqli_query( $con,"SELECT * FROM tbl_productrate r INNER JOIN tbl_product p ON r.product_id = p.product_id");
while($row = mysqli_fetch_assoc($query))
{
array_push($Datalist,$row);
}
echo json_encode($Datalist)
?>