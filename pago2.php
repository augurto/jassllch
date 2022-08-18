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
<html>
<head>
  <title>Formulario Dinamico</title>
  <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"> 
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
    <strong>Registrar</strong>
  </h1>
  <hr /><br>
  <?php
      include('./config/config.php');
      $sqlClientes   = ("SELECT * FROM  usuarios_jass");
      $dataClientes  = mysqli_query($con, $sqlClientes);
    ?>

<form action="recib.php" method="POST">
<div class="col-md-6">
      <label for="clientes" class="text-right">Lista de Usuarios: (<em>Recuerde seleccionar un Usuario</em>)</label>
      <br>
      <select name="idCliente" class="selectpicker" data-show-subtext="false" data-live-search="true" required>
        <option value="">Buscar Usuarios ...</option>
        <?php
          while ($data = mysqli_fetch_array($dataClientes)) { ?>
            <option value="<?php echo $data["id_jass"]; ?>"><?php echo ($data["dni_usuario_jass"]).' :'.$data["nombres"].' - '.($data["ap_paterno"]).' - '.($data["ap_materno"]); ?> </option>
        <?php } ?>
      </select>
    </div>
  <div class="row text-right">
    <div class="col-md-12">
      <button class="btn add-btn btn-info">+</button>
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-3">
      <label>PRODUCTO</label>
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
    </div>

    
</div>

<div class="newData"></div>

  <div class="row text-center mt-5">
     <div class="col-md-12">
    <input type="submit" class="btn btn-primary" value="Registrar"/>
  </div>
  </div>
  <br>
</form>
</div>
 
 
  <script type="text/javascript">
    $(function () { 
      var i = 1;
      $('.add-btn').click(function (e) {
        e.preventDefault();
          i++;

        $('.newData').append('<div id="newRow'+i+'" class="form-row">'
        +'<div class="col-md-3">'
        +'<label>PRODUCTO</label>'
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
  <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</body>
</html>