
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

<!-- Table -->
<div class="container d-flex flex-row  gap-3 ">
  <a class="btn btn-primary " href="Add.php">Add Students</a>
 
  <button class="btn btn-danger" id="resetButton" >Reset All Session</button>

</div>

  <?php 
    $con = mysqli_connect('localhost', 'root', '', 'ccs_system');

		$sqlTable = " SELECT students.id_number, students.firstName,
     students.middleName, students.lastName , students.yearLevel,
      students.course, student_session.session from students
       inner join student_session on student_session.id_number = students.id_number where students.status = 'TRUE'";
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
<table id="example" class="table table-striped table-hover display compact " style="width:100%">
    <thead  style="background-color: #144c94">
        <tr>
            <th class="text-white">ID Number</th>
            <th class="text-white">Name</th>
            <th class="text-white">Year Level</th>
            <th class="text-white">Course</th>
            <th class="text-white">Remaining Session</th>
            <th class="text-white">Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($listPerson as $person): ?>
            <tr>
                <td><?php echo $person['id_number']; ?></td>
                <td><?php echo $person['firstName']." ".$person['middleName'].". ".$person['lastName']; ?></td>
                <td><?php echo $person['yearLevel']; ?></td>
                <td><?php echo $person['course']; ?></td>
                <td><?php echo $person['session']; ?></td>
               
                <td class="align-middle">
    <div  class="d-flex justify-content-center align-items-center">
    <form action="Admin.php" method="POST">
        <button type="submit" id="delete" name="delete" class="btn btn-danger mr-2">Delete</button>
       
        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
        <input type="hidden" name="idNum" value="<?php echo $person['id_number']; ?>"/>
        </form>
        </div>
</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
  </div>
  <br>
  <br>
 
  













<!-- Modal -->
<form action="Admin.php" method="GET">

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center " id="exampleModalLabel">Search Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <input type="text" name="searchBar" placeholder="Search...">
      </div>
      <div class="modal-footer">
        
        <button type="submit" name="search"  class="btn btn-primary">Search</button>
      </div>
    </div>
  </div>
</div>
</form>


<!-- Vertical Modal-->

<!-- Modal -->
<form action="Admin.php" method="POST">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sit In Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center container container-fluid">
    <div class="form-group row">
        <label for="id" class="col-sm-4 col-form-label">ID Number:</label>
        <div class="col-sm-8">
            <input id="id" name="studentID" type="text" value="<?php echo $student->id?>" readonly class="form-control"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-4 col-form-label">Student Name:</label>
        <div class="col-sm-8">
            <input id="name" name="studentName" type="text" value="<?php echo  $student->name?>" readonly class="form-control"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="purposes" class="col-sm-4 col-form-label">Purpose:</label>
        <div class="col-sm-8">
            <select name="purpose" id="purposes" class="form-control">
                <option value="C Programming">C Programming</option>
                <option value="Java Programming">Java Programming</option>
                <option value="C# Programming">C# Programming</option>
                <option value="Php Programming">Php Programming</option>
                <option value="ASP.Net Programming">ASP.Net Programming</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="lab" class="col-sm-4 col-form-label">Lab:</label>
        <div class="col-sm-8">
            <select name="lab" id="lab" class="form-control">
                <option value="524">524</option>
                <option value="526">526</option>
                <option value="528">528</option>
                <option value="530">530</option>
                <option value="542">542</option>
                <option value="Mac">Mac Laboratory</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-4 col-form-label">Remaining Session: </label>
        <div class="col-sm-8">
            <input id="name" type="text" value="<?php echo  $student->records?>" readonly class="form-control"/>
        </div>
    </div>
</div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="sitIn" class="btn btn-primary" >Sit In</button>
      </div>
    </div>
  </div>
</div>
</form>








<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>



<script>
new DataTable('#example');
  </script>

<script>  
    <?php if ($displayModal): ?>
    $(document).ready(function(){
      $('#exampleModalCenter').modal('show');
    });
  <?php endif; ?>

  </script>
  



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

<script>
document.getElementById("resetButton").addEventListener("click", function() {
  Swal.fire({
    title: "Do you want to reset the session?",
    showCancelButton: true,
    confirmButtonText: "Reset",

  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      // Proceed with reset
      resetSession();
    } else if (result.isDenied) {
      Swal.fire("Action canceled", "", "info");
    }
  });
});

function resetSession() {
  // Send an AJAX request to trigger the PHP script
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "Admin.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // If the request is successful, show a success message
        Swal.fire("Session reset!", "", "success");
      } else {
        // If there's an error, show an error message
        Swal.fire("Error", "Failed to reset session", "error");
      }
    }
  };
  xhr.send("reset=true"); // Sending the reset parameter
}
</script>


<?php
if(isset($_POST["reset"])){
  $sql1 = "UPDATE `student_session` SET `session` = 30";
  if(mysqli_query($con, $sql1)){
    // Return a success response
    http_response_code(200);
    exit; // Exit to prevent further output
  } else {
    // Return an error response
    http_response_code(500);
    exit; // Exit to prevent further output
  }
}
?>


