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
<div class="container container-fluid d-inline-flex w-100">
  <div class="container container-fluid p-5 m-5 col-3 rounded " style="background-color:#144c94;" >

    <h5 class="text-white">   <img src="/jems/images/time.jpg" class="rounded-circle" style="height:40px; width:40px"/>Session Remaining: 30</h5>

  </div>


      <div id="box" class="container container-fluid p-5 m-5 col-4  rounded" style="background-color:#144c94;" >
      <a href="Profile.php" style="width: 100%;" >
      <h5 class="text-white" type="submit"> <img src="/jems/images/traced-pen.jpg" class="rounded-circle" style="height:50px; width:50px"/>Edit Profile</h5>
    </a>
     </div>
      

  
  <div id="box" class="container container-fluid p-5 m-5 col-4  rounded" style="background-color:#144c94;" >
  <a href="#" style="width: 100%;" >
    <h5 class="text-white"> <img src="/jems/images/traced-pen.jpg" class="rounded-circle" style="height:50px; width:50px"/>View Sessions</h5>
  </a>
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
