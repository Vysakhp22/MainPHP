<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST");
header("Access-Control-Allow-Headers:*");
$con=mysqli_connect("127.0.0.1","root","","db_exconvict");
$Datalist=array();
$query=mysqli_query( $con,"SELECT * FROM tbl_jobvaccancy v INNER JOIN tbl_jobdetail d on v.jobdet_id=d.jobdet_id INNER JOIN tbl_jobcategory c ON d.jobcategory_id=c.jobcategory_id WHERE v.jobvac_nov > 0");
while($row = mysqli_fetch_assoc($query))
{
array_push($Datalist,$row);
}
echo json_encode($Datalist)
?>