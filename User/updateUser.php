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
if(isset($data['uname']))
{
$uname=$data['uname'];
$address=$data['address'];
$uid=$data['uid'];
        $query="UPDATE tbl_user SET user_name='$uname',user_address='$address'WHERE user_id='$uid'";

        if(mysqli_query($con,$query))
        {
            $sel="select * from tbl_user WHERE user_name='$uname' AND user_address='$address'";
            $row=mysqli_query($con,$sel);
     
            if($datas=mysqli_fetch_assoc($row))
            {
                echo json_encode(array("alert"=>"Success"));
            }
            else{
                echo json_encode(array("alert"=>"Failed"));
            }
        }
        else{
            echo json_encode(array("alert"=>"Failed"));
        }
}
?>