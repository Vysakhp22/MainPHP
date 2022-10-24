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
$query=mysqli_query( $con,"SELECT * FROM tbl_centraljail c INNER JOIN tbl_place l ON c.place_id=l.place_id INNER JOIN tbl_productstock s ON s.centraljail_id=c.centraljail_id INNER JOIN tbl_product p ON p.product_id=s.product_id inner join tbl_productrate pr on pr.product_id=p.product_id WHERE l.district_id='$id' and s.productstock_totalquantity > 0");
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
