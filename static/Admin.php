
<?php
  session_start();
  error_reporting(0);
  include('backend.php');

  if($_SESSION["admin_id_number"] == 0  ){
    header("Location: Login.php");
		exit();
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
    
    
    <title>Admin</title>
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
        <a type="button" class="nav-link text-white" data-toggle="modal" data-target="#exampleModal">Search</a>
      </li>
       <li class="nav-item">
        <a type="button" class="nav-link text-white" href="Students.php">Students</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Records.php"> Sit-in</a>
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
<h1 class="text-center">Students Information</h1>
<br>
<?php 
    $number = " SELECT count(id_number) as id from students where status = 'TRUE';";
    $stats = "SELECT count(sit_id) as id from student_sit_in where status = 'Active';";
    $result = mysqli_query($con, $number);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //
    $result1 = mysqli_query($con, $stats);
    $user1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
  ?>
  <div class="d-flex flex-row gap-3 text-center container align-content-center">
    <div class="text-white bg-primary shadow   col-2 p-2 rounded ">
      <p>Students Registered: <?php echo $user['id'];?></p>
    </div>
    <div class="text-white bg-primary shadow col-2 p-2 rounded ">
      <p>Currently Sit-in: <?php echo $user1['id'];?></p>
    </div>
  </div>
  <br>
  <br>

 
  


</body>
</html>
<script>
  


  <?php
    if($_SESSION["admin_id"] === 1){
      echo "Swal.fire({
              title: 'Successful Login',
              text: 'Welcome, {$_SESSION["admin_name"]}!',
              icon: 'success',
              showConfirmButton: false,
              timer: 1500
            });";
      $_SESSION["admin_id"] = 0;
    }
  ?>

</script>
