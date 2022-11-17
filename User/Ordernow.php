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
if(isset($data['id']))
{
    $id=$data['id'];
    $stock=$data['stkId'];
    $qn=$data['qn'];
    $selqry="select * from tbl_userpurchasehead where upurchasehead_status=0 and user_id='$id'";
    $row=mysqli_query($con,$selqry);
    if($datas=mysqli_fetch_assoc($row))
    {
        $bid = $datas["upurchasehead_id"];
        $selqry="select * from tbl_userpurchasedetail where upurchasehead_id='".$bid."' and productstock_id='".$stock."'";
        $row1=mysqli_query($con,$selqry);
        if($datam=mysqli_fetch_assoc($row1))
        {
            echo json_encode(array("alert"=>"Already Added"));
        }
        else{
            $insQry1="insert into tbl_userpurchasedetail(productstock_id,upurchasehead_id,upurchasedet_qty)values('".$stock."','".$bid."','".$qn."')";
            if(mysqli_query($con,$insQry1))
            {
                echo json_encode(array("alert"=>"Added"));
            }
            else{
                echo json_encode(array("alert"=>"Failed"));
            }
        }
        
    //echo json_encode(array("alert"=>$datas));
    }
    else{
        $insQry=" insert into tbl_userpurchasehead(user_id,upurchasehead_date)values('".$id."',curdate())";
        if(mysqli_query($con,$insQry))
            {
                $selqry1="select MAX(upurchasehead_id) as id from tbl_userpurchasehead";
                $row1=mysqli_query($con,$selqry1);
                if($datas=mysqli_fetch_assoc($row1))
                {
                    $bid = $datas["id"];
                    $selqry="select * from tbl_userpurchasedetail where upurchasehead_id='".$bid."' and productstock_id='".$stock."'";
                    $row1=mysqli_query($con,$selqry);
                    if($datam=mysqli_fetch_assoc($row1))
                    {
                        echo json_encode(array("alert"=>"Already Added"));
                    }
                    else{
                        $insQry1="insert into tbl_userpurchasedetail(productstock_id,upurchasehead_id,upurchasedet_qty)values('".$stock."','".$bid."','".$qn."')";
                        if(mysqli_query($con,$insQry1))
                        {
                            echo json_encode(array("alert"=>"Added"));
                        }
                        else{
                            echo json_encode(array("alert"=>"Failed"));
                        }
                }
                
                
            }

    }
//     $id=$data['id'];
//     $date=date("Y-m-d");
//     $stock=$data['stkId'];
//     $query="INSERT INTO tbl_userpurchasehead(shop_id, shoppurchasehead_date, shoppurchasehead_billno, shoppurchasehead_totalamount, upurchasehead_status) VALUES ('$id','$date','0','0','0')";
//     if(mysqli_query($con,$query))
//     {
//     $sel="SELECT * FROM tbl_userpurchasehead WHERE shoppurchasehead_date='$date'";
//     $row=mysqli_query($con,$sel);
//     if($datas=mysqli_fetch_assoc($row))
//     {
//         $head="select max(upurchasehead_id) as headid from tbl_userpurchasehead";
//         $headid=mysqli_fetch_assoc(mysqli_query($con,$head));
//         $shp="INSERT INTO tbl_userpurchasedetail(shppurchasehead_id, productstock_id, shppurchasedtls_qty, shppurchasedtls_total) VALUES ('".$headid['headid']."','$stock','0','0')";
//         $res=mysqli_query($con,$shp);
//         echo json_encode(array("alert"=>"Success"));
//     }
//     else{
//         echo json_encode(array("alert"=>"Failed"));
//     }
// }
// else{
//     echo json_encode(array("alert"=>"Failed"));
// }

}
}
?>