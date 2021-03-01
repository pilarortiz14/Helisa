<?php
require_once "../php/conexion.php";
if (isset($_POST['actualizar'])){
	$documento=$_GET['Documento'];
	$nombres= $_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$vinculacion=$_POST['vinculacion'];
	$especialidad=$_POST['especialidad'];
	$inicio=$_POST['inicio'];
	$fin=$_POST['fin'];
	$query="UPDATE usuarios set Nombres='$nombres', Apellidos='$apellidos' WHERE Documento=$documento";
	$query1="UPDATE asesores set fecha_vinculacion='$vinculacion', Especialidad='$especialidad', Inicio_atencion='$inicio', Fin_atencion='$fin' WHERE Id_Usuario=$documento";
	//mysqli_query($mysqli, $query);
	//header ('Location: ../Modulos/Asesores.php');

}
if($mysqli->query($query)){
		if ($mysqli->query($query1)){
			print "<script>alert(\"Registro actualizado\");window.location='../Modulos/Asesores.php';</script>";
		}
		
	}else{
		echo "Error no se pudo actualizar el registro";
	}
	}else{
		echo "Error no se pudo procesar la peticion";
	}
?>