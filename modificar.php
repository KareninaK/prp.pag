<?php
include ("lib/config.php");

		if(!empty($_POST)){
			$id=      (isset($_POST['id']))              ?$_POST['id']              :"";
			$nombre=  (isset($_POST['name']))            ?$_POST['name']            :"";
			$precio=  (isset($_POST['price']))           ?$_POST['price']           :NULL;
			$cat=     (isset($_POST['categoria']))       ?$_POST['categoria']       :"";
			$tamaño=  (isset($_POST['tamaño']))          ?$_POST['tamaño']          :NULL;
			$imagen1= (isset($_FILES['imagen1']['name']))?$_FILES['imagen1']['name']:NULL;
			$imagen2= (isset($_FILES['imagen2']['name']))?$_FILES['imagen2']['name']:NULL;
			$imagen3= (isset($_FILES['imagen3']['name']))?$_FILES['imagen3']['name']:NULL;
			$imagen4= (isset($_FILES['imagen4']['name']))?$_FILES['imagen4']['name']:NULL;
			$imagen5= (isset($_FILES['imagen5']['name']))?$_FILES['imagen5']['name']:NULL;
			$imagen6= (isset($_FILES['imagen6']['name']))?$_FILES['imagen6']['name']:NULL;

			$tamanio_imagen1=$_FILES['imagen1']['size'];
			$tamanio_imagen2=$_FILES['imagen2']['size'];
			$tamanio_imagen3=$_FILES['imagen3']['size'];
			$tamanio_imagen4=$_FILES['imagen4']['size'];
			$tamanio_imagen5=$_FILES['imagen5']['size'];
			$tamanio_imagen6=$_FILES['imagen6']['size'];

			$tmpim1=$_FILES['imagen1']['tmp_name'];
			$tmpim2=$_FILES['imagen2']['tmp_name'];
			$tmpim3=$_FILES['imagen3']['tmp_name'];
			$tmpim4=$_FILES['imagen4']['tmp_name'];
			$tmpim5=$_FILES['imagen5']['tmp_name'];
			$tmpim6=$_FILES['imagen6']['tmp_name'];

			if ($tamanio_imagen1<=1000000 & $tamanio_imagen2<=1000000 & $tamanio_imagen3<=1000000 & $tamanio_imagen4<=1000000 & $tamanio_imagen5<=1000000 & $tamanio_imagen6<=1000000){

					//ruta de la carpeta destino en el servidor
					$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/ProyectosK/Shop/img/';

					$sqlM = "UPDATE ITEMS SET NOMBRE='$nombre', PRECIO='$precio', CATEGORIA='$cat', TAMA='$tamaño' WHERE ID=$id";
					$result = $base->prepare($sqlM);
					$result->execute();		
					

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

					Echo "Buena CRACK!!";

			}else{
				echo "El tamanio de la imagen es muy grande" ;
			}

		}


	if (empty($_GET['id'])){
		header('Location: FormDeCarga.php');
	} 

$idget= $_GET['id'];
$sql="SELECT * FROM ITEMS WHERE ID= $idget";
$res = $base->prepare($sql);
$res->execute();

$row= $res->rowCount();

if($row == 0){
header('Location: FormDeCarga.php');	
}else{
	$optionT='';
	$lista=$res->fetchAll(PDO::FETCH_ASSOC);
	foreach ($lista as $result ){
		$id = $result['id']; 
		$nombre = $result['nombre'];  
		$precio = $result['precio'];
		$categoria = $result['categoria'];
		$tamaño = $result['tama'];
		$foto1 = $result['foto1']; 
		$foto2 = $result['foto2'];
		$foto3 = $result['foto3'];
		$foto4 = $result['foto4']; 
		$foto5 = $result['foto5']; 
		$foto6 = $result['foto6'];

		//actualizar el select de tamaño
		if($result['tama']=='Mini'){
			$optionT='<option value="Mini" select >'.$tamaño.'</option>';
		} 
		if($result['tama']=='Mediano'){
			$optionT='<option value="Mediano" select >'.$tamaño.'</option>';
		}
		if($result['tama']=='Grande'){
			$optionT='<option value="Grande" select >'.$tamaño.'</option>'; 
		}else{
			$optionT='<option value="" select >'.$tamaño.'</option>'; 
		}
		//actualizar el select de categoria
		if($result['categoria']=='Torta'){
			$optionC='<option value="Torta" select >'.$categoria.'</option>';
		} 
		if($result['categoria']=='tarta'){
			$optionC='<option value="Tarta" select >'.$categoria.'</option>';
		}
		if($result['categoria']=='Tematica'){
			$optionC='<option value="Tematica" select >'.$categoria.'</option>'; 
		}
		if($result['categoria']=='Promo'){
			$optionC='<option value="Promo" select >'.$categoria.'</option>'; 
		}
	}

}

