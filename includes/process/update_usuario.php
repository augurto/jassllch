<?php
$servername = "localhost";
$database = "u291982824_agua";
$username = "u291982824_agua";
$password = "JassJass*#17";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection

$idjass2=$_GET["idjass2"];
$jass_dni=$_GET["jass_dni"];
$nombres=$_GET["nombres"];
$paterno=$_GET["paterno"];
$materno=$_GET["materno"];




$usuario=$_GET["usuario"];
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "UPDATE  usuarios_jass set  nombres = '".$nombres."',ap_paterno = '".$paterno."',ap_materno = '".$materno."',dni_usuario_jass = '".$jass_dni."' where id_jass = '".$idjass2."'";
if (mysqli_query($conn, $sql)) {
    echo"<script language ='JavaScript'>";
      echo "location='../../../index.php'";
    echo "</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>