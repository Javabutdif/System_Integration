<?php
require_once 'database_connection.php';

function loginAdmin()
{

    if ($_SESSION['admin_id_number'] == 1 && !isset($_SESSION['success_toast_displayed'])) {
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
    } else if ($_SESSION['admin_id_number'] == null) {
        echo '<script>window.location.href = "../../Login.php";</script>';
    }
}

//Number of students to Dashboard Admin

function retrieve_students_dashboard()
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = " SELECT count(id_number) as id from students where status = 'TRUE';";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $user['id'];
}
function retrieve_current_sit_in_dashboard()
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = "SELECT count(sit_id) as id from student_sit_in where status = 'Active';";
    $result = mysqli_query($con, $sql);
    $sit = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $sit['id'];
}
function retrieve_total_sit_in_dashboard()
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = "SELECT count(sit_id) as id from student_sit_in ;";
    $result = mysqli_query($con, $sql);
    $total = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $total['id'];
}

function delete_student($idNum)
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = "UPDATE `students` SET `status` = 'FALSE' WHERE `id_number` = '$idNum'";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function retrieve_students()
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = " SELECT students.id_number, students.firstName,
        students.middleName, students.lastName , students.yearLevel,
        students.course, student_session.session from students
        inner join student_session on student_session.id_number = students.id_number where students.status = 'TRUE'";

    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $listPerson = [];
        while ($row = mysqli_fetch_array($result)) {
            $listPerson[] = $row;
        }
    }
    return $listPerson;
}

function search_student($search)
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = "SELECT * FROM students WHERE id_number = ? OR lastName = ? OR firstName = ? AND `status` = 'TRUE'";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sss", $search, $search, $search);
    $stmt->execute();
    return $result = $stmt->get_result();
}
function retrieve_student_session($id)
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql1 = "SELECT * FROM student_session WHERE id_number = ?";
    $stmt1 = $con->prepare($sql1);
    $stmt1->bind_param("s", $id);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    return $record = $result1->fetch_assoc();
}

function check_student_active($idNum)
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $active = "SELECT * FROM student_sit_in WHERE id_number = '$idNum' AND status = 'Active'";
    $result = mysqli_query($con, $active);
    return $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
}
function student_sit_in($idNum, $purpose, $lab, $login)
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sit = "INSERT INTO `student_sit_in` (`id_number`, `sit_purpose`, `sit_lab`, `sit_login` , `status`)
        VALUES ('$idNum', '$purpose', '$lab', '$login' , 'Active')";

    if (mysqli_query($con, $sit)) {
        return true;
    } else {
        return false;
    }
}

function student_logout($id, $sitId, $log, $logout, $newSession)
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = "UPDATE `student_sit_in` SET `status` = 'Finished', `sit_logout` = '$log', `sit_date` = '$logout' WHERE `id_number` = '$id' AND `sit_id` = '$sitId' ";
    $sql1 = "UPDATE `student_session` SET `session` = '$newSession' WHERE `id_number` = '$id'";

    if (mysqli_query($con, $sql) && mysqli_query($con, $sql1)) {
        return true;
    } else {
        return false;
    }
}

function retrieve_edit_student($idNum)
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = "SELECT * FROM students WHERE id_number = '$idNum'";
    $result = mysqli_query($con, $sql);
    return $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
}
function edit_student_admin($idNum, $last_Name, $first_Name, $middle_Name, $course_Level, $email, $course, $address)
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

function retrieve_sit_in()
{
    $db = Database::getInstance();
    $con = $db->getConnection();


    $sqlTable = "SELECT student_sit_in.sit_id, students.id_number , students.firstName , students.middleName, students.lastName ,student_sit_in.sit_purpose, student_sit_in.sit_lab , student_session.session, student_sit_in.status FROM students INNER JOIN student_session ON students.id_number = student_session.id_number INNER JOIN student_sit_in ON student_sit_in.id_number = student_session.id_number
        WHERE student_sit_in.status = 'Active';";
    $result = mysqli_query($con, $sqlTable);
    if (mysqli_num_rows($result) > 0) {
        $listPerson = [];
        while ($row = mysqli_fetch_array($result)) {
            $listPerson[] = $row;
        }
    }
    return $listPerson;
}

function retrieve_current_sit_in()
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $date = date('Y-m-d');

    $sqlTable = " SELECT student_sit_in.sit_id, students.id_number, students.firstName,students.lastName,
        student_sit_in.sit_purpose, student_sit_in.sit_lab , student_sit_in.sit_login,
        student_sit_in.sit_logout,student_sit_in.sit_date, student_sit_in.status FROM
        students INNER JOIN student_sit_in ON students.id_number = student_sit_in.id_number
        INNER JOIN student_session ON student_sit_in.id_number = student_session.id_number WHERE student_sit_in.sit_date = '$date' ;";
    $result = mysqli_query($con, $sqlTable);
    if (mysqli_num_rows($result) > 0) {
        $listPerson = [];
        while ($row = mysqli_fetch_array($result)) {
            $listPerson[] = $row;
        }
    }
    return $listPerson;
}

