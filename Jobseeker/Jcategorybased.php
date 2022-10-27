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
$cat=$data['id'];
$Datalist=array();
$query=mysqli_query( $con,"SELECT * FROM tbl_jobvaccancy v INNER JOIN tbl_jobdetail d on v.jobdet_id=d.jobdet_id INNER JOIN tbl_jobcategory c ON d.jobcategory_id=c.jobcategory_id WHERE  c.jobcategory_id='$cat' AND v.jobvac_nov > 0");
while($row = mysqli_fetch_assoc($query))
{
array_push($Datalist,$row);
}
if(count($Datalist) > 0)
{
echo json_encode(array("alert"=>"Success","data"=>$Datalist));
}
else
{
echo json_encode(array("alert"=>"Failed"));
}
}
?>
