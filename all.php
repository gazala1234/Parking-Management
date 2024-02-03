<html>

<head>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>View Records</title>
</head>

<body>
    <?php
        include 'condition.php';
    ?>
    <div class="container">
        <h3 class="mb-3 mt-5">View All Records</h3>
        <form action="all1.php" method="post" id="registration">
            <div class="form-group mb-3 col-md-5">
                <input type="text" class="form-control" name="vid" placeholder="Vehicle ID" required>
            </div>
            <button type="submit" class="btn btn-outline-success" name="view" id="submit">View</button>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $("#submit").on("click", function () {
                
                var formData = $("#registration").serialize();

                // Make an AJAX request to signup.php
                $.ajax({
                    type: "POST",
                    url: "all1.php",
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