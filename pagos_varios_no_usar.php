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

require_once ('config/conexion_tabla.php');
$sald=mysqli_query($con,"SELECT Sum(presupuesto) as saldo FROM proyecto where estado='terminado'");
        $rwt=mysqli_fetch_array($sald);
        $saldo=$rwt['saldo'];
        $usuario_2=$_SESSION["username"];
        $id_usuario=$_SESSION["id"];
        foreach ($link->query('SELECT MAX(id_pagos) as max_pago FROM `pagos` LIMIT 1') as $row_sql2){ // aca se hace la consulta e iterarla con each. 
          $max_pago=$row_sql2['max_pago'];
         
        }
        
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

<div class="container mt-5" style="background-color: #f9f9f9;">
  <br>
  <h1 class="text-center">
    <strong>Seleccionar multiples meses de pago..</strong>
  </h1>
  <hr /><br>
 
    <?php
      include('./config/config.php');
      $sqlClientes   = ("SELECT * FROM  usuarios_jass");
      $dataClientes  = mysqli_query($con, $sqlClientes);
    ?>
    <?php 
                        $mes_actual =date("m");
                        $year_actual =date("Y");
                        date_default_timezone_set("America/Lima");
                        $hoy = date("Y-m-d H:i:s");     
      ?>

<script>
                        //Función que realiza la suma
                        function Suma() {
                        var monto_pago = document.calculadora.monto_pago.value;
                        var deuda = document.calculadora.deuda.value;
                        try{
                            //Calculamos el número escrito:
                            monto_pago = (isNaN(parseFloat(monto_pago)))? 0 : parseFloat(monto_pago);
                            deuda = (isNaN(parseFloat(deuda)))? 0 : parseFloat(deuda);
                            document.calculadora.vuelto.value = monto_pago-deuda;
                        }
                        //Si se produce un error no hacemos nada
                        catch(e) {}
                        }
  </script>

<form action="./includes/insertar/insertar_pagos_varios.php" method="POST" target="_blank">

  <div class="col-md-6">
      <label for="clientes" class="text-right">Lista de Usuarios: (<em>Recuerde seleccionar un Usuario</em>)</label>
      <br>
      <select name="idCliente" class="selectpicker" data-show-subtext="false" data-live-search="true" required>
        <option value="">Buscar Usuarios ...</option>
        <?php
          while ($data = mysqli_fetch_array($dataClientes)) { 
          
            ?>
            <option value="<?php echo $data["id_jass"]; ?>"><?php echo ($data["dni_usuario_jass"]).' :'.$data["nombres"].' - '.($data["ap_paterno"]).' - '.($data["ap_materno"]); ?> </option>
        <?php } ?>
      </select>
      
    </div>
 
  <br>
    <div class="row text-right">
    <div class="col-md-6">
      <button class="btn add-btn btn-info">+</button>
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-12">
      <label>Mes a pagar</label>
      <select name="PRODUCTO[]" class="form-control">
      <option value="Enero">Enero</option>
        <option value="Febrero">Febrero</option>
        <option value="Marzo">Marzo</option>
        <option value="Abril">Abril</option>
        <option value="Mayo">Mayo</option>
        <option value="Junio">Junio</option>
        <option value="Julio">Julio</option>
        <option value="Agosto">Agosto</option>
        <option value="Septiembre">Septiembre</option>
        <option value="Octubre">Octubre</option>
        <option value="Noviembre">Noviembre</option>
        <option value="Diciembre">Diciembre</option>
      </select>
      <br>
      
    </div>
    
</div>

<div class="newData"></div>

  <div class="row text-center mt-5">
     <div class="col-md-12">
        <br>
                               

        <input type="hidden" class="form-control" id="hoy" name="hoy"  aria-label="hoy" aria-describedby="basic-addon1" value="<?php echo $hoy;?>"  readonly >
        <input type="hidden" class="form-control" id="mes_actual" name="mes_actual" aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $mes_actual;?>" readonly >
                        <span class="input-group-text" id="basic-addon1">Año</span>
                        <input type="number" class="form-control" id="year_actual" name="year_actual"  aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $year_actual;?>"  >
        <input type="hidden" class="form-control" id="name_user" name="name_user"  aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $usuario_2;?>"  readonly>
        <input type="hidden" class="form-control" id="id_user" name="id_user" aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $id_usuario;?>"  readonly>
        <input type="hidden" class="form-control" id="max_pago" name="max_pago" aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $max_pago;?>"  readonly>
        
    <input type="submit" class="btn btn-primary" value="Registrar Pagos"/>
  </div>
  </div>
  <br>
  
</form>
</div>
 
 
  


  <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

  <script type="text/javascript">
    $(function () { 
      var i = 1;
      $('.add-btn').click(function (e) {
        e.preventDefault();
          i++;

        $('.newData').append('<div id="newRow'+i+'" class="form-row">'
        +'<div class="col-md-12">'
       
        +'<label>Mes</label>'
        +'<select name="PRODUCTO[]" class="form-control">'
        +'<option value="Enero">Enero</option>'
        +'<option value="Febrero">Febrero</option>'
        +'<option value="Marzo">Marzo</option>'
        +'<option value="Abril">Abril</option>'
        +'<option value="Mayo">Mayo</option>'
        +'<option value="Junio">Junio</option>'
        +'<option value="Julio">Julio</option>'
        +'<option value="Agosto">Agosto</option>'
        +'<option value="Septiembre">Septiembre</option>'
        +'<option value="Octubre">Octubre</option>'
        +'<option value="Noviembre">Noviembre</option>'
        +'<option value="Diciembre">Diciembre</option>'
        +'</select>'
        +'</div>'
           
            
            +'<a href="#" class="remove-lnk" id="'+i+'">Eliminar "'+i+'"</a>'
            +'</div>'
           
          );  
      });
 

       $(document).on('click', '.remove-lnk', function(e) {
         e.preventDefault();

          var id = $(this).attr("id");
           $('#newRow'+id+'').remove();
        });
 
    });
  </script>
</body>
</html>