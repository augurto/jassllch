<?php
$servername = "localhost";
$database = "u394588994_jass";
$username = "u394588994_jass";
$password = "Jass*#1720";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection

$id=$_GET["id"];

$usuario=$_GET["usuario"];
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "UPDATE  usuarios_jass set  estado_usuario_jass = 1 where id_jass = '".$id."'";
if (mysqli_query($conn, $sql)) {
    echo"<script language ='JavaScript'>";
      echo "location='../../index.php'";
    echo "</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>