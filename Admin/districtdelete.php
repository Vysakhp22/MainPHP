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
$distid=$data['id'];
$query="DELETE FROM tbl_place WHERE district_id='$distid'";
if(mysqli_query($con,$query)){
    $query1=mysqli_query( $con,"DELETE FROM tbl_district WHERE district_id='$distid'");
    $res=mysqli_query($con,$query1);
    echo json_encode(array("alert"=>"Success"));
}
else{
    echo json_encode(array("alert"=>"Failed"));
}
}
?>
