<?php
$servername = "localhost";
$database = "u291982824_agua";
$username = "u291982824_agua";
$password = "21.17.Audra";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexión
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Obtener los datos del formulario enviado por POST
$idjass2 = $_POST["idjass2"];
$jass_dni = $_POST["jass_dni"];
$nombres = $_POST["nombres"];
$paterno = $_POST["paterno"];
$materno = $_POST["materno"];
$sector = $_POST["sector_jass"]; // Nuevo campo Sector
$cantidad_miembros = $_POST["cantidad_miembros"]; // Nuevo campo Cantidad de Miembros
$natural_de = $_POST["natural_de"]; // Nuevo campo Natural de

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
