<?php
include 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>

<body>
    <div class="container mt-2">
        <p>You should login to visit welcome or view page</p>
        <h2>Login</h2>
    <form action="log.php" method="post">
        <div class="form-group mt-3 col-md-5">
            <input type="text" class="form-control" id="uname" name="uname" placeholder="Username" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group mt-3 col-md-5">
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-outline-success mt-3" name="log">Login</button>
        <p>New user ? <a href="register.php" class="link-dark text-decoration-none">Register</a></p>

    </form>
    </div>
</body>

</html>