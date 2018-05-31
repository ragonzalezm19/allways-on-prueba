<?php
  /*
    Ejemplo de una funcion editar

    function editar($id, $arg2){
      try {
        $pdo = database::connect();
        $flag = true;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $params = array(
            ':arg1' => $arg1,
            ':arg2' => $arg2
          );
        $sql = $pdo->prepare("UPDATE nombre_tabla
                                SET nombre_campo = :arg 
                                  WHERE nombre_campo_primario = :arg2");
        try {
          $pdo->beginTransaction();
          $sql->execute($params);
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

  function actualizar_saldo($id, $saldo){
    try {
      $pdo = database::connect();
      $flag = true;
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $params = array(
          ':id' => $id,
          ':saldo' => $saldo
        );
      $sql = $pdo->prepare("UPDATE cuenta
                              SET saldo = :saldo 
                                WHERE id = :id");
      try {
        $pdo->beginTransaction();
        $sql->execute($params);
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

  function update_numero_cuenta($id, $numero)
  {
    try {
      $pdo = database::connect();
      $flag = true;
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $params = array(
          ':id' => $id,
          ':numero' => $numero,
        );
      $sql = $pdo->prepare("UPDATE tipo_cuenta
                              SET numero = :numero 
                                WHERE id = :id");
      try {
        $pdo->beginTransaction();
        $sql->execute($params);
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