<?php
include ("../lib/config.php");

if(!empty($_POST)){
	$pass=(isset($_POST['actual']))?$_POST['actual']:"";
	$new=(isset($_POST['new']))?$_POST['new']:"";
	$conf=(isset($_POST['confirm']))?$_POST['confirm']:"";


	$sql="SELECT * FROM USUARIOS_PASS WHERE PASS='$pass'";
	$result = $base->prepare($sql);
	$result->execute();	
	$numero_reg = $result->rowCount();		

	if($numero_reg>0){
		if($new==$conf){
			$sqlN="UPDATE USUARIOS_PASS SET PASS='$conf'";
			$result = $base->prepare($sqlN);
			$result->execute();
			echo"REGISTRO EXITOSO";
		}else{
			echo "Las contraseñas no coinciden";
		}
		
	}
	else{
		echo "contraseña actual incorrecta";
	}	
}	

?>
<!DOCTYPE html>
<html>
<head>
	<title> LOGIN</title>
	<meta charset="UTF-8">
</head>
<body>

<h1> ACTUALIZAR CONTRASEÑA </h1>

<form action="" method="post">

<table>
	<tr>
		<td class="izq">Contraseña actual:</td>
		<td class="der"><input type="password" name="actual" required></td>
	</tr>
	<tr>
		<td class="izq">Nueva contraseña:</td>
		<td class="der"><input type= "password" name ="new" required> </td>
	</tr>
	<tr>
		<td class="izq">Confirmar contraseña:</td>
		<td class="der"><input type= "password" name ="confirm" required> </td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="enviar" value="Guardar"></td>
		<td><a href="login.php"><input type="button" value="Ir a login"></a></td>
	</tr>
</table>

</body>
</html>
