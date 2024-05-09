<?php
include '../../Controller/api_admin.php';
require_once '../asset/navbar_admin.html';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCS | Home</title>
    <style>
        .card-header {
            background-color: #144c94;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container col-md-6 pt-5 px-5">
        <div class="card">
            <form action="Reset.php" method="POST">
                <div class="card-header">Change Password</div>
                <div class="card-body d-flex flex-column gap-3">

                    <label for="pass">Enter new password: </label>
                    <input type="password" name="new_password" id="pass">
                    <button type="submit" name="reset_password" class="btn btn-primary mt-3">Submit</button>

                </div>
        </div>
        </form>
    </div>

</body>

</html>