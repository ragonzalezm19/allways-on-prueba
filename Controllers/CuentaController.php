<?php

class CuentaController
{
  public static function index()
  {

    $tipos_cuentas = get_tipos_cuenta();

    $datos = [
      'menues' => [
        [
            'url' => '/',
            'texto' => 'Inicio',
        ],
      ],
      'tipos_cuentas' => $tipos_cuentas,
    ];

    self::render('Views/crear-cuenta.php', $datos);
  }

  public static function crear_cuenta()
  {
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipo_cuenta = $_POST['tipo_cuenta'];
    $clave = $_POST['clave'];
    $numero_cuenta = self::proximo_numero_cuenta($tipo_cuenta);

    if(!preg_match("/^(\d{0,2}(\.|)\d{3}(\.|)\d{3}-)([a-zA-Z]{1}$|\d{1}$)$/", $rut))
    {
      $tipos_cuentas = get_tipos_cuenta();
      $datos = [
        'menues' => [
          [
              'url' => '/',
              'texto' => 'Inicio',
          ],
        ],
        'tipos_cuentas' => $tipos_cuentas,
        'error' => [
          'titulo' => 'Error',
          'mensaje' => 'RUT no valido 1'
        ],
      ];
      self::render('Views/crear-cuenta.php', $datos);
  
      die();
    }

    $rut = str_replace('.', '', $rut);

    if(!self::valida_rut($rut))
    {
      $tipos_cuentas = get_tipos_cuenta();
      $datos = [
        'menues' => [
          [
              'url' => '/',
              'texto' => 'Inicio',
          ],
        ],
        'tipos_cuentas' => $tipos_cuentas,
        'error' => [
          'titulo' => 'Error',
          'mensaje' => 'RUT no valido 2'
        ],
      ];
      self::render('Views/crear-cuenta.php', $datos);

      die();
    }
    

    if(insertar_nuevo_usuario($rut, $nombre, $apellido, $tipo_cuenta, $clave, $numero_cuenta))
    {
      update_numero_cuenta($tipo_cuenta, get_tipo_cuenta_numero($tipo_cuenta) + 1);

      session_start();

      $usuario = get_info_usuario($rut);

      $_SESSION['id'] = $usuario['id'];
      $_SESSION['rut'] = $usuario['rut'];
      $_SESSION['nombre'] = $usuario['nombre'];
      $_SESSION['apellido'] = $usuario['apellido'];
      $_SESSION['cuenta'] = $usuario['cuenta'];
      $_SESSIOM['tipo_cuenta'] = $usuario['tipo_cuenta'];
      $_SESSION['saldo'] = $usuario['saldo'];

      header('Location: /home');
    }
    else
    {

    }
    
  }

  public static function proximo_numero_cuenta($tipo_cuenta)
  {
    $numero = (string)(get_tipo_cuenta_numero($tipo_cuenta) + 1);

    switch (strlen($numero)) {
      case '1':
        str_pad($numero, 3, "0", STR_PAD_LEFT);
        break;
      case '2':
        str_pad($numero, 2, "0", STR_PAD_LEFT);
        break;
      case '3':
        str_pad($numero, 1, "0", STR_PAD_LEFT);
        break;
      case '4':
        str_pad($numero, 0, "0", STR_PAD_LEFT);
        break;
    }

    return "000$tipo_cuenta-$numero";
  }

  public static function valida_rut($rut)
  {
    $dv  = substr($rut, -1);
    $numero = (int)substr($rut, 0, strlen($rut)-1);
    $i = 2;
    $suma = 0;

    foreach(array_reverse(str_split($numero)) as $v)
    {
      if($i==8)
      {
        $i = 2;
      }
      $suma += $v * $i;
      ++$i;
    }

    $dvr = 11 - ($suma % 11);
    
    if($dvr == 11)
    {
      $dvr = 0;
    }

    if($dvr == 10)
    {
      $dvr = 'K';
    }

    if($dvr == strtoupper($dv))
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public static function render($vista, $datos = [])
    {
        extract($datos);

        include 'Views/layouts/header.php';
        include $vista;
        include 'Views/layouts/footer.php';
    }
}