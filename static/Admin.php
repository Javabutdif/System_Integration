<?php
  session_start();
  if($_SESSION["id_number"] == 0 || $_SESSION["id_number"] != 1 ){
    header("Location: Login.php");
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <title>Admin</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #144c94">
  <a class="navbar-brand text-white" href="#">CCS Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-white"  href="Admin.php">Home</a>
      </li>
      <li class="nav-item">
        <a type="button" class="nav-link text-white" data-toggle="modal" data-target="#exampleModal">Search</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Delete</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="#">Sit-In</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">View Sit-in Records</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-white" href="#">Generate Reports</a>
      </li>
      <li class="nav-item">
        <a class="btn nav-link text-warning"  href="Login.php">Log out</a>
      </li>
    </ul>
  </div>
</nav>
<h1>This is Admin</h1>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center " id="exampleModalLabel">Search Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <input type="text" name="searchBar" placeholder="Search...">
      </div>
      <div class="modal-footer">
        
        <button type="button" name="search" class="btn btn-primary">Search</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
  <?php
    if($_SESSION["id"] === 1){
      echo "Swal.fire({
              title: 'Successful Login',
              text: 'Welcome, {$_SESSION["name"]}!',
              icon: 'success'
            });";
      $_SESSION["id"] = 0;
    }
  ?>
</script>
</body>
</html>

<?php


?>
