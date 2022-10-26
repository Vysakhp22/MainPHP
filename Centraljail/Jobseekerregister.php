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
    $pid=$data['pid'];
    $email=$data['email'];
    $place=$data['place'];
    $proof=$data['proof'];
    $photo=$data['photo'];
    $password=$data['cpassword'];
    $query="INSERT INTO tbl_jobseeker(prisoner_id, jobseeker_proof, jobseeker_photo, jobseeker_email, jobseeker_password, jobseeker_status, place_id) VALUES ('$pid', '$proof', '$photo', '$email', '$password', '0', '$place' )";
if(mysqli_query($con,$query))
{
    $sel="SELECT * FROM tbl_jobseeker WHERE jobseeker_email='$email'";
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