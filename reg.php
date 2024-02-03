<?php
include 'conn.php';

if(isset($_POST['reg'])){
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    // cheking for account exists
    $existSql = "SELECT * FROM `user` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        echo "<script>alert('Username already exist');location='register.php';</script>";
    }

    if($password==$cpassword){
        $sql = "INSERT INTO `user` (`username`, `role`, `password`)
                VALUES ('$username', '$role', '$password')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('Registered successfully');location='login.php';</script>";
        }
        else{
            echo "<script>alert('Passwords does not match, please enter the same password');location='register.php';</script>";
        }
    }
}
?>