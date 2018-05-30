<?php

require_once 'php-pdo/editar.php';
require_once 'php-pdo/elimilar.php';
require_once 'php-pdo/insertar.php';
require_once 'php-pdo/leer.php';

if(!empty($_GET))
{
    $route = $_GET['route'];
}
else
{
    $route = '/';
}

switch ($route) 
{
    case '/':
        require_once './Controllers/IndexController.php';
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            IndexController::iniciar_sesion();
        }
        else{
            IndexController::index();
        }
        break;
    
    case 'home':
        require_once './Controllers/HomeController.php';
        HomeController::index();
        break;

    case 'accion':
        require_once './Controllers/AccionController.php';
        break;
    case 'logout':
        session_destroy();
        break;
}