<?php
include '../../Controller/api_admin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCS | Home</title>
    <style>
        ul {
            list-style-type: none;
        }
    </style>
</head>

<body>
    <h1 class="text-center">Reservation</h1>

    <div class="container">
        <div class="d-flex flex-row gap-1">
            <div class="col-3">
            <div class="card" style="width:17rem; height:31rem">
                <div class="card-header text-white text-center"  style=" background-color: #144c94;">Computer Control</div>
                <div class="card-body">
                    <form action="Reservation.php" method="POST">
                        <div class="form-group row pb-3">

                            <label for="lab" class="col-sm-4 col-form-label">Lab</label>
                            <div class="col-sm-8">
                                <select name="lab" id="lab" class="form-control">
                                    <option value="524">524</option>
                                    <option value="526">526</option>
                                    <option value="528">528</option>
                                    <option value="542">542</option>
                                    <option value="Mac">Mac</option>
                                </select>

                            </div>

                            <button type="submit" name="labSubmit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                    <form action="Reservation.php" method="POST">
                        <p><?php echo $current_lab ?></p>
                        <div style="overflow-y: auto; max-height: 220px;">
                            <?php foreach ($data as $row) : ?>
                                <div>
                                    <input type="hidden" name="filter_lab" value="<?php echo $lab_final ?>">
                                    <input type="checkbox" id="PC<?php echo $row['pc_id']; ?>" name="pc[]" value="<?php echo $row['pc_id']; ?>">
                                    <label for="PC<?php echo $row['pc_id']; ?>">
                                        <?php if ($row['lab2'] == '1') : ?>
                                            <p style='color:green;'>PC <?php echo $row['pc_id'] . " (Available)"; ?></p>
                                        <?php else : ?>
                                            <p style='color:red;'>PC <?php echo $row['pc_id'] . " (Used)"; ?></p>
                                        <?php endif; ?>
                                    </label>

                                </div>
                            <?php endforeach; ?>

                        </div>
                        <div class="d-flex flex-row gap-3">
                            <button type="submit" name="submitAvail" class="btn btn-success mt-3">Available</button>
                            <button type="submit" name="submitDecline" class="btn btn-danger mt-3">Used</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <h3 class="card-header text-center text-white"  style=" background-color: #144c94;">Reservation Request</h3>
                    <div class="card-body">
                        <div class="mt-3" style="overflow-y: auto; max-height: 390px;">
                            <?php foreach (retrieve_reservation() as $row) :
                            ?>
                                <p><strong>ID Number: </strong><?php echo $row['id_number'] ?> </p>
                                <p><strong>Reservation Date: </strong><?php echo $row['reservation_date'] ?> </p>
                                <p><strong>Reservation Time: </strong><?php echo $row['reservation_time'] ?></p>
                                <p><strong>Laboratory: </strong><?php echo $row['lab'] ?></p>
                                <p><strong>Computer Number: </strong><?php echo $row['pc_number'] ?></p>
                                <p><strong>Purpose: </strong><?php echo $row['purpose'] ?></p>
                             
                                <div class="d-flex flex-row gap-3">
                                    <form action="Reservation.php" method="POST">
                                        <input name="reservation_id" value="<?php echo $row['reservation_id'] ?>" type="hidden">
                                        <input name="pc_number" value="<?php echo $row['pc_number'] ?>" type="hidden">
                                        <input name="lab" value="<?php echo "lab_".$row['lab'] ?>" type="hidden">
                                        <input name="id_number" value="<?php echo $row['id_number'] ?>" type="hidden">

                                        <button type="submit" name="accept_reservation" class="btn btn-success">Accept</button>
                                        <button type="submit" name="deny_reservation" class="btn btn-danger">Deny</button>
                                    </form>
                                </div>
                                <hr>
                            <?php endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 ">
                <div class="card">
                <h3 class="card-header text-center text-white"  style=" background-color: #144c94;">Logs</h3>
                    <div class="card-body">
                    <div class="mt-3" style="overflow-y: auto; max-height: 390px;">
                            <?php foreach (retrieve_reservation_logs() as $row) :
                            ?>
                                <p><strong>ID Number: </strong><?php echo $row['id_number'] ?> </p>
                                <p><strong>Reservation Date: </strong><?php echo $row['reservation_date'] ?> </p>
                                <p><strong>Reservation Time: </strong><?php echo $row['reservation_time'] ?></p>
                                <p><strong>Laboratory: </strong><?php echo $row['lab'] ?></p>
                                <p><strong>Computer Number: </strong><?php echo $row['pc_number'] ?></p>
                                <p><strong>Purpose: </strong><?php echo $row['purpose'] ?></p>
                                <p style="<?php if($row['status'] == 'Approve') echo 'color:green;'; else if($row['status'] == 'Decline') echo "color:red" ?>"><strong>Status: </strong> <?php echo $row['status'] ?></p>
                                <hr>
                            <?php endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>