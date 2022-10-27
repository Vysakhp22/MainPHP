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
$company=mysqli_query( $con,"SELECT * FROM tbl_company WHERE company_email='$mail' AND company_password='$passwd'");
$jail=mysqli_query( $con,"SELECT * FROM tbl_centraljail WHERE centraljail_email='$mail'AND centraljail_password='$passwd'");
$shop=mysqli_query( $con,"SELECT * FROM tbl_shop WHERE shop_email='$mail' and shop_password='$passwd'");
$user=mysqli_query( $con,"SELECT * FROM tbl_user WHERE user_email='$mail' AND user_password='$passwd'");
$jobS=mysqli_query( $con,"SELECT * FROM tbl_jobseeker WHERE jobseeker_email='$mail' AND jobseeker_password='$passwd'");
if($row = mysqli_fetch_assoc($query))
{
array_push($Datalist,$row);
    if(count($Datalist) > 0)
    {
        echo json_encode(array("alert"=>"Admin","data"=>$Datalist));
    }
}
else if($row = mysqli_fetch_assoc($company))
{
array_push($Datalist,$row);
    if(count($Datalist) > 0)
    {
        echo json_encode(array("alert"=>"Company","data"=>$Datalist));
    }
}
else if($row = mysqli_fetch_assoc($jail))
{
array_push($Datalist,$row);
    if(count($Datalist) > 0)
    {
        echo json_encode(array("alert"=>"Central jail","data"=>$Datalist));
    }
}
else if($row = mysqli_fetch_assoc($shop))
{
array_push($Datalist,$row);
    if(count($Datalist) > 0)
    {
        echo json_encode(array("alert"=>"Shop","data"=>$Datalist));
    }
}
else if($row = mysqli_fetch_assoc($user))
{
array_push($Datalist,$row);
    if(count($Datalist) > 0)
    {
        echo json_encode(array("alert"=>"User","data"=>$Datalist));
    }
}
else if($row = mysqli_fetch_assoc($jobS))
{
array_push($Datalist,$row);
    if(count($Datalist) > 0)
    {
        echo json_encode(array("alert"=>"Jobseeker","data"=>$Datalist));
    }
}
else
{
    echo json_encode(array("alert"=>"Failed"));
}
}
?>
