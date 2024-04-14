
<?php
  session_start();
  error_reporting(0);
  include('backend.php');
  $con = mysqli_connect('localhost', 'root', '', 'ccs_system');
  if($_SESSION["admin_id_number"] == 0  ){
    header("Location: Login.php");
		exit();
	} 

  
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Sit In Records</title>

</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #144c94">
  <a class="navbar-brand text-white" href="#">CCS Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-white"  href="Admin.php">Home</a>
      </li>
      <li class="nav-item">
        <a type="submit" class="nav-link text-white" data-toggle="modal" data-target="#exampleModal">Search</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Records.php"> Sit-in </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="ViewRecords.php">View Sit-in Records</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-white" href="Report.php">Generate Reports</a>
      </li>
      <li class="nav-item">
        <a class="btn nav-link text-warning"  href="Login.php">Log out</a>
      </li>
    </ul>
  </div>
</nav>
<h1 class="text-center">Current Sit in</h1>

<?php 




$sqlTable = "SELECT student_sit_in.sit_id, students.id_number , students.firstName , students.middleName, students.lastName ,
     student_sit_in.sit_purpose, student_sit_in.sit_lab , student_session.session, student_sit_in.status
      FROM students INNER JOIN student_session ON students.id_number = student_session.id_number
       INNER JOIN student_sit_in ON student_sit_in.id_number = student_session.id_number
        WHERE student_sit_in.status = 'Active';";
$result = mysqli_query($con, $sqlTable);
if(mysqli_num_rows($result) > 0)
    {
      $listPerson = [];   
      while($row = mysqli_fetch_array($result)) {
          $listPerson[] = $row;
      }
    }
?>

<div class="container">
  <table id="example" class="table table-striped display compact" style="width:100%">
  <thead  style="background-color: #144c94">
      <tr >
          <th class="text-white">Sit ID Number</th>
          <th class="text-white">ID Number</th>
          <th class="text-white">Name</th>
          <th class="text-white">Sit Purpose</th>
          <th class="text-white">Sit Lab</th>
          <th class="text-white">Session</th>
          <th class="text-white">Status</th>
          <th class="text-white">Actions</th>
      </tr>
  </thead>

  <tbody>
      <?php foreach ($listPerson as $person): ?>
          <tr>
              <td><?php echo $person['sit_id']; ?></td>
              <td><?php echo $person['id_number']; ?></td>
              <td><?php echo $person['firstName']." ".$person['middleName'].". ".$person['lastName']; ?></td>
              <td><?php echo $person['sit_purpose']; ?></td>
              <td><?php echo $person['sit_lab']; ?></td>
              <td><?php echo $person['session']; ?></td>
              <td><?php echo $person['status']; ?></td>

              <td class="d-inline-flex p-3 gap-2">
                  <form action="Records.php" method="POST">
                      <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                      <input type="hidden" name="session" value="<?php echo $person['session']; ?>"/>
                      <input type="hidden" name="idNum" value="<?php echo $person['id_number']; ?>"/>
                      <input type="hidden" name="sitLab" value="<?php echo $person['sit_lab']; ?>"/>
                      <input type="hidden" name="sitId" value="<?php echo $person['sit_id']; ?>"/>
                  </form>
              </td>
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




<script>
  new DataTable('#example');
  </script>



</body>
</html>


