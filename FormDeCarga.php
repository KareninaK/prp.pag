<?php 
$id=(isset($_POST['id']))?$_POST['id']:"";
$nombre=(isset($_POST['name']))?$_POST['name']:"";
$precio=(isset($_POST['price']))?$_POST['price']:"";
$cat=(isset($_POST['categoria']))?$_POST['categoria']:"";
$tamaño=(isset($_POST['tamaño']))?$_POST['tamaño']:"";
$imagen1=(isset($_FILES	['imagen1']['name']))?$_FILES['imagen1']['name']:"";
$imagen2=(isset($_FILES	['imagen2']['name']))?$_FILES['imagen2']['name']:"";
$imagen3=(isset($_FILES	['imagen3']['name']))?$_FILES['imagen3']['name']:"";
$imagen4=(isset($_FILES	['imagen4']['name']))?$_FILES['imagen4']['name']:"";
$imagen5=(isset($_FILES	['imagen5']['name']))?$_FILES['imagen5']['name']:"";
$imagen6=(isset($_FILES	['imagen6']['name']))?$_FILES['imagen6']['name']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include ("lib/config.php");

switch($accion){
	case"Agregar":

		$tamanio_imagen1=$_FILES['imagen1']['size'];
		$tamanio_imagen2=$_FILES['imagen2']['size'];
		$tamanio_imagen3=$_FILES['imagen3']['size'];
		$tamanio_imagen4=$_FILES['imagen4']['size'];
		$tamanio_imagen5=$_FILES['imagen5']['size'];
		$tamanio_imagen6=$_FILES['imagen6']['size'];

		if ($tamanio_imagen1<=1000000 & $tamanio_imagen2<=1000000 & $tamanio_imagen3<=1000000 & $tamanio_imagen4<=1000000 & $tamanio_imagen5<=1000000 & $tamanio_imagen6<=1000000){

				//ruta de la carpeta destino en el servidor
				$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/ProyectosK/Shop/img/';

				//carpeta temporal
				//se pasa la imagen de la carpeta temporal a la carpeta destino
				move_uploaded_file($_FILES['imagen1']['tmp_name'],$carpeta_destino.$imagen1);
				move_uploaded_file($_FILES['imagen2']['tmp_name'],$carpeta_destino.$imagen2);
				move_uploaded_file($_FILES['imagen3']['tmp_name'],$carpeta_destino.$imagen3);
				move_uploaded_file($_FILES['imagen4']['tmp_name'],$carpeta_destino.$imagen4);
				move_uploaded_file($_FILES['imagen5']['tmp_name'],$carpeta_destino.$imagen5);
				move_uploaded_file($_FILES['imagen6']['tmp_name'],$carpeta_destino.$imagen6);
				
				$sqlA = "INSERT INTO ITEMS (NOMBRE, PRECIO, CATEGORIA, TAMA, FOTO1, FOTO2, FOTO3, FOTO4, FOTO5, FOTO6) VALUES ('$nombre','$precio','$cat','$tamaño','$imagen1','$imagen2','$imagen3','$imagen4','$imagen5','$imagen6')";
				$resultado = $base->prepare($sqlA);
				$resultado->execute();
			
		}else{

			echo "El tamanio de la imagen es muy grande" ;
		}
		header('location: FormDeCarga.php');
		
	break;

	case"Modificar":

		$tamanio_imagen1=$_FILES['imagen1']['size'];
		$tamanio_imagen2=$_FILES['imagen2']['size'];
		$tamanio_imagen3=$_FILES['imagen3']['size'];
		$tamanio_imagen4=$_FILES['imagen4']['size'];
		$tamanio_imagen5=$_FILES['imagen5']['size'];
		$tamanio_imagen6=$_FILES['imagen6']['size'];

		
		$tmpim2=$_FILES['imagen2']['tmp_name'];
		$tmpim3=$_FILES['imagen3']['tmp_name'];
		$tmpim4=$_FILES['imagen4']['tmp_name'];
		$tmpim5=$_FILES['imagen5']['tmp_name'];
		$tmpim6=$_FILES['imagen6']['tmp_name'];

		if ($tamanio_imagen1<=1000000 & $tamanio_imagen2<=1000000 & $tamanio_imagen3<=1000000 & $tamanio_imagen4<=1000000 & $tamanio_imagen5<=1000000 & $tamanio_imagen6<=1000000){

				//ruta de la carpeta destino en el servidor
				$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/ProyectosK/Shop/img/';
	
				$sqlM = "UPDATE ITEMS SET NOMBRE='$nombre', PRECIO='$precio', TAMA='$tamaño' WHERE ID='$id'";
				$result = $base->prepare($sqlM);
				$result->execute();		

				$nfoto1=($imagen1!="")?$_FILES['imagen1']['name']:"";
				$tmpim1=$_FILES['imagen1']['tmp_name'];

				if ($tmpim1!=""){	
				move_uploaded_file($tmpim1,$carpeta_destino.$imagen1);
			
 				$sqlF = "UPDATE ITEMS SET FOTO1='$imagen1' WHERE ID='$id'";
 				$result = $base->prepare($sqlF);
				$result->execute();
				}

				if ($tmpim2!=""){			
				move_uploaded_file($tmpim2,$carpeta_destino.$imagen2);
			
 				$sqlF = "UPDATE ITEMS SET FOTO2='$imagen2' WHERE ID='$id'";
 				$result = $base->prepare($sqlF);
				$result->execute();
 				}

				if ($tmpim3!=""){			
				move_uploaded_file($tmpim3,$carpeta_destino.$imagen3);
			
 				$sqlF = "UPDATE ITEMS SET FOTO3='$imagen3' WHERE ID='$id'";
 				$result = $base->prepare($sqlF);
				$result->execute();
 				}

				if ($tmpim4!=""){			
				move_uploaded_file($tmpim4,$carpeta_destino.$imagen4);
			
 				$sqlF = "UPDATE ITEMS SET FOTO4='$imagen4' WHERE ID='$id'";
 				$result = $base->prepare($sqlF);
				$result->execute();
 				}

				if ($tmpim5!=""){			
				move_uploaded_file($tmpim5,$carpeta_destino.$imagen5);
			
 				$sqlF = "UPDATE ITEMS SET FOTO5='$imagen5' WHERE ID='$id'";
 				$result = $base->prepare($sqlF);
				$result->execute();
 				}

				if ($tmpim6!=""){			
				move_uploaded_file($tmpim6,$carpeta_destino.$imagen6);
			
 				$sqlF = "UPDATE ITEMS SET FOTO6='$imagen6' WHERE ID='$id'";
 				$result = $base->prepare($sqlF);
				$result->execute();
 				}
	
		}else{
			echo "El tamanio de la imagen es muy grande" ;
		}
		header('location: FormDeCarga.php');

	break;

	case"Eliminar":
			$sqlE = "DELETE FROM ITEMS WHERE ID='$id'";
			$result = $base->prepare($sqlE);
			$result->execute();	
				
			header('location: FormDeCarga.php');
	break;

	case"Cancelar":
	header('location: FormDeCarga.php');
	break;
}

