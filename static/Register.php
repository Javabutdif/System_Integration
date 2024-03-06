
<!doctype html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<link rel="stylesheet" href="jems//css/style.css">
	
	</head>

	
	<body>
	

		<form action="Register.php" method="post" class="form-group container text-center shadow col-8" style="padding-top:5%; background-color: white;">
			
				<h2>Register</h2>
			
			<div style="padding-top:5%;" class="d-block ">
				<input class="border-0 shadow w-25 " placeholder="ID Number" type="text" name="idNumber" required/>
				<br/>
				<br/>
				<input class="border-0 shadow w-25 " placeholder="Last Name" type="text" name="lName" required/>
				<br/>
				<br/>
				<input class="border-0 shadow w-25 " placeholder="First Name" type="text" name="fName" required/>
				<br/>
				<br/>
				<input class="border-0 shadow w-25 " placeholder="Middle Name" type="text" name="mName" required/>
				<br/>
				<br/>
				<input class="border-0 shadow w-25 " placeholder="Course Level" type="text" name="courseLevel" required/>
				<br/>
				<br/>
				<input class="border-0 shadow w-25 " placeholder="Password" type="password" name="password" required/>
				<br/>
				<br/>
				<input class="border-0 shadow w-25 " placeholder="Confirm Password" type="password" name="confirmPassword" required/>
				<br/>
				<br/>
				<input class="border-0 shadow w-25 " placeholder="Email" type="email" name="email" required/>
				<br/>
				<br/>
				<input class="border-0 shadow w-25 " placeholder="Course" type="text" name="course" required/>
				<br/>
				<br/>
				<input class="border-0 shadow w-25 " placeholder="Address" type="text" name="address" required/>
			</div>
			<div style="padding-top:5%; padding-bottom: 5%;" class="d-block gap-4 ">
				<button class="btn btn-primary" type="submit" name="submit">Sign Up</button>
				<a href="Login.php" class="btn btn-danger">Cancel</a>
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
$passWord = $_POST['password'];
$email = $_POST['email'];
$course = $_POST['course'];
$address = $_POST['address'];

// database insert SQL code

$sql = "INSERT INTO `students` (`id_number`, `lastName`, `firstName`, `middleName`, `yearLevel`, `password`, `course`, `email`, `address`, `role`)
 VALUES ('$idNum', '$last_Name', '$first_Name', '$middle_Name', '$course_Level', '$passWord', '$course', '$email', '$address', 'student')";

// insert in database 
if (mysqli_query($con, $sql)) {
	echo '<script>window.alert("Register Successful")</script>'; 
	
	header('Location: Login.php');
}
else{
	
	echo '<script>alert("Error! Duplicate Id Number")</script>'; 
	
}

}



// Close connection
mysqli_close($con);
?>