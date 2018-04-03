<?php
include 'connect.php';

//require('fpdf/fpdf.php');
require('code39.php');

$CODARTICULO = $_GET['code'];

$info = mysqli_query($con, "SELECT * FROM articulos, articuloslin, preciosventa WHERE articulos.CODARTICULO = articuloslin.CODARTICULO AND articulos.CODARTICULO = preciosventa.CODARTICULO AND articulos.CODARTICULO = $CODARTICULO"); 

$info2 = mysqli_fetch_object($info);  

if($info2->CODPROVEEDOR == NULL){
   $codproveedor = 'Niet ingesteld.';
}
    elseif($info2->CODPROVEEDOR != NULL){
        $leverancier = mysqli_query($con, "SELECT * FROM leveranciers WHERE CODPROVEEDOR = $info2->CODPROVEEDOR");
        $lev = mysqli_fetch_object($leverancier);
        $codproveedor = $lev->LEVERANCIER;
    }

$array = array(57, 19);

$pdf = new FPDF('L','mm',$array);
$pdf=new PDF_Code39('L','mm',$array);
$pdf->AddPage();
$pdf->SetAutoPageBreak(false);

$pdf->Code39(2,6,"$info2->CODBARRAS",0.5,6,'C');

$pdf->SetFont('Arial','',5);
$pdf->SetY(0);
$pdf->SetX(0);



$pdf->SetY(1);
$pdf->SetX(1);
$pdf->Cell(84.5,5,"$info2->DESCRIPCION",0,1,'');




$pdf->SetY(12);
$pdf->SetX(0);
$pdf->Cell(39,2,"",0,0,'');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(4,9,chr(128),0,0,'');
$pdf->Cell(13,9,"$info2->PNETO",0,1,'');

$pdf->SetX(0);
$pdf->Cell(65,7,"",0,1,'');

$pdf->Output();
?>