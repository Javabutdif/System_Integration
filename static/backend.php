<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Backend</title>
</head>
<body>
    
</body>
</html>

<?php 
session_start();
$con = mysqli_connect('localhost', 'root', '', 'ccs_system');
$num = "";


//Login



if(isset($_GET["submit"])){
    $idNum = $_GET["idNum"];
    $password = $_GET["password"];

    if($idNum == "admin" && $password == "admin"){
        $_SESSION['admin_name'] = 'admin';
        $_SESSION['admin_id_number'] = 1;
        $_SESSION["admin_id"] = 1;
        header('Location: Admin.php');
    }
    else{

    $con = mysqli_connect('localhost', 'root', '', 'ccs_system');

    $sql = " SELECT students.id_number, students.firstName, students.middleName,
    students.lastName, student_session.session
     from students inner join student_session on students.id_number 
     = student_session.id_number WHERE students.id_number = '$idNum' AND students.password = '$password'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if($user["id_number"] != null){
        
        $_SESSION['id_number'] = $user["id_number"];
        $_SESSION['name'] =  $user["firstName"]." ".$user["middleName"]." ".$user["lastName"];

        $_SESSION['remaining'] = $user["session"];
        $_SESSION["id"] = 1;
    
        header("Location: Homepage.php");	
    }
    else
    {
        echo '<script>Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Incorret ID Number and Password!",
            
          });</script>'; 
    }
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
  $login = date('Y-m-d');
  
  
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

//Delete Admin

if(isset($_POST["delete"])){
    $id = $_POST['idNum'];
    $con = mysqli_connect('localhost', 'root', '', 'ccs_system');
    if(!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
   
    $sql = "UPDATE `students` SET `status` = 'FALSE' WHERE `id_number` = '$id'";
  
    if (mysqli_query($con, $sql)) {
        echo '<script>';
        echo 'alert("Delete Student Successful!");';
        echo 'window.location.href = "Admin.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
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