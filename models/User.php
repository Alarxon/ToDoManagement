<?php

  //Table Users Model
  class User {
        //Instance of Database
        private $db;

        public function __construct() {
            include_once("models/Database.php");
            $this->db = new Database();
        }

        public function login($username, $password){
            // Prepare and execute SQL query to get user data
            $conn = $this->db->getConn();
            $stmt = $conn->prepare("SELECT id, password FROM users where username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $usuario = $stmt->get_result()->fetch_assoc();
            if(!$usuario) return 0;
            if(password_verify($password, $usuario["password"])){
                $id = $usuario["id"];
                @session_start();
                $_SESSION['id']= $id;
                $_SESSION['username']= $username;

                return 1;
            }else{
                return 0;
            }
        }

        public function save($username, $password) {
            // Prepare and execute SQL query to insert user data
            $conn = $this->db->getConn();
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password);
            if($stmt->execute()){
                return 1;
            }else{
                return 0;
            }
        }
        
        //Close connection on destruction of the object
        public function __destruct() {
            $this->db->close();
        }

    }

?>