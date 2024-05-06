<?php

    include '..\..\Backend\backend_admin.php';

    //Login
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.css
    ">
    
    
    <title>CCS | Home</title>
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
            <a class="navbar-brand" href="Admin.php">College of Computer Studies Admin</a>
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
                        <a class="btn btn-warning" href="..\..\Login.php">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php
     loginAdmin();

     //Delete Student
     if(isset($_POST["deleteStudent"])){
        $id = $_POST['idNum'];
        
        if(delete_student($id)){
            echo '<script>alert("Delete Successful");</script>';
            echo '<script>window.location.href = "Students.php";</script>';
            exit();
        }
        else{
            echo '<script>alert("Delete Unsuccessful");</script>';
            echo '<script>window.location.href = "Students.php";</script>';
            exit();
        }
      }
?>