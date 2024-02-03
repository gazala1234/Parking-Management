<?php
include 'conn.php';

if(isset($_POST['log'])){
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM `user` WHERE `username`='$uname' and `password`='$pass'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    echo $num;
    if($num > 0){
        session_start();
        $res = mysqli_fetch_assoc($result);
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $uname;
        $_SESSION['id'] = $res['id'];
        $_SESSION['role'] = $res['role'];
        header("location: wel.php");
        exit;
    }else{
        $showError = "Invalid username or password";
        echo $showError;
    }
}

?>