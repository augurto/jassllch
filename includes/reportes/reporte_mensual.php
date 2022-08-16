


<?php error_reporting(0);

require('../../fpdf/fpdf.php');

//Conecto a la base de datos
$host_name = "localhost";
$database = "u415020159_jass"; // Change your database nae
$username = "u415020159_jass";          // Your database user id 
$password = "JassJass*#17";    
$nro_mes=$_GET['mes_pago'];
$connection=mysqli_connect($host_name,$username,$password,$database);
$mysqli = new mysqli("localhost", "u415020159_jass", "JassJass*#17", "u415020159_jass");
//Consulta la tabla productos solicitando todos los productos
$resultado = $mysqli->query("SELECT * FROM pagos where mes_actual_pago='".$nro_mes."'");



//Instaciamos la clase para genrear el documento pdf
$pdf=new FPDF();

//Agregamos la primera pagina al documento pdf
$pdf->AddPage();

//Seteamos el inicio del margen superior en 25 pixeles

$y_axis_initial = 25;

//Seteamos el tiupo de letra y creamos el titulo de la pagina. No es un encabezado no se repetira
$pdf->SetFont('Arial','B',12);

$pdf->Cell(40,6,'',0,0,'C');
$pdf->Cell(100,6,'REPORTE MENSUAL',1,0,'C');

$pdf->Ln(10);

//Creamos las celdas para los titulo de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(232,232,232);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(125,6,'USUARIO',1,0,'C',1);

$pdf->Cell(30,6,'NRO bOLETA',1,0,'C',1);
$pdf->Cell(30,6,'MES',1,0,'C',1);

$pdf->Ln(1);

//Comienzo a crear las fiulas de productos según la consulta MySQL

while($fila = mysqli_fetch_array($resultado))
{

$titulo = $fila['datos_pago'];

$precio = $fila['id_pagos'];
$imagen=$fila['mes_actual_pago'];

$pdf->Cell(125,15,$titulo,1,0,'L',0);

$pdf->Cell(30,15,$precio,1,0,'R',0);
$pdf->Cell(30,15,$imagen,1,0,'R',0);
//Muestro la iamgen dentro de la celda GetX y GetY dan las coordenadas actuales de la fila

/* $pdf->Cell( 30, 15, $pdf->Image($imagen, $pdf->GetX()+5, $pdf->GetY()+3, 20), 1, 0, 'C', false ); */

$pdf->Ln(15);

}
$pdf->SetFont('Arial','B',12);


$pdf->Cell(140,6,'SALDO ACTUAL :',1,0,'C');
mysqli_close($enlace);

//Mostramos el documento pdf
$pdf->Output();

?>