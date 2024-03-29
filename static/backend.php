<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>CCS Monitoring System</title>
</head>
<body>
    
</body>
</html>

<?php 
session_start();
$con = mysqli_connect('localhost', 'root', '', 'ccs_system');
$num = "";


//Reset

if(isset($_POST["reset"])){

  $sql1 = "UPDATE `student_session` SET `session` = 30";
  if(mysqli_query($con, $sql1)){
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
      title: "All students session has been reseted!"
    });</script>';
  }
}






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

//Delete Admin

if(isset($_POST["delete"])){
    $id = $_POST['idNum'];

    
    
   
    if(!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
  
    echo '<script>Swal.fire({
      title: "Are you sure?",
      text: "You wont be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {';
        $sql = "UPDATE `students` SET `status` = 'FALSE' WHERE `id_number` = '$id'";
  
        if (mysqli_query($con, $sql)) {
            echo 'Swal.fire("Deleted!", "Your file has been deleted.", "success");';
            echo 'window.location.href = "Admin.php";';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
        mysqli_close($con);
        echo '
      }
    });</script>';


   
   
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
          
    $sql = "UPDATE `student_sit_in` SET `status` = 'Finished', `sit_logout` = '$log', `sit_date` = '$logout' WHERE `id_number` = '$id'";
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