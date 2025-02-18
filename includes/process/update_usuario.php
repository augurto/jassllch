<?php
$servername = "localhost";
$database = "u394588994_jass";
$username = "u394588994_jass";
$password = "Jass*#1720";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Obtener los datos del método GET
$idjass2 = $_GET["idjass2"];
$jass_dni = $_GET["jass_dni"];
$nombres = $_GET["nombres"];
$paterno = $_GET["paterno"];
$materno = $_GET["materno"];
$sector = $_GET["sector_jass"]; // Nuevo campo Sector
$cantidad_miembros = $_GET["cantidad_miembros"]; // Nuevo campo Cantidad de Miembros
$natural_de = $_GET["natural_de"]; // Nuevo campo Natural de

// Construir la consulta de actualización
$sql = "UPDATE usuarios_jass SET 
            nombres = '$nombres',
            ap_paterno = '$paterno',
            ap_materno = '$materno',
            dni_usuario_jass = '$jass_dni',
            sector_jass = '$sector',  -- Actualizar campo Sector
            cantidad_miembros = '$cantidad_miembros',  -- Actualizar campo Cantidad de Miembros
            natural_de = '$natural_de'  -- Actualizar campo Natural de
        WHERE id_jass = '$idjass2'";

// Ejecutar la consulta de actualización
if (mysqli_query($conn, $sql)) {
    echo "<script language='JavaScript'>";
    echo "location='../../../index.php'";
    echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Cerrar la conexión
mysqli_close($conn);
?>
