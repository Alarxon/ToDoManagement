<?php
    //Routing
    $url = $_SERVER['REQUEST_URI'];
    //Default Controller and Action
    $controller_name = 'Login';
    $action_name = 'index';

    //Get the Controller from the URL
    if (preg_match('/\/([a-z]+)/i', $url, $matches)) {
        $controller_name = ucfirst($matches[1]);
        $url = str_replace($matches[1],"",$url);
    }

    //Get the Action from the URL
    if (preg_match('/\/([a-z]+)/i', $url, $matches)) {
        $action_name = $matches[1];
    }


    //Include the controller and call the specific action
    $controller_file = 'controllers/' . $controller_name . '.php';
    if (file_exists($controller_file)) {
        include_once($controller_file);
        $classObj->$action_name($_REQUEST, $_SERVER['REQUEST_METHOD']);
    } else {
        //Redirect to index if route doesn't exits
        header('Location: /');
    }

?>