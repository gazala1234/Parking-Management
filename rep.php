<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
</head>
<body>
    <h2>Reporting Details</h2>
</body>
</html>

<?php
include 'conn.php';
include 'boot.php';

if(isset($_POST['submt1'])){
    $type = $_POST['vty'];
    $method = $_POST['method'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $in = $_POST['select'];

    if ($type == 'All' and $in == 'In' and $from != '' and $to != '') {
        $sql = "SELECT * FROM `entry` WHERE `o_date` != '' AND `o_time` != '' AND `date` 
        BETWEEN '$from' AND '$to' ORDER BY `date` , `method` ASC";
        $result = mysqli_query($conn, $sql);
    } elseif ($type != 'All' and $in == 'In' and $from != '' and $to != '') {
        $sql = "SELECT * FROM `entry` WHERE `type` = '$type' AND `date` BETWEEN '$from' 
        AND '$to' ORDER BY `date` , `method` ASC";
        $result = mysqli_query($conn, $sql);
    } elseif ($type == 'All' and $in == 'Pending' and $from != '' and $to != '') {
        $sql = "SELECT * FROM `entry` WHERE `o_date` = '' AND `o_time` = '' AND `date` 
        BETWEEN '$from' AND '$to' ORDER BY `date` , `method` ASC";
        $result = mysqli_query($conn, $sql);
    } elseif ($type != 'All' and $in == 'Pending' and $from != '' and $to != '') {
        $sql = "SELECT * FROM `entry` WHERE `type` = '$type' AND `o_date` = '' AND 
        `o_time` = '' AND `date` BETWEEN '$from' AND '$to' ORDER BY `date` , `method` ASC";
        $result = mysqli_query($conn, $sql);
    }

    else{
    if ($type == 'All' and $method == 'All' and $from != '' and $to != '') {
        $sql = "SELECT * FROM `entry` WHERE `o_date` != '' AND `o_time` != '' AND `date` 
        BETWEEN '$from' AND '$to' ORDER BY `date` , `method` ASC";
        $result = mysqli_query($conn, $sql);
    } elseif ($type == 'All' and $method != 'All' and $from != '' and $to != '') {
        $sql = "SELECT * FROM `entry` WHERE `method` = '$method' AND `date` BETWEEN 
        '$from' AND '$to' ORDER BY `date` , `method` ASC";
        $result = mysqli_query($conn, $sql);
    } elseif ($type != 'All' and $method == 'All' and $from != '' and $to != '') {
        $sql = "SELECT * FROM `entry` WHERE `o_date` != '' AND `o_time` != '' AND 
        `type` = '$type' AND `date` BETWEEN '$from' AND '$to' ORDER BY `date` , `method` ASC";
        $result = mysqli_query($conn, $sql);
    } elseif ($type != 'All' and $method != 'All' and $from != '' and $to != '') {
        $sql = "SELECT * FROM `entry` WHERE `type` = '$type' AND`method` = '$method' AND 
        `date` BETWEEN '$from' AND '$to' ORDER BY `date` , `method` ASC";
        $result = mysqli_query($conn, $sql);
    }
}

    if($result && mysqli_num_rows($result) > 0){

    $sno = 1;
    $Amount = 0;
    $vehicleCount = 0;
    $table = '<table class="table mt-3">
    <tr>
        <th>S.no</th>
        <th>Username</th>
        <th>V_id</th>
        <th>Type</th>
        <th>Mobile</th>
        <th>In Date</th>
        <th>In time</th>
        <th>Out Date</th>
        <th>Out time</th>
        <th>Payment method</th>
        <th>Parking Charge</th>
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
        $Amount += $amount;
        $vehicleCount ++;
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
    $table .= "<tr><td colspan='10' class='font-weight-bold' align='right'>Total Amount : </td><td class='font-weight-bold'>$Amount</td></tr><br>";
    $table .= "<tr><td colspan='10' class='font-weight-bold' align='right'>Total No of Vehicles Parked : </td><td class='font-weight-bold'>$vehicleCount</td></tr><br>";
    echo $table;
}
else {
    echo "No Records Found";
}
}

?>