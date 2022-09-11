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
    $name=$data['username'];
    $gender=$data['gender'];
    $cno=$data['contact'];
    $password=$data['cpassword'];
    $email=$data['email'];
    $addres=$data['address'];
    $query="INSERT INTO tbl_user( user_name, user_gender, user_contactno, user_password, user_email,user_address) VALUES ('$name','$gender','$cno','$password','$email','$addres')";
    
if(mysqli_query($con,$query))
{
    $sel="SELECT * FROM tbl_user WHERE user_email='$email'";
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