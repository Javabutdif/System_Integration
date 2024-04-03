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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
      #box:hover{
        opacity: 75%;
      }
      </style>
 
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #144c94">
  <a class="navbar-brand text-white " href="Homepage.php">College of Computer Studies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
</nav>
<div class="container container-fluid p-5 m-2 col-6 rounded  "  >
    <h2 class="text-black">Welcome! <?php echo $_SESSION["name"] ?></h2>
</div>

<div class="container">
    <!-- Session Remaining -->
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card p-4 rounded-3 text-center" style="background-color:#144c94;">
                <h5 class="card-title text-white">
                    <img src="/jems/images/time.jpg" class="rounded-circle me-2" style="height:40px; width:40px;" />
                    Session Remaining: <?php echo $_SESSION['remaining']; ?>
                </h5>
            </div>
        </div>
    </div>

    <!-- Other Links -->
    <div class="row">
        <!-- Edit Profile -->
        <div class="col-md-3 mb-4">
            <div class="card p-4 rounded-3 text-center" style="background-color:#144c94;">
                <a href="Profile.php" class="text-white text-decoration-none">
                    <h5 class="card-title">
                        <img src="/jems/images/traced-pen.jpg" class="rounded-circle me-2" style="height:40px; width:40px;" />
                        Edit Profile
                    </h5>
                </a>
            </div>
        </div>

        <!-- Reservations -->
        <div class="col-md-3 mb-4">
            <div class="card p-4 rounded-3 text-center" style="background-color:#144c94;">
                <a href="#" class="text-white text-decoration-none">
                    <h5 class="card-title">
                        <img src="/jems/images/traced-pen.jpg" class="rounded-circle me-2" style="height:40px; width:40px;" />
                        Reservations
                    </h5>
                </a>
            </div>
        </div>

        <!-- Log out -->
        <div class="col-md-3 mb-4">
            <div class="card p-4 rounded-3 text-center" style="background-color:#144c94;">
                <a href="Login.php" class="text-white text-decoration-none">
                    <h5 class="card-title">
                        <img src="/jems/images/traced-pen.jpg" class="rounded-circle me-2" style="height:40px; width:40px;" />
                        Log out
                    </h5>
                </a>
            </div>
        </div>
    </div>
</div>

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
