<?php
$servername = "localhost";
$database = "u415020159_jass";
$username = "u415020159_jass";
$password = "JassJass*#17";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection

$jass=$_GET["idjass"];
$dni=$_GET["dnijass"];
$datos=$_GET["datos"];
$hoy=$_GET["hoy"];
$mes_actual=$_GET["mes_actual"];
$cantidadmes=$_GET["cantidadmes"];
$year_actual=$_GET["year_actual"];
$name_user=$_GET["name_user"];
$id_user=$_GET["id_user"];
$monto_pago=$_GET["monto_pago"];
$deuda=$_GET["deuda"];
$vuelto=$_GET["vuelto"];
$mes_pago=$_GET["mes_pago"];
$mes_fin=$mes_actual+$cantidadmes-1;
date_default_timezone_set("America/Lima");
$hoy2 = date("Y-m-d H:i:s");

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "INSERT INTO pagos (id_jass, dni_usuario_jass, datos_pago, pago_hoy, mes_actual_pago,year_actual_pago,name_user,id_user, monto_pago, deuda, vuelto, pago_mes,variable_boleta, estado_pago,mes_inicio, mes_fin,concepto_pago,cantidad_mes) 

VALUES ('$jass','$dni', '$datos', '$hoy2','$mes_actual', '$year_actual', '$name_user', '$id_user', '$monto_pago', '$deuda', '$vuelto', '$mes_pago','ING', '0', '$mes_actual', '$mes_fin', 'Pago de Agua mes :', '$cantidadmes')";
if (mysqli_query($conn, $sql)) {
    echo"<script language ='JavaScript'>";
      echo "location='../../../usuario_jass.php?dni=$dni'";
    echo "</script>";
} else {
      echo"<script language ='JavaScript'>";
      echo "location='../../../usuario_jass.php?dni=$dni&mensaje=1'";
    echo "</script>";
}
mysqli_close($conn);
?>