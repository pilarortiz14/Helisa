<?php
require_once "../php/conexion.php";
$idasesor=$_POST['idasesor'];
$idcliente=$_POST['idcliente'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];

/*$sql1="select * from citas where Id_cliente=\"$_POST[idcliente]\" & Hora=\"$_POST[hora]\"";
$query=$mysqli->query($sql1);
while ($r=$query->fetch_array())
{
	$found=true;
	if($found)
	{
		print "<script>alert(\"Número de documento ya se encuentra registrado.\");window.location='../Modulos/Asesores.php';</script>";
	}
}*/

$query="INSERT INTO citas(Id_cliente,Id_asesor,Fecha,Hora,Estado) VALUES ('$idasesor','$idcliente','$fecha','$hora','En curso')";
if ($mysqli->query($query)){
	print "<script>alert(\"Registro exitoso.\");window.location='seleccionar1.php';</script>";

}else{
	echo "Ocurrio un error";
}
?>