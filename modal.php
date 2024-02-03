<?php
include 'conn.php';
?>
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
    <div class="container">
        <form action="update.php" method="post">
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Vehicle ID</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <input type="hidden" name="id" id="id"> <!-- This line defines the id field -->
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" id="vid" name="vid" placeholder="Vehicle ID" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success" name="change">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script>
    // javascript code to update the vehicle id
    document.addEventListener("DOMContentLoaded", function() {
        var edits = document.getElementsByClassName('edit');
        var vid = document.getElementById('vid');
        var id = document.getElementById('id');

        Array.from(edits).forEach(function(element) {
            element.addEventListener("click", function(e) {
                console.log("edit ");
                var tr = e.target.parentNode.parentNode;
                var v_id = tr.getElementsByTagName("td")[2].innerText;
                console.log(v_id);
                vid.value = v_id;
                id.value = e.target.id;
                console.log(e.target.id);
            });
        });
    });
</script>

</html>