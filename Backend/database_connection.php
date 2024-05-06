<?php

error_reporting(0);

class Database {
    private static $instance;
    private $conn;
    private $db_host = "localhost"; 
    private $db_username = "root"; 
    private $db_password = ""; 
    private $db_name = "ccs_system"; 
    private $db_port = "3306"; 

    private function __construct() {
        $this->conn = mysqli_connect($this->db_host, $this->db_username , $this->db_password, $this->db_name, $this->db_port);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}

date_default_timezone_set('Asia/Manila');

?>