<?php
session_start();	
	error_reporting(0);
	
	
?>
<!doctype html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="/css/style.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
        body {
            background-color: #f8f9fa; /* Set background color */
        }

        h1 {
            color: black;
            text-align: center;
            margin-top: 50px; /* Add some top margin for spacing */
        }

        .container-fluid {
            height: 100vh; /* Make the container full height */
        }

        .form-outline {
            margin-bottom: 20px; /* Add margin between form fields */
        }

        .btn-primary {
            width: 100%; /* Make the login button full width */
        }

        .footer {
            background-color: #007bff; /* Set footer background color */
            color: white;
            padding: 15px;
            text-align: center;
        }
    </style>
	</head>
	
	<body>
	
<h1>College of Computer Studies Sit-In Monitoring System</h1>

<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="/jems/images/ccsLogo.png" class="img-fluid h-75 w-100" alt="CCS Logo">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="Login.php" method="GET">
                    <div class="form-outline">
                        <input type="text" id="form3Example3" class="form-control form-control-lg"
                               placeholder="Enter a valid ID number" name="idNum" required>
                        <label class="form-label" for="form3Example3">ID Number</label>
                    </div>
                    <div class="form-outline">
                        <input type="password" id="form3Example4" class="form-control form-control-lg"
                               placeholder="Enter password" name="password" required>
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3">
                        <label class="form-check-label" for="form2Example3">
                            Remember me
                        </label>
                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg" name="submit">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="Register.php"
                                                                                           class="link-danger">Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container">
        Copyright © 2024. All rights reserved.
    </div>
</footer>
	
	
	

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
	if($_SESSION["id_number"] != 0 || $_SESSION["admin_id_number"] != 0){
		session_destroy();
		}

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


