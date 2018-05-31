<?php
	class Database 
	{
		private static $dbName = 'allways_on_prueba' ; // nombre de la base de datos
		private static $dbHost = '' ; // nombre del host
		private static $dbUsername = ''; // usuario de la base de datos
		private static $dbUserPassword = ''; // contraseña del usuario
		
		private static $cont  = null;
		
		public function __construct() {
			exit('Init function is not allowed');
		}
		
		public static function connect()
		{
			// One connection through whole application
				if ( null == self::$cont )
				{
					try
					{
						self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
					}
					catch(PDOException $e)
					{
						die($e->getMessage());
					}
				}
				return self::$cont;
		}
		
		public static function disconnect()
		{
			self::$cont = null;
		}
	}
?>