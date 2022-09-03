<?php
$servername = "localhost";
$database = "u415020159_jass";
$username = "u415020159_jass";
$password = "JassJass*#17";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
$mes_actual =date("m");
$year_actual =date("Y");
date_default_timezone_set("America/Lima");
$hoy = date("Y-m-d H:i:s");  
$id_jass=$_GET["unno"];
$dni=$_GET["dnijass3"];
$datos=$_GET["datos_completos"];
$otro_pago=$_GET["estado"];
$monto=$_GET["monto"];
$usuario=$_GET["usuario"];
$id_usuario=$_GET["id_usuario"];
$nombre_mes_otro=$_GET["nombre_mes"];

$nombre_mes=ucfirst($nombre_mes_otro);
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "INSERT INTO pagos (dni_usuario_jass,datos_pago,pago_hoy,mes_actual_pago, year_actual_pago,name_user,id_user,deuda,variable_boleta,pago_mes,estado_pago, concepto_pago) 

VALUES ('$dni','$datos','$hoy','$mes_actual','$year_actual','$usuario','$id_usuario','$monto','ING','$nombre_mes','0','$otro_pago')";
if (mysqli_query($conn, $sql)) {
    echo"<script language ='JavaScript'>";
      echo "location='../../../otros_pagos.php'";
    echo "</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>