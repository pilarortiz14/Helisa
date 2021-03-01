<?php
require_once "../php/conexion.php";
if (isset($_GET['Id'])){
	$id=$_GET['Id'];
	$query="UPDATE citas SET Estado = 'Cancelada' WHERE Id='$id'";

	if($mysqli->query($query)){
		print "<script>alert(\"Cita cancelada\");window.location='../Modulos/Citas.php';</script>";
	}else{
		echo "Error no se pudo cancelar la cita";
	}
	}else{
		echo "Error no se pudo procesar la peticion";
	}
?>