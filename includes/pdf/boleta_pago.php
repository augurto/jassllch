<?php
require('../../fpdf/fpdf.php');
$valor1=$_GET['dni'];
$datos=$_GET['datos'];
$fecha_pago=$_GET['fecha_pago'];
$usuario_atencion=$_GET['usuario_atencion'];
$pago_mes=$_GET['pago_mes'];

$pdf = new FPDF('L','mm','A5');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
// Insert a logo in the top-left corner at 300 dpi

// Insert a dynamic image from a URL
$pdf->Cell(70,20,'Usuario : '.$datos);
$pdf->Cell(80,10,'Dni : '.$valor1);

$pdf->Cell(90,30,'Fecha de pago : '.$fecha_pago);
$pdf->Cell(100,40,'Atendido por : '.$usuario_atencion);
$pdf->Cell(105,50,'Mes cancelado : '.$pago_mes);

$pdf->Image('../../img/logo1.jpeg', 65 ,80, 80 , 55);

$pdf->Output();
?>