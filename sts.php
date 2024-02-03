<?php
include 'conn.php';

if(isset($_POST['sts'])){
    $v_id = $_POST['vid'];

    $sql = "SELECT * FROM `entry` WHERE `v_id` = '$v_id' AND `o_date` = '' AND `o_time` = ''";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) > 0){
        echo "<script>
    if (confirm('Vehicle present in the parking lot. Do you want to take the vehicle out?')) {
        location='out.php';
    } else {
        location='status.php';
    }
    </script>";
    }
    else{
        echo "<script>
    if (confirm('Vehicle not present in the parking lot. Do you want to enter the vehicle?')) {
        location='add.php';
    } else {
        location='status.php';
    }
    </script>";
    }
}
?>