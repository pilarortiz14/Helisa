<?php
require_once "../php/conexion.php";
if (isset($_GET['Documento'])){
	$documento=$_GET['Documento'];
	$query="DELETE FROM clientes WHERE id_usuario='$documento'";
	if($mysqli->query($query)){
		print "<script>alert(\"Registro eliminado\");window.location='../Modulos/Clientes.php';</script>";
	}else{
		echo "Error no se pudo eliminar el registro";
	}
	}else{
		echo "Error no se pudo procesar la peticion";
	}
?>
