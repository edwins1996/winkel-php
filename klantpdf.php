<?php
include 'connect.php';
require 'fpdf/fpdf.php';


$CODCLIENTE = $_GET['CODCLIENTE'];

$SQL = "SELECT * FROM clientes WHERE CODCLIENTE = $CODCLIENTE";
$result = mysqli_query($con, $SQL);
$row = mysqli_fetch_object($result);


$array = array(57, 19);

$pdf = new FPDF('L','mm',$array);
$pdf->AddPage();
$pdf->SetAutoPageBreak(false);



$pdf->SetY(0);
$pdf->SetX(2);
$pdf->SetFont('Arial','B',8);

$pdf->Cell(55,3.5,"",0,1,'');
$pdf->SetX(2);
$pdf->Cell(55,4,"$row->ALIAS",0,1,'');
$pdf->SetX(2);
$pdf->Cell(55,4,"$row->DIRECCION1",0,1,'');
$pdf->SetX(2);
$pdf->Cell(55,4,"$row->CODPOSTAL $row->POBLACION",0,1,'');
$pdf->SetX(2);
$pdf->Cell(55,3.5,"",0,1,'');    

$pdf->Output('');
?>