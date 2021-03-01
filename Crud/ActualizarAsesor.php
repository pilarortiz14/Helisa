<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizar asesores</title>
	<link rel="stylesheet" type="text/css" href="../Boostrap/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<?php require_once "../Php/Conexion.php";
	if (isset($_GET ['Documento'])){
		$documento = $_GET['Documento'];
		$query ="select usuarios.Documento,usuarios.Nombres,usuarios.Apellidos,asesores.fecha_vinculacion,asesores.Especialidad,asesores.Inicio_atencion,asesores.Fin_atencion, Tipo_documento.tipo_documento from usuarios inner join asesores on usuarios.documento = asesores.id_usuario inner join tipo_documento on usuarios.Id_Tipo_Documento = tipo_documento.Id where id_usuario=$documento";
		$result = mysqli_query($mysqli,$query);
		if (mysqli_num_rows($result)== 1) {
			$row= mysqli_fetch_array($result);
			$nombres=$row['Nombres'];
			$apellidos = $row['Apellidos'];
			$vinculacion =$row['fecha_vinculacion'];
			$especialidad =$row ['Especialidad'];
			$inicio =$row ['Inicio_atencion'];
			$fin =$row ['Fin_atencion'];
		}
	}
	?>
	<div class="container p-4">
		<div class="row">
			<div class="col-md-4 mx-auto">
				<div class="card card-body">
					<h2 style="text-align: center;">Actualizar datos de asesores</h2>
					<hr>
					<form action="../Php/EditarAsesor.php?id=<?php echo $_GET['Documento']; ?>" method="POST">
					<div class="form-group">
					<div class="form-group">
						<label for="nombres">Nombres</label>
						<input name="nombres" type="text" class="form-control" value="<?php echo $nombres; ?>">
					</div>
					<div class="form-group">
						<label for="apellidos">Apellidos</label>
						<input name="apellidos" type="text" class="form-control" value="<?php echo $apellidos; ?>">
					</div>
					<div class="form-group">
						<label for="vinculacion">Fecha inicio vinculación</label>
						<input name="vinculacion" type="date" class="form-control" value="<?php echo $vinculacion; ?>">
					</div>
					<div class="form-group">
						<label for="especialidad">Especialidad</label>
						<input name="especialidad" type="text" class="form-control" value="<?php echo $especialidad; ?>">
					</div>
					<div class="form-group">
						<label for="horainicio">Hora inicio atención</label>
						<input name="horainicio" type="time" class="form-control" value="<?php echo $inicio; ?>">
					</div>
					<div class="form-group">
						<label for="horafin">Hora fin atención</label>
						<input name="horafin" type="time" class="form-control" value="<?php echo $fin; ?>">
					</div>
					<button class="btn btn-danger" name="update">Actualizar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
