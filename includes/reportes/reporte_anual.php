<?php
require_once("./mysql_table.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT datos_pago FROM pagos");
$header = $db_handle->runQuery("SELECT datos_pago 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='blog_samples' 
    AND `TABLE_NAME`='pagos'");

require('../../fpdf/fpdf.php');

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);		
foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Multicell(30,12,$column_heading,1);
}
foreach($result as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Multicell(30,12,$column,1);
}

$pdf->Output();
?>