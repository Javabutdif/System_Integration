<?php
include '../../Controller/api_admin.php';

$listPerson = retrieve_students();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Student</title>

</head>

<body>

  <h1 class="text-center">Students Information</h1>
  <br>

  <!-- Table -->
  <div class="container d-flex flex-row  gap-3 ">
    <a class="btn btn-primary " href="Add.php">Add Students</a>

    <button class="btn btn-danger" id="resetButton">Reset All Session</button>

  </div>


  <div class="container">
    <table id="example" class="table table-striped table-hover display compact " style="width:100%">
      <thead style="background-color: #144c94">
        <tr>
          <th>ID Number</th>
          <th>Name</th>
          <th>Year Level</th>
          <th>Course</th>
          <th>Remaining Session</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($listPerson as $person) : ?>
          <tr>
            <td><?php echo $person['id_number']; ?></td>
            <td><?php echo $person['firstName'] . " " . $person['middleName'] . ". " . $person['lastName']; ?></td>
            <td><?php echo $person['yearLevel']; ?></td>
            <td><?php echo $person['course']; ?></td>
            <td><?php echo $person['session']; ?></td>

            <td class="align-middle">
              <div class="d-flex justify-content-center align-items-center gap-3">
                <form action="Admin.php" method="POST">
                  <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                  <input type="hidden" name="idNum" value="<?php echo $person['id_number']; ?>" />
                </form>
                <form action="Students.php" method="POST" class="delete-form">
                  <input type="hidden" name="idNum" value="<?php echo $person['id_number']; ?>" />
                  <button type="submit" name="deleteStudent" class="btn btn-danger mr-2" onclick="return confirm('Are you sure you want to delete this Student?')">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <br>
  <br>


  <script>
    new DataTable('#example');
  </script>


  <script>
    document.getElementById("deleteBtn").addEventListener("click", function() {
      event.preventDefault();
      if (confirm("Are you sure you want to delete this Student?")) {
        document.getElementById("deleteForm").submit();
      }
    });
  </script>

</body>

</html>

<script>
  document.getElementById("resetButton").addEventListener("click", function() {
    Swal.fire({
      title: "Do you want to reset the session?",
      showCancelButton: true,
      confirmButtonText: "Reset",

    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        // Proceed with reset
        resetSession();
      } else if (result.isDenied) {
        Swal.fire("Action canceled", "", "info");
      }
    });
  });

  function resetSession() {
    // Send an AJAX request to trigger the PHP script
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "Students.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // If the request is successful, show a success message
          Swal.fire("Session reset!", "", "success");
        } else {
          // If there's an error, show an error message
          Swal.fire("Error", "Failed to reset session", "error");
        }
      }
    };
    xhr.send("reset=true"); // Sending the reset parameter
  }
</script>


<?php
if (isset($_POST["reset"])) {
  $db = Database::getInstance();
  $con = $db->getConnection();

  $sql1 = "UPDATE `student_session` SET `session` = 30";
  if (mysqli_query($con, $sql1)) {
    // Return a success response
    http_response_code(200);
    exit; // Exit to prevent further output
  } else {
    // Return an error response
    http_response_code(500);
    exit; // Exit to prevent further output
  }
}


?>