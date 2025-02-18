<?php
$usuario  = "u394588994_jass";
$password = "Jass*#1720";
$servidor = "localhost";
$basededatos = "u394588994_jass";
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");

?>

