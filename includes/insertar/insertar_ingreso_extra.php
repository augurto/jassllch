<?php
$servername = "localhost";
$database = "u394588994_jass";
$username = "u394588994_jass";
$password = "Jass*#1720";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection

$beneficiario=$_GET["beneficiario"];
$concepto=$_GET["concepto"];
$monto=$_GET["monto"];
$id_user=$_GET["id_user"];
$name_user=$_GET["name_user"];
$mes_actual=$_GET["mes_actual"];
$year_actual=$_GET["year_actual"];
date_default_timezone_set("America/Lima");
$hoy = date("Y-m-d H:i:s");
$nombre_mes=date("F", strtotime($hoy));

setlocale(LC_ALL, 'spanish');
$monthNum  = 2;
$dateObj   = DateTime::createFromFormat('!m', $mes_actual);
$monthName = strftime('%B', $dateObj->getTimestamp());
$mayus_mes=ucfirst($monthName);
 
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "INSERT INTO pagos (datos_pago,pago_hoy,mes_actual_pago,year_actual_pago,name_user,id_user, deuda,variable_boleta,pago_mes, estado_pago,cantidad_mes,concepto_pago) 

VALUES ('$beneficiario','$hoy','$mes_actual','$year_actual','$name_user','$id_user','$monto','ING','$mayus_mes','0','1','$concepto')";
if (mysqli_query($conn, $sql)) {
    echo"<script language ='JavaScript'>";
      echo "location='../../../index.php'";
    echo "</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>