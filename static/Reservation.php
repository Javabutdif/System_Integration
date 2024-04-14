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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Reservation</title>

 
</head>
<body>
    <a href="Homepage.php" class="btn btn-danger">Back</a>

<div class="container">
<div class="form-group row">
        <label for="id" class="col-sm-4 col-form-label">ID Number:</label>
        <div class="col-sm-8">
            <input id="id" name="studentID" type="text" value="<?php echo $_SESSION['id_number']?>" readonly class="form-control"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-4 col-form-label">Student Name:</label>
        <div class="col-sm-8">
            <input id="name" name="studentName" type="text" value="<?php echo  $_SESSION['name']?>" readonly class="form-control"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="purposes" class="col-sm-4 col-form-label">Purpose:</label>
        <div class="col-sm-8">
            <select name="purpose" id="purposes" class="form-control">
                <option value="C Programming">C Programming</option>
                <option value="Java Programming">Java Programming</option>
                <option value="C# Programming">C# Programming</option>
                <option value="Php Programming">Php Programming</option>
                <option value="ASP.Net Programming">ASP.Net Programming</option>
            </select>
        </div>
    </div>
    <form action="Reservation.php" method="POST">
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
    <?php
    // Establish database connection
    $con = mysqli_connect('localhost', 'root', '', 'ccs_system');
    if ($con === false) {
        die("Error: Could not connect to the database. " . mysqli_connect_error());
    }

    if (isset($_POST["lab"])) {
        // Retrieve the selected lab value
        $selected_lab = $_POST["lab"];
        echo "Selected Lab: " . $selected_lab; // Display the selected lab for debugging
        
        // Sanitize and escape user input
        $lab = mysqli_real_escape_string($con, $selected_lab);
        
        // Construct the SQL query safely
        $sentence = "lab_" . $lab;
        $sqlTable = "SELECT pc_id FROM student_pc WHERE `$sentence` = '1'";

        // Execute the query
        $result = mysqli_query($con, $sqlTable);

        if ($result) {
            $data = [];
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            
            // Assuming $data contains the data retrieved from the database
            foreach ($data as $index => $row) {
                echo "<select name='mySelect[$index]' class='form-control'>";
                echo "<option value='" . $row['pc_id'] . "'>" . $row['pc_id'] . "</option>";
                echo "</select>";
                echo "<br>";
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
        
    }
  
    // Close the database connection
    mysqli_close($con);
    ?>
</form>

    

    <div class="form-group row">
        <label for="time" class="col-sm-4 col-form-label">Time In:</label>
        <div class="col-sm-8">
           <input type="time" id="time" name="time">
        </div>
    </div>
    </form>
    <div class="form-group row">
        <label for="name" class="col-sm-4 col-form-label">Remaining Session: </label>
        <div class="col-sm-8">
            <input id="name" type="text" value="<?php echo  $_SESSION['remaining']?>" readonly class="form-control"/>
        </div>
    </div>

    <?php 
    $con = mysqli_connect('localhost', 'root', '', 'ccs_system');

    if(isset($_GET["lab"])){
        $lab = $_GET["lab"];


        
    }


?>

    

    
    
</body>
</html>