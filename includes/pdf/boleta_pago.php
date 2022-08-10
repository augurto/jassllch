<?php
require('../../fpdf/fpdf.php');

$id_pago=$_GET['id_pago'];
$valor1=$_GET['dni'];
$datos=$_GET['datos'];
$fecha_pago=$_GET['fecha_pago'];
$usuario_atencion=$_GET['usuario_atencion'];
$pago_mes=$_GET['pago_mes'];
$monto_mes=$_GET['monto_mes'];
$monto_usuario=$_GET['monto_usuario'];
$vuelto=$_GET['vuelto'];


$pdf = new FPDF('L','mm','A5');
$pdf->AddPage();
$pdf->Image("../../img/fondo2.png", 0,0,150,300,'PNG' );
$pdf->SetFont('Arial','B',16);    
$textypos = 5;
$pdf->setY(2);
$pdf->setX(10);
// Agregamos los datos de la empresa
$pdf->Cell(5,$textypos,"Jass");
$pdf->Image("../../img/logo2.jpeg", 10,10,20,20,'JPEG' );

/* $pdf->SetFont('Arial','B',10);    
$pdf->setY(10);$pdf->setX(10);
$pdf->Cell(5,$textypos,"DE:");
$pdf->SetFont('Arial','',10);    
$pdf->setY(15);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Nombre de la empresa");
$pdf->setY(20);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Direccion de la empresa");
$pdf->setY(25);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Telefono de la empresa");
$pdf->setY(30);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Email de la empresa"); */

// Agregamos los datos del cliente
$pdf->SetFont('Arial','B',10);    
$pdf->setY(10);$pdf->setX(55);
$pdf->Cell(5,$textypos,"PARA:");
$pdf->SetFont('Arial','',10);    
$pdf->setY(15);$pdf->setX(55);
$pdf->Cell(5,$textypos,$datos);
/* $pdf->setY(20);$pdf->setX(75);
$pdf->Cell(5,$textypos,"Direccion del cliente");
$pdf->setY(25);$pdf->setX(75);
$pdf->Cell(5,$textypos,"Telefono del cliente");
$pdf->setY(30);$pdf->setX(75);
$pdf->Cell(5,$textypos,"Email del cliente"); */

// Agregamos los datos del cliente
$pdf->SetFont('Arial','B',10);    
$pdf->setY(10);$pdf->setX(135);
$pdf->Cell(5,$textypos,"BOLETA NRO : ".$id_pago);
$pdf->SetFont('Arial','',10);    
$pdf->setY(15);$pdf->setX(135);
$pdf->Cell(5,$textypos,"Fecha : ".$fecha_pago);
$pdf->setY(20);$pdf->setX(135);
/* $pdf->Cell(5,$textypos,"Vencimiento: 11/ENE/2020");
$pdf->setY(45);$pdf->setX(135); */
$pdf->Cell(5,$textypos,"");
$pdf->setY(30);$pdf->setX(135);
$pdf->Cell(5,$textypos,"");

/// Apartir de aqui empezamos con la tabla de productos
$pdf->setY(40);$pdf->setX(135);
    $pdf->Ln();
/////////////////////////////
//// Array de Cabecera
$header = array("Nro", "Concepto","Cant.","Precio","Total");
//// Arrar de Productos
$products = array(
	array("01", "Agua",1,$monto_usuario,0),
	/* array("0024", "Producto 2",5,80,0),
	array("0001", "Producto 3",1,40,0),
	array("0001", "Producto 3",5,80,0), 
    array("0001", "Producto 3",4,30,0),
	array("0001", "Producto 3",7,80,0), */
);
    // Column widths
    $w = array(20, 95, 20, 25, 25);
    // Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    $pdf->Ln();
    // Data
    $total = 0;
    foreach($products as $row)
    {
        $pdf->Cell($w[0],6,$row[0],1);
        $pdf->Cell($w[1],6,$row[1],1);
        $pdf->Cell($w[2],6,number_format($row[2]),'1',0,'R');
        $pdf->Cell($w[3],6,"S/ ".number_format($row[3],2,".",","),'1',0,'R');
        $pdf->Cell($w[4],6,"S/ ".number_format($row[3]*$row[2],2,".",","),'1',0,'R');

        $pdf->Ln();
        $total+=$row[3]*$row[2];

    }
/////////////////////////////
//// Apartir de aqui esta la tabla con los subtotales y totales
$yposdinamic = 40 + (count($products)*10);

$pdf->setY($yposdinamic);
$pdf->setX(235);
    $pdf->Ln();
/////////////////////////////
$header = array("", "");
$data2 = array(
	array("Subtotal",$total),
	array("Descuento", 0),
	array("Impuesto", 0),
	array("Total", $total),
);
    // Column widths
    $w2 = array(40, 40);
    // Header

    $pdf->Ln();
    // Data
    foreach($data2 as $row)
    {
$pdf->setX(115);
        $pdf->Cell($w2[0],6,$row[0],1);
        $pdf->Cell($w2[1],6,"S/ ".number_format($row[1], 2, ".",","),'1',0,'R');

        $pdf->Ln();
    }
/////////////////////////////

$pdf->output();
?>