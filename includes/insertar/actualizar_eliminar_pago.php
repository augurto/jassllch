<?php
$servername = "localhost";
$database = "u394588994_jass";
$username = "u394588994_jass";
$password = "Jass*#1720";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection

$id_pago=$_GET["id_pago"];

$dni_pago=$_GET["dni_pago"];
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "UPDATE  pagos set  estado_pago = 9 where id_pagos = '".$id_pago."'";
if (mysqli_query($conn, $sql)) {
    echo"<script language ='JavaScript'>";
      echo "location='../../usuario_jass.php?dni=$dni_pago'";
    echo "</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>