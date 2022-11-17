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
$id=$data['id'];
$Datalist=array();
$query=mysqli_query( $con,"SELECT * FROM tbl_userpurchasehead u INNER JOIN tbl_userpurchasedetail ud on u.upurchasehead_id=ud.upurchasehead_id INNER JOIN tbl_productstock ps on ps.productstock_id=ud.productstock_id INNER JOIN tbl_centraljail c on c.centraljail_id=ps.centraljail_id INNER JOIN tbl_productrate pr on pr.product_id=ps.product_id INNER JOIN tbl_product p on p.product_id=pr.product_id WHERE u.user_id='$id' AND u.upurchasehead_status='0' and ps.productstock_totalquantity>0");
while($row = mysqli_fetch_assoc($query))
{
array_push($Datalist,$row);
}
if(count($Datalist) > 0)
{
echo json_encode(array("alert"=>"Sucess","data"=>$Datalist));
}
else
{
echo json_encode(array("alert"=>"Failed"));
}
}
?>