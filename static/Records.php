
<?php
  session_start();
  error_reporting(0);
  $con = mysqli_connect('localhost', 'root', '', 'ccs_system');
  if($_SESSION["admin_id_number"] == 0  ){
    header("Location: Login.php");
		exit();
	} 

  
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

  if(isset($_GET["search"])) {
    $search = $_GET["searchBar"];

    // Prepare and bind the SQL statement
    $sql = "SELECT * FROM students WHERE id_number = ? OR lastName = ? OR firstName = ? AND `status` = 'TRUE'";
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

        $student = new Student($user["id_number"], $user["firstName"]." ".$user["middleName"]." ".$user["lastName"], $record["session"]);
        
        $displayModal = true;
    } else {
        // If no student found, set $displayModal to false
        $displayModal = false;
        echo '<script>
                 alert("No Student found!");
             </script>';
    }
}
  
// get the post records
if(isset($_POST["sitIn"])){


  $idNum = $_POST['studentID'];
  $purpose = $_POST['purpose'];
  $lab = $_POST['lab'];
  $login = date('Y-m-d');
  
  
  // database insert SQL code
  
  $sql = "INSERT INTO `student_sit_in` (`id_number`, `sit_purpose`, `sit_lab`, `sit_login` , `status`)
   VALUES ('$idNum', '$purpose', '$lab', '$login' , 'Active')";
  
  // insert in database 
  if (mysqli_query($con, $sql)) {
    echo '<script>window.alert("Student Sit-In Successful")</script>'; 
    

  }
  else{

    
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
?>

<div class="container">
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

              <td class="d-inline-flex p-3 gap-2">
                  <form action="Records.php" method="POST">
                      <button type="submit" name="logout" class="btn btn-danger">Log out</button>
                      <input type="hidden" name="session" value="<?php echo $person['session']; ?>"/>
                      <input type="hidden" name="idNum" value="<?php echo $person['id_number']; ?>"/>
                      <input type="hidden" name="sitLab" value="<?php echo $person['sit_lab']; ?>"/>
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

<?php
if(isset($_POST["logout"])){
  $id = $_POST['idNum'];


  $logout = date('Y-m-d');
  $ses = $_POST["session"];
  $sitlab = $_POST["sitLab"];
  $newSession = $ses - 1;
 
 


  $con = mysqli_connect('localhost', 'root', '', 'ccs_system');
  if(!$con) {
      die("Connection failed: " . mysqli_connect_error());
  }
  //Retrive sit in records
    $retrieve = " SELECT * FROM student_lab WHERE id_number = '$id' AND lab = '$sitlab'";
		$resultsss = mysqli_query($con, $retrieve);
    $user = mysqli_fetch_array($resultsss, MYSQLI_ASSOC);
		
  $sql = "UPDATE `student_sit_in` SET `status` = 'Finished', `sit_logout` = '$logout' WHERE `id_number` = '$id'";
  $sql1 = "UPDATE `student_session` SET `session` = '$newSession' WHERE `id_number` = '$id'";
 
		
		    
		if($user["id_number"] != null){
        $retrieveSession = $user['sit_in'];
        $numbered =  $retrieveSession + 1 ;
        $up = "UPDATE `student_lab` SET `sit_in` = '$numbered' WHERE `id_number` = '$id'  AND lab = '$sitlab'";
      
    }
    else{
      $up ="INSERT INTO `student_lab` (`id_number`,`lab`, `sit_in`)
      VALUES ('$id','$sitlab', '1')";
    }
			
  if (mysqli_query($con, $sql) && mysqli_query($con, $sql1) && mysqli_query($con, $up)) {
      echo '<script>';
      echo 'alert("Log Out Successful!");';
      echo 'window.location.href = "Records.php";';
      echo '</script>';
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }
  mysqli_close($con);
}
?>




<!-- Modal -->
<form action="Records.php" method="GET">

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
<form action="Records.php" method="POST">
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



</body>
</html>
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
   