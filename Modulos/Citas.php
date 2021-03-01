<?php
require_once "../Php/Conexion.php";
?>
<!Doctype html>
<html lang="es">
	<head>
		<title>Citas</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../Boostrap/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<br/>
	<body>
		<hr>
		<h2 style="text-align: center;">Citas asignadas</h2>
		<hr>
		<!-- Inicio tabla -->
		<div class="container-fluid">
			<div class="row justify-content-between" >
				<div class="col-md-8">
					<!-- Boton de registro -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Asignar cita</button>
					<hr>
						<!-- Creación del modal -->
						<div class="modal" id="myModal">
							<div class="modal-dialog">
   				 				<div class="modal-content">
		      						<!-- Cabecera del modal -->
		      						<div class="modal-header">
		        						<h4 class="modal-title" style="text-align: center;">Asignar nueva cita</h4>
		        						<button type="button" class="close" data-dismiss="modal">&times;</button>
		      						</div>
			      					<!-- Cuerpo del modal -->
		     						<div class="modal-body">
		      							<form action="../Crud/AsignarCita.php" method="post">
		       								<div class="form-group">
		       									<label for="idasesor">Número de documento asesor</label>
		       									<input type="text" class="form-control" name="idasesor" placeholder="Digite el número de documento del asesor">
		       								</div>
		       								<div class="form-group">
		       									<label for="idcliente">Número de documento cliente</label>
		       									<input type="text" class="form-control" name="idcliente" placeholder="Digite el número de documento del cliente">
		       								</div>
		       								<div class="form-group">
		       									<label for="fecha">Fecha</label>
		       									<input type="date" class="form-control" name="fecha" placeholder="Seleccione una fecha">
		      								</div>
		      								<div class="form-group">
		      									<label for="hora">Hora</label>
		       									<input type="time" class="form-control" name="hora" placeholder="Seleccione una hora">
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
								<th>No. documento cliente</th>
								<th>No. documento asesor</th>
								<th>Nombre asesor</th>
								<th>Día</th>
								<th>Hora</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
								require_once "../php/Conexion.php";
								$query = "select citas.Id, usuarios.Nombres, citas.Id_cliente, citas.Id_asesor, citas.Fecha, citas.Hora, citas.Estado  from citas inner join usuarios on citas.Id_asesor = usuarios.Documento where Estado='En curso'";
								$results_tasks = mysqli_query($mysqli, $query);
								while($row = mysqli_fetch_assoc($results_tasks)) { 
							?>
							<tr>
								<td><?php echo $row['Id_cliente']; ?></td>
								<td><?php echo $row['Id_asesor']; ?></td>
								<td><?php echo $row['Nombres']; ?></td>
								<td><?php echo $row['Fecha']; ?></td>
								<td><?php echo $row['Hora']; ?></td>
								<td>
									<a href="../Crud/CancelarCita.php?Id=<?php echo $row['Id']?>" class="btn btn-danger">Cancelar</a>
									<a href="../Crud/ActualizarCita.php?Id=<?php echo $row['Id']?>" class="btn btn-success">Actualizar</a>
								
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
