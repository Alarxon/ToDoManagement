<?php

  //Table Todos Model
  class Todo {
        //Instance of Database
        private $db;

        public function __construct() {
            include_once("models/Database.php");
            $this->db = new Database();
        }

        public function getById($id){
            // Prepare and execute SQL query to get todo data
            @session_start();
            $id_user = $_SESSION["id"];
            $conn = $this->db->getConn();
            $stmt = $conn->prepare("SELECT id, title, description, status FROM todos where id = ? and user_id = ?");
            $stmt->bind_param("ii", $id, $id_user);
            $stmt->execute();
            $todo = $stmt->get_result()->fetch_assoc();
            if($todo){
                return $todo;
            }else{
                return 0;
            }
        }

        public function get(){
            // Prepare and execute SQL query to get all todo data from an user
            @session_start();
            $id = $_SESSION["id"];
            $conn = $this->db->getConn();
            $stmt = $conn->prepare("SELECT id, title, description, status FROM todos where user_id = ? and status != 3");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $todos = $stmt->get_result()->fetch_all();
            if($todos){
                return $todos;
            }else{
                return 0;
            }
        }

        public function save($title, $description, $status) {
            // Prepare and execute SQL query to insert todo data
            @session_start();
            $id = $_SESSION["id"];
            $conn = $this->db->getConn();
            $stmt = $conn->prepare("INSERT INTO todos (title, description, status, user_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssii", $title, $description, $status, $id);
            if($stmt->execute()){
                return 1;
            }else{
                return 0;
            }
        }

        public function update($title, $description, $status, $id) {
            // Prepare and execute SQL query to update todo data
            @session_start();
            $id_user = $_SESSION["id"];
            $conn = $this->db->getConn();
            $stmt = $conn->prepare("UPDATE todos SET title = ?, description = ?, status = ? where id = ? and user_id = ?");
            $stmt->bind_param("ssiii", $title, $description, $status, $id, $id_user);
            if($stmt->execute()){
                return 1;
            }else{
                return 0;
            }
        }

        public function softDelete($id) {
            // Prepare and execute SQL query to update todo data
            @session_start();
            $id_user = $_SESSION["id"];
            $conn = $this->db->getConn();
            $stmt = $conn->prepare("UPDATE todos SET status = 3 where id = ? and user_id = ?");
            $stmt->bind_param("ii", $id, $id_user);
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