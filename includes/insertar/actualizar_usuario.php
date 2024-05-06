<?php
// Datos de conexión a la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'u291982824_agua');
define('DB_PASS', '21.17.Audra');
define('DB_NAME', 'u291982824_agua');

// Crear conexión
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verificar conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si se recibieron los datos del formulario por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_jass = $_POST['id_jass'];
    $nombres = $_POST['nombres'];
    $ap_paterno = $_POST['ap_paterno'];
    $ap_materno = $_POST['ap_materno'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $natural_de = $_POST['natural_de'];
    $direccion_actual = $_POST['direccion_actual'];
    $distrito = $_POST['distrito'];
    $provincia = $_POST['provincia'];
    $departamento = $_POST['departamento'];
    $ocupacion = $_POST['ocupacion'];
    $grado_instruccion = $_POST['grado_instruccion'];
    $estado_civil = $_POST['estado_civil'];
    $dni_usuario_jass = $_POST['dni_usuario_jass'];
    // Otros campos que desees actualizar

    // Consulta SQL para actualizar los datos del usuario
    $sql = "UPDATE usuarios_jass SET 
            nombres = '$nombres', 
            ap_paterno = '$ap_paterno', 
            ap_materno = '$ap_materno', 
            fecha_nacimiento = '$fecha_nacimiento', 
            natural_de = '$natural_de', 
            direccion_actual = '$direccion_actual', 
            distrito = '$distrito', 
            provincia = '$provincia', 
            departamento = '$departamento', 
            ocupacion = '$ocupacion', 
            grado_instruccion = '$grado_instruccion', 
            estado_civil = '$estado_civil', 
            dni_usuario_jass = '$dni_usuario_jass' 
            WHERE id_jass = $id_jass";


    // Ejecutar la consulta de actualización
    if (mysqli_query($conn, $sql)) {
        echo "Los datos del usuario se actualizaron correctamente.";

        // Redireccionar de nuevo a la misma página usando JavaScript
        echo "<script>window.location.href = '../../editar_usuario_completo.php?id_jass=$id_jass';</script>";
    } else {
        echo "Error al actualizar los datos del usuario: " . mysqli_error($conn);
    }

    // Cerrar la conexión
    mysqli_close($conn);
} else {
    echo "No se recibieron datos del formulario por el método POST.";
}
?>
