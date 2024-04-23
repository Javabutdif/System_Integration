
<?php
  session_start();
  error_reporting(0);
  include('backend.php');
  $con = mysqli_connect('localhost', 'root', '', 'ccs_system');
  if($_SESSION["admin_id_number"] == 0  ){
    header("Location: Login.php");
		exit();
	} 

  

 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Generate Report</title>  <style>
        .navbar {
            background-color: #144c94;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .navbar-brand:hover, .nav-link:hover {
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
                        <a type="button" class="nav-link" data-toggle="modal" data-target="#exampleModal">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Students.php">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Records.php">Sit-in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ViewRecords.php">View Sit-in Records</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Report.php">Generate Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-warning" href="Login.php">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<h1 class="text-center">Generate Reports</h1>

    
  <?php 
  $con = mysqli_connect('localhost', 'root', '', 'ccs_system');
      

    if(isset($_POST["dateSubmit"])){
   $date = $_POST["date"];
      
$sqlTable = " SELECT student_sit_in.sit_id, students.id_number, students.firstName,students.lastName,
student_sit_in.sit_purpose, student_sit_in.sit_lab , student_sit_in.sit_login,
 student_sit_in.sit_logout,student_sit_in.sit_date, student_sit_in.status FROM
  students INNER JOIN student_sit_in ON students.id_number = student_sit_in.id_number
   INNER JOIN student_session ON student_sit_in.id_number = student_session.id_number WHERE student_sit_in.status = 'Finished' AND student_sit_in.sit_date = '$date' ;";
    }
    else{
      
$sqlTable = " SELECT student_sit_in.sit_id, students.id_number, students.firstName,students.lastName,
 student_sit_in.sit_purpose, student_sit_in.sit_lab , student_sit_in.sit_login,
  student_sit_in.sit_logout,student_sit_in.sit_date, student_sit_in.status FROM
   students INNER JOIN student_sit_in ON students.id_number = student_sit_in.id_number
    INNER JOIN student_session ON student_sit_in.id_number = student_session.id_number WHERE student_sit_in.status = 'Finished';";
    }
    if(isset($_POST['resetSubmit'])){
    


$sqlTable = " SELECT student_sit_in.sit_id, students.id_number, students.firstName,students.lastName,
 student_sit_in.sit_purpose, student_sit_in.sit_lab , student_sit_in.sit_login,
  student_sit_in.sit_logout,student_sit_in.sit_date, student_sit_in.status FROM
   students INNER JOIN student_sit_in ON students.id_number = student_sit_in.id_number
    INNER JOIN student_session ON student_sit_in.id_number = student_session.id_number WHERE student_sit_in.status = 'Finished';";
    }
$result = mysqli_query($con, $sqlTable);
if(mysqli_num_rows($result) > 0)
    {
      $listPerson = [];   
      while($row = mysqli_fetch_array($result)) {
          $listPerson[] = $row;
      }
    }
   

?>

<div class="container">
  <form action="Report.php" method="POST"> 
    <input class="" type="date" name="date" />
    <button type="submit" class="btn btn-primary " name="dateSubmit">Search</button>
    <button type="submit" class="btn btn-danger " name="resetSubmit">Reset</button>
  </form>
  <table id="example" class="table table-striped display compact" style="width:100%">
  <thead style="background-color: #144c94">
      <tr>
    
          <th class="text-white">ID Number</th>
          <th  class="text-white">Name</th>
          <th class="text-white">Purpose</th>
          <th class="text-white">Laboratory</th>
          <th class="text-white">Login</th>
          <th class="text-white">Logout</th>
          <th class="text-white">Date</th>
        
   

      </tr>
  </thead>

  <tbody>
      <?php foreach ($listPerson as $person): ?>
          <tr>
      
              <td><?php echo $person['id_number']; ?></td>
              <td><?php echo $person['firstName']." ".$person['lastName']; ?></td>
              <td><?php echo $person['sit_purpose']; ?></td>
              <td><?php echo $person['sit_lab']; ?></td>
              <td><?php echo $person['sit_login']; ?></td>
              <td><?php echo $person['sit_logout']; ?></td>
              <td><?php echo $person['sit_date']; ?></td>
          </tr>
      <?php endforeach; ?>
      <?php if(empty($listPerson)): ?>
          <tr>
              <td colspan="7">No data available</td>
          </tr>
      <?php endif; ?>
  </tbody>
</table>
</div>










<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
<script>
  <?php
    if($_SESSION["admin_id"] === 1){
      echo "Swal.fire({
              title: 'Successful Login',
              text: 'Welcome, {$_SESSION["admin_name"]}!',
              icon: 'success',
              showConfirmButton: false,
  timer: 1500
            });";
      $_SESSION["admin_id"] = 0;
    }
  ?>

  
 
  

</script>
</body>
</html>
<script>
  // Initialize the DataTable
  let myDataTable = new DataTable('#example', {
    layout: {
      topStart: {
        buttons: ['csv', 'excel', 'pdf', 'print']
      }
      
    }
    ,"oLanguage": {
   "sSearch": "Filter"
 }
    
  });

  // Function to show the SweetAlert popup
  function showSweetAlert() {
    let timerInterval;
    Swal.fire({
      title: "Downloading Data!",
      html: "Processing in  <b></b> milliseconds.",
      timer: 2000,
      timerProgressBar: true,
      didOpen: () => {
        Swal.showLoading();
        const timer = Swal.getPopup().querySelector("b");
        timerInterval = setInterval(() => {
          timer.textContent = `${Swal.getTimerLeft()}`;
        }, 100);
      },
      willClose: () => {
        clearInterval(timerInterval);
      }
    }).then((result) => {
      /* Read more about handling dismissals below */
      if (result.dismiss === Swal.DismissReason.timer) {
        console.log("I was closed by the timer");
      }
    });
  }

  // Get all the buttons in the DataTable
  let buttons = document.querySelectorAll('.dt-button');

  // Attach click event listener to each button
  buttons.forEach(button => {
    button.addEventListener('click', function() {
      // Call the function to show the SweetAlert popup
      showSweetAlert();
    });
  });


</script>


