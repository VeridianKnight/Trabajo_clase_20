<?php
//Creacion de variables que cotiee la informacio de acceso para la conexion con la base de datos
$server = "localhost"; //aca va url o localhost en caso de ser un servidor local
$username = "root";//cuando se crea la instalacio de mysql se crea un unico usuario root @ localhost, que tiene todos los privlegios
$password = "";//comillas vacias porque no tiene password
$dbName = "productos_precios";//nombre de la database(base de datos)

//creacion de la conexion con el server y la base de datos
$conexion = new mysqli($server, $username, $password, $dbName);

//Verificacion de la conexion al server
if ($conexion->connect_error){
    die("Error de conexión: " . $conexion->connect_error);
}
?>