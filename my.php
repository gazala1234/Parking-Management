<?php
include 'condition.php';
?>

<html>

<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Parking vehical</title>
</head>

<body>
    <div class="container">
        <form action="enter.php" method="post" id="registration">
            <h2 class="mt-5">Enter Vehical</h2>
            <div class="form-group mb-3 col-md-5">
                <input type="text" class="form-control" name="vid" placeholder="Vehical-id" required>
            </div>
            <button type="submit" class="btn btn-outline-success" name="add" id="submit">Add</button>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $("#submit").on("click", function () {
                
                var formData = $("#registration").serialize();

                // Make an AJAX request to signup.php
                $.ajax({
                    type: "POST",
                    url: "enter.php",
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