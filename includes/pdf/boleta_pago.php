<?php
require('../../fpdf/fpdf.php');
$valor1=$_GET['dni'];
$datos=$_GET['datos'];
$fecha_pago=$_GET['fecha_pago'];
$usuario_atencion=$_GET['usuario_atencion'];
$pago_mes=$_GET['pago_mes'];
$monto_mes=$_GET['monto_mes'];
$monto_usuario=$_GET['monto_usuario'];
$vuelto=$_GET['vuelto'];
$f_vuelto=money_format('%.2n', $monto_mes);

$pdf = new FPDF('L','mm','A5');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
// Insert a logo in the top-left corner at 300 dpi

// Insert a dynamic image from a URL
$pdf->Ln(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,'Usuario : '.utf8_decode($datos));

$pdf->Ln();
$pdf->Cell(0,10,'Dni : '.$valor1);
$pdf->Ln();
$pdf->Cell(0,10,'Fecha de Pago : '.$fecha_pago);
$pdf->Ln();
$pdf->Cell(0,10,'Atendido por : '.$usuario_atencion);
$pdf->Ln();
$pdf->Cell(0,10,'Mes Pagado : '.$pago_mes);
$pdf->Ln();
$pdf->Cell(0,10,'Pago con : S/ '.(money_format('%.2n', $monto_mes)));
$pdf->Ln();
$pdf->Cell(0,10,'Deuda : S/ '.money_format('%.2n',$monto_usuario));
$pdf->Ln();
$pdf->Cell(0,10,'Vuelto : S/ '.money_format('%.2n',$vuelto));
$pdf->Ln();

$pdf->Image('../../img/logo1.jpeg', 80 ,90, 60 , 42);

$pdf->Output();
?>