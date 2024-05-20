<?php
require_once '../asset/navbar_student.html';
include '../../Controller/api_student.php';

 // Establish database connection
 $con = mysqli_connect('localhost', 'root', '', 'ccs_system');
 if ($con === false) {
     die("Error: Could not connect to the database. " . mysqli_connect_error());
 }

 if (isset($_POST["submitReserve"])) {
     $programming = $_POST["purpose"];
     $selected_lab = $_POST["lab"];
     // Sanitize and escape user input
     $lab = mysqli_real_escape_string($con, $selected_lab);
     // Construct the SQL query safely
     $sentence = "lab_" . $lab;
     $sqlTable = "SELECT pc_id FROM student_pc WHERE `$sentence` = '1'";
     // Execute the query
     $result = mysqli_query($con, $sqlTable);
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reservation</title>



</head>

<body>

    <div class="container container-fluid container-lg ">



        <br>
        <br>
        <h4 class="text-center">Reservation</h4>

        <form action="Reservation.php" method="POST">
            <div class=" container mx-5 col-md-11 my-5">

                <div class="form-group row">
                    <label for="id" class="col-sm-4 col-form-label">ID Number:</label>
                    <div class="col-sm-8">
                        <input id="id" name="id_number" type="text" value="<?php echo $_SESSION['id_number'] ?>" readonly class="form-control" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label">Student Name:</label>
                    <div class="col-sm-8">
                        <input id="name" name="studentName" type="text" value="<?php echo  $_SESSION['name'] ?>" readonly class="form-control" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="purposes" class="col-sm-4 col-form-label">Purpose:</label>
                    <div class="col-sm-8">
                        <select name="purpose" id="purposes" class="form-control" required>
                            <option value="C Programming" <?php if($programming == "C Programming") echo 'selected'; ?>>C Programming</option>
                            <option value="Java Programming" <?php if($programming == "Java Programming") echo 'selected'; ?>>Java Programming</option>
                            <option value="C# Programming" <?php if($programming == "C# Programming") echo 'selected'; ?>>C# Programming</option>
                            <option value="Php Programming" <?php if($programming == "Php Programming") echo 'selected'; ?>>Php Programming</option>
                            <option value="ASP.Net Programming" <?php if($programming == "ASP.Net Programming") echo 'selected'; ?>>ASP.Net Programming</option>
                        </select>
                    </div>
                </div>
                <form action="Reservation.php" method="POST" onsubmit="updateHiddenField()">
                    <div class="form-group row">
                        <label for="lab" class="col-sm-4 col-form-label">Lab:</label>
                        <div class="col-sm-8">
                            <select name="lab" id="lab"  class="form-control" required>
                                <option value="524" <?php if($selected_lab == "524") echo 'selected'; ?>>524</option>
                                <option value="526" <?php if($selected_lab == "526") echo 'selected'; ?>>526</option>
                                <option value="528" <?php if($selected_lab == "528") echo 'selected'; ?>>528</option>
                                <option value="530" <?php if($selected_lab == "530") echo 'selected'; ?>>530</option>
                                <option value="542" <?php if($selected_lab == "542") echo 'selected'; ?>>542</option>
                                <option value="Mac" <?php if($selected_lab == "Mac") echo 'selected'; ?>>Mac Laboratory</option>
                            </select>
                            <button class="btn btn-primary mt-2" type="submit" name="submitReserve">Submit</button>
                        </div>
                    </div>
                </form>
             

                <?php
               

                    if ($result) {
                        ?>
                        <form action='Reservation.php' method='POST'>
                        <div class='form-group row'>
                        <label for='pc_number' class='col-sm-4 col-form-label'>Available PC:</label>
                        <div class='col-sm-8'>
                        <select name="pc_number" id="pc_number" class='form-control'>
                        <?php foreach($result as $row): 
                            ?>
                            <option value="<?php echo $row['pc_id'] ?>"><?php echo $row['pc_id'] ?></option>
                        <?php 
                        endforeach; ?>
                        </select>
                        </div>
                        </div>

                   </form>
                   <?php
                    } 
                ?>




                <div class="form-group row">
                    <label for="time" class="col-sm-4 col-form-label">Time In:</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="time" id="time" name="time">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date" class="col-sm-4 col-form-label">Date:</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="date" id="date" name="date">
                    </div>
                </div>
        </form>

        <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label">Remaining Session: </label>
            <div class="col-sm-8">
                <input id="name" type="text" value="<?php echo  $_SESSION['remaining'] ?>" readonly class="form-control" />
            </div>
        </div>

        <div classs="form-group row align-content-end">
            <button type="submit" name="reserve_user" class="btn btn-primary">Reserve</button>
        </div>


    </div>

    <script>
        function updateHiddenField() {
            var selectedLab = document.getElementById("lab").value;
            document.getElementById("lab2").value = selectedLab;
        }
    </script>


</body>

</html>