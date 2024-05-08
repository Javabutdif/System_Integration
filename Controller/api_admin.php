<?php
include '..\..\Backend\backend_admin.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-nrZw6K5mh7Pdc0eo+eX+56dD5w0UKqNwKAU9PIO8KjkvRdK2AZzU6vXfb4rIWj80" crossorigin="anonymous">



  <title>CCS | Home</title>

</head>
</head>

<body>

</body>

</html>

<?php



//Login


loginAdmin();

//Object Student
class Student
{
  // Properties (attributes)
  public  $id;
  public  $name;
  public  $records;

  // Constructor method

  public function __construct($id, $name, $records)
  {
    $this->id = $id;
    $this->name = $name;
    $this->records = $records;
  }
}
//Delete Student
if (isset($_POST["deleteStudent"])) {
  $id = $_POST['idNum'];

  if (delete_student($id)) {
    echo '<script>alert("Delete Successful");</script>';
    echo '<script>window.location.href = "Students.php";</script>';
    exit();
  } else {
    echo '<script>alert("Delete Unsuccessful");</script>';
    echo '<script>window.location.href = "Students.php";</script>';
    exit();
  }
}


if (isset($_GET["search"])) {
  $search = $_GET["searchBar"];

  //Search Student Method
  $retrieve = search_student($search);

  if ($retrieve->num_rows > 0) {

    $user = $retrieve->fetch_assoc();
    $record = retrieve_student_session($user['id_number']);

    $student = new Student($user["id_number"], $user["firstName"] . " " . $user["middleName"] . " " . $user["lastName"], $record["session"]);


    $displayModal = true;
  } else {
    echo '<script>const Toast = Swal.mixin({
              toast: true,
              position: "top-end",
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
              }
            });
            Toast.fire({
              icon: "error",
              title: "No student found!"
            });</script>';
  }
}

// get the post records
if (isset($_POST["sitIn"])) {

  $idNum = $_POST['studentID'];
  $purpose = $_POST['purpose'];
  $lab = $_POST['lab'];
  $login = date("h:i:sa");

  $sesions = retrieve_student_session($idNum);


  if ($sesions["session"] == 0) {
    echo '<script>Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Student Session is 0!",
  
    });</script>';
  } else {

    //Check if the student is currently sit in
    $check = check_student_active($idNum);

    if ($check["sit_id"] != null) {
      echo '<script>const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "error",
        title: "Student currently sit-in!"
      });</script>';
    } else {

      if (student_sit_in($idNum, $purpose, $lab, $login)) {
        echo '<script>const Toast = Swal.mixin({
              toast: true,
              position: "top-end",
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
              }
            });
            Toast.fire({
              icon: "success",
              title: "Sit-in successfully!"
            });</script>';
      }
    }
  }
}

//Edit Admin

if (isset($_POST["edit"])) {
  $_SESSION["editNum"] = $_POST['idNum'];
  echo '<script>';
  echo 'window.location.href = "Edit.php";';
  echo '</script>';
}

//Logout 
if (isset($_POST["logout"])) {
  $id = $_POST['idNum'];
  $sitId = $_POST['sitId'];
  $log = date("h:i:sa");
  $logout = date('Y-m-d');
  $ses = $_POST["session"];
  $sitlab = $_POST["sitLab"];
  $newSession = $ses - 1;

  if (student_logout($id, $sitId, $log, $logout, $newSession)) {
    echo '<script>const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            }
          });
          Toast.fire({
            icon: "success",
            title: "Student Logout!"
          });</script>';
  }
}




if (isset($_POST["submitEdit"])) {
  $idNum = $_POST['idNumber'];
  $last_Name = $_POST['lName'];
  $first_Name = $_POST['fName'];
  $middle_Name = $_POST['mName'];
  $course_Level = $_POST['courseLevel'];
  $email = $_POST['email'];
  $course = $_POST['course'];
  $address = $_POST['address'];



  if (edit_student_admin($idNum, $last_Name, $first_Name, $middle_Name, $course_Level, $email, $course, $address)) {

    echo "<script>Swal.fire({
    title: 'Notification',
    text: 'Edit Profile Successfull',
    icon: 'success',
    showConfirmButton: false,
    timer: 1500
  });</script>";
  } else {

    echo "<script>Swal.fire({
    title: 'Notification',
    text: 'Error! Duplicate ID Number',
    icon: 'error',
    showConfirmButton: false,
    timer: 1500
  });</script>";
  }
}


if (isset($_POST["dateSubmit"])) {
  $date = $_POST["date"];
  $sql = get_date_report(filter_date($date));
} else {
  $sql = get_date_report(reset_date());
}
if (isset($_POST['resetSubmit'])) {

  $sql = get_date_report(reset_date());
}



