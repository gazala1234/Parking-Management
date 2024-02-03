<?php
include 'condition.php';
?>

<html>
<head>
    <title>Parking new vehical</title>
</head>

<body>
    <div class="container">
        <form action="save.php" method="post" id="registration">
                <h3 class="mb-3 mt-3">Enter New Vehical</h3>
            <div class="form-group mb-3 col-md-5">
                <input type="text" class="form-control" name="name" placeholder="Username">
            </div>
            <div class="form-group mb-3 col-md-5">
                <input type="text" class="form-control" name="v_id" placeholder="Vehical-id" required>
            </div>
            <div class="form-group dropdown mb-3 col-md-5">
                <select class="form-control" name="vty" required>
                    <option>Select type</option>
                    <option>2 Wheeler</option>
                    <option>3 Wheeler</option>
                    <option>4 Wheeler</option>
                </select>
            </div>
            <div class="form-group mb-3 col-md-5">
                <input type="number" class="form-control" name="mob" placeholder="Phone" required>
            </div>
            <button type="submit" class="btn btn-outline-success" name="submit" id="submit">Submit</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $("#submit").on("click", function() {

                var formData = $("#registration").serialize();

                // Make an AJAX request to signup.php
                $.ajax({
                    type: "POST",
                    url: "save.php",
                    data: formData,
                    success: function(response) {

                        console.log(response);

                        // Reset the form
                        $("#registration")[0].reset();
                    },
                    error: function(error) {
                        console.error("Error:", error);
                    }
                });
            });
        });
    </script>
</body>

</html>