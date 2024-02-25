<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
    if(isset($_GET["id_number"])){
        $id_number = $_GET['id_number'];
    
    // Now you can use $id_number in your code as needed
        echo "ID Number: " . $id_number;
    }
?>
