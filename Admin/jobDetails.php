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
if(isset($data['catid']))
{
$cid=$data['catid'];
$jname=$data['jname'];
$jdesc=$data['jdesc'];
$du="SELECT * FROM tbl_jobdetail WHERE jobdetname='$jname' AND jobcategory_id='$cid'";
$row1=mysqli_query($con,$du);
if($datas=mysqli_fetch_assoc($row1))
{
    echo json_encode(array("alert"=>"Existing"));
}
else{
        $query="INSERT INTO tbl_jobdetail(jobcategory_id, jobdetname, jobdet_desc) VALUES ('$cid','$jname','$jdesc')";

        if(mysqli_query($con,$query))
        {
            $sel="SELECT * FROM tbl_jobdetail WHERE jobdetname='$jname' AND jobcategory_id='$cid'";
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