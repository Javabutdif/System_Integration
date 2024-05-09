
<?php
  include '../../Controller/api_admin.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Generate Report</title>  
</head>
<body>
 
<h1 class="text-center">Generate Reports</h1>



<div class="container">
  <form action="Report.php" method="POST"> 
    <input class="" type="date" name="date" />
    <button type="submit" class="btn btn-primary " name="dateSubmit">Search</button>
    <button type="submit" class="btn btn-danger " name="resetSubmit">Reset</button>
  </form>
  <table id="example" class="table table-striped display compact" style="width:100%">
  <thead style="background-color: #144c94">
      <tr>
    
          <th>ID Number</th>
          <th>Name</th>
          <th>Purpose</th>
          <th>Laboratory</th>
          <th>Login</th>
          <th>Logout</th>
          <th>Date</th>
        
   

      </tr>
  </thead>

  <tbody>
      <?php foreach ($sql as $person): ?>
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
      <?php if(empty($sql)): ?>
          <tr>
              <td colspan="7">No data available</td>
          </tr>
      <?php endif; ?>
  </tbody>
</table>
</div>










<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>

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


