<?Php
require "config.php";//connection to database
//SQL to get 10 records
$sql="select * from pagos LIMIT 0,10";
require('../../fpdf/fpdf.php');
$pdf = new FPDF(); 
$pdf->AddPage();

$width_cell=array(20,50,40,40,40);
$pdf->SetFont('Arial','B',16);

//Background color of header//
$pdf->SetFillColor(193,229,252);

// Header starts /// 
//First header column //
$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
//Second header column//
$pdf->Cell($width_cell[1],10,'NAME',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[2],10,'CLASS',1,0,'C',true); 
//Fourth header column//
$pdf->Cell($width_cell[3],10,'MARK',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[4],10,'GENDER',1,1,'C',true); 
//// header ends ///////

$pdf->SetFont('Arial','',14);
//Background color of header//
$pdf->SetFillColor(235,236,236); 
//to give alternate background fill color to rows// 
$fill=false;

/// each record is one row  ///
foreach ($dbo->query($sql) as $row) {
$pdf->Cell($width_cell[0],10,$row['id_pagos'],1,0,'C',$fill);
$pdf->Cell($width_cell[1],10,$row['datos_pago'],1,0,'L',$fill);
$pdf->Cell($width_cell[2],10,$row['name_user'],1,0,'C',$fill);
$pdf->Cell($width_cell[3],10,$row['deuda'],1,0,'C',$fill);
$pdf->Cell($width_cell[4],10,$row['estado_pago'],1,1,'C',$fill);
//to give alternate background fill  color to rows//
$fill = !$fill;
}
/// end of records /// 

$pdf->Output();
?>