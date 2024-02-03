<?php
include 'conn.php';

if (isset($_GET['sl'])) {
  $sl = $_GET['sl'];

  // Fetch the in_time and date from the database
  $inQuery = "SELECT `in_time`, `date` FROM `entry` WHERE `sl` = '$sl'";
  $result = mysqli_query($conn, $inQuery);
  // echo $inQuery;

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if ($row['in_time'] !== null) {
      // Combine in_time and date to get the complete inQuery
      $in = $row['in_time'] . ' ' . $row['date'];

      // Set the default time zone to Kolkata
      date_default_timezone_set("Asia/Kolkata");

      $out = time();
      $kolkataTime = date('h:i:s A Y-m-d', $out);

      // Calculate the parking duration in seconds
      $duration = $out - strtotime($in);

      // Convert the parking duration to Phours
      $Phours = ceil($duration / 3600);

      // Calculate the total amount based on the rate (10 rupees per hour)
      $RPH = 10;
      $TAmount = $Phours * $RPH;

      // Different logic or actions based on the parking duration
      if ($Phours >= 1 && $Phours <= 4) {
        $RPH = 10;
        $TAmount = $Phours * $RPH;
      } elseif ($Phours > 5 && $Phours <= 9) {
        $RPH = 20;
        $TAmount = $Phours * $RPH;
      } elseif ($Phours > 10) {
        $RPH = 50;
        $TAmount = $Phours * $RPH;
      } else {
        echo "You parked vehicle for a long time!<br>";
      }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <?php
        include 'boot.php';
    ?>
  </head>

<body>

    <div class="container">
        <form action="edit.php" method="post" id="registration">
            <h2 class="mt-5">Payment Details</h2>
            <input type="hidden" name="pay" value="1">
            <div class="form-group">
                <p class="font-weight-bold">You Parked Vehicle For <?php echo $Phours; ?> hours</p>
                <p class="font-weight-bold">Total Amount You Have To Pay: <?php echo $TAmount; ?> rupees</p>
            </div>
            <div class="form-group">
                <input type="hidden" name="sl" value="<?php echo $sl; ?>">
                <input type="hidden" name="amount" value="<?php echo $TAmount; ?>">
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="method" required>
                    <option>Payment method</option>
                    <option>Credit card</option>
                    <option>Debit card</option>
                    <option>Phonepe</option>
                    <option>Cash</option>
                </select>
            </div>
            <button type="submit" class="delete btn btn-outline-success" name="pay" id="submit">Pay</button>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $("#submit").on("click", function () {
                
                var formData = $("#registration").serialize();

                // Make an AJAX request to signup.php
                $.ajax({
                    type: "POST",
                    url: "edit.php",
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

<?php
    } else {
      echo "No entry found for the provided sl";
    }
  } else {
    echo "Error: " . mysqli_error($conn);
  }
} else {
  echo "sl is not set";
}

?>