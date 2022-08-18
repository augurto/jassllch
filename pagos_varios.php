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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"> 
    <title>Registrar Pagos Varios</title>
    <style>
      em{
        color: crimson !important;
      }
    .btn:focus {
      outline: none !important;
      box-shadow: none;
    }
      input[type="button"]{
      border: none;
      outline:none;
      }
      .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn){
          width:450px !important;
      }
    </style>
</head>
<body>
<?php include 'includes/menu.php';?>
  <div class="container" style="background-color:#f9f9f9;">
    <br><br>
    <div class="row text-center mt-5">
      <h1><strong>Seleccionar multiples meses de pago</strong></h1>
      <hr />
      <br>
    </div>

    <?php
      include('./config/config.php');
      $sqlClientes   = ("SELECT * FROM  usuarios_jass");
      $dataClientes  = mysqli_query($con, $sqlClientes);
    ?>


<form action="./includes/insertar/insertar_pagos_varios.php" method="POST">
  <div class="row-fluid">
    <div class="col-md-6">
      <label for="clientes" class="text-right">Lista de Usuarios: (<em>Recuerde seleccionar un Usuarios</em>)</label>
      <br>
      <select name="idCliente" class="selectpicker" data-show-subtext="false" data-live-search="true" required>
        <option value="">buscar Usuarios ...</option>
        <?php
          while ($data = mysqli_fetch_array($dataClientes)) { ?>
            <option value="<?php echo $data["id_jass"]; ?>"><?php echo ($data["dni_usuario_jass"]).' :'.$data["nombres"].' - '.($data["ap_paterno"]).' - '.($data["ap_materno"]); ?> </option>
        <?php } ?>
      </select>
    </div>
    <div class="col-md-5">
      <label for="COD_CODIGO" class="text-left">Agregar Mes a pagar</label>
      <input type="text" name="COD_CODIGO[]" class="form-control" required>
    </div>
    <div class="col-md-1">
      <label for="code" class="text-left"></label><br>
      <button type="button" class="btn btn-success" id="btnMore">
        <i class="zmdi zmdi-plus zmdi-hc-lg"></i>
      </button>
    </div>
  </div>

  <div class="row-fluid" id="incrementa">

  </div>

  <br><br>
  <br><br>
  <br>
  <div class="row">
  <div class="col-md-4"></div>
    <div class="col-md-4">
      <button type="submit" class="btn btn-primary btn-block">Pocesar Información</button>
    </div>
  <div class="col-md-4"></div>
  <br><br>
  <br><br>

</form>


  </div>

  <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

<script>
$(function(){
var i=1;
$('#btnMore').click(function(){
  var div ='<div class="col-md-6"></div>';
  var divInput = '<div class="col-md-5"><label for="code" class="text-left"> Agregar Código </label>';
  var inputCode ='<input type="text" name="COD_CODIGO[]" class="form-control"> </div>';
  i++;
  //Importante esta variable debe ir debajo del autoincrementable
  var btnDelete ='<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>';
  $('#incrementa').append('<div class="row-fluid'+i+'">'+ div + divInput + inputCode+' <div class="col-md-1"><br> '+ btnDelete +' </div> </div> <br><br><br>');
});
	

$(document).on('click', '.btn_remove', function(){
  var button_id = $(this).attr("id"); 
  console.log(button_id);
  $('.row-fluid'+button_id+'').remove();
}); 


});
</script>

</body>
</html>