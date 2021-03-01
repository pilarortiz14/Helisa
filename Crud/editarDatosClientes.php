<?php
require_once "../php/conexion.php";
if (isset($_POST['actualizar'])){
	$id=$_GET['id'];
	$nombre= $_POST['Nombre'];
	$apellido=$_POST['Apellido'];
	$email=$_POST ['email'];
	$query="UPDATE empleados set Nombre='$nombre', Apellido='$apellido', email='$email' WHERE id=$id";
	mysqli_query($mysqli, $query);
	header ('Location: ../procesos/seleccionar.php');
}
?>