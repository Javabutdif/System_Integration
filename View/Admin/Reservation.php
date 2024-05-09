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
            <div class="card" style="width:17rem; height:30rem">
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
                <div style="overflow-y: auto; max-height: 270px;">
                    <?php foreach($data as $row): ?>
                    <div >
                        <input type="checkbox" id="PC<?php echo $row['pc_id'] ?>" name="PC<?php echo $row['pc_id'] ?>"value="Yes">
                        <label for="PC<?php echo $row['pc_id'] ?>">PC <?php echo $row['pc_id'] ?></label>
                    </div>
                   <?php endforeach; ?>
                   </div>
                    
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>