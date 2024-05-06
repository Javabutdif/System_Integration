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
  

      <div class="col-md-9 py-4">
        <div class="container container-fluid p-5 m-2 col-6 rounded">
          <h2 class="text-black">Welcome! <?php echo $_SESSION["name"] ?></h2>
        </div>

        <div class="row">
          <!-- Session Remaining -->
          <div class="col-md-3 mb-4">
            <div class="card p-4 rounded-3 text-center bg-primary" >
              <h5 class="card-title text-white">
                <img src="../../images/time.jpg" class="rounded-circle me-2" style="height:40px; width:40px;" />
                Session Remaining: <?php echo $_SESSION['remaining']; ?>
              </h5>
            </div>
          </div>
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
