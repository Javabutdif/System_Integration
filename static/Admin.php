<?php
  session_start();
  if($_SESSION["admin_id_number"] == 0  ){
    header("Location: Login.php");
		exit();
	}
 

  if (isset($_GET["search"])) {
    $search = $_GET["searchBar"];

 



  $con = mysqli_connect('localhost', 'root', '', 'ccs_system');

  // Prepare and bind the SQL statement
  $sql = "SELECT * FROM students WHERE id_number = ? OR lastName = ? OR firstName = ?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("sss", $search, $search, $search);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows > 0 ) {
      // Fetch the user data
      $user = $result->fetch_assoc();
     
      // Fetch the session data
      $sql1 = "SELECT * FROM student_session WHERE id_number = ?";
      $stmt1 = $con->prepare($sql1);
      $stmt1->bind_param("s", $user["id_number"]);
      $stmt1->execute();
      $result1 = $stmt1->get_result();
      $record = $result1->fetch_assoc();
      



      class Student {
        // Properties (attributes)
        public  $id;
        public  $name;
        public  $records;
    
        // Constructor method
        public function __construct($id, $name, $records) {
            $this->id = $id;
            $this->name = $name;
            $this->records = $records;
        }
    
    }
    

      $student = new Student($user["id_number"], $user["firstName"]." ".$user["middleName"]." ".$user["lastName"], $record["session"]);
      

      $displayModal = true;
  } else {
    
 
      // No record found
      echo '<script>Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "No Student Data Found!"
      });</script>';
     
  }
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        <a class="nav-link text-white" href="#">Delete</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="#">Sit-In</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">View Sit-in Records</a>
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
<h1 class="text-center">Students Information</h1>

<!-- Table -->

<form action="Admin.php" method="GET" class="p-5">
  <?php 
    $con = mysqli_connect('localhost', 'root', '', 'ccs_system');

		$sqlTable = "SELECT * FROM students";
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
            <th>Email</th>
            <th>Course</th>
            <th>Year Level</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($listPerson as $person): ?>
            <tr>
                <td><?php echo $person['id_number']; ?></td>
                <td><?php echo $person['firstName']." ".$person['middleName'].". ".$person['lastName']; ?></td>
                <td><?php echo $person['email']; ?></td>
                <td><?php echo $person['course']; ?></td>
                <td><?php echo $person['yearLevel']; ?></td>
                <td><?php echo $person['address']; ?></td>
                <td class="d-inline-flex p-3 gap-2">
              
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</form>











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
<form action="Admin.php" method="GET">
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
            <input id="id" type="text" value="<?php echo $student->id?>" readonly class="form-control"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-4 col-form-label">Student Name:</label>
        <div class="col-sm-8">
            <input id="name" type="text" value="<?php echo  $student->name?>" readonly class="form-control"/>
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
        <button type="button" class="btn btn-primary">Sit In</button>
      </div>
    </div>
  </div>
</div>
</form>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
</script>
</body>
</html>




<script>
        // Check if PHP variable $displayModal is true, then show the modal
        <?php if ($displayModal): ?>
            $(document).ready(function(){
                $('#exampleModalCenter').modal('show');
            });
        <?php
          
      endif; ?>


      
    </script>


