
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
<?php 
session_start();

if(!empty($_SESSION['active'])){
	header("location:../FormDeCarga.php");
}else{
	if(!empty($_POST)){
			require ("../lib/config.php");
			$nombre = (isset($_POST['login']))    ? $_POST['login']    :"";
			$contra = (isset($_POST['password'])) ? $_POST['password'] :"";

			$sql = "SELECT * FROM USUARIOS_PASS WHERE (USUARIO = 'Maracake20' OR USUARIO = 'ADMIN') AND PASS = '$contra'";
			$resultado = $base ->prepare($sql);
			$resultado->execute();
			$numero_registro = $resultado->rowCount();

			if($numero_registro != 0){
				$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
				foreach ($data as $res ){
					
				$_SESSION["active"]= true;
				$_SESSION["iduser"]= $res['id'];
				}
				var_dump($res['control']);exit;
				if($res['control'] != 1){
					header("location:cambiar_pass.php");
					$control="UPDATE USUARIOS_PASS SET CONTROL=1 WHERE(USUARIO = 'Maracake20' OR USUARIO = 'ADMIN') AND PASS = '$contra' ";
					$resultado = $base ->prepare($control);
					$resultado->execute();
					}else{
					header("location:../FormDeCarga.php");
					}

				}else{

					echo "Usuario o contraseña incorrectos";
					session_destroy();
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







	