<?php

    //NewTodo functionality
    class NewTodo {
        //Load New To Do page
        public function index($request, $method){
            @session_start();
            if($method === "GET" && isset($_SESSION["id"])){
                include_once("views/home/new_todo_view.php");
            }else{
                //Only logged users and GET Method
                header('Location: /');
            }
        }

        //Process New To Do
        public function process($request, $method){
            @session_start();
            if($method === "POST" && isset($_SESSION["id"])){
                $title = $request["title"];
                $description = $request["description"];
                $status = $request["status"];
                include_once("models/Todo.php");
                //Instance of Model Todo and call of save function
                $todo = new Todo();
                if($todo->save($title, $description, $status)){
                    $ok = "To Do created successfully";
                    include_once("views/home/new_todo_view.php");
                }else{
                    $error = "Error creating To Do";
                    include_once("views/home/new_todo_view.php");
                }
            }else{
                //Only logged users and POST method
                header('Location: /');
            }
        }

    }

    $classObj = new NewTodo();
?>