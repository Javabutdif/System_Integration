<?php 
    
     session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">College of Computer Studies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link"  href="Homepage.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Profile.php">Edit Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sit in</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">View Sessions</a>
      </li>
      <li class="nav-item">
        <a class="btn nav-link"  style="color:red" href="Login.php">Log out</a>
      </li>
    </ul>
  </div>
</nav>
<form action="Profile.php" method="post" class="form-group container text-center shadow col-8" style="padding-top:5%; background-color: white;">
			
				<h2>Edit Profile</h2>
			
			<div style="padding-top:5%;" class="d-block ">
				<input class="border-0 shadow w-25 " value="<?php echo $_SESSION["id_number"]; ?>" placeholder="ID Number" type="text" name="idNumber" readonly/>
				<br/>
				<br/>
				<input class="border-0 shadow w-25 " value="<?php echo $_SESSION["lname"]; ?>" placeholder="Last Name" type="text" name="lName" required/>
				<br/>
				<br/>
				<input class="border-0 shadow w-25 " value="<?php echo $_SESSION["fname"]; ?>" placeholder="First Name" type="text" name="fName" required/>
				<br/>
				<br/>
				<input class="border-0 shadow w-25 " value="<?php echo $_SESSION["mname"]; ?>" placeholder="Middle Name" type="text" name="mName" required/>
				<br/>
				<br/>
				<input class="border-0 shadow w-25 " value="<?php echo $_SESSION["yearLevel"]; ?>" placeholder="Course Level" type="text" name="courseLevel" required/>
				<br/>
				<br/>
				<input class="border-0 shadow w-25 " value="<?php echo $_SESSION["email"]; ?>" placeholder="Email" type="email" name="email" required/>
				<br/>
				<br/>
				<input class="border-0 shadow w-25 " value="<?php echo $_SESSION["course"]; ?>" placeholder="Course" type="text" name="course" required/>
				<br/>
				<br/>
				<input class="border-0 shadow w-25 " value="<?php echo $_SESSION["address"]; ?>" placeholder="Address" type="text" name="address" required/>
			</div>
			<div style="padding-top:5%; padding-bottom: 5%;" class="d-block gap-4 ">
				<button class="btn btn-primary" type="submit" name="submit">Sign Up</button>
				<a href="Homepage.php" class="btn btn-danger">Cancel</a>
			</div>

		</form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


<?php
$con = mysqli_connect('localhost', 'root', '', 'ccs_system');






// get the post records
if(isset($_POST["submit"])){
$idNum =$_POST['idNumber'];
$last_Name = $_POST['lName'];
$first_Name = $_POST['fName'];
$middle_Name = $_POST['mName'];
$course_Level = $_POST['courseLevel'];
$email = $_POST['email'];
$course = $_POST['course'];
$address = $_POST['address'];

// database insert SQL code

$sql = "UPDATE `students` SET  `lastName` = '$last_Name', `firstName`= '$first_Name', `middleName`= '$middle_Name', `yearLevel`= '$course_Level', `course` = '$course', `email` = '$email', `address`= '$address' WHERE `id_number` = '$idNum'";
 

// insert in database 
if (mysqli_query($con, $sql)) {
	
  echo '<script>Swal.fire({
    icon: "success",
    title: "Successful",
    text: "You have change your profile",
    
    });</script>'; 
	    $_SESSION['name'] =  $first_Name." ".$middle_Name." ".$last_Name;
			$_SESSION['fname'] = $first_Name;
			$_SESSION['lname'] = $last_Name;
			$_SESSION['mname'] = $middle_Name;
			$_SESSION['yearLevel'] = $course_Level;
			$_SESSION['course'] = $course;
			$_SESSION['email'] = $email;
			$_SESSION['address'] = $address;
}
else{
	
	echo '<script>alert("Error! Duplicate Id Number")</script>'; 
	
}

}



// Close connection
mysqli_close($con);
?>

<script>
  
  function call(){
    Swal.fire({
  title: "Successful!",
  text: "",
  icon: "success"
});
    
  }
 


    </script>