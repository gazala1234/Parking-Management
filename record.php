<?php
include 'condition.php';
?>
<html>

<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>View Records</title>
</head>

<body>
    <div class="container">
        <h3 class="mb-3 mt-3">View Details</h3>
        <form action="view.php" method="post" id="registration">
            <div class="form-group dropdown mb-3 col-md-5">
                <select class="form-control" name="vtyp" required>
                    <option>Select type</option>
                    <option>2 Wheeler</option>
                    <option>3 Wheeler</option>
                    <option>4 Wheeler</option>
                    <option>All</option>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-success" name="get" id="submit">Submit</button>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $("#submit").on("click", function () {
                
                var formData = $("#registration").serialize();

                // Make an AJAX request to signup.php
                $.ajax({
                    type: "POST",
                    url: "view.php",
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