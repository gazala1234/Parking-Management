<?php
include 'condition.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username']; ?></title>
</head>
<body>
<div class="container mt-3">
  <h1>Hi! <?php echo $_SESSION['username']; ?></h1>
  <h2>Welcome to The Online Parking System</h2>
  <p>This mini project for the online parking system for all type of vehicals.</p>
  <p>Click on Entry field to add a new vehical in parking.</p>
  <p>Click on View field to view the already parked vehicals.</p>
</div>

</body>
</html>