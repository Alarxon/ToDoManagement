<?php

    //UpdateTodo functionality
    class UpdateTodo {
        //Load Update todo page
        public function index($request, $method){
            @session_start();
            if($method === "GET" && isset($_SESSION["id"])){
                $id = $request["id"];
                include_once("models/Todo.php");
                //Instance of Model Todo and call of getById function
                $todo = new Todo();
                $update = $todo->getById($id);
                $title = $update["title"];
                $description = $update["description"];
                $status = $update["status"];
                include_once("views/home/update_todo_view.php");
            }else{
                //Only logged users and GET method
                header('Location: /');
            }
        }

        //Update To Do
        public function process($request, $method){
            @session_start();
            if($method === "POST" && isset($_SESSION["id"])){
                $id = $request["id"];
                $title = $request["title"];
                $description = $request["description"];
                $status = $request["status"];
                include_once("models/Todo.php");
                //Instance of Model Todo and call of update function
                $todo = new Todo();
                if($todo->update($title, $description, $status, $id)){
                    $ok = "To Do updated successfully";
                    include_once("views/home/update_todo_view.php");
                }else{
                    $error = "Error updating To Do";
                    include_once("views/home/update_todo_view.php");
                }
            }else{
                //Only logged users and POST method
                header('Location: /');
            }
        }

        //Soft delete To Do
        public function delete($request, $method){
            @session_start();
            if($method === "POST" && isset($_SESSION["id"])){
                $id = $request["id"];
                include_once("models/Todo.php");
                //Instance of Model Todo and call of softDelete function
                $todo = new Todo();
                if($todo->softDelete($id)){
                    $ok = "To Do deleted successfully";
                    include_once("views/home/home_view.php");
                }else{
                    $error = "Error deleting To Do";
                    include_once("views/home/home_view.php");
                }
            }else{
                //Only logged users and POST method
                header('Location: /');
            }
        }

    }

    $classObj = new UpdateTodo();
?>