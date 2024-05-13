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




            </div>


            <div class="column">

                <div class="card">
                    <div class=" card-header"><i class="fa-solid fa-bullhorn"></i> Announcement</div>
                    <div class="card-body" style="height:28rem">
                        <label for="an">New Announcement</label>
                        <form action="Admin.php" method="POST">
                            <textarea type="text" name="announcement_text" id="an" class="form-control"></textarea>
                            <button type="submit" name="post_announcement" class="btn btn-success mt-2">Submit</button>
                        </form>
                        <hr>
                        <div style="overflow-y: auto; max-height: 260px;">
                            <p> <?php foreach ($announce as $row) : ?>
                            <p><strong><?php echo $row['admin_name'] . " | " . $row['date'] ?></strong></p>
                            <p><?php echo $row['message'] ?></p>
                            <hr>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>


                <div class="card mt-4">
                    <div class="card-header"><i class="fa-solid fa-chalkboard-user"></i> Feedback and Report </div>
                    <div class="card-body " style="height:10rem">

                        <div style="overflow-y: auto; max-height: 140px;">
                            <p> <?php foreach ($feedback as $row) : ?>
                            <p><strong><?php echo $row['id_number'] . " | " . $row['date'] ?></strong></p>
                            <p><?php echo $row['message'] ?></p>
                            <hr>
                        <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header"><i class="fa-solid fa-chalkboard-user"></i> Students Year Level</div>
            <div class="card-body ">

                <canvas id="students"></canvas>
            </div>

        </div>



</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');
    const stud = document.getElementById('students');

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
    new Chart(stud, {
        type: 'bar',
        data: {
            labels: ['Freshmen', 'Sophomore', 'Junior', 'Senior'],
            datasets: [{
                label: 'College of Computer Studies Students Year Level',
                data: [<?php echo retrieve_first(); ?>, <?php echo retrieve_second(); ?>, <?php echo retrieve_third(); ?>, <?php echo retrieve_fourth(); ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
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