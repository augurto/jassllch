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
require_once ('./config/conexion_tabla.php');
$sald=mysqli_query($con,"SELECT Sum(presupuesto) as saldo FROM proyecto where estado='terminado'");
        $rwt=mysqli_fetch_array($sald);
        $saldo=$rwt['saldo'];
        $usuario=$_SESSION["username"];
        $id_usuario=$_SESSION["id"];
        setlocale(LC_TIME, 'es_ES');
$monthNum  = 3;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = strftime('%B', $dateObj->getTimestamp());

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
    <?php include 'includes/editar/editar_usuario.php'; ?>
    <?php include 'includes/agregar/ingresos_extra.php'; ?>
    
    <!-- fin de procesos de modal -->

    <?php include 'includes/menu.php';?>
    <div style="height:50px"></div>
    <!-- Inicio de Graficas -->

    <?php if ($tipo_user==0) {?>
    <?php include 'includes/graficas/graficas_inicio.php'; }?>
    <!-- Fin de graficas -->

    <!-- Boton agregar proyecto -->
    
    <div class="row">
    <div class="col-sm-12 text-center">
                     <button type="button" class="btn btn-primary" id="boton_proyecto" data-toggle="modal" data-target="#exampleModalCenter">
                     <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Usuario
                      </button>
                      <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#compromisos">
                      <i class="fa fa-plus" aria-hidden="true"></i> sub tipo de Proyecto
                      </button> -->
        </div>
    </div>
  
    <?php include 'includes/parts/agregar_proyecto_modal.php' ?>
    <?php include 'includes/parts/agregar_sub_tipo_proyecto.php' ?>
    <?php include 'includes/parts/agregar_variante_tipo.php' ?>
    <?php
    
    foreach ($link->query('SELECT * from usuarios_jass where dni_usuario_jass = "'.$_GET['dni'].'"') as $row_pago){ 
        $dni_usuario_jass=$row_pago['dni_usuario_jass'];
        $nombres=$row_pago['nombres'];
        $ap_paterno=$row_pago['ap_paterno'];
        $ap_materno=$row_pago['ap_materno'];
        $datos_pago= $nombres.' '.$ap_paterno.' '.$ap_materno;
    }?> 

    <!-- Fin Boton agregar proyecto -->
    <br>
    <!-- Contenido de la tabla -->
    <div class="container">
    

    <div class="row">
    <form action="otros_pagos.php?dni=$_GET['dni']" method="get">
    <div class="input-group mb-3">
  <input type="number" class="form-control" id="dni" name="dni" placeholder="Buscar por DNI" aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
    </div>
    </form>
    <?php if (empty($dni_usuario_jass)) { ?>
        <div class="alert alert-warning" role="alert">
        No existe un usuario con ese DNI
        </div>
    <?php } else { ?>
        <form action="includes/insertar/insertar_otros_pagos.php">
        <div class="input-group mb-3">
            <span class="input-group-text">DNI </span>
            <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $dni_usuario_jass ; ?>" aria-label="Username" readonly>
            <span class="input-group-text">Nombres</span>
            <input type="text" class="form-control" value="<?php echo $nombres ; ?>" aria-label="Server">
            
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text">Ap Paterno</span>
            <input type="text" class="form-control" value="<?php echo $ap_paterno ; ?>" aria-label="Server">
            <span class="input-group-text">Ap Materno</span>
            <input type="text" class="form-control" value="<?php echo $ap_materno ; ?>" aria-label="Server">
            
            
            </div>
            <div class="input-group mb-3">
            
            <span class="input-group-text">Concepto</span>
            <input type="hidden" class="form-control" value="<?php echo $datos_pago ; ?>" name="datos"
             aria-label="Server">
             <input type="hidden" class="form-control" value="<?php echo $usuario ; ?>" name="usuario"
             aria-label="Server">
             <input type="hidden" class="form-control" value="<?php echo $id_usuario ; ?>" name="id_usuario"
             aria-label="Server">
             <input type="hidden" class="form-control" value="<?php echo $monthName ; ?>" name="nombre_mes"
             aria-label="Server">
             
            <select class="form-select" aria-label="Default select example" name="otro_pago" id="otro_pago">
                                        <option selected>Clic para ver</option>
                                        <option value="Multa">Multa</option>
                                        <option value="Padron">Padron</option>
                                        
                                        <option value="Otro">Otro</option>
                                    </select>
           
            <span class="input-group-text">Monto</span>
            <input type="number" class="form-control" placeholder="Ingrese monto " name="monto" aria-label="Server">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Registrar</button>
            </div>
        </form>
    <?php }?>
        
</div>


    </div>
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