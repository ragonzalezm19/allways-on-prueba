<?php 
  /*
    Ejemplo de una funcion eliminar

    function eliminar($arg){
      try {
        $pdo = database::connect();
        $flag = true;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $params = array(
            ':arg' => $arg
          );
        $sql = $pdo->prepare("DELETE FROM nombre_tabla 
                        WHERE arg = {$arg}");
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