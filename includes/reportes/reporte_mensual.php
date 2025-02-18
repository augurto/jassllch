


<?php error_reporting(0);
require_once ("../../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../../config/conexion.php");//Contiene funcion que conecta a la base de datos

require('../../fpdf/fpdf.php');

//Conecto a la base de datos
$host_name = "localhost";
$database = "u394588994_jass"; // Change your database nae
$username = "u394588994_jass";          // Your database user id 
$password = "Jass*#1720";    
date_default_timezone_set("America/Lima");
$nro_mes=$_GET['mes_pago'];
$mes_actual =date("m");
$year_actual =date("Y");
$dia_actual =date("d");
$mmm=date("H:i:s");

$hoy = date("Y-m-d H:i:s");  

$connection=mysqli_connect($host_name,$username,$password,$database);
$mysqli = new mysqli("localhost", "u394588994_jass", "Jass*#1720", "u394588994_jass");
//Consulta la tabla productos solicitando todos los productos
$resultado = $mysqli->query("SELECT * FROM pagos where pago_mes='".$nro_mes."'");
/* $suma_resultado = $mysqli->query("SELECT sum(deuda) FROM pagos "); */
$ti=mysqli_query($con,"SELECT sum(deuda) ti FROM pagos  where estado_pago='1' and pago_mes ='".$nro_mes."' ");
$rwi=mysqli_fetch_array($ti);
$tin=$rwi["ti"];

$sol=mysqli_query($con,"SELECT sum(deuda*cantidad_mes) sol FROM pagos  where estado_pago='0'  and pago_mes ='".$nro_mes."' ");
$sole=mysqli_fetch_array($sol);
$soles=$sole["sol"];
$resultado_saldo_total=$soles-$tin;

//Instaciamos la clase para genrear el documento pdf
$pdf=new FPDF();

//Agregamos la primera pagina al documento pdf
$pdf->AddPage();
$pdf->Image("../../img/fondo2.png", 15,20,180,110,'PNG' );
$pdf->Image("../../img/logo2.jpeg", 10,10,30,30,'JPEG' );
//Seteamos el inicio del margen superior en 25 pixeles

$y_axis_initial = 25;

//Seteamos el tiupo de letra y creamos el titulo de la pagina. No es un encabezado no se repetira
$pdf->SetFont('Arial','B',12);

$pdf->Cell(40,6,'',0,0,'C');
$pdf->Cell(100,6,'REPORTE MENSUAL : '.strtoupper($nro_mes),1,0,'C');

$pdf->Ln(40);

//Creamos las celdas para los titulo de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(232,232,232);

$pdf->SetFont('Arial','',10);
$pdf->Cell(125,6,'USUARIO',1,0,'C',1);

$pdf->Cell(30,6,'NRO BOLETA',1,0,'C',1);
$pdf->Cell(30,6,'MONTO',1,0,'C',1);

$pdf->Ln(6);

//Comienzo a crear las fiulas de productos según la consulta MySQL

while($fila = mysqli_fetch_array($resultado))
{

$titulo = $fila['datos_pago'];
$variable = $fila['variable_boleta'];

$precio = $fila['id_pagos'];
$imagen=$fila['deuda'];
$cantidad_mes=$fila['cantidad_mes'];
$cantidad_total=$imagen*$cantidad_mes;
$pdf->Cell(125,8,utf8_decode($titulo),1,0,'L',0);

$pdf->Cell(30,8,$variable.'-'.$precio,1,0,'R',0);
$pdf->Cell(30,8,'S/ '.number_format($cantidad_total,2, ".",","),1,0,'R',0);
//Muestro la iamgen dentro de la celda GetX y GetY dan las coordenadas actuales de la fila

/* $pdf->Cell( 30, 15, $pdf->Image($imagen, $pdf->GetX()+5, $pdf->GetY()+3, 20), 1, 0, 'C', false ); */

$pdf->Ln(8);

}
$pdf->SetFont('Arial','B',12);


$pdf->Cell(155,6,'EGRESOS : S/ '.number_format($tin,2, ".",",").'  INGRESOS : S/ '.number_format($soles,2, ".",",").'  SALDO TOTAL : S/ '.number_format($resultado_saldo_total,2, ".",","),1,0,'C');
mysqli_close($enlace);

//Mostramos el documento pdf
$pdf->Output('Reporte '.$mes_actual.'-'.$dia_actual.' | '.$mmm.'.pdf','I');

?>