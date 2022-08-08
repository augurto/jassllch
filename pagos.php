<html>
  <head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
  </head>
  <?php include 'includes/menu.php';?>
    <div style="height:50px"></div>
  <div class="container">
    <div class="row">
      
      <hr />
    
    <div class="row-fluid">
      <select class="selectpicker" data-show-subtext="true" data-live-search="true">

<?php 
include "select_buscador/db.php";
$con = connect();
if (!$con->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
       die("Error cargando el conjunto de caracteres utf8");
}
$consulta = "SELECT * FROM usuarios_jass";
$resultado = mysqli_query($con , $consulta);
$contador=0;

while($misdatos = mysqli_fetch_assoc($resultado)){ $contador++;?>
<option data-subtext="<?php echo $misdatos["id_jass"]; ?>"><?php echo $misdatos["nombres"]; ?></option>
<?php }?>          
</select>

    </div><hr />
    </div> 
     
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</html>
