<?php 
session_start();
$idNumber = $_SESSION['id_number'];

$con = mysqli_connect('localhost', 'root', '', 'ccs_system');

    $sqlTable = " SELECT student_sit_in.sit_id, students.id_number, students.firstName,students.lastName,
    student_sit_in.sit_purpose, student_sit_in.sit_lab , student_sit_in.sit_login,
    student_sit_in.sit_logout,student_sit_in.sit_date, student_sit_in.status FROM
    students INNER JOIN student_sit_in ON students.id_number = student_sit_in.id_number
        INNER JOIN student_session ON student_sit_in.id_number = student_session.id_number WHERE student_sit_in.status = 'Finished' AND student_sit_in.id_number = '$idNumber';";

    $result = mysqli_query($con, $sqlTable);
    if(mysqli_num_rows($result) > 0)
        {
        $listPerson = [];   
        while($row = mysqli_fetch_array($result)) {
            $listPerson[] = $row;
        }
        }

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
    
    

<div class="container">
  
  <table id="example" class="table table-striped display compact" style="width:100%">
  <thead style="background-color: #144c94">
      <tr>
    
          <th class="text-white">ID Number</th>
          <th  class="text-white">Name</th>
          <th class="text-white">Sit Purpose</th>
          <th class="text-white">Laboratory</th>
          <th class="text-white">Login</th>
          <th class="text-white">Logout</th>
          <th class="text-white">Date</th>
        
   

      </tr>
  </thead>

  <tbody>
      <?php foreach ($listPerson as $person): ?>
          <tr>
      
              <td><?php echo $person['id_number']; ?></td>
              <td><?php echo $person['firstName']." ".$person['lastName']; ?></td>
              <td><?php echo $person['sit_purpose']; ?></td>
              <td><?php echo $person['sit_lab']; ?></td>
              <td><?php echo $person['sit_login']; ?></td>
              <td><?php echo $person['sit_logout']; ?></td>
              <td><?php echo $person['sit_date']; ?></td>
          </tr>
      <?php endforeach; ?>
      <?php if(empty($listPerson)): ?>
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
