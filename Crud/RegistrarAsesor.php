<?php
require_once "../php/conexion.php";
$tipodocumento=$_POST['tipoDocumento'];
$documento=$_POST['documento'];
$nombres=$_POST['nombreAsesor'];
$apellidos=$_POST['apellidoAsesor'];
$especialidad=$_POST['especialidad'];
$vinculacion=$_POST['experiencia'];
$horainicio=$_POST['horainicio'];
$horafin=$_POST['horafin'];

/*$sql1="select Id from tipo_documento where Tipo_documento=\"$_POST[tipodocumento]\"";
$query=$mysqli->query($sql1);
echo "$sql1";*/

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

$query="INSERT INTO usuarios(Documento,Nombres,Apellidos,Id_Tipo_Documento) VALUES ('$documento','$nombres','$apellidos',' ')";
if ($mysqli->query($query)){
	print "<script>alert(\"Registro exitoso.\");window.location='seleccionar1.php';</script>";

}else{
	echo "Ocurrio un error";
}
?>