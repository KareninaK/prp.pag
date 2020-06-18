<?php
session_start();
if(!empty($_SESSION['active'])){
include ("../lib/config.php");
$id='';
$pass=(isset($_POST['actual']))?$_POST['actual']:"";
$new=(isset($_POST['new']))?$_POST['new']:"";
$conf=(isset($_POST['confirm']))?$_POST['confirm']:"";

function validar_clave($new,&$error_clave){

   if(strlen($new) < 6 || strlen($new) >20 ) {
      $error_clave = "La clave nueva debe tener entre 6 y 20 caracteres";
      return false;
   }
   if (!preg_match('`[a-z]`',$new)){
      $error_clave = "La clave nueva debe tener al menos una letra minúscula";
      return false;
   }
   if (!preg_match('`[A-Z]`',$new)){
      $error_clave = "La clave nueva debe tener al menos una letra mayúscula";
      return false;
   }
   if (!preg_match('`[0-9]`',$new)){
      $error_clave = "La clave nueva debe tener al menos un caracter numérico";
      return false;
   }
   $error_clave = "";
   return true;
}

if(!empty($_POST)){
	
	$sql="SELECT * FROM USUARIOS_PASS WHERE PASS='$pass'";
	$resulta = $base->prepare($sql);
	$resulta->execute();	
	$numero_reg = $resulta->rowCount();	
	$lista=$resulta->fetchAll(PDO::FETCH_ASSOC);
	foreach ($lista as $res ){
		$id = $res['ID'];
		$nombre = $res['USUARIO'];
		$pass = $res['PASS'];
	}	

	if($numero_reg==0){
		echo "contraseña actual incorrecta";		
	}else{
		$error_encontrado="";
		   if (validar_clave($_POST["new"], $error_encontrado)){

			    if(strcmp($new,$conf) == 0){ //strcmp devuelve 0 si son iguales
					$sqlN="UPDATE USUARIOS_PASS SET PASS='$conf' WHERE ID= '$id' AND  (USUARIO = 'Maracake20' OR USUARIO = 'ADMIN') AND PASS = '$pass'";
					$result = $base->prepare($sqlN);
					$result->execute();
					echo"REGISTRO EXITOSO";
					session_destroy();
				}else{
					echo "Las contraseñas no coinciden ";
				}
			}else{
				echo $error_encontrado;
			}	
	}
}
}else{
	session_destroy();
	header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title> ACTUALIZAR CONTRASEÑA</title>
	<meta charset="UTF-8">

	<script src="../js/show.js"></script>

</head>
<body>

	<form action="" method="post">
	<span id="mensaje"></span>
	<table>
		<tr>
			<td class="izq">Contraseña actual:</td>
			<td class="der"><input type="password" name="actual" id="pa" required/></td>
			<td><button type="button"  onclick="mostrarContrasena('pa')"/>ver</td>			
		</tr>
		<div id="mostrar">
		<tr>
			<td class="izq">Nueva contraseña:</td>
			<td class="der"><input type= "password" name ="new" id="pas" required/> </td>
			<td><button type="button"  onclick="mostrarContrasena('pas')"/>ver</td>		
		</tr>
		</div>
		<tr>
			<td class="izq">Confirmar contraseña:</td>
			<td class="der"><input type= "password" name ="confirm" id="pass" required/> </td>
			<td><button type="button"  onclick="mostrarContrasena('pass')"/>ver</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="enviar" value="Guardar"/></td>
			<td><a href="login.php"><input type="button" value="Ir a login"/></a></td>
		</tr>
	</table>
	</form>	

</body>
</html>