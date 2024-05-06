<?php
include 'database_connection.php';

function loginStudent()
{

    if ($_SESSION['id_number'] != 0 && !isset($_SESSION['success_toast_displayed'])) {
        echo '<script>
                    const Toast = Swal.mixin({
                      toast: true,
                      position: "top-start",
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
                      title: "Logged In!"
                    });
                  </script>';


        $_SESSION['success_toast_displayed'] = true;
    } else if ($_SESSION['id_number'] == null) {
        echo '<script>window.location.href = "../../Login.php";</script>';
    }
}

function retrieve_student_history($idNumber){
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sqlTable = " SELECT student_sit_in.sit_id, students.id_number, students.firstName,students.lastName,
    student_sit_in.sit_purpose, student_sit_in.sit_lab , student_sit_in.sit_login,
    student_sit_in.sit_logout,student_sit_in.sit_date, student_sit_in.status FROM
    students INNER JOIN student_sit_in ON students.id_number = student_sit_in.id_number
        INNER JOIN student_session ON student_sit_in.id_number = student_session.id_number WHERE student_sit_in.status = 'Finished' AND student_sit_in.id_number = '$idNumber';";

    $result = mysqli_query($con, $sqlTable);
    if (mysqli_num_rows($result) > 0) {
        $listPerson = [];
        while ($row = mysqli_fetch_array($result)) {
            $listPerson[] = $row;
        }
    }

    return $listPerson;
}

function edit_student_student($idNum, $last_Name, $first_Name, $middle_Name, $course_Level, $email, $course, $address)
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = "UPDATE `students` SET  `lastName` = '$last_Name', `firstName`= '$first_Name', `middleName`= '$middle_Name', `yearLevel`= '$course_Level', `course` = '$course', `email` = '$email', `address`= '$address' WHERE `id_number` = '$idNum'";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}