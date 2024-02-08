<?php
//phpinfo();
session_start();
require_once('autoload.php');
require_once('config/parameters.php');
require_once('helpers/utils.php');
require_once('views/layout/header.php');

if(isset($_GET['controller'])){
    $controller_pref = $_GET['controller'];
    $controller_name = $controller_pref."Controller";
    $get_controller = new $controller_name();

    if(class_exists($controller_name)){
        if(isset($_GET['action']) && method_exists($get_controller, $_GET['action'])){
            $action = $_GET['action'];
            $get_controller->$action();
        }else{
            echo 'Page error';
        }

    }else{
        echo 'Page error';
    }
}else{
    echo 'Page error';
}