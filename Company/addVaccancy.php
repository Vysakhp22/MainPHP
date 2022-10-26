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
if(isset($data['cid']))
{
$cid=$data['cid'];
$detid=$data['detid'];
$nvac=$data['jobvac'];
$ldate=$data['ldate'];
$tvac=$data['tvac'];
$du="SELECT * FROM tbl_jobvaccancy WHERE company_id='$cid' AND jobdet_id='$detid'";
$row1=mysqli_query($con,$du);
if($datas=mysqli_fetch_assoc($row1))
{
    $update="UPDATE tbl_jobvaccancy SET jobvac_nov='$tvac', jobvac_lastdate='$ldate',jobvac_status= 1 WHERE company_id='$cid' AND jobdet_id='$detid'";
    if(mysqli_query($con,$update))
    {
        echo json_encode(array("alert"=>"Updated"));
    }
}
else{
        $query="INSERT INTO tbl_jobvaccancy(company_id, jobdet_id, jobvac_nov, jobvac_lastdate, jobvac_status) VALUES ('$cid', '$detid', '$nvac', '$ldate', 1)";

        if(mysqli_query($con,$query))
        {
            $sel="SELECT * FROM tbl_jobvaccancy WHERE company_id='$cid' AND jobdet_id='$detid'";
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