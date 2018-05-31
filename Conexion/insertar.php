<?php
  /*
    Ejemplo de una funcion insertar

    function insertar($arg1, $arg2){
      try {
        $pdo = database::connect();
        $flag = true;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $params1 = array(
            ':arg1' => $arg1,
            ':arg2' => $arg2
          );
        $sql = $pdo->prepare("INSERT INTO nombre_tabla
                            (arg1, arg2)
                              VALUES
                                  (:arg1, :arg2)");
        try {
          $pdo->beginTransaction();
          $sql->execute($params1);
          $pdo->commit();
        } catch(PDOExecption $e) {
          $pdo->rollback();
          $flag = false;
        }
      } catch( PDOExecption $e ) {
        $flag = false;
      }
      database::disconnect();
      return $flag;
    }
  */
  require_once 'database.php';

  function realizar_transaccion($cuenta_origen, $cuenta_destino, $monto, $tipo){
    try {
      $pdo = database::connect();
      $flag = true;
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $params1 = array(
          ':cuenta_origen' => $cuenta_origen,
          ':cuenta_destino' => $cuenta_destino,
          ':monto' => $monto,
          ':tipo' => $tipo,
        );
      $sql = $pdo->prepare("INSERT INTO transaccion
                          (cuenta_origen, cuenta_destino, monto, tipo_transaccion_id)
                            VALUES
                                (:cuenta_origen, :cuenta_destino, :monto, :tipo)");
      try {
        $pdo->beginTransaction();
        $sql->execute($params1);
        $pdo->commit();
      } catch(PDOExecption $e) {
        $pdo->rollback();
        $flag = false;
      }
    } catch( PDOExecption $e ) {
      $flag = false;
    }
    database::disconnect();
    return $flag;
  }

  function insertar_nuevo_usuario($rut, $nombre, $apellido, $tipo_cuenta, $clave, $numero_cuenta){
    try {
      $pdo = database::connect();
      $flag = true;
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $params1 = array(
          ':rut' => $rut,
          ':nombre' => $nombre,
          ':apellido' => $apellido,
          ':tipo_cuenta' => $tipo_cuenta,
          ':clave' => $clave,
          ':numero_cuenta' => $numero_cuenta,
        );
      $sql = $pdo->prepare("INSERT INTO cuenta
                          (rut, nombre, apellido, tipo_cuenta_id, clave, cuenta, saldo)
                            VALUES
                                (:rut, :nombre, :apellido, :tipo_cuenta, MD5(:clave), :numero_cuenta, 0)");
      try {
        $pdo->beginTransaction();
        $sql->execute($params1);
        $pdo->commit();
      } catch(PDOExecption $e) {
        $pdo->rollback();
        $flag = false;
      }
    } catch( PDOExecption $e ) {
      $flag = false;
    }
    database::disconnect();
    return $flag;
  }