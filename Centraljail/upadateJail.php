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
$cname=$data['name'];
$address=$data['address'];
$contact=$data['contact'];
$cid=$data['cid'];
        $query="UPDATE tbl_centraljail SET centraljail_name='$cname',centraljail_contactno='$contact',centraljail_address='$address' WHERE centraljail_id='$cid'";

        if(mysqli_query($con,$query))
        {
            $sel="select * from tbl_centraljail WHERE centraljail_name='$cname' AND centraljail_contactno='$contact'";
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