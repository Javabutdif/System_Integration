
<!doctype html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="/css/style.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</head>
	
	<body>
	

	<h1 style="color: black; text-align:center"> 
		College of Computer Studies
	</h1>
	
	<div class="text-center" >
		
		<form action="Login.php" method="GET" class="form-group container d-block" style="padding-bottom: 30%; padding-top:10%">
			<img src="/jems/images/uc-logo.jpg" class="rounded-circle col-2">
			<img src="/jems/images/ccs logo.jpg" class="rounded-circle col-2">
			<h1>Login</h1>
			</br>
			<div>

			<input class="border-0 shadow w-50 " placeholder="Id Number" type="text" name="idNum" required/>
			
			</div>
			</br>
			</br>
			<input class="border-0 shadow w-50 " placeholder="Password" type="password" name="password" required/>
			
			</br>
			</br>
			<button type="submit" name="submit" class="btn btn-outline-primary ">Login</button>
			</br>
		</br>
			<p class="text-black">
				No Account? Click <a style="color: dodgerblue;" href="Register.php">here!</a>
			</p>
			
		</form>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>

	
</html>





<?php
	
	session_start();
	

	

	if(isset($_GET["submit"])){
		$idNum = $_GET["idNum"];
		$password = $_GET["password"];

		$con = mysqli_connect('localhost', 'root', '', 'ccs_system');

		$sql = "SELECT * FROM students WHERE id_number = '$idNum' AND password = '$password'";
		$result = mysqli_query($con, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if($user["role"] != null){
			
			$_SESSION['id_number'] = $user["id_number"];
			$_SESSION['name'] =  $user["firstName"]." ".$user["middleName"]." ".$user["lastName"];
			$_SESSION['yearLevel'] = $user["yearLevel"];
			$_SESSION['course'] = $user["course"];
			$_SESSION['email'] = $user["email"];
			$_SESSION['address'] = $user["address"];
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


?>
