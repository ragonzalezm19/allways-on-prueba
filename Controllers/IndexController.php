<?php

class IndexController
{
    public static function index()
    {
        self::render('views/inicio-sesion.php');
    }

    public static function render($vista, $datos = [])
    {
        extract($datos);

        include $vista;
    }

    public static function iniciar_sesion(){
        // require_once 'php-pdo/leer.php';

        $rut = $_POST['rut'];
        $clave = $_POST['clave'];

        if(existe_cuenta($rut, $clave) == 1)
        {
            session_start();
            
            $usuario = get_info_usuario($rut);

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['rut'] = $usuario['rut'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['apellido'] = $usuario['apellido'];
            $_SESSION['cuenta'] = $usuario['cuenta'];
            $_SESSIOM['tipo_cuenta'] = $usuario['tipo_cuenta'];

            header('Location: /always-on-prueba/home');
        }

        
    }
}