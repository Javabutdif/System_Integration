<?php
require_once '../asset/navbar_student.html';
include '../../Controller/api_student.php';


$listPerson = retrieve_student_history($_SESSION['id_number']);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>History</title>
</head>

<body>
    <h1 class="text-center">History Information</h1>



    <div class="container px-5">
        <a class="btn btn-danger" href="Homepage.php">Back</a>
        <table id="example" class="table table-striped display compact" style="width:100%">
            <thead style="background-color: #144c94">
                <tr>

                    <th class="text-white">ID Number</th>
                    <th class="text-white">Name</th>
                    <th class="text-white">Sit Purpose</th>
                    <th class="text-white">Laboratory</th>
                    <th class="text-white">Login</th>
                    <th class="text-white">Logout</th>
                    <th class="text-white">Date</th>
                    <th class="text-white">Action</th>



                </tr>
            </thead>

            <tbody>
                <?php foreach ($listPerson as $person) : ?>
                    <tr>

                        <td><?php echo $person['id_number']; ?></td>
                        <td><?php echo $person['firstName'] . " " . $person['lastName']; ?></td>
                        <td><?php echo $person['sit_purpose']; ?></td>
                        <td><?php echo $person['sit_lab']; ?></td>
                        <td><?php echo $person['sit_login']; ?></td>
                        <td><?php echo $person['sit_logout']; ?></td>
                        <td><?php echo $person['sit_date']; ?></td>
                        <td>
                        <button type="button" class="btn btn-success mx-3" data-toggle="modal" data-target="#exampleModalCenter">Feedback</button>
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

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Feedback Experience</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <textarea class="form-control" placeholder="Tell us what you experience..."></textarea> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit Feedback</button>
      </div>
    </div>
  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>


</body>

</html>



<script>
    new DataTable('#example');
</script>