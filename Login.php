<?php
include 'Controller\api_index.php';
	
	session_check();
?>
<!doctype html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
	</head>

	<body>
	<h1 style="color: black; text-align:center"> 
		College of Computer Studies Sit-In Monitoring System
	</h1>
	<section class="vh-100" >
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5 ">
        <img src="/jems/images/ccsLogo.png"
          class="img-fluid h-75 w-100" alt="CCS Logo" >
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

        <form action="Login.php" method="GET">




          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid id number" name="idNum" required />
            <label class="form-label" for="form3Example3">ID Number</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" name="password" required />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg" name="submit"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="Register.php"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2024. All rights reserved.
    </div>


</section>
	</body>

	
</html>

<?php
	if($_GET['num']==1){
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
			title: "Register Successfuly!"
		  });</script>';
	}
	//Session check
	

		if(isset($_GET["submit"])){
			$idNum = $_GET["idNum"];
			$password = $_GET["password"];
		
			if($idNum == "admin" && $password == "admin"){
				$_SESSION['admin_name'] = 'admin';
				$_SESSION['admin_id_number'] = 1;
				$_SESSION["admin_id"] = 1;
				echo '<script>window.location.href = "View/Admin/Admin.php";</script>';
			}
			else{
		
			$con = mysqli_connect('localhost', 'root', '', 'ccs_system');
		
			$sql = " SELECT students.id_number, students.firstName, students.middleName,
			students.lastName, students.yearLevel , students.email, students.course, students.address, student_session.session
			 from students inner join student_session on students.id_number 
			 = student_session.id_number WHERE students.id_number = '$idNum' AND students.password = '$password'";
			$result = mysqli_query($con, $sql);
			$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
			
			if($user["id_number"] != null){
				
				$_SESSION['id_number'] = $user["id_number"];
				$_SESSION['name'] =  $user["firstName"]." ".$user["middleName"]." ".$user["lastName"];
				$_SESSION["lname"] = $user["lastName"];
				$_SESSION["fname"] = $user["firstName"];
				$_SESSION["mname"] = $user["middleName"];
				$_SESSION["yearLevel"] = $user["yearLevel"];
				$_SESSION["email"] = $user["email"];
				$_SESSION["course"] = $user["course"];
				$_SESSION["address"] = $user["address"];
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
	

	


?>


