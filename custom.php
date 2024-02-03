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
        <h3 class="mb-3 mt-3">Custom View</h3>
        <form action="cust.php" method="post" id="registration">
            <div class="form-group mb-3 col-md-5">
                <label for="vid">Vehicle ID</label>
                <input type="text" class="form-control" name="vid" placeholder="Vehicle ID" required>
            </div>
            <div class="form-group col-md-5">
                <input type="radio" id="in" name="select" value="In">
                <label for="in">Parked Vehicles</label><br>

                <input type="radio" id="pen" name="select" value="Pending">
                <label for="pen">Pending</label><br>

                <input type="radio" id="out" name="select" value="Out">
                <label for="out">Out Vehicles</label><br>

                <select class="form-control" name="method" id="methodDropdown" required>
                    <option>Payment method</option>
                    <option>All</option>
                    <option>Credit card</option>
                    <option>Debit card</option>
                    <option>Phonepe</option>
                    <option>Cash</option>
                </select>
                
                <script>
                    // Function to show/hide the dropdown based on radio button selection
                    function toggleDropdown() {
                        var radioOut = document.getElementById("out");
                        var methodDropdown = document.getElementById("methodDropdown");

                        methodDropdown.style.display = radioOut.checked ? "block" : "none";
                    }

                    // Add event listener to the radio buttons to trigger the function
                    var radioButtons = document.querySelectorAll('input[name="select"]');
                    radioButtons.forEach(function(radio) {
                        radio.addEventListener("change", toggleDropdown);
                    });

                    // Initial call to set the initial state
                    toggleDropdown();
                </script>
            </div>
            <div class="form-group mb-3 col-md-5">
                <label for="from">From:</label>
                <input type="date" class="form-control" name="from" placeholder="From" required>
            </div>
            <div class="form-group mb-3 col-md-5">
                <label for="from">To:</label>
                <input type="date" class="form-control" name="to" placeholder="To" required>
            </div>
            <button type="submit" class="btn btn-outline-success mb-3" name="submt2" id="submit">Submit</button>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $("#submit").on("click", function () {
                
                var formData = $("#registration").serialize();

                // Make an AJAX request to signup.php
                $.ajax({
                    type: "POST",
                    url: "rep.php",
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