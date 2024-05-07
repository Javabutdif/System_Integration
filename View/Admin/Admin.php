<?php
include '../../Controller/api_admin.php';

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

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">Statistics</div>
                    <div class="card-body">
                        <p class="card-text">Students Registered: <?php echo retrieve_students_dashboard(); ?></p>
                        <p class="card-text">Currently Sit-in: <?php echo retrieve_current_sit_in_dashboard(); ?></p>
                        <p class="card-text">Total Sit-in: <?php echo retrieve_total_sit_in_dashboard(); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class=" card-header">Announcement</div>
                    <div class="card-body form">
                        <label for="an">New Announcement</label>
                        <form action="" method="">
                            <input type="text" id="an" class="form-control form-text">
                            <button type="submit" name="post_announcement" class="btn btn-success mt-2">Submit</button>
                        </form>
                        <hr>
                        <p>Admin  01/01/01</p>
                        <p>For the upcoming 1st year students. Please read the safety and rules of the laboratory</p>
                    </div>
                </div>
            </div>
        </div>





</body>

</html>