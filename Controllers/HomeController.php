<?php

class HomeController
{
    public static function index()
    {
        session_start();

        if(empty($_SESSION))
        {
            header('Location: /');
        }

        $transacciones = get_transaciones_usuario($_SESSION['rut']);

        $datos = [
            'menues' => [
                [
                    'url' => '/home',
                    'texto' => 'Home',
                ],
                [
                    'url' => '/acciones',
                    'texto' => 'Acciones',
                ],
                [
                    'url' => '/logout',
                    'texto' => 'Salir',
                ],
            ],
            'transaciones' => $transacciones,
        ];

        self::render('Views/home.php', $datos);
    }

    public static function render($vista, $datos = [])
    {
        extract($datos);

        include 'Views/layouts/header.php';
        include $vista;
        include 'Views/layouts/footer.php';
    }
}