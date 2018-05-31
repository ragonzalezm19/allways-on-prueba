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

			$sql = "SELECT c.id, c.rut, c.nombre, c.apellido, c.cuenta, c.saldo, tc.tipo AS tipo_cuenta FROM cuenta AS c INNER JOIN tipo_cuenta AS tc ON tc.id = c.tipo_cuenta_id WHERE c.rut = '$rut'";

			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data[0];
		}

		function get_transaciones_usuario($rut)
		{
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "SELECT tt.tipo AS tipo_transacion, 
				(SELECT cu.cuenta FROM cuenta AS cu WHERE cu.id = t.cuenta_origen) AS cuenta_origen, 
				(SELECT cu.cuenta FROM cuenta AS cu WHERE cu.id = t.cuenta_destino) AS cuenta_destino, t.monto FROM cuenta AS c 
				INNER JOIN transaccion AS t ON t.cuenta_origen = c.id OR t.cuenta_destino = c.id 
				INNER JOIN tipo_cuenta AS tc ON tc.id = c.tipo_cuenta_id
				INNER JOIN tipo_transaccion AS tt ON tt.id = t.tipo_transaccion_id
				WHERE c.rut = '$rut'";

			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function get_otras_cuentas($id)
		{
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "SELECT c.id, c.rut, c.cuenta, c.nombre, c.apellido FROM cuenta AS c WHERE c.id <> $id";

			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}

		function get_saldo($id)
		{
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "SELECT c.saldo FROM cuenta AS c WHERE c.id = $id";

			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data[0]['saldo'];
		}

		function get_tipo_cuenta_numero($tipo_cuenta)
		{
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "SELECT numero FROM tipo_cuenta WHERE id = $tipo_cuenta";

			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data[0]['numero'];
		}

		function get_tipos_cuenta()
		{
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "SELECT id, tipo FROM tipo_cuenta";

			$data = $pdo->query($sql);
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		}