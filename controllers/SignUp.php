<?php

    //SignUp functionality
    class SignUp {
        //Load SignUp page
        public function index($request, $method){
            if($method === "GET"){
                include_once("views/login/signup_view.php");
            }else{
                //Only GET Method
                header('Location: /');
            }
        }

        //Process SignUp
        public function process($request, $method){
            if($method === "POST"){
                $username = $request["username"];
                $password = $request["psw"];
                $password_repeat = $request["psw_repeat"];

                if($password !== $password_repeat){
                    $error = "Password doesn't match!";
                    include_once("views/login/signup_view.php");
                }else{
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    include_once("models/User.php");
                    //Instance of Model User and call of save function
                    $user = new User();
                    if($user->save($username, $hashed_password)){
                        $ok = "User created successfully";
                        include_once("views/login/signup_view.php");
                    }else{
                        $error = "Error creating user";
                        include_once("views/login/signup_view.php");
                    }
                }
            }else{
                //Only POST Method
                header('Location: /');
            }
        }
    }

    $classObj = new SignUp();
?>