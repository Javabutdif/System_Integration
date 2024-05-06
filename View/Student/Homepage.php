<?php

include '../../Controller/api_student.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

</head>

<body>

  <div class="container px-5 py-5 m-5 ">
    <div class="card " style="width: 15rem;">
      <h5 class=" card-header text-white " style="background-color:#074873">Remaining Session</h5>
      <div class="card-body">
        <p class="card-title"><?php echo $_SESSION['remaining']; ?></p>

      </div>
    </div>
  </div>






</body>

</html>



<script>
  if (<?php echo $_SESSION["id"]; ?> === 1) {
    Swal.fire({
      title: "Successful Login!",
      text: "Welcome! <?php echo $_SESSION["name"]; ?>",
      icon: "success"
    });
    <?php $_SESSION["id"] = 0; ?>
  }
</script>