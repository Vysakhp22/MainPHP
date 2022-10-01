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
    $gender=$data['gender'];
    $email=$data['email'];
    $addres=$data['address'];
    $qualify=$data['qualify'];
    $img=$data['image'];
    $query="INSERT INTO tbl_jailsuperintendent(centraljail_id, jailsuperintendent_name, jailsuperintendent_gender, jailsuperintendent_email, jailsuperintendent_contactno, jailsuperintendent_qualification, jailsuperintendent_address, jailsuperintendent_photo) VALUES ('1','$name','$gender','$email','$cno','$qualify','$addres','$img')";
if(mysqli_query($con,$query))
{
    $sel="SELECT * FROM tbl_jailsuperintendent WHERE jailsuperintendent_email='$email'";
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