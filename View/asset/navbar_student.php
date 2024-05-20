<?php
    include '../../Controller/api_student.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Notification
                    </a>
                    <div class="dropdown-menu bg-light " aria-labelledby="navbarDropdown">
                        <div style="overflow-x: auto; max-height: 390px; width:20rem">
                        
                            <?php foreach(retrieve_notification($_SESSION['id_number']) as $row) : ?>
                                <ul>
                                    <li>
                                    <small class="dropdown-item" style="word-wrap: break-word; white-space: normal;">
                                        <strong><?php echo $row['message']; ?></strong>
                                    </small>
                                    <hr>
                                    </li>
                                </ul>
                                <br>
                              
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>

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


    
</body>

</html>