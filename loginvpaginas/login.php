<!DOCTYPE html>
<html>
<head>
	<title> LOGIN</title>
	<meta charset="UTF-8">
</head>
<body>

<h1> INTRODUCE LOS DATOS </h1>

<form action = "comprobar_login.php" method="post">

<table>
	<tr>
		<td class="izq">Usuario:</td>
		<td class="der"><input type="text" name="login" required></td>
	</tr>
	<tr>
		<td class="izq">Contraseña:</td>
		<td class="der"><input type= "password" name ="password" required> </td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="enviar" value="Enviar"></td>
	</tr>
</table>


</body>
</html>


