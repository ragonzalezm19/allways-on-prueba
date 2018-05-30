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