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



</body>

</html>

<script>
    new DataTable('#example');
</script>