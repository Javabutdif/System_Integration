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

    <h1 class="text-center">Feedback Report</h1>



    <div class="container">
      
        <table id="example" class="table table-striped display compact table-responsive" style="width:100%">
            <thead style="background-color: #144c94">
                <tr>

                    <th>Student ID Number</th>
                    <th>Laboratory</th>
                    <th>Date</th>
                    <th>Message</th>
               


                </tr>
            </thead>

            <tbody>
                <?php foreach (view_feedback() as $person) : ?>
                    <tr>

                        <td><?php echo $person['id_number']; ?></td>
                        <td><?php echo $person['lab'] ; ?></td>
                        <td><?php echo $person['date']; ?></td>
                        <td><?php echo $person['message']; ?></td>
                        
                    </tr>
                <?php endforeach; ?>
                <?php if (empty(view_feedback())) : ?>
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
                buttons: [ 'print']
            }

        },
        "oLanguage": {
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