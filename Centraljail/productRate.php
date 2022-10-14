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
if(isset($data['id']))
{
$cid=$data['id'];
$pid=$data['pid'];
$prate=$data['prate'];
$du="SELECT * FROM tbl_productrate WHERE centraljail_id='$cid' AND product_id='$pid'";
$row1=mysqli_query($con,$du);
if($datas=mysqli_fetch_assoc($row1))
{
    echo json_encode(array("alert"=>"Existing"));
}
else{
        $query="INSERT INTO tbl_productrate(centraljail_id, product_id, productrate_rate, productrate_reorder) VALUES ('$cid','$pid','$prate','0')";

        if(mysqli_query($con,$query))
        {
            $sel="SELECT * FROM tbl_productrate WHERE centraljail_id='$cid' AND product_id='$pid'";
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