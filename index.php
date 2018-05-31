<?php

/* Show All Erros */
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
/* Show All Erros */

require_once 'Conexion/editar.php';
require_once 'Conexion/eliminar.php';
require_once 'Conexion/insertar.php';
require_once 'Conexion/leer.php';

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

    case 'home/':
    case 'home':
        require_once './Controllers/HomeController.php';
        HomeController::index();
        break;

    case 'acciones/':
    case 'acciones':
        require_once './Controllers/AccionesController.php';
        AccionesController::index();
        break;

    case 'acciones/retiro/':
    case 'acciones/retiro':
        require_once './Controllers/AccionesController.php';
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            AccionesController::retiro_post();
        }
        else
        {
            AccionesController::retiro_index();
        }
        break;    
    
    case 'acciones/abono/':
    case 'acciones/abono':
        require_once './Controllers/AccionesController.php';
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            AccionesController::abono_post();
        }
        else
        {
            AccionesController::abono_index();
        }
        break; 

    case 'acciones/transferencia/':
    case 'acciones/transferencia':
        require_once './Controllers/AccionesController.php';
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            AccionesController::transferencia_post();
        }
        else
        {
            AccionesController::transferencia_index();
        }

        break;
    
    case 'crear-cuenta/':
    case 'crear-cuenta':
        require_once './Controllers/CuentaController.php';
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            CuentaController::crear_cuenta();
        }
        else
        {
            CuentaController::index();
        }
        break;

    case 'logout/':
    case 'logout':
        session_start();
        session_destroy();

        header('Location: /');
        break;
}