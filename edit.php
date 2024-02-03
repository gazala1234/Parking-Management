<?php
include 'conn.php';

// set current time zone
date_default_timezone_set("Asia/Kolkata");

// get current date and time
$odate = date('Y-m-d');
$otime = date('H:i:s a');

if(isset($_POST['pay'])){
    $odate = date('Y-m-d');
    $otime = date('H:i:s a');
    $method = $_POST['method'];
    $sl = $_POST['sl'];
    $amount = $_POST['amount'];

    $sql = "UPDATE `entry` SET `o_date` = '$odate', `o_time` = '$otime', 
    `method` = '$method', `amount` = '$amount' WHERE `sl` = '$sl'";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>alert('Now you are out.');location='record.php';</script>";
    }else{
        echo "Error to out the vehicle";
    }
}
?>
