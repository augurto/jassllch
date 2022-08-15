<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login/");
    exit;
}

require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
$sald=mysqli_query($con,"SELECT Sum(presupuesto) as saldo FROM proyecto where estado='terminado'");
        $rwt=mysqli_fetch_array($sald);
        $saldo=$rwt['saldo'];
        $usuario=$_SESSION["username"];
        $id_usuario=$_SESSION["id"];
        
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
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
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
  <input type="hidden" value="<?php echo $usuario;?>">
  <input type="hidden" value="<?php echo $id_usuario;?>">
  <!-- fin de datos sesion -->
    <!-- procesos de modal -->
    
    <?php include 'includes/agregar/nuevo_usuario.php'; ?>
    <?php include 'includes/modal-pago/modal_pago.php'; ?>
    <?php include 'includes/modal-pago/modal_egreso.php'; ?>
    
    <!-- fin de procesos de modal -->

    <?php include 'includes/menu.php';?>
    <div style="height:50px"></div>
    <!-- Inicio de Graficas -->

    <?php include 'includes/graficas/graficas_inicio.php'; ?>
    <!-- Fin de graficas -->

    <!-- Boton agregar proyecto -->
  
    <div class="container">
    <div class="row">
    <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Reporte Mensual
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
    
      <form action="#1">
      <div class="input-group">
                                  <select name="mes_pago" id="mes_pago" class="form-select" required>
                                      <?php
                                          $mes=date("n"); 
                                          $rango=11; 
                                          for ($i=$mes;$i<=$mes+$rango;$i++){ 
                                              $mesano=date('Y-n', mktime(0, 0, 0, $i, 1, date("Y") ) );
                                              $meses=date('F', mktime(0, 0, 0, $i, 1, date("Y") ) );
                                              if ($meses=="January") $meses="Enero";
                                              if ($meses=="February") $meses="Febrero";
                                              if ($meses=="March") $meses="Marzo";
                                              if ($meses=="April") $meses="Abril";
                                              if ($meses=="May") $meses="Mayo";
                                              if ($meses=="June") $meses="Junio";
                                              if ($meses=="July") $meses="Julio";
                                              if ($meses=="August") $meses="Agosto";
                                              if ($meses=="September") $meses="Septiembre";
                                              if ($meses=="October") $meses="Octubre";
                                              if ($meses=="November") $meses="Noviembre";
                                              if ($meses=="December") $meses="Diciembre";
                                              $ano=date('Y', mktime(0, 0, 0, $i, 1, date("Y") ) );
                                              echo "<option value='$mes'>$meses</option>"; 
                                          } 
                                      ?> 
                                </select>
                                <button class="btn btn-outline-secondary" type="submit">Reporte Mensual</button>

        </div>
        </form>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Reporte Anual
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
    <form action="#2.1">
    <div class="input-group">
                      <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" placeholder="Digite el año">
                      <button class="btn btn-outline-secondary" type="submit">Reporte Año</button>
    </div>
      </form>
    </div>
  </div>

  <!-- <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Accordion Item #3
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
    </div>
  </div> -->
</div>

        
      </div>
        
    </div>
    <?php include 'includes/parts/agregar_proyecto_modal.php' ?>
    <?php include 'includes/parts/agregar_sub_tipo_proyecto.php' ?>
    <?php include 'includes/parts/agregar_variante_tipo.php' ?>


    <!-- Fin Boton agregar proyecto -->
    <br>
    <!-- Contenido de la tabla -->
    <?php include 'includes/tabla_reporte_general.php'; ?>
    <!-- Fin del contenido de la tabla -->

  
    <?php  include 'includes/footer.php'?>


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