<?php
$usuario  = "u291982824_agua";
$password = "JassJass*#17";
$servidor = "localhost";
$basededatos = "u291982824_agua";
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");

?>

