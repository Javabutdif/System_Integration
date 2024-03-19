<?php 
session_start();
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

$sql1 = "INSERT INTO `students` (`id_number`, `lastName`, `firstName`, `middleName`, `yearLevel`, `password`, `course`, `email`, `address`)
 VALUES ('$idNum', '$last_Name', '$first_Name', '$middle_Name', '$course_Level', '$passWord', '$course', '$email', '$address')";
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


//Modal Admin




?>