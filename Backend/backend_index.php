<?php
    require_once 'database_connection.php';


    function session_check(){
        return $_SESSION["id_number"] != 0 || $_SESSION["admin_id_number"] != 0;
    }

    ?>