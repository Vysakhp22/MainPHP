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
if(isset($data['headid']))
{
$ttl=$data['total'];
$bill=rand();
$hid=$data['headid'];
$query="UPDATE tbl_shoppurchasehead SET shoppurchasehead_billno='$bill',shoppurchasehead_totalamount='$ttl',shoppurchasehead_status='1' WHERE shoppurchasehead_id='$hid'";
$res=mysqli_query($con,$query);
echo json_encode(array("alert"=>"Success"));
}
?>