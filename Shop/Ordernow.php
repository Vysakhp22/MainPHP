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
    $date=date("Y-m-d");
    $selqry="select * from tbl_shoppurchasehead where shoppurchasehead_status=0 and shop_id='$id'";
    $row=mysqli_query($con,$selqry);
    if($datas=mysqli_fetch_assoc($row))
    {
        $bid = $datas["shoppurchasehead_id"];
        $selqry="select * from tbl_shoppurchasedtls where shppurchasehead_id='".$bid."' and productstock_id='".$stock."'";
        $row1=mysqli_query($con,$selqry);
        if($datam=mysqli_fetch_assoc($row1))
        {
            echo json_encode(array("alert"=>"Already Added"));
        }
        else{
            $insQry1="insert into tbl_shoppurchasedtls(productstock_id,shppurchasehead_id,shppurchasedtls_qty)values('".$stock."','".$bid."','".$qn."')";
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
        $insQry=" insert into tbl_shoppurchasehead(shop_id,shoppurchasehead_date)values('".$id."','$date')";
        if(mysqli_query($con,$insQry))
            {
                $selqry1="select MAX(shoppurchasehead_id) as id from tbl_shoppurchasehead";
                $row1=mysqli_query($con,$selqry1);
                if($datas=mysqli_fetch_assoc($row1))
                {
                    $bid = $datas["id"];
                    $selqry="select * from tbl_shoppurchasedtls where shppurchasehead_id='".$bid."' and productstock_id='".$stock."'";
                    $row1=mysqli_query($con,$selqry);
                    if($datam=mysqli_fetch_assoc($row1))
                    {
                        echo json_encode(array("alert"=>"Already Added"));
                    }
                    else{
                        $insQry1="insert into tbl_shoppurchasedtls(productstock_id,shppurchasehead_id,shppurchasedtls_qty)values('".$stock."','".$bid."','".$qn."')";
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
//     $query="INSERT INTO tbl_shoppurchasehead(shop_id, shoppurchasehead_date, shoppurchasehead_billno, shoppurchasehead_totalamount, shoppurchasehead_status) VALUES ('$id','$date','0','0','0')";
//     if(mysqli_query($con,$query))
//     {
//     $sel="SELECT * FROM tbl_shoppurchasehead WHERE shoppurchasehead_date='$date'";
//     $row=mysqli_query($con,$sel);
//     if($datas=mysqli_fetch_assoc($row))
//     {
//         $head="select max(shoppurchasehead_id) as headid from tbl_shoppurchasehead";
//         $headid=mysqli_fetch_assoc(mysqli_query($con,$head));
//         $shp="INSERT INTO tbl_shoppurchasedtls(shppurchasehead_id, productstock_id, shppurchasedtls_qty, shppurchasedtls_total) VALUES ('".$headid['headid']."','$stock','0','0')";
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