// Register
if (isset($_POST["submitRegister"])) {
  $idNum = $_POST['idNumber'];
  $last_Name = $_POST['lName'];
  $first_Name = $_POST['fName'];
  $middle_Name = $_POST['mName'];
  $course_Level = $_POST['level'];
  $passWord = $_POST['password'];
  $email = $_POST['email'];
  $course = $_POST['course'];
  $address = $_POST['address'];


  if (add_student($idNum, $last_Name, $first_Name, $middle_Name, $course_Level, $passWord, $email, $course, $address)) {

    echo "<script>Swal.fire({
        title: 'Notification',
        text: 'Student Added!',
        icon: 'success',
        showConfirmButton: false,
        timer: 1500
      });</script>";
  } else {


    echo "<script>Swal.fire({
        title: 'Notification',
        text: 'Error! Duplicate ID Number',
        icon: 'error',
        showConfirmButton: false,
        timer: 1500
      });";
  }
}

if (isset($_POST['reset_password'])) {
  $new_password = $_POST['new_password'];
  $id = $_SESSION['id_number'];

  if (reset_password($new_password, $id)) {
    echo "<script>Swal.fire({
        title: 'Notification',
        text: 'Password Reset!',
        icon: 'success',
        showConfirmButton: false,
        timer: 1500
      });</script>";
  } else {
    echo "<script>Swal.fire({
        title: 'Notification',
        text: 'Error! Password did not change',
        icon: 'error',
        showConfirmButton: false,
        timer: 1500
      });";
  }
}
if(isset($_POST['post_announcement'])){
  $message = $_POST['announcement_text'];
  $admin_name = $_SESSION['admin_name'];
  $date = date('Y-M-d');

  if(post_announcement($message,$admin_name,$date)){
    echo "<script>Swal.fire({
        title: 'Notification',
        text: 'Announcement Posted!',
        icon: 'success',
        showConfirmButton: false,
        timer: 1500
      });</script>";
  }

}




?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.css
    ">


  <title>CCS | Home</title>
  <style>
    .navbar {
      background-color: #144c94;
    }

    .navbar-brand,
    .nav-link {
      color: white !important;
    }

    .navbar-brand:hover,
    .nav-link:hover {
      color: yellow !important;
    }

    .dashboard-card {
      background-color: #007bff;
      color: white;
      border-radius: 10px;
      padding: 20px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="Admin.php">College of Computer Studies Admin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="Admin.php">Home</a>
          </li>
          <li class="nav-item">
            <a type="button" class="nav-link" data-toggle="modal" data-target="#exampleModal"> Search </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Students.php">Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Sit_in.php">Sit-in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ViewRecords.php">View Sit-in Records</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Report.php">Generate Reports</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-warning" href="..\..\Login.php">Log out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <!-- Modal -->
  <form action="Admin.php" method="GET">

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

            <button type="submit" name="search" class="btn btn-primary">Search</button>
          </div>
        </div>
      </div>
    </div>
  </form>


  <!-- Modal -->
  <form action="Admin.php" method="POST">
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Sit In Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center container d-flex flex-md-column gap-3">
            <div class="form-group row">
              <label for="id" class="col-sm-4 col-form-label">ID Number:</label>
              <div class="col-sm-8">
                <input id="id" name="studentID" type="text" value="<?php echo $student->id ?>" readonly class="form-control" />
              </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-sm-4 col-form-label">Student Name:</label>
              <div class="col-sm-8">
                <input id="name" name="studentName" type="text" value="<?php echo  $student->name ?>" readonly class="form-control" />
              </div>
            </div>
            <div class="form-group row">
              <label for="purposes" class="col-sm-4 col-form-label">Purpose:</label>
              <div class="col-sm-8">
                <select name="purpose" id="purposes" class="form-control">
                  <option value="C-Programming">C Programming</option>
                  <option value="Java Programming">Java Programming</option>
                  <option value="C# Programming">C# Programming</option>
                  <option value="Php Programming">Php Programming</option>
                  <option value="ASP.Net Programming">ASP.Net Programming</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="lab" class="col-sm-4 col-form-label">Lab:</label>
              <div class="col-sm-8">
                <select name="lab" id="lab" class="form-control">
                  <option value="524">524</option>
                  <option value="526">526</option>
                  <option value="528">528</option>
                  <option value="530">530</option>
                  <option value="542">542</option>
                  <option value="Mac">Mac Laboratory</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-sm-4 col-form-label">Remaining Session: </label>
              <div class="col-sm-8">
                <input id="name" type="text" value="<?php echo  $student->records ?>" readonly class="form-control" />
              </div>
            </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="sitIn" class="btn btn-primary">Sit In</button>
          </div>
        </div>
      </div>
    </div>
  </form>








  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>

  <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>


</body>

</html>
<script>
  <?php if ($displayModal) : ?>
    $(document).ready(function() {
      $('#exampleModalCenter').modal('show');
    });
  <?php endif; ?>
</script>