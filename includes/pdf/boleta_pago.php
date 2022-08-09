<?php
require('../../fpdf/fpdf.php');
$valor1=$_GET['dni'];

$pdf = new FPDF('L','mm','A5');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
// Insert a logo in the top-left corner at 300 dpi
$pdf->Image('../../img/logo1.jpeg',10,10,-300);
// Insert a dynamic image from a URL

$pdf->Cell(140,10,'Dni :');
$pdf->Cell(180,20,$valor1);

$pdf->Output();
?>