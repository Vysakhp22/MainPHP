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
$vid=$data['vacid'];
$query=mysqli_query( $con,"UPDATE tbl_jobapply SET jobapplier_status='1' WHERE jobapply_id='$Id'");
$res=mysqli_query($con,$query);
$vac=mysqli_query( $con,"UPDATE tbl_jobvaccancy SET jobvac_nov=jobvac_nov - 1 WHERE jobvac_id=$vid");
$res1=mysqli_query($con,$vac);
echo json_encode(array("alert"=>"Success"));
}
?>