function filter_date($date)
{

    return " SELECT student_sit_in.sit_id, students.id_number, students.firstName,students.lastName,
        student_sit_in.sit_purpose, student_sit_in.sit_lab , student_sit_in.sit_login,
        student_sit_in.sit_logout,student_sit_in.sit_date, student_sit_in.status FROM
        students INNER JOIN student_sit_in ON students.id_number = student_sit_in.id_number
        INNER JOIN student_session ON student_sit_in.id_number = student_session.id_number WHERE student_sit_in.status = 'Finished' AND student_sit_in.sit_date = '$date' ;";
}
function reset_date()
{
    return " SELECT student_sit_in.sit_id, students.id_number, students.firstName,students.lastName,
        student_sit_in.sit_purpose, student_sit_in.sit_lab , student_sit_in.sit_login,
        student_sit_in.sit_logout,student_sit_in.sit_date, student_sit_in.status FROM
        students INNER JOIN student_sit_in ON students.id_number = student_sit_in.id_number
        INNER JOIN student_session ON student_sit_in.id_number = student_session.id_number WHERE student_sit_in.status = 'Finished';";
}

function get_date_report($sql)
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $listPerson = [];
        while ($row = mysqli_fetch_array($result)) {
            $listPerson[] = $row;
        }
    }
    return $listPerson;
}

function add_student($idNum, $last_Name, $first_Name, $middle_Name, $course_Level, $passWord, $email, $course, $address)
{
    $db = Database::getInstance();
    $con = $db->getConnection();


    $sqlStudents = "INSERT INTO `students` (`id_number`, `lastName`, `firstName`, `middleName`, `yearLevel`, `password`, `course`, `email`, `address`, `status`)
        VALUES ('$idNum', '$last_Name', '$first_Name', '$middle_Name', '$course_Level', '$passWord', '$course', '$email', '$address', 'TRUE')";

    $sqlSession = "INSERT INTO `student_session` (`id_number` , `session`) VALUES ('$idNum', 30)";

    if (mysqli_query($con, $sqlStudents) && mysqli_query($con, $sqlSession)) {
        return true;
    } else {
        return false;
    }
}
function reset_password($new_password,$id){
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = "UPDATE `students` SET `password` = '$new_password' WHERE `id_number` = '$id'";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

 function post_announcement($message,$admin_name,$date){
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = "INSERT INTO announce (`admin_name`,`date`,`message`) VALUE ('$admin_name','$date','$message')";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        // Log or display MySQL errors
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
        return false;
    }
}

function view_announcement(){
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = "SELECT * FROM announce ORDER BY announce_id desc";

    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $announcement = [];
        while ($row = mysqli_fetch_array($result)) {
            $announcement[] = $row;
        }
    }
    return $announcement;
}
function view_feedback()
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = "SELECT * FROM feedback ORDER BY feedback_id desc";

    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $feedback = [];
        while ($row = mysqli_fetch_array($result)) {
            $feedback[] = $row;
        }
    }
    return $feedback;
}
function retrieve_pc($lab){
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = "SELECT pc_id , `$lab` as lab2 FROM student_pc ";

    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $pc = [];
        while ($row = mysqli_fetch_array($result)) {
            $pc[] = $row;
        }
    }
    return $pc;

}
function available_pc($concat,$lab){
    $db = Database::getInstance();
    $con = $db->getConnection();
    $concat1 = "(" . $concat . ")";

    $sql = "UPDATE `student_pc` SET `$lab` = '1' WHERE `pc_id` IN $concat1;";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        // Log or display MySQL errors
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
        return false;
    }
}
function used_pc($concat, $lab)
{
    $db = Database::getInstance();
    $con = $db->getConnection();
    $concat1 = "(" . $concat . ")";

    $sql = "UPDATE `student_pc` SET `$lab` = '0' WHERE `pc_id` IN $concat1;";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        // Log or display MySQL errors
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
        return false;
    }
}

function retrieve_c_programming(){
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = "SELECT count(sit_purpose) as lang FROM student_sit_in WHERE sit_purpose = 'C-Programming'";

    $result = mysqli_query($con, $sql);
    $language = mysqli_fetch_array($result, MYSQLI_ASSOC);
    return $language['lang'];
}
function retrieve_c_sharp_programming()
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = "SELECT count(sit_purpose) as lang FROM student_sit_in WHERE sit_purpose = 'C# Programming'";

    $result = mysqli_query($con, $sql);
    $language = mysqli_fetch_array($result, MYSQLI_ASSOC);
    return $language['lang'];
}
function retrieve_java_programming()
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = "SELECT count(sit_purpose) as lang FROM student_sit_in WHERE sit_purpose = 'Java Programming'";

    $result = mysqli_query($con, $sql);
    $language = mysqli_fetch_array($result, MYSQLI_ASSOC);
    return $language['lang'];
}
function retrieve_asp_programming()
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = "SELECT count(sit_purpose) as lang FROM student_sit_in WHERE sit_purpose = 'ASP.Net Programming'";

    $result = mysqli_query($con, $sql);
    $language = mysqli_fetch_array($result, MYSQLI_ASSOC);
    return $language['lang'];
}
function retrieve_php_programming()
{
    $db = Database::getInstance();
    $con = $db->getConnection();

    $sql = "SELECT count(sit_purpose) as lang FROM student_sit_in WHERE sit_purpose = 'Php Programming'";

    $result = mysqli_query($con, $sql);
    $language = mysqli_fetch_array($result, MYSQLI_ASSOC);
    return $language['lang'];
}