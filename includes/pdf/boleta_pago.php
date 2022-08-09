<?php
require('../../fpdf/fpdf.php');
$valor1=$_GET['dni'];

$pdf = new FPDF('L','mm','A5');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
// Insert a logo in the top-left corner at 300 dpi

// Insert a dynamic image from a URL

$pdf->Cell(100,10,'Dni :'.$valor1);
$pdf->Cell(110,10,$valor1);
$pdf->Image('../../img/logo1.jpeg', 80 ,80, 80 , 50);

$pdf->Output();
?>