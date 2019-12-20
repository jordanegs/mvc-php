<?php

session_start();

require_once 'model/Database.php';

if(isset($_SESSION['usuario_id'])) {
    $controller = isset($_REQUEST['c']) ? $_REQUEST['c'] : 'Usuario';
    $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
} else {
    $controller = 'Auth';
    $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
}

require_once "controller/$controller.php";
$controller = ucwords($controller). 'Controller';
$controller = new $controller;
call_user_func(array($controller, $action));

