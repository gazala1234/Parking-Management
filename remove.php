<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parked Vehicle</title>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
    <h2>Parked Vehicles</h2>
    <script>
        $(document).ready(function() {
            $(".out").click(function() {
                var sl = $(this).data('sl');
                window.location.href = `pay.php?sl=${sl}`;
            });
        });
    </script>
</body>

</html>
<?php
include 'conn.php';
include 'boot.php';

if (isset($_POST['sub'])) {
    $v_id = $_POST['vid'];

    $sql = "SELECT * FROM `entry` WHERE `o_date` = '' AND `o_time` = '' AND `v_id` = '$v_id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {

        $sl = 1;
        $table = '<table class="table mt-3">
        <tr><th>User_id</th>
        <th>Username</th>
        <th>V_id</th>
        <th>Type</th>
        <th>Mobile</th>
        <th>In Date</th>
        <th>In time</th>
        <th>Out Date</th>
        <th>Out time</th>
        <th>Payment</th>
        <th>Action</th>
    </tr>';
        while ($r = mysqli_fetch_assoc($result)) {
            $sl = $r['sl'];
            $name = $r['username'];
            $v_id = $r['v_id'];
            $type = $r['type'];
            $phone = $r['mobile'];
            $date = $r['date'];
            $time = $r['in_time'];
            $odate = $r['o_date'];
            $otime = $r['o_time'];
            $method = $r['method'];
            $table .= "<tr><td>$sl</td>
                        <td>$name</td>
                        <td>$v_id</td>
                        <td>$type</td>
                        <td>$phone</td>
                        <td>$date</td>
                        <td>$time</td>
                        <td>$odate</td>
                        <td>$otime</td>
                        <td>$method</td>  
        <td><button class='out btn btn-outline-success' data-sl = '$sl'>Out</button></td></tr>";
            $sl++;
        }
        $table .= "</table>";
        echo $table;
    } else {
        echo "<script>alert('Incorrect id or Vehicle already removed');location='out.php';</script>";
    }
}
?>