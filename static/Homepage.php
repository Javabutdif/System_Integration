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
 
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">College of Computer Studies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="Homepage.php" >Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Profile.php">Edit Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sit in</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">View Sessions</a>
      </li>
      <li class="nav-item">
        <a class="btn nav-link"  style="color:red" href="Login.php">Log out</a>
      </li>
    </ul>
  </div>
</nav>

<h1>
<?php
 echo $_SESSION["name"];
?>

</h1>
  
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
