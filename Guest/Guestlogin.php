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
if(isset($data['email']))
{
$mail=$data['email'];
$passwd=$data['password'];
$Datalist=array();
$query=mysqli_query( $con,"SELECT * FROM tbl_admin WHERE admin_email='$mail' AND admin_password='$passwd'");
$query1=mysqli_query( $con,"SELECT * FROM tbl_company WHERE company_email='$mail' AND company_password='$passwd'");
$query2=mysqli_query( $con,"SELECT * FROM tbl_centraljail WHERE centraljail_email='$mail'AND centraljail_password='$passwd'");
$shop=mysqli_query( $con,"SELECT * FROM tbl_shop WHERE shop_email='$mail' and shop_password='$passwd'");
$user=mysqli_query( $con,"SELECT * FROM tbl_user WHERE user_email='$mail' AND user_password='$passwd'");
if($row = mysqli_fetch_assoc($query))
{
array_push($Datalist,$row);
    if(count($Datalist) > 0)
    {
        echo json_encode(array("alert"=>"Admin","data"=>$Datalist));
    }
}
else if($row = mysqli_fetch_assoc($query1)){
    array_push($Datalist,$row);
    if(count($Datalist) > 0)
    {
        echo json_encode(array("alert"=>"Company","data"=>$Datalist));
    }
}
else if($row = mysqli_fetch_assoc($query2)){
    array_push($Datalist,$row);
    if(count($Datalist) > 0)
    {
        echo json_encode(array("alert"=>"Central jail","data"=>$Datalist));
    }
}
else if($row = mysqli_fetch_assoc($shop)){
    array_push($Datalist,$row);
    if(count($Datalist) > 0)
    {
        echo json_encode(array("alert"=>"Shop","data"=>$Datalist));
    }
}
else if($row = mysqli_fetch_assoc($user)){
    array_push($Datalist,$row);
    if(count($Datalist) > 0)
    {
        echo json_encode(array("alert"=>"User","data"=>$Datalist));
    }
}
else
{
    echo json_encode(array("alert"=>"Failed"));
}
}
?>