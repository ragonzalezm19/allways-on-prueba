<?php

class HomeController
{
    public static function index()
    {
        session_start();   
        $transacciones = get_transaciones_usuario($_SESSION['rut']);

        self::render('views/home.php', ['transaciones' => $transacciones]);
    }

    public static function render($vista, $datos = [])
    {
        extract($datos);

        include $vista;
    }
}