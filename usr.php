<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="mt-3">
        <h2>Parking Details</h2>
    </div>
</body>

</html>
<?php
include 'conn.php';
include 'boot.php';

if (isset($_POST['submt'])) {
    $v_id = $_POST['vid'];
    $from = $_POST['from'];
    $to = $_POST['to'];

    if ($v_id != '' and $from != '' and $to != '') {
        $sql = "SELECT * FROM `entry` WHERE `v_id` = '$v_id' AND `date` BETWEEN '$from' AND '$to' ORDER BY `date` ASC";
        $result = mysqli_query($conn, $sql);
    }

    if($result && mysqli_num_rows($result) > 0){
    $sno = 1;
    $table = '<table class="table mt-3">
    <tr><th>S.no</th>
        <th>Username</th>
        <th>V_id</th>
        <th>Type</th>
        <th>Mobile</th>
        <th>In Date</th>
        <th>In time</th>
        <th>Out Date</th>
        <th>Out time</th>
        <th>Payment method</th>
        <th>Rupees</th>
    </tr>';
    while ($r = mysqli_fetch_assoc($result)) {
        $name = $r['username'];
        $v_id = $r['v_id'];
        $type = $r['type'];
        $phone = $r['mobile'];
        $date = $r['date'];
        $time = $r['in_time'];
        $odate = $r['o_date'];
        $otime = $r['o_time'];
        $method = $r['method'];
        $amount = $r['amount'];
        $table .= "<tr><td>$sno</td>
                        <td>$name</td>
                        <td>$v_id</td>
                        <td>$type</td>
                        <td>$phone</td>
                        <td>$date</td>
                        <td>$time</td>
                        <td>$odate</td>
                        <td>$otime</td>
                        <td>$method</td>
                        <td>$amount</td>  
                    </tr>";
        $sno++;
    }
    $table .= "</table>";
    echo $table;
}
} else {
    echo "No Records Found";
}
?>