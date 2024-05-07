<?php
include '../../Controller/api_admin.php';
$announce = view_announcement();
$feedback = view_feedback();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        .card-header {
            background-color: #007bff;
            color: white;
        }
    </style>


</head>

<body>


    <div class="container mt-5">

        <div class="d-flex flex-row gap-4">

            <div class="d-flex flex-column">

                <div class="card mb-4" style="width:35rem">
                    <div class="card-header">Statistics</div>
                    <div class="card-body">
                        <p class="card-text"><strong>Students Registered: </strong> <?php echo retrieve_students_dashboard(); ?></p>
                        <p class="card-text"><strong>Currently Sit-in: </strong><?php echo retrieve_current_sit_in_dashboard(); ?></p>
                        <p class="card-text"><strong>Total Sit-in: </strong><?php echo retrieve_total_sit_in_dashboard(); ?></p>
                    </div>
                </div>



                <div class="card">
                    <div class="card-header">Feedback and Report</div>
                    <div class="card-body">
                      
                        <div style="overflow-y: auto; max-height: 270px;">
                            <p> <?php foreach ($feedback as $row) : ?>
                            <p><?php echo $row['id_number'] . " | " . $row['date'] ?></p>
                            <p><?php echo $row['message'] ?></p>
                            <hr>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class=" card-header">Announcement</div>
                    <div class="card-body" style="height:28rem">
                        <label for="an">New Announcement</label>
                        <form action="Admin.php" method="POST">
                            <input type="text" name="announcement_text" id="an" class="form-control form-text">
                            <button type="submit" name="post_announcement" class="btn btn-success mt-2">Submit</button>
                        </form>
                        <hr>
                        <div style="overflow-y: auto; max-height: 270px;">
                            <p> <?php foreach ($announce as $row) : ?>
                            <p><?php echo $row['admin_name'] . " | " . $row['date'] ?></p>
                            <p><?php echo $row['message'] ?></p>
                            <hr>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>





</body>

</html>