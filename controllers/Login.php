<?php

    //Login functionality
    class Login {
        //Load Login page
        public function index($request, $method){
            @session_start();
            if($method === "GET" && !isset($_SESSION["id"])){
                include_once("views/login/login_view.php");
            }else if(isset($_SESSION["id"])){
                //Redirect to home if already logged
                header('Location: /home/index/');
            }else{
                //Redirect if method is not GET
                header('Location: /');
            }
        }

        //Process Login
        public function process($request, $method){
            if($method === "POST"){
                $username = $request["username"];
                $password = $request["psw"];

                include_once("models/User.php");
                //Instance of Model User and call of login function
                $user = new User();
                if($user->login($username, $password)){
                    header('Location: /home/index/');
                }else{
                    $error = "Incorrect username or password";
                    include_once("views/login/login_view.php");
                }
            }else{
                //Redirect if method is not POST
                header('Location: /');
            }
        }

        //Sign out process
        public function close($request, $method){
            @session_start();
            if($method === "GET" && isset($_SESSION["id"])){
                //Destroy session data and return to index
                session_unset();
                session_destroy();
                header('Location: /');
            }else{
                //Redirect if method is not GET or is not logged
                header('Location: /');
            }
        }
    }

    $classObj = new Login();
?>