<?php

    //General purpose Database model
    class Database {
        //Database Credentials
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $db_name = 'todo';
        //Connection variable
        private $conn;

        //Create connection
        public function __construct() {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        //Get Connection
        public function getConn(){
            return $this->conn;
        }

        //Close connection on close
        public function close() {
            $this->conn->close();
        }
    }
?>