?>

<!DOCTYPE html>
<html>
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" href="css/op.css">
		</head>
<body>

	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>
					<input type="hidden" name="id" placeholder="" id="id"  value="<?php echo $id;?>"">	
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
					<select  name="categoria" id="categoria" requiered class="notItemOne">
						<?php echo $optionC;?>
					 	<option value="torta">Torta</option>
						<option value="tarta">Tarta</option>
						<option value="tematica">Tematica</option>
						<option value="promo">Promo</option>
					</select>				
				</td>
			</tr>
			<tr>
				<td>
					<label for="articulo">Tamaño:</label>
					<select  name="tamaño" id="tamaño" class="notItemOne" >
						<?php echo $optionT;?>
						<option value=''></option>
						<option value="mini">Mini</option>
						<option value="mediano">Mediano</option>
						<option value="grande">Grande</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for ="articulo">Imagen1:</label>
					<input type="file" accept="image/*" name="imagen1" size="20" placeholder="" id="imagen1"> 
					<img witdth="50px" height="50px" src="img/<?php echo $result['foto1']; ?>">

				</td>
			</tr>
			<tr>
				<td>
					<label for ="articulo">Imagen2:</label>
					<input type="file" accept="image/*" name="imagen2" size="20" placeholder="" id="imagen2">
					<?php if($result['foto2']!=''){?> <img witdth="50px" height="50px" src="img/<?php echo $result['foto2']; ?>"><?php ; } ?>
				</td>
			</tr>
			<tr>
				<td>
					<label for ="articulo">Imagen3:</label>
					<input type="file" accept="image/*" name="imagen3" size="20" placeholder="" id="imagen3">
					<?php if($result['foto3']!=''){?> <img witdth="50px" height="50px" src="img/<?php echo $result['foto3']; ?>"><?php ; } ?>
				</td>
			</tr>
			<tr>
				<td>
					<label for ="articulo">Imagen4:</label>
					<input type="file" accept="image/*" name="imagen4" size="20" placeholder="" id="imagen4">
					<?php if($result['foto4']!=''){?> <img witdth="50px" height="50px" src="img/<?php echo $result['foto4']; ?>"><?php ; } ?>
				</td>
			</tr>
			<tr>
				<td>
					<label for ="articulo">Imagen5:</label>
					<input type="file" accept="image/*" name="imagen5" size="20" placeholder="" id="imagen5">
					<?php if($result['foto5']!=''){?> <img witdth="50px" height="50px" src="img/<?php echo $result['foto5']; ?>"><?php ; } ?>
				</td>
			</tr>
			<tr>
				<td>
					<label for ="articulo">Imagen6:</label>
					<input type="file" accept="image/*" name="imagen6" size="20" placeholder="" id="imagen6">
					<?php if($result['foto6']!=''){?> <img witdth="50px" height="50px" src="img/<?php echo $result['foto6']; ?>"><?php ; } ?>
				</td>
			</tr>
			<br>
			<td colspan="2" style="text-align:center">
			<button type="submit" value="Modificar" >Modificar</button>
			<a href="FormDeCarga.php"><input type="button" value="Volver"></a>
			</td>

		</table>
	</form>

</body>
</html>