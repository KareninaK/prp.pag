<?php
define('HOST', 'localhost');
define('DB', 'pruebas');
define('USER', 'root');
define('PASSWORD', '');




$db_host = "mysql:host=localhost; dbname=pruebas";
$db_user = "root";
$db_pass = "";

try{
	$base= new PDO($db_host,$db_user,$db_pass);
	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
	echo "Fallo la conexion con la BBDD".$e->getMessage();;
}

?>