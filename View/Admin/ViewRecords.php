<?php
include '../../Controller/api_admin.php';

$listPerson = retrieve_current_sit_in();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Sit In Records</title>

</head>

<body>

    <h1 class="text-center">Current Sit In Records</h1>
    <div class="container container-fluid d-flex flex-row gap-3 ">
        <div class="col-4"> <canvas id="myChart" class=""></canvas></div>
        <div class="col-8"> <canvas id="students" class="h-100 w-100"></canvas></div>

    </div>
    <div class="container">
        <table id="example" class="table table-striped display compact" style="width:100%">
            <thead style="background-color:#144c94">
                <tr>
                    <th>Sit-in Number</th>
                    <th>ID Number</th>
                    <th>Name</th>
                    <th>Purpose</th>
                    <th>Lab</th>
                    <th>Login</th>
                    <th>Logout</th>
                    <th>Date</th>



                </tr>
            </thead>

            <tbody>
                <?php foreach ($listPerson as $person) : ?>
                    <tr>
                        <td><?php echo $person['sit_id']; ?></td>
                        <td><?php echo $person['id_number']; ?></td>
                        <td><?php echo $person['firstName'] . " " . $person['lastName']; ?></td>
                        <td><?php echo $person['sit_purpose']; ?></td>
                        <td><?php echo $person['sit_lab']; ?></td>
                        <td><?php echo $person['sit_login']; ?></td>
                        <td><?php echo $person['sit_logout']; ?></td>
                        <td><?php echo $person['sit_date']; ?></td>




                    </tr>
                <?php endforeach; ?>
                <?php if (empty($listPerson)) : ?>
                    <tr>
                        <td colspan="7">No data available</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>


    <script>
        const ctx = document.getElementById('myChart');
        const stud = document.getElementById('students');

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['C#', 'C', 'Java', 'ASP.Net', 'Php'],
                datasets: [{
                    label: 'Programming Languages',
                    data: [<?php echo retrieve_c_sharp_programming_current(); ?>, <?php echo retrieve_c_programming_current(); ?>, <?php echo retrieve_java_programming_current(); ?>, <?php echo retrieve_asp_programming_current(); ?>, <?php echo retrieve_php_programming_current(); ?>],
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
                labels: ['524', '526', '528', '530', '542', 'Mac'],
                datasets: [{
                    label: 'Laboratories',
                    data: [<?php echo retrieve_lab_524(); ?>, <?php echo retrieve_lab_526(); ?>, <?php echo retrieve_lab_528(); ?>, <?php echo retrieve_lab_530(); ?>, <?php echo retrieve_lab_542(); ?>, <?php echo retrieve_lab_Mac(); ?>],
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

</body>

</html>

<script>
    new DataTable('#example');
</script>