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
    $cname=$data['company'];
    $place=$data['place'];
    $cno=$data['contact'];
    $password=$data['cpassword'];
    $email=$data['email'];
    $addres=$data['address'];
    $dist=$data['district'];
    $web=$data['webaddress'];
    $proof=$data['proof'];
    $logo=$data['logo'];
    $query="INSERT INTO tbl_company(place_id, company_name, company_email, company_contactno, company_webaddress, company_address, company_logo, company_proof, company_password, company_status) VALUES ('$place','$cname','$email','$cno','$web','$addres','$logo','$proof','$password','0')";
if(mysqli_query($con,$query))
{
    $sel="SELECT * FROM tbl_company WHERE company_email='$email'";
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