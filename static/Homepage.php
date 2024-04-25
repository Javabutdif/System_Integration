<?php
 
  session_start();
  if($_SESSION["id_number"] == 0){
    header("Location: Login.php");
  
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom styles */
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
              <img src="/jems/images/traced-pen.jpg" class="rounded-circle me-2" style="height:40px; width:40px;" />
              Edit Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Reservation.php">
              <img src="/jems/images/traced-pen.jpg" class="rounded-circle me-2" style="height:40px; width:40px;" />
              Reservations
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="history.php">
              <img src="/jems/images/traced-pen.jpg" class="rounded-circle me-2" style="height:40px; width:40px;" />
              History
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Login.php">
              <img src="/jems/images/traced-pen.jpg" class="rounded-circle me-2" style="height:40px; width:40px;" />
              Log out
            </a>
          </li>
        </ul>
        <div class="mt-auto"></div> <!-- Push sidebar items to the top -->
      </div>

      <!-- Main Content -->
      <div class="col-md-9 py-4">
        <div class="container container-fluid p-5 m-2 col-6 rounded">
          <h2 class="text-black">Welcome! <?php echo $_SESSION["name"] ?></h2>
        </div>

        <div class="row">
          <!-- Session Remaining -->
          <div class="col-md-3 mb-4">
            <div class="card p-4 rounded-3 text-center" style="background-color:#144c94;">
              <h5 class="card-title text-white">
                <img src="/jems/images/time.jpg" class="rounded-circle me-2" style="height:40px; width:40px;" />
                Session Remaining: <?php echo $_SESSION['remaining']; ?>
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



<script>
  
  if(<?php echo $_SESSION["id"]; ?> === 1){
    Swal.fire({
  title: "Successful Login!",
  text: "Welcome! <?php echo $_SESSION["name"]; ?>",
  icon: "success"
});
    <?php $_SESSION["id"] = 0;?>
  }
 


    </script>
