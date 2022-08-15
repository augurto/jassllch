<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    // Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'World populations',0,1,'C');
    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}
}

// Connect to database
$link = mysqli_connect('localhost','u415020159_jass','JassJass*#17','u415020159_jass');

$pdf = new PDF();
$pdf->AddPage();
// First table: output all columns
$pdf->Table($link,'select * from pagos order by id_pagos');
$pdf->AddPage();
// Second table: specify 3 columns
$pdf->AddCol('rank',20,'','C');
$pdf->AddCol('name',40,'datos_pagos');
$pdf->AddCol('pop',40,'Pop (2001)','R');
$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
            'padding'=>2);
$pdf->Table($link,'select datos_pago, format(year_actual_pago,0) as pop, rank from pagos order by rank limit 0,10',$prop);
$pdf->Output();
?>