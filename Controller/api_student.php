<?php

include '..\..\Backend\backend_student.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>CCS | Home</title>



    <style>
        .navbar {
            background-color: #144c94;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
        }

        .navbar-brand:hover,
        .nav-link:hover {
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
            <a class="navbar-brand" href="Homepage.php">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Homepage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Profile.php">Edit Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="history.php">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Reservation.php">Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-warning" href="..\..\Login.php">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php

loginStudent();


if (isset($_POST["submit"])) {
    $idNum = $_POST['idNumber'];
    $last_Name = $_POST['lName'];
    $first_Name = $_POST['fName'];
    $middle_Name = $_POST['mName'];
    $course_Level = $_POST['courseLevel'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $address = $_POST['address'];



    if (edit_student_student($idNum, $last_Name, $first_Name, $middle_Name, $course_Level, $email, $course, $address)) {

        echo "<script>Swal.fire({
    title: 'Notification',
    text: 'Edit Profile Successfull',
    icon: 'success',
    showConfirmButton: false,
    timer: 1500
  });</script>";

        $_SESSION['id_number'] = $idNum;
        $_SESSION['name'] =  $first_Name . " " . $middle_Name . " " . $last_Name;
        $_SESSION["lname"] = $last_Name;
        $_SESSION["fname"] = $first_Name;
        $_SESSION["mname"] = $middle_Name;
        $_SESSION["yearLevel"] = $course_Level;
        $_SESSION["email"] = $email;
        $_SESSION["course"] = $course;
        $_SESSION["address"] = $address;
    } else {

        echo "<script>Swal.fire({
    title: 'Notification',
    text: 'Error! Duplicate ID Number',
    icon: 'error',
    showConfirmButton: false,
    timer: 1500
  });</script>";
    }
}

if(isset($_POST['submit_feedback'])){
    $message = $_POST['feedback_text'];
    $id = $_SESSION['id_number'];

    if(submit_feedback($id,$message)){
        echo "<script>Swal.fire({
        title: 'Notification',
        text: 'Feedback Submitted',
        icon: 'success',
        showConfirmButton: false,
        timer: 1500
    });</script>";
    }
}

?>