# Instalacion

En el archivo *Conexionex/database.php* hay que asignar los valores de la base de datos

`
private static $dbName = '' ; // nombre de la base de datos
private static $dbHost = '' ; // nombre del host
private static $dbUsername = ''; // usuario de la base de datos
private static $dbUserPassword = ''; // contraseña del usuario
`

Yo lo trabaje asignando un hosting virtual por eso las rutas estan asignadas siempre a */*, pero solo habria que agregar a los 'headers' que se utilizan la ruta final si es que se esta usando un XAMP o WAMP

Estos se encuentran en:

1. IndexController
  - Linea 11
  - Linea 56
2. HomeController
  - Linea 11
3. AccionesController
  - Linea 11
  - Linea 48
  - Linea 121
  - Linea 202
4. CuentaController
  - Linea 93

En el archivo *dump-allways_on_prueba-201805302325.sql* se encuntra lo necesario para crear la base de datos