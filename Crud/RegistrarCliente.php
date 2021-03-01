<?php
require_once "../php/conexion.php";
$tipo_documento=$_POST['tipoDocumento'];
$documento=$_POST['documento'];
$nombres=$_POST['nombreCliente'];
$apellidos=$_POST['apellidoCliente'];
$pais=$_POST['pais'];
$ciudad=$_POST['ciudad'];
$hoy=date("Y-m-d");
//validar si existe el documento en la base de datos
$sql1="select * from usuarios where Documento=\"$_POST[documento]\"";
$query=$mysqli->query($sql1);
while ($r=$query->fetch_array())
{
	$found=true;
	if($found)
	{
		print "<script>alert(\"Número de documento ya se encuentra registrado.\");window.location='../Modulos/Asesores.php';</script>";
	}
}
// en caso de que no exista, permitir registrar el asesor
$query1="select Id from tipo_documento where Tipo_documento='$tipo_documento'"
$query="INSERT INTO usuarios(Documento,Nombres,Apellidos,Id_Tipo_Documento) VALUES ('$documento','$nombres','$apellidos','$query1')";
if ($mysqli->query($query)){
	print "<script>alert(\"Registro exitoso.\");window.location='seleccionar1.php';</script>";

}else{
	echo "Ocurrio un error";
}
?>
