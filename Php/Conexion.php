<?php
//creacion de la conexion
$mysqli=new mysqli ("localhost", "root", "", "Helisa");
//verificacion de la conexion
if (mysqli_connect_errno()){
	echo "Este sitio esta presentando problemas";
}
$mysqli->set_charset("utf8");
?>