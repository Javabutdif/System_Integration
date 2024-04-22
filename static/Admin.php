
<?php
  session_start();
  error_reporting(0);
  include('backend.php');

  if($_SESSION["admin_id_number"] == 0  ){
    header("Location: Login.php");
		exit();
	} 

  $number = " SELECT count(id_number) as id from students where status = 'TRUE';";
    $stats = "SELECT count(sit_id) as id from student_sit_in where status = 'Active';";
    $result = mysqli_query($con, $number);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //
    $result1 = mysqli_query($con, $stats);
    $user1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .navbar {
            background-color: #144c94;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: yellow !important;
        }
        .dashboard-card {
            background-color: #007bff;
            color: white;
            border-radius: 10px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="Admin.php">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Admin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a type="button" class="nav-link" data-toggle="modal" data-target="#exampleModal">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Students.php">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Records.php">Sit-in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ViewRecords.php">View Sit-in Records</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Report.php">Generate Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-warning" href="Login.php">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
    <h1 class="text-center mb-4">Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-primary dashboard-card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-3">Students Registered</h2>
                    <p class="card-text text-center fs-3"><?php echo $user['id']; ?></p>
                    <button class="btn btn-light btn-block" onclick="viewRegisteredStudents()">View Details</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-primary dashboard-card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-3">Currently Sit-in</h2>
                    <p class="card-text text-center fs-3"><?php echo $user1['id']; ?></p>
                    <button class="btn btn-light btn-block" onclick="viewSitInStudents()">View Details</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function viewRegisteredStudents() {
        // Add your code to display registered students' details
        alert('Functionality to view registered students will be implemented soon.');
    }

    function viewSitInStudents() {
        // Add your code to display currently sit-in students' details
        alert('Functionality to view sit-in students will be implemented soon.');
    }
</script>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <script>
        <?php
            if($_SESSION["admin_id"] === 1){
                echo "Swal.fire({
                        title: 'Successful Login',
                        text: 'Welcome, {$_SESSION["admin_name"]}!',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    });";
                $_SESSION["admin_id"] = 0;
            }
        ?>
    </script>
</body>
</html>
