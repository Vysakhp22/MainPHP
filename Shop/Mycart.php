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
$datalist=array();
$query="select * from tbl_shoppurchasehead sh inner join tbl_shoppurchasedtls sd on sd.shppurchasehead_id=sh.shoppurchasehead_id inner join tbl_productstock ps on ps.productstock_id=sd.productstock_id where sh.shop_id='$id'";
$row=mysqli_query($con,$query);
while($result=mysqli_fetch_assoc($row))
{
    array_push($datalist,$result);
}
echo json_encode(array("alert"=>"Success","data"=>$Datalist));
}
?>