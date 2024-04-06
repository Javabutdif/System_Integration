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
    <form action="Reservation.php" method="GET">
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

    
<table class="table table-borderless table-group-divider ">
  <tbody>
    <tr>
      <td><button>PC01</button></td>
      <td><button>PC02</button></td>
      <td><button>PC03</button></td>
      <td><button>PC04</button></td>
      <td><button>PC05</button></td>
      <td><button>PC06</button></td>
      <td><button>PC07</button></td>
      <td><button>PC08</button></td>
      <td><button>PC09</button></td>
      <td><button>PC10</button></td>
 
    </tr>
    <tr>
      <td><button>PC11</button></td>
      <td><button>PC12</button></td>
      <td><button>PC13</button></td>
      <td><button>PC14</button></td>
      <td><button>PC15</button></td>
      <td><button>PC16</button></td>
      <td><button>PC17</button></td>
      <td><button>PC18</button></td>
      <td><button>PC19</button></td>
      <td><button>PC20</button></td>
 
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
      <td><button>PC21</button></td>
      <td><button>PC22</button></td>
      <td><button>PC23</button></td>
      <td><button>PC24</button></td>
      <td><button>PC25</button></td>
      <td><button>PC26</button></td>
      <td><button>PC27</button></td>
      <td><button>PC28</button></td>
      <td><button>PC29</button></td>
      <td><button>PC30</button></td>
 
    </tr>
    <tr>
      <td><button>PC31</button></td>
      <td><button>PC32</button></td>
      <td><button>PC33</button></td>
      <td><button>PC34</button></td>
      <td><button>PC35</button></td>
      <td><button>PC36</button></td>
      <td><button>PC37</button></td>
      <td><button>PC38</button></td>
      <td><button>PC39</button></td>
      <td><button>PC40</button></td>
 
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
      <td><button>PC41</button></td>
      <td><button>PC42</button></td>
      <td><button>PC43</button></td>
      <td><button>PC44</button></td>
      <td><button>PC45</button></td>
      <td><button>PC46</button></td>
      <td><button>PC47</button></td>
      <td><button>PC48</button></td>
      <td><button>PC49</button></td>
      <td><button>PC50</button></td>
 
    </tr>
    <!-- Add more rows as needed -->
  </tbody>
</table>

    </div>

    
    
</body>
</html>