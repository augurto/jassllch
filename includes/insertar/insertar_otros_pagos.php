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

$dni=$_GET["dni"];
$datos=$_GET["datos"];
$otro_pago=$_GET["otro_pago"];
$monto=$_GET["monto"];
$usuario=$_GET["usuario"];
$id_usuario=$_GET["id_usuario"];
$direccion_actual=$_GET["direccion_actual"];
$ocupacion=$_GET["ocupacion"];
$grado_instruccion=$_GET["grado_instruccion"];
$estado_civil=$_GET["estado_civil"];
$esposa_conviviente=$_GET["esposa_conviviente"];
$sector=$_GET["sector"];
$c_miembros=$_GET["c_miembros"];

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "INSERT INTO pagos (dni_usuario_jass,datos_pago,pago_hoy,mes_actual_pago, year_actual_pago,name_user,id_user,deuda,variable_boleta,estado_pago) 

VALUES ('$dni','$datos','$hoy','$mes_actual','$year_actual','$usuario','$id_usuario','$monto','ING','0')";
if (mysqli_query($conn, $sql)) {
    echo"<script language ='JavaScript'>";
      echo "location='../../../index.php'";
    echo "</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>