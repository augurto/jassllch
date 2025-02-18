<?php
// Datos de conexión a la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'u394588994_jass');
define('DB_PASS', 'Jass*#1720');
define('DB_NAME', 'u394588994_jass');

// Crear conexión
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para seleccionar todos los datos de la tabla 'pagos'
$sql = "SELECT * FROM pagos";

// Ejecutar la consulta y obtener el resultado
$result = $conn->query($sql);

// Verificar si hay filas de resultados
if ($result->num_rows > 0) {
    // Array para almacenar los datos
    $data = array();

    // Iterar sobre los resultados y almacenarlos en el array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Nombre del archivo CSV que se descargará
    $filename = 'export_pagos.csv';

    // Encabezados HTTP para forzar la descarga del archivo CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    // Abre el archivo en modo de escritura
    $file = fopen('php://output', 'w');

    // Agrega los encabezados CSV
    fputcsv($file, array_keys($data[0]));

    // Agrega los datos al archivo CSV
    foreach ($data as $row) {
        fputcsv($file, $row);
    }

    // Cierra el archivo
    fclose($file);
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>
