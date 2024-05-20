<?php
include '../../Controller/api_admin.php';

$listPerson = retrieve_sit_in();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sit In Records</title>

</head>

<body>

    <h1 class="text-center">Current Sit in</h1>

    

    <div class="container">
        <table id="example" class="table table-striped display compact" style="width:100%">
            <thead>
                <tr>
                    <th>Sit ID Number</th>
                    <th>ID Number</th>
                    <th>Name</th>
                    <th>Purpose</th>
                    <th>Sit Lab</th>
                    <th>Session</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($listPerson as $person) : ?>
                    <tr>
                        <td><?php echo $person['sit_id']; ?></td>
                        <td><?php echo $person['id_number']; ?></td>
                        <td><?php echo $person['firstName'] . " " . $person['middleName'] . ". " . $person['lastName']; ?></td>
                        <td><?php echo $person['sit_purpose']; ?></td>
                        <td><?php echo $person['sit_lab']; ?></td>
                        <td><?php echo $person['session']; ?></td>
                        <td><?php echo $person['status']; ?></td>

                        <td class="d-inline-flex p-3 gap-2">
                            <form action="Sit_in.php" method="POST">
                                <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                                <input type="hidden" name="session" value="<?php echo $person['session']; ?>" />
                                <input type="hidden" name="idNum" value="<?php echo $person['id_number']; ?>" />
                                <input type="hidden" name="sitLab" value="<?php echo $person['sit_lab']; ?>" />
                                <input type="hidden" name="sitId" value="<?php echo $person['sit_id']; ?>" />
                            </form>
                        </td>
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
        new DataTable('#example');
    </script>



</body>

</html>