
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
<?php 

session_start();
if(!empty($_SESSION['active'])){

	header("location:cambiar_pass.php");

}else{
	if(!empty($_POST)){
		if(!empty($_POST['login']) || !empty($_POST['password'])){
			require ("../lib/config.php");

		    $nombre=  (isset($_POST['login']))    ? $_POST['login']    :"";
		    $contra=  (isset($_POST['password'])) ? $_POST['password'] :"";//md5 encripta la clave

			$sql = "SELECT * FROM USUARIOS_PASS WHERE USUARIO = '$nombre' AND PASS = '$contra'";

			$resultado = $base ->prepare($sql);
			$resultado->execute();

			$numero_registro = $resultado->rowCount();

			if($numero_registro != 0){
				$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
				
				$_SESSION["active"]= true;
				$_SESSION["iduser"]=$data['id'];

				header("location:cambiar_pass.php");
			}
			else{
				echo "Usuario o contraseña incorrectos";
				session_destroy();
			}
		}

	}else{
		header("location:login.php");
	}


}

?>
<br>
<a href="login.php">Volver</a>


</body>
</html>