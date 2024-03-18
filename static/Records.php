<?php
  session_start();
  $con = mysqli_connect('localhost', 'root', '', 'ccs_system');
  if($_SESSION["admin_id_number"] == 0  ){
    header("Location: Login.php");
		exit();
	} 

    if(isset($_GET["logout"])){
        $id = $_GET["idNumber"];
        $sql = "UPDATE `student_sit_in` SET `status` = 'Finished' WHERE `id_number` = '$id' ";
 

// insert in database 
if (mysqli_query($con, $sql) ) {
	echo '<script>window.alert-success("Success!")</script>'; 
	

}
else{
	
	echo '<script>alert("Error! Duplicate Id Number")</script>'; 
	
}


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
        <a type="button" class="nav-link text-white" data-toggle="modal" data-target="#exampleModal">Search</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Delete</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="#">Sit-In</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Records.php">View Sit-in Records</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-white" href="#">Generate Reports</a>
      </li>
      <li class="nav-item">
        <a class="btn nav-link text-warning"  href="Login.php">Log out</a>
      </li>
    </ul>
  </div>
</nav>
<h1 class="text-center">Current Sit in</h1>


<form action="Records.php" method="GET" class="p-5">
  <?php 
    $con = mysqli_connect('localhost', 'root', '', 'ccs_system');

		$sqlTable = "SELECT students.id_number , students.firstName , students.middleName, students.lastName ,
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
        else
        {
            return null;

        }

  ?>
<table id="example" class="table table-dark display compact" style="width:100%">
    <thead>
        <tr>
            <th>ID Number</th>
            <th>Name</th>
            <th>Sit Purpose</th>
            <th>Sit Lab</th>
            <th>Session</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($listPerson as $person): ?>
            <tr>
                <td><?php echo $person['id_number']; ?></td>
                <td><?php echo $person['firstName']." ".$person['middleName'].". ".$person['lastName']; ?></td>
                <td><?php echo $person['sit_purpose']; ?></td>
                <td><?php echo $person['sit_lab']; ?></td>
                <td><?php echo $person['session']; ?></td>
                <td><?php echo $person['status']; ?></td>

                <form action="Records.php" method="POST">
                <td class="d-inline-flex p-3 gap-2">
                  
                <button type="button" name="logout"class="btn btn-danger">Log out</button> 
                <input type="hidden" name="idNumber" value="<?php echo $person['id_number']; ?>" />
                
                 
                </td>
                </form>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</form>

    



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
<script>
  <?php
    if($_SESSION["admin_id"] === 1){
      echo "Swal.fire({
              title: 'Successful Login',
              text: 'Welcome, {$_SESSION["admin_name"]}!',
              icon: 'success'
            });";
      $_SESSION["admin_id"] = 0;
    }
  ?>
  new DataTable('#example');

  
  
  

</script>
</body>
</html>