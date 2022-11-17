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
$query=mysqli_query( $con,"SELECT * from tbl_shoppurchasehead s inner join tbl_shoppurchasedtls sd on sd.shppurchasehead_id=s.shoppurchasehead_id inner JOIN tbl_productstock ps on ps.productstock_id=sd.productstock_id inner join tbl_centraljail c on c.centraljail_id=ps.centraljail_id  INNER join tbl_productrate pr on pr.product_id=ps.product_id inner join tbl_product p on p.product_id=pr.product_id where s.shop_id='$id' AND s.shoppurchasehead_status=0");
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