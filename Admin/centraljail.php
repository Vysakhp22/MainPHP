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
    $jname=$data['jname'];
    $place=$data['place'];
    $cno=$data['contact'];
    $password=$data['cpassword'];
    $email=$data['email'];
    $addres=$data['address'];
    $web=$data['webaddress'];
    $query="INSERT INTO tbl_centraljail(place_id, centraljail_name, centraljail_contactno, centraljail_email, centraljail_address, centraljail_webaddress, centraljail_password) VALUES ('$place','$jname','$cno','$email','$addres','$web','$password')";
if(mysqli_query($con,$query))
{
    $sel="SELECT * FROM tbl_centraljail WHERE centraljail_email='$email'";
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