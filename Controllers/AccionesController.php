<?php

class AccionesController
{
    public static function index()
    {
        session_start();

        if(empty($_SESSION))
        {
            header('Location: /');
        }

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
        ];

        self::render('Views/acciones.php', $datos);
    }

    public static function retiro_index()
    {
        session_start();

        if(empty($_SESSION))
        {
            header('Location: /');
        }

        $datos = [
            'saldo' => $_SESSION['saldo'],
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
        ];

        self::render('Views/acciones/retiro.php', $datos);
    }

    public static function retiro_post()
    {
        session_start();

        $cuenta_origen = NULL;
        $cuenta_destino = $_SESSION['id'];
        $monto = $_POST['monto'];

        if(realizar_transaccion($cuenta_origen, $cuenta_destino, $monto, 1))
        {
            actualizar_saldo($_SESSION['id'], $_SESSION['saldo'] - $monto);

            $datos_transaccion = [
                'status' => true,
                'titulo' => 'Retiro exitosa',
                'mensaje' => "Se Realizo una retiro exitosa de $ $monto pesos de tu cuenta",
            ];
        }
        else
        {
            $datos_transaccion = [
                'status' => false,
                'titulo' => 'Retiro fallida',
                'mensaje' => "Error al retirar $ $monto pesos de tu cuenta",
            ];
        }

        $_SESSION['saldo'] = get_saldo($_SESSION['id']);

        $datos = [
            'saldo' => $_SESSION['saldo'],
            'datos_transaccion' =>$datos_transaccion,
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
        ];

        self::render('Views/acciones/retiro.php', $datos);
    }

    public static function abono_index()
    {
        session_start();

        if(empty($_SESSION))
        {
            header('Location: /');
        }

        $datos = [
            'saldo' => $_SESSION['saldo'],
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
        ];

        self::render('Views/acciones/abono.php', $datos);
    }

    public static function abono_post()
    {
        session_start();

        $cuenta_origen = NULL;
        $cuenta_destino = $_SESSION['id'];
        $monto = $_POST['monto'];

        if(realizar_transaccion($cuenta_origen, $cuenta_destino, $monto, 2))
        {
            actualizar_saldo($_SESSION['id'], $_SESSION['saldo'] + $monto);

            $datos_transaccion = [
                'status' => true,
                'titulo' => 'Abono exitosa',
                'mensaje' => "Se Realizo una abono exitosa de $ $monto pesos de tu cuenta",
            ];
        }
        else
        {
            $datos_transaccion = [
                'status' => false,
                'titulo' => 'Abono fallida',
                'mensaje' => "Error al abono $ $monto pesos de tu cuenta",
            ];
        }

        $_SESSION['saldo'] = get_saldo($_SESSION['id']);

        $datos = [
            'saldo' => $_SESSION['saldo'],
            'datos_transaccion' =>$datos_transaccion,
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
        ];

        self::render('Views/acciones/abono.php', $datos);
    }

    public static function transferencia_index()
    {
        session_start();

        if(empty($_SESSION))
        {
            header('Location: /');
        }

        $cuentas = get_otras_cuentas($_SESSION['id']);

        $datos = [
            'saldo' => $_SESSION['saldo'],
            'cuentas' => $cuentas,
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
        ];

        self::render('Views/acciones/transferencia.php', $datos);
    }

    public static function transferencia_post()
    {
        session_start();

        $cuenta_origen = $_SESSION['id'];
        $cuenta_destino = $_POST['cuenta'];
        $monto = $_POST['monto'];

        if(realizar_transaccion($cuenta_origen, $cuenta_destino, $monto, 3))
        {
            actualizar_saldo($_SESSION['id'], $_SESSION['saldo'] - $monto);

            $saldo_cuenta_destino = get_saldo($_POST['cuenta']);

            actualizar_saldo($cuenta_destino, $saldo_cuenta_destino + $monto);

            $datos_transaccion = [
                'status' => true,
                'titulo' => 'Transferencia exitosa',
                'mensaje' => "Se Realizo una transferencia exitosa de $ $monto pesos",
            ];
        }
        else
        {
            $datos_transaccion = [
                'status' => false,
                'titulo' => 'Transferencia fallida',
                'mensaje' => "Error al transferir $ $monto",
            ];
        }

        $cuentas = get_otras_cuentas($_SESSION['id']);

        $_SESSION['saldo'] = get_saldo($_SESSION['id']);

        $datos = [
            'saldo' => $_SESSION['saldo'],
            'cuentas' => $cuentas,
            'datos_transaccion' =>$datos_transaccion,
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
        ];

        self::render('Views/acciones/transferencia.php', $datos);
    }

    public static function render($vista, $datos = [])
    {
        extract($datos);

        include 'Views/layouts/header.php';
        include $vista;
        include 'Views/layouts/footer.php';
    }
}