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
if(isset($data['cid']))
{
$cid=$data['cid'];
$detid=$data['detid'];
$Datalist=array();
$query=mysqli_query( $con,"SELECT * FROM tbl_jobvaccancy WHERE company_id='$cid' AND jobdet_id='$detid'");
while($row = mysqli_fetch_assoc($query))
{
array_push($Datalist,$row);
}
if(count($Datalist) > 0)
{
echo json_encode(array("data"=>$Datalist));
}
else
{
echo json_encode(array("alert"=>"Failed"));
}
}
?>
