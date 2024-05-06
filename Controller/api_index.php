<?php

    include 'Backend\backend_index.php';

    if(session_check()){
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
		.divider:after,
        .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
        }
        .h-custom {
        height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
        .h-custom {
        height: 100%;
        }
        }
		</style>

</head>
<body>

	
	

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<?php

//Login
if(isset($_POST["submit"])){
    $idNum = $_POST["idNum"];
    $password = $_POST["password"];

    //Admin Login
    if(admin_login($idNum,$password)){
        $_SESSION['admin_name'] = 'admin';
        $_SESSION['admin_id_number'] = 1;
        $_SESSION["admin_id"] = 1;
        echo '<script>window.location.href = "View/Admin/Admin.php";</script>';
    }
    else{

    $user = student_login($idNum,$password);
    
    if($user['id_number'] != null){
        
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
    
        echo '<script>window.location.href = "View/Student/Homepage.php";</script>';	
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

//Register

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
    
    if(student_register($idNum,$last_Name,$first_Name,$middle_Name,$course_Level,$passWord,$course,$email,$address)){
        echo '<script>alert("Registration Successful");</script>';
        echo '<script>window.location.href = "Login.php";</script>';
        exit(); 
    }
    else{
        echo '<script>Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Duplicate Id Number!",
            
          });</script>';
          exit();
    }
    
    }


?>