<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css">

<?php
require("../../config/config.php");
require_once ('../../config/conexion_tabla.php');
$idCliente      = $_POST['idCliente'];
$PRODUCTO       = $_POST['PRODUCTO'];
$hoy            = $_POST['hoy'];
$mes_actual     = $_POST['mes_actual'];
$year_actual    = $_POST['year_actual'];
$name_user      = $_POST['name_user'];
$id_user        = $_POST['id_user'];
$deuda=5;
foreach ($link->query('SELECT * from usuarios_jass where id_jass = "'.$idCliente.'"') as $row_sql){ // aca se hace la consulta e iterarla con each. 
  $dni_usuario_jass=$row_sql['dni_usuario_jass'];
  $nombres=$row_sql['nombres'];
  $ap_paterno=$row_sql['ap_paterno'];
  $ap_materno=$row_sql['ap_materno'];
  $datos_usuario=$nombres.' '.$ap_paterno.' '.$ap_materno;
}
$COD_CODIGO     = $_POST['COD_CODIGO'];
$COD_ESTADO     ="Activo";
$CANT_USO       =0;


$dataCode = count($PRODUCTO);
if($dataCode >0){
    for ($i=0; $i <$dataCode; $i++) { 

    //Verifico si existe el codigo
    $sqlCode  = ("SELECT *  FROM pagos WHERE pago_mes='$PRODUCTO[$i]' AND year_actual_pago= '".$year_actual."'");
    $queryCode  	= mysqli_query($con, $sqlCode);
    if(mysqli_num_rows($queryCode)>0){
      
      echo '<p style="color:#fff;"></p>';
      echo "<script type='text/javascript'>
        Swal.fire(
        'Error!',
        'Operacion cancelada',
        'success'
      ).then((result) => {
            if (result.isConfirmed) {
              location.href='../../pagos_varios.php','_blank'; 
            } 
          })
      </script>";
        }else{
            $queryInsertCode = ("INSERT INTO pagos(id_jass,dni_usuario_jass,datos_pago,pago_mes,mes_actual_pago,year_actual_pago,name_user,id_user, deuda,variable_boleta,estado_pago,pago_hoy)
             VALUES ('" .$idCliente. "','" .$dni_usuario_jass. "','" .$datos_usuario. "','" .$PRODUCTO[$i]. "','" .$mes_actual. "','" .$year_actual. "','" .$name_user. "','" .$id_user. "','" .$deuda. "','ING','0','" .$hoy. "')");
            $resultado = mysqli_query($con, $queryInsertCode);
            echo '<p style="color:#fff;"></p>';
              echo "<script type='text/javascript'>
                Swal.fire(
                'Pagos Registrados!',
                'Operación realizada con exito',
                'success'
              ).then((result) => {
                    if (result.isConfirmed) {
                      location.href='../../usuario_jass.php?dni=$dni_usuario_jass';
                    } 
                  })
              </script>";
                      }
    } 

}else{
    echo 'Error';
} 
?>
