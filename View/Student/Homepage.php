<?php

include '../../Controller/api_student.php';
$announce = view_announcement();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

</head>

<body>

  <div class="row ms-1">
    <div class="d-flex flex-row container pt-2 gap-3" style="margin-right:18%">
      <div class="card " style="width: 20rem; height:32rem">
        <h5 class=" card-header text-white text-center " style="background-color:#144c94">Student Information</h5>
        <div class="card-body text-center">
          <img class=" card-img rounded-circle" style="height:10rem;width:10rem" src="../../images/hutao.webp">
          <hr>
          <p class="card-text text-left"><i class="fa-solid fa-user-large"></i> <strong>Name:</strong> <?php echo $_SESSION['name']; ?></p>
          <p class="card-text text-left"><i class="fa-solid fa-graduation-cap"></i> <strong>Course:</strong> <?php echo $_SESSION['course']; ?></p>
          <p class="card-text text-left"><i class="fa-solid fa-arrow-up-9-1"></i> <strong>Year:</strong> <?php echo $_SESSION['yearLevel']; ?></p>
          <p class="card-text text-left"><i class="fa-solid fa-envelope"></i> <strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
          <p class="card-text text-left"><i class="fa-solid fa-address-card"></i> <strong>Address:</strong> <?php echo $_SESSION['address']; ?></p>
          <p class="card-text text-left"><i class="fa-solid fa-stopwatch-20"></i> <strong>Session:</strong> <?php echo $_SESSION['remaining']; ?></p>

        </div>
      </div>

      <div class="column">
        <div class="card mb-4" style="width: 30rem; height:17rem">
          <h5 class=" card-header text-white " style="background-color:#144c94">Announcement</h5>
          <div class="card-body" id="card-background">

            <div style="overflow-y: auto; max-height: 200px;">
              <p> <?php foreach ($announce as $row) : ?>
              <p><strong><?php echo $row['admin_name'] . " | " . $row['date'] ?></strong></p>
              <div class="card-body bg-light w-100">
                <p><?php echo $row['message'] ?></p>
              </div>
              <hr>
            <?php endforeach; ?>
            </div>
          </div>

        </div>
        <div class="card " style="height:42%">
          <div class=" card-header text-white" style="background-color:#144c94">Feedback and Report</div>
          <div class="card-body">
            <label for="an">Enter Feedback</label>
            <form action="Homepage.php" method="POST">
              <input type="text" name="feedback_text" id="an" class="form-control form-text">
              <button type="submit" name="submit_feedback" class="btn btn-primary mt-2">Submit</button>
            </form>


          </div>
        </div>
      </div>

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