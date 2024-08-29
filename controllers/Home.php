<?php

    //Home functionality
    class Home {
        //Load Home page
        public function index($request, $method){
            @session_start();
            if($method === "GET" && isset($_SESSION["id"])){
                include_once("views/home/home_view.php");
            }else{
                //Only logged users and method is GET
                header('Location: /');
            }
        }

    }

    $classObj = new Home();
?>