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
                    <div class="card-header"> <i class="fa-solid fa-chart-column"></i> Statistics</div>
                    <div class="card-body">
                        <p class="card-text"><strong>Students Registered: </strong> <?php echo retrieve_students_dashboard(); ?></p>
                        <p class="card-text"><strong>Currently Sit-in: </strong><?php echo retrieve_current_sit_in_dashboard(); ?></p>
                        <p class="card-text"><strong>Total Sit-in: </strong><?php echo retrieve_total_sit_in_dashboard(); ?></p>
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>



                <div class="card">
                    <div class="card-header"><i class="fa-solid fa-chalkboard-user"></i> Feedback and Report </div>
                    <div class="card-body">

                        <div style="overflow-y: auto; max-height: 270px;">
                            <p> <?php foreach ($feedback as $row) : ?>
                            <p><strong><?php echo $row['id_number'] . " | " . $row['date'] ?></strong></p>
                            <p><?php echo $row['message'] ?></p>
                            <hr>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class=" card-header"><i class="fa-solid fa-bullhorn"></i> Announcement</div>
                    <div class="card-body" style="height:28rem">
                        <label for="an">New Announcement</label>
                        <form action="Admin.php" method="POST">
                            <input type="text" name="announcement_text" id="an" class="form-control">
                            <button type="submit" name="post_announcement" class="btn btn-success mt-2">Submit</button>
                        </form>
                        <hr>
                        <div style="overflow-y: auto; max-height: 270px;">
                            <p> <?php foreach ($announce as $row) : ?>
                            <p><strong><?php echo $row['admin_name'] . " | " . $row['date'] ?></strong></p>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['C#', 'C', 'Java', 'ASP.Net', 'Php'],
            datasets: [{
                label: 'Programming Languages',
                data: [<?php echo retrieve_c_sharp_programming(); ?>, <?php echo retrieve_c_programming(); ?>, <?php echo retrieve_java_programming(); ?>, <?php echo retrieve_asp_programming(); ?>, <?php echo retrieve_php_programming(); ?>],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>