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
        .sidebar {
            background-color: #144c94;
            color: #ffffff;
            height: 100vh;
            transition: background-color 0.3s ease;
        }

        .sidebar:hover {
            background-color: #0b2d5f;
        }

        .nav-link {
            color: #ffffff !important;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar py-4 d-flex flex-column">
                <h2 class="sidebar-heading text-center mb-4">Dashboard</h2>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="Profile.php">

                            Edit Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Reservation.php">

                            Reservations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="history.php">

                            History
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="..\..\Login.php">

                            Log out
                        </a>
                    </li>
                </ul>
                <div class="mt-auto"></div> <!-- Push sidebar items to the top -->
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php

loginStudent();
?>