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
if(isset($data['vcid']))
{
    $vacid=$data['vcid'];
    $sid=$data['sid'];
    $date=date("Y-m-d");
$query="INSERT INTO tbl_jobapply(jobvac_id, jobseeker_id, jobapplier_date, jobapplier_status) VALUES ('$vacid', '$sid', '$date', '0')";
$res=mysqli_query($con,$query);
echo json_encode(array("alert"=>"Success")); 
}
?>