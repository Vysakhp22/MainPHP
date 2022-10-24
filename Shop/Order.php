<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST");
header("Access-Control-Allow-Headers:*");
$con=mysqli_connect("127.0.0.1","root","","db_exconvict");
$request=file_get_contents("php://input");
$data=json_decode($request);
if (is_object($data)) {
$data = get_object_vars($data);
}
if(isset($data['id']))
{
$sid=$data['id'];
$Datalist=array();
$query=mysqli_query( $con,"SELECT * FROM tbl_productstock s INNER JOIN tbl_product p ON s.product_id=p.product_id INNER JOIN tbl_centraljail j ON s.centraljail_id=j.centraljail_id INNER JOIN tbl_productrate r ON s.product_id=r.product_id WHERE s.productstock_id='$sid'");
while($row = mysqli_fetch_assoc($query))
{
array_push($Datalist,$row);
}
if(count($Datalist) > 0)
{
echo json_encode(array("alert"=>"Sucess","data"=>$Datalist));
}
else
{
echo json_encode(array("alert"=>"Failed"));
}
}
?>