<?php
$servername = "localhost";
$database = "u291982824_agua";
$username = "u291982824_agua";
$password = "JassJass*#17";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection

$dni=$_GET["dni"];
$nombre=$_GET["nombre"];
$apellido_paterno=$_GET["apellido_paterno"];
$apellido_materno=$_GET["apellido_materno"];
$fecha_nacimiento=$_GET["fecha_nacimiento"];
$natural_lugar=$_GET["natural_lugar"];
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
 
$sql = "INSERT INTO usuarios_jass (nombres,ap_paterno,ap_materno,fecha_nacimiento, id_natural, direccion_actual,ocupacion,grado_instruccion, estado_civil, dni_usuario_jass, esposa_conviviente, sector_jass, cantidad_miembros, estado_usuario_jass) 

VALUES ('$nombre','$apellido_paterno','$apellido_materno','$fecha_nacimiento','$natural_lugar','$direccion_actual','$ocupacion','$grado_instruccion','$estado_civil','$dni','$esposa_conviviente','$sector','$c_miembros', '0')";
if (mysqli_query($conn, $sql)) {
    echo"<script language ='JavaScript'>";
      echo "location='../../../index.php'";
    echo "</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>