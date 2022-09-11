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
if(isset($_FILES['proofImage']))
{
$FilePath="images/";
$FilePath=$FilePath.$_FILES['proofImage']['name'];
move_uploaded_file($_FILES['proofImage']['tmp_name'],$FilePath);
echo json_encode(array('url'=>$FilePath));
}
?>