<?php
 
  session_start();
  if($_SESSION["id_number"] == null){
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
      li:hover{
        background-color: ;
      }
      </style>
 
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #144c94">
  <a class="navbar-brand text-white " href="#">College of Computer Studies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-white " href="Homepage.php" >Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="Profile.php">Edit Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="#">Sit in</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="#">View Sessions</a>
      </li>
      <li class="nav-item" >
        <a class="btn nav-link  "  style="color:red;" href="Login.php">Log out</a>
      </li>
    </ul>
  </div>
</nav>

<div id="box" class="container container-fluid p-5 m-2 col-6 rounded  " style="background-color:#144c94;" >
    <h2 class="text-white">Welcome! <?php echo $_SESSION["name"] ?></h2>
</div>

<div id="box" class="container container-fluid p-5 m-2 col-3 rounded " style="background-color:#144c94;" >
    <h5 class="text-white">Session Remaining: </h5>

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
