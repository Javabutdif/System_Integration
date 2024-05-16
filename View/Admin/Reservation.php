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
        <div class="d-flex flex-row">
            <div class="card" style="width:17rem; height:31rem">
                <div class="card-header">Computer Control</div>
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
    </div>

</body>

</html>