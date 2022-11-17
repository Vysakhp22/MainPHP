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
$stock=$data['stock'];
$id=$data['id'];
$query="UPDATE tbl_productstock SET productstock_totalquantity=productstock_totalquantity - '$stock' WHERE productstock_id='$id'";
$res=mysqli_query($con,$query);
echo json_encode(array("alert"=>"Success"));
}
?>