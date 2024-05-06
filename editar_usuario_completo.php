<?php

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login/");
  exit;
}

require_once("config/db.php"); //Contiene las variables de configuracion para conectar a la base de datos
require_once("config/conexion.php"); //Contiene funcion que conecta a la base de datos
$sald = mysqli_query($con, "SELECT Sum(presupuesto) as saldo FROM proyecto where estado='terminado'");
$rwt = mysqli_fetch_array($sald);
$saldo = $rwt['saldo'];
$usuario = $_SESSION["username"];
$id_usuario = $_SESSION["id"];




// Verificar si se pasó el parámetro 'dni' en la URL
if (isset($_GET['dni'])) {
    // Obtener el valor de 'dni' y asegurarse de que sea un número entero
    $dni = intval($_GET['dni']);

    // Establecer conexión a la base de datos
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Verificar la conexión
    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Preparar la consulta SQL para obtener los datos del usuario por 'dni'
    $sql = "SELECT * FROM usuarios_jass WHERE id_jass = $dni";

    // Ejecutar la consulta
    $result = mysqli_query($conn, $sql);

    // Verificar si se encontraron resultados
    if (mysqli_num_rows($result) > 0) {
        // Obtener la primera fila de resultados como un array asociativo
        $row = mysqli_fetch_assoc($result);

        // Asignar los valores a variables para usar en el formulario
        $id_jass = $row['id_jass'];
        $nombres = $row['nombres'];
        $ap_paterno = $row['ap_paterno'];
        $ap_materno = $row['ap_materno'];
        $fecha_nacimiento = $row['fecha_nacimiento'];
        // Agrega más campos aquí según sea necesario

        // Cerrar la conexión
        mysqli_close($conn);
    } else {
        echo "No se encontraron registros para el DNI especificado.";
        exit; // Salir del script si no se encontraron resultados
    }
} else {
    echo "Parámetro 'dni' no especificado en la URL.";
    exit; // Salir del script si 'dni' no está presente en la URL
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- incluyendo script para editar en tiempo realpat -->


  <!-- fin -->
  <!-- incluyendo bootstrap -->
  <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">

  <!-- inicio datatables -->

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="main.css">

  <!--datables CSS básico-->
  <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
  <!--datables estilo bootstrap 4 CSS-->
  <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

  <!--font awesome con CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <!-- fin datatable -->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <title>Jass</title>
</head>

<body>
  <!-- datos de sesion -->
  <input type="hidden" value="<?php echo $usuario; ?>">
  <input type="hidden" value="<?php echo $id_usuario; ?>">
  <!-- fin de datos sesion -->
  <!-- procesos de modal -->


  <!-- fin de procesos de modal -->

  <?php include 'includes/menu.php'; ?>
  <div style="height:50px"></div>
  <!-- Inicio de Graficas -->
  <?php include 'includes/graficas/graficas_inicio.php'; ?>
  <?php include 'includes/modal-pago/modal_egreso.php'; ?>
  <?php include 'includes/agregar/ingresos_extra.php'; ?>

  <!-- Fin de graficas -->

  <!-- Boton agregar proyecto -->
  <div class="row">
    <!-- <div class="col-sm-12 text-center">
                     <button type="button" class="btn btn-primary" id="boton_proyecto" data-toggle="modal" data-target="#exampleModalCenter">
                     <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Proyecto
                      </button>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#compromisos">
                      <i class="fa fa-plus" aria-hidden="true"></i> sub tipo de Proyecto
                      </button>
        </div> -->
  </div>
  <div class="row">
    <div class="col-sm-12 text-center">

      <?php
      // Obtener el valor del parámetro 'dni' de la URL actual
      if (isset($_GET['dni'])) {
        $dni = htmlspecialchars($_GET['dni']); // Sanitizar el valor del parámetro 'dni'
      } else {
        $dni = ''; // Valor por defecto si 'dni' no está presente en la URL
      }
      ?>

      




    </div>

  </div>


  <!-- Fin Boton agregar proyecto -->
  <br>
  <!-- Contenido de la tabla -->

  <div class="container mt-5">
        <h1 class="mb-4">Editar Usuario</h1>

        <!-- Formulario para editar datos del usuario -->
        <form action="actualizar_usuario.php" method="POST">
            <input type="hidden" name="id_jass" value="<?php echo $id_jass; ?>">
            
            <div class="form-group">
                <label for="nombres">Nombres:</label>
                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $nombres; ?>">
            </div>

            <div class="form-group">
                <label for="ap_paterno">Apellido Paterno:</label>
                <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" value="<?php echo $ap_paterno; ?>">
            </div>

            <div class="form-group">
                <label for="ap_materno">Apellido Materno:</label>
                <input type="text" class="form-control" id="ap_materno" name="ap_materno" value="<?php echo $ap_materno; ?>">
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>">
            </div>

            <div class="form-group">
                <label for="id_natural">ID Natural:</label>
                <input type="text" class="form-control" id="id_natural" name="id_natural" value="<?php echo $id_natural; ?>">
            </div>

            <div class="form-group">
                <label for="natural_de">Natural de:</label>
                <input type="text" class="form-control" id="natural_de" name="natural_de" value="<?php echo $natural_de; ?>">
            </div>

            <div class="form-group">
                <label for="direccion_actual">Dirección Actual:</label>
                <input type="text" class="form-control" id="direccion_actual" name="direccion_actual" value="<?php echo $direccion_actual; ?>">
            </div>

            <div class="form-group">
                <label for="distrito">Distrito:</label>
                <input type="text" class="form-control" id="distrito" name="distrito" value="<?php echo $distrito; ?>">
            </div>

            <div class="form-group">
                <label for="provincia">Provincia:</label>
                <input type="text" class="form-control" id="provincia" name="provincia" value="<?php echo $provincia; ?>">
            </div>

            <div class="form-group">
                <label for="departamento">Departamento:</label>
                <input type="text" class="form-control" id="departamento" name="departamento" value="<?php echo $departamento; ?>">
            </div>

            <div class="form-group">
                <label for="ocupacion">Ocupación:</label>
                <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="<?php echo $ocupacion; ?>">
            </div>

            <div class="form-group">
                <label for="grado_instruccion">Grado de Instrucción:</label>
                <input type="text" class="form-control" id="grado_instruccion" name="grado_instruccion" value="<?php echo $grado_instruccion; ?>">
            </div>

            <div class="form-group">
                <label for="estado_civil">Estado Civil:</label>
                <input type="text" class="form-control" id="estado_civil" name="estado_civil" value="<?php echo $estado_civil; ?>">
            </div>

            <div class="form-group">
                <label for="dni_usuario_jass">DNI Usuario:</label>
                <input type="text" class="form-control" id="dni_usuario_jass" name="dni_usuario_jass" value="<?php echo $dni_usuario_jass; ?>">
            </div>

            <div class="form-group">
                <label for="esposa_conviviente">Esposa/Conviviente:</label>
                <input type="text" class="form-control" id="esposa_conviviente" name="esposa_conviviente" value="<?php echo $esposa_conviviente; ?>">
            </div>

            <div class="form-group">
                <label for="sector_jass">Sector:</label>
                <input type="text" class="form-control" id="sector_jass" name="sector_jass" value="<?php echo $sector_jass; ?>">
            </div>

            <div class="form-group">
                <label for="cantidad_miembros">Cantidad de Miembros:</label>
                <input type="text" class="form-control" id="cantidad_miembros" name="cantidad_miembros" value="<?php echo $cantidad_miembros; ?>">
            </div>

            <div class="form-group">
                <label for="fecha_uno">Fecha Uno:</label>
                <input type="text" class="form-control" id="fecha_uno" name="fecha_uno" value="<?php echo $fecha_uno; ?>">
            </div>

            <div class="form-group">
                <label for="estado_usuario_jass">Estado Usuario:</label>
                <input type="text" class="form-control" id="estado_usuario_jass" name="estado_usuario_jass" value="<?php echo $estado_usuario_jass; ?>">
            </div>

            <!-- Agregar más campos aquí según sea necesario -->

            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        </form>
    </div>
  <!-- Fin del contenido de la tabla -->


  <?php include 'includes/footer.php' ?>


  <!-- Inicio de Script para datatables -->

  <!-- jQuery, Popper.js, Bootstrap JS -->
  <script src="jquery/jquery-3.3.1.min.js"></script>
  <script src="popper/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <!-- datatables JS -->
  <script type="text/javascript" src="datatables/datatables.min.js"></script>

  <!-- para usar botones en datatables JS -->
  <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>
  <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

  <!-- código JS propìo-->
  <script type="text/javascript" src="main.js"></script>


  <!-- Fin de Script para datatables -->
  <script src="js/proyecto.js"></script>

</body>

</html>