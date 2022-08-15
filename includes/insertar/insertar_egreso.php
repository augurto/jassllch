<?php
$servername = "localhost";
$database = "u415020159_jass";
$username = "u415020159_jass";
$password = "JassJass*#17";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection

$beneficiario=$_GET["beneficiario"];
$concepto=$_GET["concepto"];
$monto=$_GET["monto"];
$id_user=$_GET["id_user"];
$name_user=$_GET["name_user"];
date_default_timezone_set("America/Lima");
$hoy = date("Y-m-d H:i:s");

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "INSERT INTO pagos (datos_pago,pago_hoy,name_user,id_user, monto_pago, estado_pago) 

VALUES ('$beneficiario','$hoy','$name_user','$id_user','$monto','1')";
if (mysqli_query($conn, $sql)) {
    echo"<script language ='JavaScript'>";
      echo "location='../../../index.php'";
    echo "</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>