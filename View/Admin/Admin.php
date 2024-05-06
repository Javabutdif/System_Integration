
<?php
    include '../../Controller/api_admin.php';
 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    
</head>
<body>
  

   <div class="container mt-5">
    <h1 class="text-center mb-4">Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card bg-primary dashboard-card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-3">Students Registered</h2>
                    <p class="card-text text-center fs-3"><?php echo retrieve_students_dashboard(); ?></p>
                    <button class="btn btn-light btn-block" onclick="viewRegisteredStudents()">View Details</button>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card bg-primary dashboard-card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-3">Currently Sit-in</h2>
                    <p class="card-text text-center fs-3"><?php echo retrieve_current_sit_in_dashboard(); ?></p>
                    <button class="btn btn-light btn-block" onclick="viewSitInStudents()">View Details</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card bg-primary dashboard-card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-3">Total Sit-in</h2>
                    <p class="card-text text-center fs-3"><?php echo retrieve_total_sit_in_dashboard(); ?></p>
                    <button class="btn btn-light btn-block" onclick="viewTotalSitInStudents()">View Details</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function viewRegisteredStudents() {
        // Add your code to display registered students' details
        window.location.href = "Students.php";
    }

    function viewSitInStudents() {
        // Add your code to display currently sit-in students' details
        window.location.href = "Records.php";
    }
    function viewTotalSitInStudents(){
        window.location.href = "Report.php";
    }
</script>




    
</body>
</html>
