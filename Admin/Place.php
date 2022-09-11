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
if(isset($data['place']))
{
    $dist=$data['distid'];
    $place=$data['place'];
    $query="INSERT INTO tbl_place(district_id,place_name) VALUES ('$dist','$place')";
    
if(mysqli_query($con,$query))
{
    $sel="select * from tbl_place where place_name='$place' and district_id='$dist'";
    $row=mysqli_query($con,$sel);

    if($datas=mysqli_fetch_assoc($row))
    {
        echo json_encode(array("alert"=>"Sucess"));
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