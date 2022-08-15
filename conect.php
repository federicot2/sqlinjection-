<?php
$host = "localhost";
$user = "root";
$clave = "";
$bd = "xss";
//script para conectar base de datos
	$conex = new PDO("mysql:host=$host;dbname=$bd",$user,$clave)
?>