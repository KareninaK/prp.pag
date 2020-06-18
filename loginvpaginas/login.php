<!DOCTYPE html>
<html>
<head>
	<title> LOGIN</title>
	<meta charset="UTF-8">
	<script src="../js/show.js"></script>

</head>
<body>

<h1> INTRODUCE LOS DATOS </h1>

<form action = "comprobar_login.php" method="post">

<table>
	<tr>
		<td> <label class="izq">Usuario:</label></td>
		<td class="der"><input type="text" name="login" required/></td>
	</tr>
	<tr>
		<td> <label class="izq">Contraseña:</label> </td>
		<td class="der"><input type="password" name ="password" id="pass" required/> </td>
		<td><button type="button"  onclick="mostrarContrasena('pass')"/>ver</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="enviar" value="Enviar"/></td>
	</tr>
</table>
	
</body>
</html>