$sqlS = "SELECT * FROM ITEMS ORDER BY NOMBRE ASC";

$res = $base->prepare($sqlS);
$res->execute();

$lista=$res->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charse="utf-8">
	<title></title>
</head>
<body>

	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>
					<input type="hidden" name="id" placeholder="" id="id" required value="<?php echo $id;?>">	
				</td>
			</tr>
			<tr>
				<td>
					<label for="articulo">Nombre del articulo:</label>
					<input type="text"  name="name" placeholder="" id="name" required value="<?php echo $nombre;?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="articulo">Precio: $</label>
					<input type="number"  name="price"  placeholder="" id="price" value="<?php echo $precio;?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="articulo">Categoría:</label>
					<select  name="categoria" placeholder="" id="categoria" required value="<?php echo $cat;?>">
					 	<option value="torta" selected>Torta</option>
						<option value="tarta">Tarta</option>
						<option value="tematica">Tematica</option>
						<option value="promo">Promo</option>
					</select>				
				</td>
			</tr>
			<tr>
				<td>
					<label for="articulo">Tamaño:</label>
					<select  name="tamaño" placeholder="" id="tamaño" value="<?php echo $tamaño;?>">
						<option value="null" selected></option>
						<option value="mini">Mini</option>
						<option value="mediano">Mediano</option>
						<option value="grande">Grande</option>
					</select>
				</td>
			</tr>

			<tr>
				<td>
					<label for ="articulo">Imagen1:</label>
					<input type="file" accept="image/*" name="imagen1" size="20" placeholder=" " id="imagen1"> 
				</td>
			</tr>
			<tr>
				<td>
					<label for ="articulo">Imagen2:</label>
					<input type="file" accept="image/*" name="imagen2" size="20" placeholder="" id="imagen2">
				</td>
			</tr>
			<tr>
				<td>
					<label for ="articulo">Imagen3:</label>
					<input type="file" accept="image/*" name="imagen3" size="20" placeholder="" id="imagen3">
				</td>
			</tr>
			<tr>
				<td>
					<label for ="articulo">Imagen4:</label>
					<input type="file" accept="image/*" name="imagen4" size="20" placeholder="" id="imagen4">
				</td>
			</tr>
			<tr>
				<td>
					<label for ="articulo">Imagen5:</label>
					<input type="file" accept="image/*" name="imagen5" size="20" placeholder="" id="imagen5">
				</td>
			</tr>
			<tr>
				<td>
					<label for ="articulo">Imagen6:</label>
					<input type="file" accept="image/*" name="imagen6" size="20" placeholder="" id="imagen6">

				</td>
			</tr>	
				<td colspan="2" style="text-align:center">
					<br>	
					<button type="submit" name="accion" value="Agregar">Agregar</button>
					<button type="submit" name="accion" value="Modificar">Modificar</button>				
					<button type="submit" name="accion" value="Cancelar">Cancelar</button>
				</td>
			</tr>

		</table>
	</form>
	<div>
		<table>
			<thead>
				<tr>
					<td>Nombre</td>
					<td>Precio</td>
					<td>Categoria</td>
					<td>Tamaño</td>
					<td>Imagen1</td>
					<td>Imagen2</td>
					<td>Imagen3</td>
					<td>Imagen4</td>
					<td>Imagen5</td>
					<td>Imagen6</td>
					<td>Accion</td>
				</tr>
			</thead>

		<?php 
			foreach ($lista as $result ) {?>
		 	<tr>
				<td> <?php echo $result['nombre'];  ?> </td>
				<td> <?php echo "$".$result['precio'];  ?> </td>
				<td> <?php echo $result['categoria'];  ?> </td>
				<td> <?php echo $result['tama'];  ?> </td>
				<td> <img witdth="50px" height="50px" src="img/<?php echo $result['foto1']; ?>"> </td>
				<td> <img witdth="50px" height="50px" src="img/<?php echo $result['foto2']; ?>"></td>
				<td> <img witdth="50px" height="50px" src="img/<?php echo $result['foto3']; ?>"></td>
				<td> <img witdth="50px" height="50px" src="img/<?php echo $result['foto4']; ?>"></td>
				<td> <img witdth="50px" height="50px" src="img/<?php echo $result['foto5']; ?>"></td>
				<td> <img witdth="50px" height="50px" src="img/<?php echo $result['foto6']; ?>"></td>
			<td>
				<form accion="" method="POST">	
					<input type="hidden" name="id" value="<?php echo $result['id']; ?>">				
					<input type="hidden" name="name" value="<?php echo $result['nombre'];  ?>">
					<input type="hidden" name="price" value="<?php echo $result['precio'];  ?>">
					<input type="hidden" name="categoria" value="<?php echo $result['categoria'];  ?>">
					<input type="hidden" name="tamaño" value="<?php echo $result['tama'];  ?>">
					<input type="hidden" name="imagen1" value="<?php echo $result['foto1'];  ?>">
					<input type="hidden" name="imagen2" value="<?php echo $result['foto2'];  ?>">
					<input type="hidden" name="imagen3" value="<?php echo $result['foto3'];  ?>">
					<input type="hidden" name="imagen4" value="<?php echo $result['foto4'];  ?>">
					<input type="hidden" name="imagen5" value="<?php echo $result['foto5'];  ?>">
					<input type="hidden" name="imagen6" value="<?php echo $result['foto6'];  ?>">
					<input type="submit" value="Seleccionar" name="accion" >
					<button type="submit" name="accion" value="Eliminar">Eliminar</button>
				</form>
				</td>
			</tr>
			
		<?php } ?>
			
		</table>	
	</div>

</body>
</html>