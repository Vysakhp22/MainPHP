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
    $sname=$data['shopname'];
    $place=$data['place'];
    $cno=$data['contact'];
    $password=$data['cpassword'];
    $email=$data['email'];
    $addres=$data['address'];
    $dist=$data['district'];
    $owner=$data['owner'];
    $proof=$data['proof'];
    $logo=$data['logo'];
    $query="INSERT INTO tbl_shop(shop_name, shop_email, shop_contactno, shop_address, shop_logo, shop_licenceproof, shop_ownername, shop_password, shop_status) VALUES ('$sname','$email','$cno','$addres','$logo','$proof','$owner','$password','0')";
if(mysqli_query($con,$query))
{
    $sel="SELECT * FROM tbl_shop WHERE shop_email='$email'";
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