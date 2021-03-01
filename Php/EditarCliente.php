<?php
require_once "../Php/Conexion.php";
if (isset($_POST['Actualizar'])){
	$documento=$_GET['Documento'];
	$nombre= $_POST['nombre'];
	$apellido= $_POST['apellido'];
	$pais= $_POST['pais'];
	$ciudad= $_POST['ciudad'];
	$tipo_documento= $_POST['tipo_documento'];
	$query="UPDATE clientes inner join usuarios on clientes.id_usuario = usuarios.documento  inner join pais on clientes.Id_Pais = pais.Id  inner join ciudades on clientes.Id_ciudad = ciudades.Id inner join tipo_documento on usuarios.id_Tipo_Documento = tipo_documento.Id set usuarios.Nombres='$nombre', usuarios.Apellidos='$apellido', Pais.pais='$pais', Ciudades.ciudad='$ciudad', tipo_documento.Tipo_documento='$tipo_documento' WHERE usuarios.Documento='$documento'";
	if($mysqli->query($query)){
		print "<script>alert(\"Registro Actualizado\");window.location='../Modulos/Clientes.php';</script>";
	}else{
		echo "Error no se pudo eliminar el registro";
	}
	}else{
		echo "Error no se pudo procesar la peticion";
	}
?>

