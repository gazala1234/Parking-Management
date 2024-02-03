<?php
include 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>
</head>
<body>
<div class="container">
        <h2 class="mt-5">Registration form</h2>
        <form id="registration" action="reg.php" method="post">
            <div class="form-group col-md-6 mt-4">
                <input type="text" maxlength="15" class="form-control" id="username" name="username" placeholder="Username" autofocus="on" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group col-md-6 mt-3">
                <select class="form-control" name="role" id="role" required>
                    <option>Select role</option>
                    <option>customer</option>
                </select>
            </div>
            <div class="form-group col-md-6 mt-3">
                <input type="password" maxlength="20" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group col-md-6 mt-3">
                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" required>
                <small id="emailHelp" class="form-text text-muted">Make sure to type the same password.</small>
            </div>
            <button type="submit" class="btn btn-outline-success mt-3" name="reg" id="submit">Register</button>
            <p>Already have an account ? <a href="login.php" class="link-dark text-decoration-none">Login</a></p>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $("#submit").on("click", function () {
                
                var formData = $("#registration").serialize();

                // Make an AJAX request to signup.php
                $.ajax({
                    type: "POST",
                    url: "reg.php",
                    data: formData,
                    success: function (response) {
                        
                        console.log(response);

                        // Reset the form
                        $("#registration")[0].reset();
                    },
                    error: function (error) {
                        console.error("Error:", error);
                    }
                });
            });
        });

        
    </script>
</body>
</html>