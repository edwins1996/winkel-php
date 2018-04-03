<?php
include 'connect.php';
require 'fpdf/fpdf.php';


$leverancier = $_GET['leverancier'];

if($leverancier == 'alle'){
    $SQL = mysqli_query($con, "SELECT * FROM articulos, stocks WHERE articulos.CODARTICULO = stocks.CODARTICULO ORDER BY DESCRIPCION");
}else{
    $SQL = mysqli_query($con, "SELECT * FROM articulos, stocks WHERE articulos.CODARTICULO = stocks.CODARTICULO AND CODPROVEEDOR = $leverancier ORDER BY DESCRIPCION");
}

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();



$pdf->SetY(5);
$pdf->SetX(0);

$pdf->SetFont('Arial','B',20);
$pdf->Cell(210,10,'VOORRAADLIJST',0,1,'C');

$pdf->SetX(0);
$pdf->Cell(210,10,'',0,1,'C');


$pdf->SetX(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(145,6,'OMSCHRIJVING',1,0,'L');
$pdf->Cell(45,6,'VOORRAAD',1,1,'L');

while($row = mysqli_fetch_object($SQL)){

$pdf->SetX(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(145,6,"$row->DESCRIPCION",1,0,'L');
$pdf->Cell(45,6,"$row->STOCK",1,1,'L');

}
    
$pdf->Output('');
?>