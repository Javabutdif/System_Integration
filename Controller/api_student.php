<?php

include '..\..\Backend\backend_student.php';



loginStudent();


if (isset($_POST["submit"])) {
    $idNum = $_POST['idNumber'];
    $last_Name = $_POST['lName'];
    $first_Name = $_POST['fName'];
    $middle_Name = $_POST['mName'];
    $course_Level = $_POST['courseLevel'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $address = $_POST['address'];



    if (edit_student_student($idNum, $last_Name, $first_Name, $middle_Name, $course_Level, $email, $course, $address)) {

        echo "<script>Swal.fire({
    title: 'Notification',
    text: 'Edit Profile Successfull',
    icon: 'success',
    showConfirmButton: false,
    timer: 1500
  });</script>";

        $_SESSION['id_number'] = $idNum;
        $_SESSION['name'] =  $first_Name . " " . $middle_Name . " " . $last_Name;
        $_SESSION["lname"] = $last_Name;
        $_SESSION["fname"] = $first_Name;
        $_SESSION["mname"] = $middle_Name;
        $_SESSION["yearLevel"] = $course_Level;
        $_SESSION["email"] = $email;
        $_SESSION["course"] = $course;
        $_SESSION["address"] = $address;
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

if(isset($_POST['submit_feedback'])){
    $message = $_POST['feedback_text'];
    $id = $_SESSION['id_number'];
    $lab = $_POST['sit_lab'];

    if(submit_feedback($id,$lab,$message)){
        echo "<script>Swal.fire({
        title: 'Notification',
        text: 'Feedback Submitted',
        icon: 'success',
        showConfirmButton: false,
        timer: 1500
    });</script>";
    }
}

if(isset($_POST['reserve_user'])){
    $id_number = $_POST['id_number'];
    $purpose = $_POST['purpose'];
    $lab = $_POST['lab2'];
    $pc_number = $_POST['pc'];
    $time = $_POST['time'];
    $date = $_POST['date'];

    if(submit_reservation($id_number, $purpose, $lab, $pc_number, $time, $date)){
        echo "<script>Swal.fire({
        title: 'Notification',
        text: 'Reservation Submitted',
        icon: 'success',
        showConfirmButton: false,
        timer: 1500
    });</script>";
    }

}

