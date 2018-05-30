<?php
  /*
    Ejemplo de una funcion leer

    function leer($arg1, $arg2) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT a.campo_1, a.campo_2, b.campo_1
						FROM tabla_a AS a
							INNER JOIN tabla_b b ON b.id = a.b_id
							WHERE a.campo_1 = '{$arg1}' 
							AND a.campo_2 = '{$arg2}'";
			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}
  */

	require_once 'database.php';

	function existe_cuenta($rut, $clave) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT COUNT(*) AS cantidad FROM cuenta WHERE rut = '$rut' AND clave = MD5('$clave')";
			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data[0]['cantidad'];
		}
	
		function get_info_usuario($rut)
		{
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "SELECT c.id, c.rut, c.nombre, c.apellido, c.cuenta, tc.tipo AS tipo_cuenta FROM cuenta AS c INNER JOIN tipo_cuenta AS tc ON tc.id = c.tipo_cuenta_id WHERE c.rut = '$rut'";

			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data[0];
		}

		function get_transaciones_usuario($rut)
		{
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "SELECT tc.tipo AS tipo_transacion, t.cuenta_origen, t.cuenta_destino, t.monto FROM cuenta AS c INNER JOIN transaccion AS t ON t.cuenta_origen = c.id OR t.cuenta_destino = c.id INNER JOIN tipo_cuenta AS tc ON tc.id = t.tipo_transaccion_id WHERE c.rut = '$rut'";

			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}