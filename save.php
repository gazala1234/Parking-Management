<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $v_id = $_POST['v_id'];
    $type = $_POST['vty'];
    $phone = $_POST['mob'];

    $sql = "SELECT * FROM `entry` WHERE `o_date` = '' AND `o_time` = '' AND `v_id` = '$v_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Vehicle exists, please remove it first');location='add.php';</script>";
    } else {
        $sql1 = "INSERT INTO `entry` (`username`, `v_id`, `type`, `mobile`, `date`, `in_time`) 
        VALUES ('$name', '$v_id', '$type', '$phone', current_timestamp(), current_timestamp())";
        $result1 = mysqli_query($conn, $sql1);

        if ($result1) {
            echo "<script>alert('Record inserted successfully');location='add.php';</script>";
        } else {
            echo "Form not submitted";
            echo "<script>alert('error');</script>";
        }
    }
}
?>
