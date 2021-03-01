<?php
require_once "../Php/Conexion.php";
?>
<!Doctype html>
<html lang="es">
	<head>
		<title>Clientes</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../Boostrap/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<br/>
	<body>
		<hr>
		<h2 style="text-align: center;">Clientes</h2>
		<hr>
		<!-- Incicio tabla -->
		<div class="container-fluid">
			<div class="row justify-content-between" >
				<div class="col-md-8">
					<!-- Boton de registro -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Registro Cliente</button>
						<!-- Creación del modal -->
						<div class="modal" id="myModal">
							<div class="modal-dialog">
   				 				<div class="modal-content">
		      						<!-- Cabecera del modal -->
		      						<div class="modal-header">
		        						<h4 class="modal-title" style="text-align: center;">Registrar cliente</h4>
		        						<button type="button" class="close" data-dismiss="modal">&times;</button>
		      						</div>
			      					<!-- Cuerpo del modal -->
		     						<div class="modal-body">
		      							<form action="../Crud/RegistrarCliente.php" method="post">
		      								<label for="horafin">Tipo de documento</label>
		     								<select class="form-control" name="tipoDocumento">
		      									<option value="0" >Seleccionar tipo de documento</option>
		      									<?php
		      									$query = $mysqli-> query ("select Tipo_documento from Tipo_Documento;");
		      									while ($row = mysqli_fetch_array($query)) {
		      									echo '<option value="'.$row[Tipo_documento].'">' .$row[Tipo_documento].'</option>';}
			  									?>
			  								</select>
		       								<div class="form-group">
		       									<label for="documento">Número de documento</label>
		       									<input type="text" class="form-control" name="documento" placeholder="Digite el número de documento">
		       								</div>
		       								<div class="form-group">
		       									<label for="nombreCliente">Nombres</label>
		       									<input type="text" class="form-control" name="nombreCliente" placeholder="Digite los nombres del cliente">
		       								</div>
		       								<div class="form-group">
		       									<label for="apellidoAsesor">Apellidos</label>
		       									<input type="text" class="form-control" name="apellidoCliente" placeholder="Digite los apellidos del cliente">
		      								</div>
		      								<label for="horafin">Pais</label>
		     								<select class="form-control" name="pais">
		      									<option value="0" >Seleccionar pais de residencia</option>
		      									<?php
		      									$query = $mysqli-> query ("select * from pais;");
		      									while ($row = mysqli_fetch_array($query)) {
		      									echo '<option value="'.$row[pais].'">' .$row[Pais].'</option>';}
			  									?>
			  								</select>
		      								<<label for="horafin">Ciudad</label>
		     								<select class="form-control" name="ciudad">
		      									<option value="0" >Seleccionar ciudad de residencia</option>
		      									<?php
		      									$query = $mysqli-> query ("select * from Ciudades;");
		      									while ($row = mysqli_fetch_array($query)) {
		      									echo '<option value="'.$row[Ciudad].'">' .$row[Ciudad].'</option>';}
			  									?>
			  								</select>
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
								<th>País</th>
								<th>Ciudad</th>
								<th>Fecha de Creación</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
								require_once "../php/Conexion.php";
								$query = "select tipo_documento.Tipo_documento, usuarios.Documento,usuarios.Nombres,usuarios.Apellidos,Pais.pais,Ciudades.ciudad, Clientes.Fecha_Creacion from clientes inner join usuarios on clientes.id_usuario = usuarios.documento  inner join pais on clientes.Id_Pais = pais.Id  inner join ciudades on clientes.Id_ciudad = ciudades.Id inner join tipo_documento on usuarios.id_Tipo_Documento = tipo_documento.Id";
								$results_tasks = mysqli_query($mysqli, $query);
								while($row = mysqli_fetch_assoc($results_tasks)) { 
							?>
							<tr>
								<td><?php echo $row['Tipo_documento']; ?></td>
								<td><?php echo $row['Documento']; ?></td>
								<td><?php echo $row['Nombres']; ?></td>
								<td><?php echo $row['Apellidos']; ?></td>
								<td><?php echo $row['pais']; ?></td>
								<td><?php echo $row['ciudad']; ?></td>
								<td><?php echo $row['Fecha_Creacion']; ?></td>
								<td>
									<a href="../Crud/EliminarCliente.php?Documento=<?php echo $row['Documento']?>" class="btn btn-danger">Eliminar</a>
									<a href="../Crud/ActualizarCliente.php?Documento=<?php echo $row['Documento']?>" class="btn btn-success">Actualizar</a>
								
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
