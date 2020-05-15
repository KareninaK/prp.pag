<?php
//recibimos los datos de la imagen
$nombre_articulo=$_POST['name'];
$precio = $_POST['price'];
$categoria = $_POST['categoria'];
$estado = $_POST['estado'];

$nombre_imagen1=$_FILES['imagen1']['name'];
$nombre_imagen2=$_FILES['imagen2']['name'];
$nombre_imagen3=$_FILES['imagen3']['name']; //input type file, nombre, imagen..

$tipo_imagen1=$_FILES['imagen1']['type'];
$tipo_imagen2=$_FILES['imagen2']['type'];
$tipo_imagen3=$_FILES['imagen3']['type'];

$tamanio_imagen1=$_FILES['imagen1']['size'];
$tamanio_imagen2=$_FILES['imagen2']['size'];
$tamanio_imagen3=$_FILES['imagen3']['size'];

if ($tamanio_imagen1<=1000000 & $tamanio_imagen2<=1000000 & $tamanio_imagen3<=1000000){

	if($tipo_imagen1 == "image/jpeg" || $tipo_imagen1 == "image/jpg" || $tipo_imagen1 == "image/png" || $tipo_imagen2 == "image/jpeg" || $tipo_imagen2 == "image/jpg" || $tipo_imagen2 == "image/png" || $tipo_imagen3 == "image/jpeg" || $tipo_imagen3 == "image/jpg" || $tipo_imagen3 == "image/png"){

		//ruta de la carpeta destino en el servidor
		$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/ProyectosK/Shop/img/';

		//carpeta temporal
		//se pasa la imagen de la carpeta temporal a la carpeta destino
		move_uploaded_file($_FILES['imagen1']['tmp_name'],$carpeta_destino.$nombre_imagen1);
		move_uploaded_file($_FILES['imagen2']['tmp_name'],$carpeta_destino.$nombre_imagen2);
		move_uploaded_file($_FILES['imagen3']['tmp_name'],$carpeta_destino.$nombre_imagen3);
		echo "La imagen fue enviada";
	} else {
		echo "El formato de la imagen no corresponde";
	}

}else{

	echo "El tamanio de la imagen es muy grande" ;
}

require("lib/config.php");


$db_host = HOST;
$db_name = DB;
$db_user = USER;
$db_pass = PASSWORD;


$conexion=mysqli_connect($db_host, $db_user,$db_pass);

if (mysqli_connect_errno()){
	echo "Fallo la conexion con la BBDD";
	exit();
}

mysqli_select_db($conexion, $db_name) or die ("No se encuentra la BBDD");

mysqli_set_charset($conexion, "utf8");

$sql = "INSERT INTO ITEMS (NOMBRE, PRECIO, CATEGORIA, ESTADO, IMAGEN, FOTO1, FOTO2) VALUES ('$nombre_articulo','$precio','$categoria','$estado','$nombre_imagen1','$nombre_imagen2','$nombre_imagen3')";


$resultado = mysqli_query($conexion, $sql);



?>