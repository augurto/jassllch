<?php
require('../../fpdf/fpdf.php');


$pdf = new FPDF('L','mm','A5');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
// Insert a logo in the top-left corner at 300 dpi
$pdf->Image('../../img/logo1.jpeg',10,10,-300);
// Insert a dynamic image from a URL

$pdf->Cell(40,10,'Hello World!');
$pdf->Output();
?>