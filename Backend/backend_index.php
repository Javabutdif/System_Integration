<?php
    require_once 'database_connection.php';


    function session_check(){
        return $_SESSION["id_number"] != 0 || $_SESSION["admin_id_number"] != 0;
    }

    function admin_login($idNum,$passWord){
        return $idNum == "admin" && $passWord == "admin";
    }

    function student_login($idNum,$password){
        $db = Database::getInstance();
        $con = $db->getConnection();

        $sql = " SELECT students.id_number, students.firstName, students.middleName,
        students.lastName, students.yearLevel , students.email, students.course, students.address, student_session.session
         from students inner join student_session on students.id_number 
         = student_session.id_number WHERE students.id_number = '$idNum' AND students.password = '$password'";
        $result = mysqli_query($con, $sql);
        return $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    function student_register($idNum,$last_Name,$first_Name,$middle_Name,$course_Level,$passWord,$course,$email,$address){
        $db = Database::getInstance();
        $con = $db->getConnection();

        $sql1 = "INSERT INTO `students` (`id_number`, `lastName`, `firstName`, `middleName`, `yearLevel`, `password`, `course`, `email`, `address`, `status`)
        VALUES ('$idNum', '$last_Name', '$first_Name', '$middle_Name', '$course_Level', '$passWord', '$course', '$email', '$address', 'TRUE')";
        $sql2 = "INSERT INTO `student_session` (`id_number` , `session`) VALUES ('$idNum', 30)";
     
    
      
        if (mysqli_query($con, $sql1) && mysqli_query($con, $sql2) ) {return true;}
        else{return false;}

    }





    ?>