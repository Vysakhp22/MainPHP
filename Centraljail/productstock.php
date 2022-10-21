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
$cid=$data['id'];
$pid=$data['pid'];
$stock=$data['stock'];
$tqty=$data['qty'];
$du="SELECT * FROM tbl_productstock WHERE centraljail_id='$cid' AND product_id='$pid'";
$row1=mysqli_query($con,$du);
if($datas=mysqli_fetch_assoc($row1))
{
    $update="UPDATE tbl_productstock SET productstock_totalquantity='$tqty' WHERE centraljail_id='$cid' AND product_id='$pid'";
    if(mysqli_query($con,$update))
    {
        echo json_encode(array("alert"=>"Updated"));
    }
}
else{
        $query="INSERT INTO tbl_productstock( product_id, centraljail_id, productstock_totalquantity) VALUES ('$pid', '$cid', '$stock')";

        if(mysqli_query($con,$query))
        {
            $sel="SELECT * FROM tbl_productstock WHERE centraljail_id='$cid' AND product_id='$pid'";
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