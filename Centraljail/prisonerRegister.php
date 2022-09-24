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
    $name=$data['name'];
    $cno=$data['contact'];
    $email=$data['email'];
    $address=$data['address'];
    $gender=$data['gender'];
    $details=$data['details'];
    $date=$data['date'];
    $pid=$data['pid'];
    $pimage=$data['image'];
    $duration=$data['duration'];
    $query="INSERT INTO tbl_prisoner(centraljail_id, prisoner_name, prisoner_gender, prisoner_address, prisoner_contactno, prisoner_emailid, prisoner_photo, prisoner_prisonercode, prisoner_crimedetails, prisoner_duration, prisoner_joindate, prisoner_status) VALUES ('1','$name','$gender','$address','$cno','$email','$pimage','$pid','$details','$duration','$date','0')";
if(mysqli_query($con,$query))
{
    $sel="SELECT * FROM tbl_prisoner WHERE prisoner_emailid = '$email   '";
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