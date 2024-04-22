<?php
    session_start();
    error_reporting(0);
    include('backend.php');

    if($_SESSION["admin_id_number"] == 0  ){
        header("Location: Login.php");
            exit();
        } 
        if(isset($_POST["delete"])){
          $id = $_POST['idNum'];
        
          
          
         
          if(!$con) {
              die("Connection failed: " . mysqli_connect_error());
          }
        
              $sql = "UPDATE `students` SET `status` = 'FALSE' WHERE `id_number` = '$id'";
        
              if (mysqli_query($con, $sql)) {
                echo '<script>alert("User has been deleted.");</script>';
        
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
            
              mysqli_close($con);
        
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
    <title>Student</title>
    <style>
        .navbar {
            background-color: #144c94;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: yellow !important;
        }
        .dashboard-card {
            background-color: #007bff;
            color: white;
            border-radius: 10px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="Admin.php">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Admin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a type="button" class="nav-link" data-toggle="modal" data-target="#exampleModal">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Students.php">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Records.php">Sit-in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ViewRecords.php">View Sit-in Records</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Report.php">Generate Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-warning" href="Login.php">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<h1 class="text-center">Students Information</h1>
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
    <div  class="d-flex justify-content-center align-items-center gap-3">
    <form action="Admin.php" method="POST">
        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
        <input type="hidden" name="idNum" value="<?php echo $person['id_number']; ?>"/>
        </form>
        <form action="Students.php" method="POST" class="delete-form">
                            <input type="hidden" name="idNum" value="<?php echo $person['id_number']; ?>" />
                            <button type="submit" name="delete" class="btn btn-danger mr-2" onclick="return confirm('Are you sure you want to delete this Student?')">Delete</button>
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
    

<script>
new DataTable('#example');
  </script>

    
<script>
document.getElementById("deleteBtn").addEventListener("click", function() {
    if (confirm("Are you sure you want to delete this Student?")) {
        document.getElementById("deleteForm").submit();
    }
});
</script>

</body>
</html>

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
  xhr.open("POST", "Students.php", true);
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

