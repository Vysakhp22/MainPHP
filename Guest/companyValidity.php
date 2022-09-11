<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST");
header("Access-Control-Allow-Headers:*");
$con=mysqli_connect("127.0.0.1","root","","db_exconvict");
$request=file_get_contents("php://input");
$data=json_decode($request);
//echo mysqli_connect_error($con);
if (is_object($data)) {
$data = get_object_vars($data);
}
if(isset($data['email']))
{
$mail=$data['email'];
$du="select * from tbl_company where company_email='$mail'";
$row1=mysqli_query($con,$du);
if($datas=mysqli_fetch_assoc($row1))
{
    echo json_encode(array("alert"=>"Existing"));
}
else{
    echo json_encode(array("alert"=>"Valid"));
    }

}
?>