<?php
require_once "../Php/Conexion.php";
$anios;
$hoy=date("Y-m-d");
?>
<!Doctype html>
<html lang="es">
	<head>
		<title>Asesores</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../Boostrap/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<br/>
	<body>
		<hr>
		<h2 style="text-align: center;">Asesores</h2>
		<hr>
		<!-- Inicio tabla -->
		<div class="container-fluid">
			<div class="row justify-content-between" >
				<div class="col-md-8">
					<!-- Boton de registro -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Registro Asesor</button>
					<hr>
						<!-- Creación del modal -->
						<div class="modal" id="myModal">
							<div class="modal-dialog">
   				 				<div class="modal-content">
		      						<!-- Cabecera del modal -->
		      						<div class="modal-header">
		        						<h4 class="modal-title" style="text-align: center;">Registrar asesor</h4>
		        						<button type="button" class="close" data-dismiss="modal">&times;</button>
		      						</div>
			      					<!-- Cuerpo del modal -->
		     						<div class="modal-body">
		      							<form action="../Crud/RegistrarAsesor.php" method="post">
		      								<label for="horafin">Tipo de documento</label>
		     								<select class="form-control" name="tipoDocumento">
		      									<option value="0" >Seleccionar tipo de documento</option>
		      									<?php
		      									$query = $mysqli-> query ("select * from Tipo_Documento");
		      									while ($valores = mysqli_fetch_array($query)) {
		      									echo '<option value="'.$valores[Tipo_documento].'">' .$valores[Tipo_documento].'</option>';}
			  									?>
			  								</select>
		       								<div class="form-group">
		       									<label for="documento">Número de documento</label>
		       									<input type="text" class="form-control" name="documento" placeholder="Digite el número de documento">
		       								</div>
		       								<div class="form-group">
		       									<label for="nombreAsesor">Nombres</label>
		       									<input type="text" class="form-control" name="nombreAsesor" placeholder="Digite los nombres del asesor">
		       								</div>
		       								<div class="form-group">
		       									<label for="apellidoAsesor">Apellidos</label>
		       									<input type="text" class="form-control" name="apellidoAsesor" placeholder="Digite los apellidos del asesor">
		      								</div>
		      								<div class="form-group">
		      									<label for="especialidad">Especialidad</label>
		       									<input type="text" class="form-control" name="especialidad" placeholder="Digite la especialidad">
		      								</div>
		      								<div class="form-group">
		      									<label for="experiencia">Fecha vinculación</label>
		       									<input type="date" class="form-control" name="experiencia" placeholder="Digite la fecha de ingreso a la empresa">
		      								</div>
		      								<div class="form-group">
		      									<label for="horainicio">Hora inicio de atención</label>
		       									<input type="time" class="form-control" name="horainicio" placeholder="Digite la hora inicio de atención">
		      								</div>
		      								<div class="form-group">
		      									<label for="horafin">Hora fin de atención</label>
		       									<input type="time" class="form-control" name="horafin" placeholder="Digite la hora fin de atención">
		      								</div>
			  								<hr>
		      								<button type="submit"  class="btn btn-dark">Registrar</button>
		  								</form>
		      						</div>
		      						<!-- cierre del modal -->
		     						<div class="modal-footer">
		        						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
		      						</div>
		    					</div>
		  					</div>
						</div>




					<table class="table table-bordered">	
						<thead>
							<tr>
								<th>Tipo documento</th>
								<th>No. Documento</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Años de experiencia</th>
								<th>Especialidad</th>
								<th>Hora inicio atención</th>
								<th>Hora fin atención</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
								require_once "../php/Conexion.php";
								$query = "select usuarios.Documento,usuarios.Nombres,usuarios.Apellidos,asesores.fecha_vinculacion,asesores.Especialidad,asesores.Inicio_atencion,asesores.Fin_atencion, Tipo_documento.tipo_documento from usuarios inner join asesores on usuarios.documento = asesores.id_usuario inner join tipo_documento on usuarios.Id_Tipo_Documento = tipo_documento.Id";
								$results_tasks = mysqli_query($mysqli, $query);
								while($row = mysqli_fetch_assoc($results_tasks)) { 
							?>
							<tr>
								<td><?php echo $row['tipo_documento']; ?></td>
								<td><?php echo $row['Documento']; ?></td>
								<td><?php echo $row['Nombres']; ?></td>
								<td><?php echo $row['Apellidos']; ?></td>
								<td><?php echo $row['fecha_vinculacion']; ?></td>
								<td><?php echo $row['Especialidad']; ?></td>
								<td><?php echo $row['Inicio_atencion']; ?></td>
								<td><?php echo $row['Fin_atencion']; ?></td>
								<td>
									<a href="../Crud/EliminarAsesor.php?Documento=<?php echo $row['Documento']?>" class="btn btn-danger">Eliminar</a>
									<a href="../Crud/ActualizarAsesor.php?Documento=<?php echo $row['Documento']?>" class="btn btn-success">Actualizar</a>
								
								</td>
							</tr>
							<?php 
							}
							 ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
