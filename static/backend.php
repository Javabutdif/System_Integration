
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>CCS Monitoring System</title>
</head>
<body>
  
</body>
</html>
<?php 

$con = mysqli_connect('localhost', 'root', '', 'ccs_system');
$num = "";









// Register
if(isset($_POST["submitRegister"])){
$idNum =$_POST['idNumber'];
$last_Name = $_POST['lName'];
$first_Name = $_POST['fName'];
$middle_Name = $_POST['mName'];
$course_Level = $_POST['level'];
$passWord = $_POST['password'];
$email = $_POST['email'];
$course = $_POST['course'];
$address = $_POST['address'];

// database insert SQL code

$sql1 = "INSERT INTO `students` (`id_number`, `lastName`, `firstName`, `middleName`, `yearLevel`, `password`, `course`, `email`, `address`, `status`)
 VALUES ('$idNum', '$last_Name', '$first_Name', '$middle_Name', '$course_Level', '$passWord', '$course', '$email', '$address', 'TRUE')";
$sql2 = "INSERT INTO `student_session` (`id_number` , `session`) VALUES ('$idNum', 30)";
 

// insert in database 
if (mysqli_query($con, $sql1) && mysqli_query($con, $sql2) ) {
    
    $num = 1;
    header("Location: Login.php?num=$num");
}
else{
	

    $num = 2;
    header("Location: Register.php?num=$num");
}
mysqli_close($con);
}



//Class


  
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
    }
    else{
        echo '<script>const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            }
          });
          Toast.fire({
            icon: "error",
            title: "No student found!"
          });</script>';
    }
  }
  
// get the post records
if(isset($_POST["sitIn"])){

 
  $idNum = $_POST['studentID'];
  $purpose = $_POST['purpose'];
  $lab = $_POST['lab'];
  $login = date("h:i:sa");

  $getSession = "SELECT * FROM student_session WHERE id_number = '$idNum'";
  $data = mysqli_query($con, $getSession);
  $sesions = mysqli_fetch_array($data, MYSQLI_ASSOC);
  
  if($sesions["session"] == 0){
   echo '<script>Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "Student Session is 0!",

  });</script>';
  }
  else{


  
  $active= "SELECT * FROM student_sit_in WHERE id_number = '$idNum' AND status = 'Active'";
  $result = mysqli_query($con, $active);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
  
  if($user["sit_id"] != null){
    echo '<script>const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
      }
    });
    Toast.fire({
      icon: "error",
      title: "Student currently sit-in!"
    });</script>';
  }
  else{


  // database insert SQL code
  
  $sit = "INSERT INTO `student_sit_in` (`id_number`, `sit_purpose`, `sit_lab`, `sit_login` , `status`)
   VALUES ('$idNum', '$purpose', '$lab', '$login' , 'Active')";
    if (mysqli_query($con, $sit)) {
        echo '<script>const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            }
          });
          Toast.fire({
            icon: "success",
            title: "Sit-in successfully!"
          });</script>';

        
    }
 
  }
}
}



  //EDIT ADMIN
  if(isset($_POST["edit"])){
    $_SESSION["editNum"] = $_POST['idNum'];
    echo '<script>';
    echo 'window.location.href = "EditAdmin.php";';
    echo '</script>';
  }


//RECORDS

if(isset($_POST["logout"])){
    $id = $_POST['idNum'];
    $sitId = $_POST['sitId'];
    $log = date("h:i:sa");
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
          
    $sql = "UPDATE `student_sit_in` SET `status` = 'Finished', `sit_logout` = '$log', `sit_date` = '$logout' WHERE `id_number` = '$id' AND `sit_id` = '$sitId' ";
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
        echo '<script>const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            }
          });
          Toast.fire({
            icon: "success",
            title: "Student Logout!"
          });</script>';
      }


    }
 



?>

<!DOCTYPE html>
<html lang="en">

<body>






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
    
</body>
</html>
<script>  
    <?php if ($displayModal): ?>
    $(document).ready(function(){
      $('#exampleModalCenter').modal('show');
    });
  <?php endif; ?>

  </script>
  
