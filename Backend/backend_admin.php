<?php
    require_once 'database_connection.php';

    function loginAdmin(){
    
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
        }
        else if($_SESSION['admin_id_number'] == null ){
             echo '<script>window.location.href = "../../Login.php";</script>';
        }
        }
    
    //Number of students to Dashboard Admin

    function retrieve_students(){
        $db = Database::getInstance();
        $con = $db->getConnection();

        $sql = " SELECT count(id_number) as id from students where status = 'TRUE';";
        $result = mysqli_query($con, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $user['id'];
    }
    function retrieve_current_sit_in(){
        $db = Database::getInstance();
        $con = $db->getConnection();

        $sql = "SELECT count(sit_id) as id from student_sit_in where status = 'Active';";
        $result = mysqli_query($con, $sql);
        $sit = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $sit['id'];
    }
    function retrieve_total_sit_in(){
        $db = Database::getInstance();
        $con = $db->getConnection();

        $sql = "SELECT count(sit_id) as id from student_sit_in ;";
        $result = mysqli_query($con, $sql);
        $total = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $total['id'];
    }
?>

  
  
    
