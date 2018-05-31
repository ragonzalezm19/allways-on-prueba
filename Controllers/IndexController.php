<?php

class IndexController
{
    public static function index()
    {   
        session_start();

        if(!empty($_SESSION))
        {
            header('Location: /home');
        }

        $datos = [
            'menues' => [
                [
                    'url' => '/crear-cuenta',
                    'texto' => 'Crear Cuenta',
                ],
            ],
        ];
        
        self::render('Views/inicio-sesion.php', $datos);
    }

    public static function render($vista, $datos = [])
    {
        extract($datos);

        include 'Views/layouts/header.php';
        include $vista;
        include 'Views/layouts/footer.php';
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
            $_SESSION['saldo'] = $usuario['saldo'];

            // header('Location: /always-on-prueba/home');
            header('Location: /home');
        }
        else
        {
            $datos = [
                'menues' => [
                    [
                        'url' => '/crear-cuenta',
                        'texto' => 'Crear Cuenta',
                    ],
                ],
                'error' => [
                    'titulo' => 'Error',
                    'mensaje' => 'Rut o Clave incorrecta',
                ],
            ];

            self::render('Views/inicio-sesion.php', $datos);
        }

        
    }
}