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
        <h3 class="mb-3 mt-5">View Records</h3>
        <form action="usr.php" method="post" id="registration">
            <div class="form-group mb-3 col-md-5">
            <select class="form-control" name="vid" id="vid">
                    <option value="Select ID">Select ID</option>
                    <?php
                        $user = $_SESSION['username'];
                        $sql = "SELECT `v_id` FROM `vehicle` WHERE `username` = '$user'";
                        $result = mysqli_query($conn,$sql);

                        if($result){

                        while($row = mysqli_fetch_assoc($result)){
                            $values = $row['v_id'];
                            echo "<option value='$values'>$values</option>";
                        }
                    }
                        else{
                            echo "Error";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group mb-3 col-md-5">
                <label for="from">From:</label>
                <input type="date" class="form-control" name="from" placeholder="From" required>
            </div>
            <div class="form-group mb-3 col-md-5">
                <label for="from">To:</label>
                <input type="date" class="form-control" name="to" placeholder="To" required>
            </div>
            <button type="submit" class="btn btn-outline-success" name="submt" id="submit">Submit</button>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $("#submit").on("click", function () {
                
                var formData = $("#registration").serialize();

                // Make an AJAX request to signup.php
                $.ajax({
                    type: "POST",
                    url: "usr.php",
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