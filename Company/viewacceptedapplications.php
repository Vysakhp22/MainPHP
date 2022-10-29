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
$cid=$data['id'];
$Datalist=array();
$query=mysqli_query( $con,"SELECT * FROM tbl_jobapply a INNER JOIN tbl_jobseeker s ON a.jobseeker_id=s.jobseeker_id INNER JOIN tbl_prisoner p ON s.prisoner_id=p.prisoner_prisonercode INNER JOIN tbl_jobvaccancy v on a.jobvac_id=v.jobvac_id INNER JOIN tbl_jobdetail d on v.jobdet_id=d.jobdet_id INNER JOIN tbl_company c on v.company_id=c.company_id WHERE a.jobapplier_status=1 AND c.company_id='$cid'");
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
