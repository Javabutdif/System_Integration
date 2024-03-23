<?php

error_reporting(0);

?>
<!doctype html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<link rel="stylesheet" href="jems/css/style.css">

       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
	</head>

	
	<body style="background-color: #eee;">
		
	<form action="Add.php"method="POST">
	<section class="vh-100" >
		
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
			  <a class="btn btn-danger" href="Admin.php">Back</a>
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Add Student</p>

                <form class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="idNumber" class="form-control" name="idNumber" required />
                      <label class="form-label" for="idNumber">ID Number</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="lName" class="form-control" name="lName" required />
                      <label class="form-label" for="lName">Last Name</label>
                    </div>
                  </div>

				  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="fName" class="form-control" name="fName" required />
                      <label class="form-label" for="fName">First Name</label>
                    </div>
                  </div>

				  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="mName" class="form-control" name="mName" required />
                      <label class="form-label" for="mName">Middle Name</label>
                    </div>
                  </div>

				  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                   
            <select name="level" id="level" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
           
            </select>
            <label class="form-label" for="level">Course Level</label>
     
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="password" class="form-control" name="password" required />
                      <label class="form-label" for="password">Password</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" name="confirmPassword" required />
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                    </div>
                  </div>

				  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="email" class="form-control" name="email" required />
                      <label class="form-label" for="email">Email</label>
                    </div>
                  </div>

				  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0"> 
                            
            <select name="course" id="course" class="form-control">
                <option value="BSIT">BSIT</option>
                <option value="BSCS">BSCS</option>
                <option value="ACT">ACT</option>
             
           
            </select>
            
     
                      <label class="form-label" for="course">Course</label>
                    </div>
                  </div>

				  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="address" class="form-control" name="address" required />
                      <label class="form-label" for="address">Address</label>
                    </div>
                  </div>

				  

              

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button class="btn btn-primary btn-lg"  type="submit" name="submitRegister">Register</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="/jems/images/sign.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
	</form>
	



	

			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>

<script>
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

$sql1 = "INSERT INTO `students` (`id_number`, `lastName`, `firstName`, `middleName`, `yearLevel`, `password`, `course`, `email`, `address`, `status`)
 VALUES ('$idNum', '$last_Name', '$first_Name', '$middle_Name', '$course_Level', '$passWord', '$course', '$email', '$address', 'TRUE')";
$sql2 = "INSERT INTO `student_session` (`id_number` , `session`) VALUES ('$idNum', 30)";
 

// insert in database 
if (mysqli_query($con, $sql1) && mysqli_query($con, $sql2) ) {
	
    echo "Swal.fire({
        title: 'Notification',
        text: 'Student Added!',
        icon: 'success',
        showConfirmButton: false,
        timer: 1500
      });";
}
else{
	

    echo "Swal.fire({
        title: 'Notification',
        text: 'Error! Duplicate ID Number',
        icon: 'error',
        showConfirmButton: false,
        timer: 1500
      });";
}
mysqli_close($con);
}


//Modal Admin




?>

</script>