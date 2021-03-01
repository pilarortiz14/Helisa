<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar datos</title>
	<link rel="stylesheet" type="text/css" href="../Boostrap/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<?php require_once "../Php/Conexion.php";
	if (isset($_GET ['Documento'])){
		$documento = $_GET['Documento'];
		$query ="SELECT tipo_documento.Tipo_documento, usuarios.Documento,usuarios.Nombres,usuarios.Apellidos,Pais.pais,Ciudades.ciudad, Clientes.Fecha_Creacion from clientes inner join usuarios on clientes.id_usuario = usuarios.documento  inner join pais on clientes.Id_Pais = pais.Id  inner join ciudades on clientes.Id_ciudad = ciudades.Id inner join tipo_documento on usuarios.id_Tipo_Documento = tipo_documento.Id WHERE Id_usuario=$documento";
		$result = mysqli_query($mysqli,$query);
		if (mysqli_num_rows($result)== 1) {
			$row= mysqli_fetch_array($result);
			$nombre=$row['Nombres'];
			$apellido = $row['Apellidos'];
			$pais = $row['pais'];
			$ciudad = $row['ciudad'];
			$tipo_documento = $row['Tipo_documento'];
		}
	}
	?>
	<div class="container p-4">
		<div class="row">
			<div class="col-md-4 mx-auto">
				<div class="card card-body">
					<h2 style="text-align: center;">Actualizar datos de clientes</h2>
					<hr>
					<form action="../Php/EditarCliente.php?Documento=<?php echo $_GET['Documento']; ?>" method="POST">
					<div class="form-group">
						<label for="Nombre">Nombres</label>
						<input name="Nombre" type="text" class="form-control" value="<?php echo $nombre; ?>">
					</div>
					<div class="form-group">
						<label for="Apellido">Apellidos</label>
						<input name="Apellido" type="text" class="form-control" value="<?php echo $apellido; ?>">
					</div>
					<div class="form-group">
						<label for="Pais">Pais</label>
						<input name="Pais" type="text" class="form-control" value="<?php echo $pais; ?>">
					</div>
					<div class="form-group">
						<label for="Ciudad">Ciudad</label>
						<input name="Ciudad" type="text" class="form-control" value="<?php echo $ciudad; ?>">
					</div>
					<button class="btn btn-danger" name="update">Actualizar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
