<?php
include 'conn.php';

// update the vehicle id
if (isset($_POST['change'])) {
    $v_id = $_POST['vid'];
    $id = $_POST['id'];

    $sql = "UPDATE `vehicle` SET `v_id` = '$v_id' WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>location='enter.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');location='my.php';</script>";
    }
}

// delete the record
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM `vehicle` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>location='enter.php';</script>";
    } 
    else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');location='user.php';</script>";
    }
}
?>
