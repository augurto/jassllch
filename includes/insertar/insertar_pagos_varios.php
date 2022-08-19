<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css">

<?php
require("../../config/config.php");
$idCliente      = $_POST['idCliente'];
$PRODUCTO       = $_POST['PRODUCTO'];
$hoy            = $_POST['hoy'];
$mes_actual     = $_POST['mes_actual'];
$year_actual    = $_POST['year_actual'];
$name_user      = $_POST['name_user'];
$id_user        = $_POST['id_user'];
$deuda=5;

$COD_CODIGO     = $_POST['COD_CODIGO'];
$COD_ESTADO     ="Activo";
$CANT_USO       =0;


$dataCode = count($COD_CODIGO);
if($dataCode >0){
    for ($i=0; $i <$dataCode; $i++) { 

    //Verifico si existe el codigo
    $sqlCode  = ("SELECT *  FROM tbl_codigo WHERE COD_CODIGO='$COD_CODIGO[$i]' ");
    $queryCode  	= mysqli_query($con, $sqlCode);
    if(mysqli_num_rows($queryCode)>0){
        //echo 'Ya existe el codigo';
        }else{
            $queryInsertCode = ("INSERT INTO pagos(id_jass,pago_mes,mes_actual_pago,year_actual_pago,name_user,id_user, deuda,variable_boleta,estado_pago,pago_hoy)
             VALUES ('" .$idCliente. "','" .$PRODUCTO[$i]. "','" .$mes_actual. "','" .$year_actual. "','" .$name_user. "','" .$id_user. "','" .$deuda. "','ING','0','" .$hoy. "')");
            $resultado = mysqli_query($con, $queryInsertCode);
        }
    } 
echo '<p style="color:#fff;"></p>';
echo "<script type='text/javascript'>
  Swal.fire(
  'Felicitaciones!',
  'Operación realizada con exito',
  'success'
).then((result) => {
      if (result.isConfirmed) {
        location.href='index.php';
      } 
    })
</script>";
}else{
    echo 'Error';
} 
?>
