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
if(isset($data['name']))
{
$sname=$data['name'];
$address=$data['address'];
$contact=$data['contact'];
$sid=$data['sid'];
$owner=$data['owner'];
        $query="UPDATE tbl_shop SET shop_name='$sname',shop_contactno='$contact',shop_address='$address',shop_ownername='$owner' WHERE shop_id='$sid'";

        if(mysqli_query($con,$query))
        {
            $sel="select * from tbl_shop WHERE shop_name='$sname' AND shop_contactno='$contact'";
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