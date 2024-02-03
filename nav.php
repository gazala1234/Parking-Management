<?php
include 'conn.php';
include 'boot.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
}
else{
  $loggedin = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <!-- Navbar -->
    <?php
    
    echo
    '<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="/parking_project/img/park.png" class="rounded-circle" height="35px" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">


                    <li class="nav-item">
                        <a class="nav-link" href="wel.php">Welcome</a>
                    </li>';

                    if(isset($_SESSION['role'])=='entry' && $_SESSION['role'] != 'customer'){
                        echo '<li class="nav-item">
                            <a class="nav-link" href="add.php">Entry</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="out.php">Out Vehicle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="status.php">Vehicle Status</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Reports
                        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="custom.php">Custom View</a>
                        <a class="dropdown-item" href="report.php">All View</a>
                        <a class="dropdown-item" href="record.php">All Details</a>
                    </div>
                    </li>';
                    }

                    if(isset($_SESSION['role'])=='customer' && $_SESSION['role'] != 'entry'){
                    echo'
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            My Vehicle
                        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="my.php">Add Vehicle</a>
                        <a class="dropdown-item" href="enter.php">View Vehicle</a>
                    </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            View
                        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="user.php">Custom View</a>
                        <a class="dropdown-item" href="all.php">All View</a>
                    </div>
                    </li>';
                    }

                    if($loggedin){
                    echo '
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    ';
                    }

                    if(!$loggedin){
                    echo'<li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>';
                    }

                echo    
                '</ul>
            </div>
        </div>
    </nav>';

?>