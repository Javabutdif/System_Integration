<?php
require 'navbar.php';
require_once 'Controller\api_index.php';
$announce = view_announcement();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCS | Home</title>
    <style>
        .card-background {
            background-color: antiquewhite;
        }
    </style>
</head>

<body>
    <div class="container pt-3 ">
        <div class="card " style="width: 30rem;">
            <h5 class=" card-header text-white " style="background-color:#144c94">Announcement</h5>
            <div class="card-body" id="card-background">

                <div style="overflow-y: auto; max-height: 300px;">
                    <p> <?php foreach ($announce as $row) : ?>
                    <p><?php echo $row['admin_name'] . " | " . $row['date'] ?></p>
                    <div class="card-body bg-light w-100">
                        <p><?php echo $row['message'] ?></p>
                    </div>
                    <hr>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>