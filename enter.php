<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include 'boot.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Your Vehicles</h2>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>S.no</th>
                <th>Username</th>
                <th>Vehicle_id</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php
            session_start();
            include 'conn.php';

                $user = $_SESSION['username'];
                $sql = "SELECT * FROM `vehicle` WHERE `username` = '$user'";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $id = 0;
                    while ($r = mysqli_fetch_assoc($result)) {
                        $id = $id + 1;
                        echo "<tr>
                                <td>" . $id . "</td>
                                <td>" . $r['username'] . "</td>
                                <td>" . $r['v_id'] . "</td>
                                <td><button class='edit btn btn-outline-success' id=" . $r['id'] . " data-toggle='modal' data-target='#staticBackdrop'>Edit</button>
                                <button class='delete btn btn-outline-success' name='delete' id=" . $r['id'] . ">Delete</button></td>
                            </tr>";
                    }
                }
                else {
                    echo "No Records Found";
                }
            ?>
        </tbody>
    </table>
</body>

</html>
<?php
include 'conn.php';
include 'modal.php';

if (isset($_POST['add'])) {
    $user = $_SESSION['username'];
    $v_id = $_POST['vid'];

    // cheking for vehicle exists
    $existSql = "SELECT * FROM `vehicle` WHERE `v_id` = '$v_id'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows != 0) {
        echo "<script>alert('Vehicle already exist');location='my.php';</script>";
    }

    $sql = "INSERT INTO `vehicle` (`username`, `v_id`) 
        VALUES ('$user', '$v_id')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Vehicle added successfully');location='enter.php';</script>";
    } else {
        echo "<script>alert('error');location='my.php';</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>
<script>
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ", );
            id = e.target.id

            if (confirm("Are you sure you want to delete this record?")) {
                console.log("yes")
                window.location.href = `update.php?delete=${id}`;
            } else {
                console.log("no")
            }
        })
    })
</script>

</html>