<!DOCTYPE html>
<html>
<head>
	<meta charse="utf-8">
	<title></title>
</head>
<body>

	<form action="Datos.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>
					<label for="articulo">Nombre del articulo:</label>
					<input type="text" id="name" name="name">
				</td>
			</tr>
			<tr>
				<td>
					<label for="articulo">Precio:</label>
					<input type="text" id="price" name="price">
				</td>
			</tr>
			<tr>
				<td>
					<label for="articulo">Categoría:</label>

					<select id="articulo" name="categoria">
					  <option value="indumentaria">Indumentaria</option>
					  <option value="accesorios">Accesorios</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="articulo">Estado:</label>

					<select id="estado" name="estado">
					  <option value="stock">En Stock</option>
					  <option value="sinStock">SIN STOCK</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for ="imagen">Imagen:</label>
					<input type="file" name="imagen1" size="20">
				</td>
			</tr>
			<tr>
				<td>
					<label for ="imagen1">Imagen:</label>
					<input type="file" name="imagen2" size="20">
				</td>
			</tr>
			<tr>
				<td>
					<label for ="imagen">Imagen:</label>
				
					<input type="file" name="imagen3" size="20">
				</td>
			</tr>
			
				<td colspan="2" style="text-align:center">
					<input type="submit" value="Confirmar">
				</td>
			</tr>
		</table>
	</form>
	

</body>
</html>