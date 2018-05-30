<?php
  /*
    Ejemplo de una funcion editar

    function editar($arg1, $arg2){
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