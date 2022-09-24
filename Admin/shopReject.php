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
$Id=$data['id'];
$query=mysqli_query( $con,"UPDATE tbl_shop SET shop_status='2' WHERE shop_id='$Id'");
$res=mysqli_query($con,$query);
echo json_encode(array("alert"=>"Success"));
}
?>

