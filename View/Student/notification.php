<?php
require_once '../asset/navbar_student.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCS | Home</title>
</head>
<body>
    <h1 class="text-center ">Notification</h1>
    <div class="align-content-center">
    <div class="card" style="width: 30rem; height:32.5rem">
          <h5 class=" card-header text-white " style="background-color:#144c94"><i class="fa-solid fa-bullhorn"></i> Notification</h5>
          <div class="card-body" id="card-background">

            <div style="overflow-y: auto; max-height: 430px;">
              <p> <?php foreach (retrieve_reservation_logs($_SESSION['id_number']) as $row) : ?>
                <p><strong>ID Number: </strong><?php echo $row['id_number'] ?> </p>
                                <p><strong>Reservation Date: </strong><?php echo $row['reservation_date'] ?> </p>
                                <p><strong>Reservation Time: </strong><?php echo $row['reservation_time'] ?></p>
                                <p><strong>Laboratory: </strong><?php echo $row['lab'] ?></p>
                                <p><strong>Computer Number: </strong><?php echo $row['pc_number'] ?></p>
                                <p><strong>Purpose: </strong><?php echo $row['purpose'] ?></p>
                               <p><strong>Your Reservation is <?php echo $row['status'] ?></strong></p>
              <hr>
            <?php endforeach; ?>
            </div>
          </div>
          </div>
        </div>
</body>
</html>