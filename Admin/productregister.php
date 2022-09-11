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
$pcategory=$data['catid'];
$product=$data['product'];
$image=$data['image'];
$desc=$data['details'];
$du="SELECT * FROM tbl_product WHERE category_id='$pcategory' AND product_name='$product'";
$row1=mysqli_query($con,$du);
if($datas=mysqli_fetch_assoc($row1))
{
    echo json_encode(array("alert"=>"Existing"));
}
else{
        $query="INSERT INTO tbl_product(category_id, product_name, product_photo, product_description) VALUES ('$pcategory','$product','$image','$desc')";
        if(mysqli_query($con,$query))
        {
            $sel="SELECT * FROM tbl_product WHERE category_id='$pcategory' AND product_name='$product'";
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