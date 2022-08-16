<?php
require_once("./mysql_table.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT id_pagos, deuda, estado_pago FROM pagos");
$result1 = $db_handle->runQuery("SELECT sum(deuda) as deudas FROM pagos");
$header = $db_handle->runQuery("SELECT id_pagos , deuda, estado_pago
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='blog_samples' 
    AND `TABLE_NAME`='pagos'");

require('../../fpdf/fpdf.php');

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();
class PDF extends FPDF
{
function Header()
{
    // Select Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Framed title
    $this->Cell(30,10,'Title',1,0,'C');
    // Line break
    $this->Ln(20);
}
}

foreach($result as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(30,12,$column,1);
}

$pdf->Output();

?>