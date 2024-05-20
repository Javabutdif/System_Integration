<?php
require_once '../asset/navbar_student.html';
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
      <div class="card" style="max-width: 20rem;">
        <h5 class="card-header text-white text-center" style="background-color:#144c94">Student Information</h5>
        <div class="card-body text-center">
          <img class="card-img rounded-circle" style="max-height:10rem; max-width:10rem;" src="../../images/hutao.webp">
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
        <div class="card mb-4" style="width: 30rem; height:32.5rem">
          <h5 class=" card-header text-white " style="background-color:#144c94"><i class="fa-solid fa-bullhorn"></i> Announcement</h5>
          <div class="card-body" id="card-background">

            <div style="overflow-y: auto; max-height: 430px;">
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
    

      </div>
      <div class="card">
        <div class=" card-header text-white" style="background-color:#144c94">Rules and Regulation</div>
        <div class="card-body container-fluid position-sticky " style="width:32rem;height:25rem;">
          <div style="overflow-y: auto; max-height: 440px; ">
            <h5 class="text-center"><strong>University of Cebu</strong></h5>
            <p class="mb-2 text-center"><strong>COLLEGE OF INFORMATION & COMPUTER STUDIES</strong></p>
            <br>
            <p><strong>LABORATORY RULES AND REGULATIONS</strong></p>
            <p>To avoid embarrassment and maintain camaraderie with your friends and superiors at our laboratories, please observe the following:</p>
            <p>1. Maintain silence, proper decorum, and discipline inside the laboratory. Mobile phones, walkmans and other personal pieces of equipment must be switched off.</p>
            <p>2. Games are not allowed inside the lab. This includes computer-related games, card games and other games that may disturb the operation of the lab.</p>
            <p>3. Surfing the Internet is allowed only with the permission of the instructor. Downloading and installing of software are strictly prohibited.</p>
            <p>4. Getting access to other websites not related to the course (especially pornographic and illicit sites) is strictly prohibited.</p>
            <p>5. Deleting computer files and changing the set-up of the computer is a major offense.</p>
            <p>6. Observe computer time usage carefully. A fifteen-minute allowance is given for each use. Otherwise, the unit will be given to those who wish to "sit-in".</p>
            <p>7. Observe proper decorum while inside the laboratory.</p>
            <ul>
              <li>Do not get inside the lab unless the instructor is present.</li>
              <li>All bags, knapsacks, and the likes must be deposited at the counter.</li>
              <li>Follow the seating arrangement of your instructor.</li>
              <li>At the end of class, all software programs must be closed.</li>
              <li>Return all chairs to their proper places after using.</li>
            </ul>
            <p>8. Chewing gum, eating, drinking, smoking, and other forms of vandalism are prohibited inside the lab.</p>
            <p>9. Anyone causing a continual disturbance will be asked to leave the lab. Acts or gestures offensive to the members of the community, including public display of physical intimacy, are not tolerated.</p>
            <p>10. Persons exhibiting hostile or threatening behavior such as yelling, swearing, or disregarding requests made by lab personnel will be asked to leave the lab.</p>
            <p>11. For serious offense, the lab personnel may call the Civil Security Office (CSU) for assistance.</p>
            <p>12. Any technical problem or difficulty must be addressed to the laboratory supervisor, student assistant or instructor immediately.</p>
            <br>
            <p><strong>DISCIPLINARY ACTION</strong></p>
            <ul>
              <li>First Offense - The Head or the Dean or OIC recommends to the Guidance Center for a suspension from classes for each offender.</li>
              <li>Second and Subsequent Offenses - A recommendation for a heavier sanction will be endorsed to the Guidance Center.</li>
            </ul>
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