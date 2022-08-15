<?php
require_once("./mysql_table.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT id_pagos, deuda, estado_pago FROM pagos");
$result1 = $db_handle->runQuery("SELECT datos_pago FROM pagos");
$header = $db_handle->runQuery("SELECT id_pagos , deuda, estado_pago
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='blog_samples' 
    AND `TABLE_NAME`='pagos'");

require('../../fpdf/fpdf.php');

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);		
foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(30,12,$column_heading,1);
}
foreach($result1 as $row1) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row1 as $column1)
		$pdf->Cell(30,12,$column1,1);
}
foreach($result as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(30,12,$column,1);
}

$pdf->Output();
?>