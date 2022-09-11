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
if(isset($data['district']))
{
$distid=$data['id'];
$district=$data['district'];
$du="select * from tbl_district where district_name='$district'";

$row1=mysqli_query($con,$du);
if($datas=mysqli_fetch_assoc($row1))
{
    echo json_encode(array("alert"=>"Existing"));
}
else{
        $query="UPDATE tbl_district SET district_name='$district' WHERE district_id='$distid'";

        if(mysqli_query($con,$query))
        {
            $sel="select * from tbl_district where district_name='$district'";
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
}
?>