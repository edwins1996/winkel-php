<?php
include 'connect.php';
require('fpdf/fpdf.php');

$pdf = new FPDF('P','mm', 'A4');
$pdf->AddPage();

$dag = $_POST['dag'];
$maand = $_POST['maand'];
$jaar = $_POST['jaar'];

$datum = "$dag-$maand-$jaar";

$sql = mysqli_query($con, "SELECT * FROM albventacab, albventalin WHERE albventacab.FECHA = '$datum' AND albventacab.NUMALBARAN = albventalin.NUMALBARAN");

$pdf->SetFont('Arial','B',18);
$pdf->Cell(79,15,"DAGOVERZICHT $datum",0,1,'L');
$pdf->Cell(79,10,"",0,1,'L');


$pdf->SetFont('Arial','B',11); 
$pdf->Cell(22,6,"Factuurnr.",1,0,'L');
$pdf->Cell(100,6,"Artikelomschrijving",1,0,'L');
$pdf->Cell(20,6,"Prijs/stuk",1,0,'L');
$pdf->Cell(22,6,"Prijs/totaal",1,1,'L');

while($row = mysqli_fetch_object($sql)){

    $select = mysqli_query($con, "SELECT * FROM articulos, preciosventa WHERE articulos.CODARTICULO = preciosventa.CODARTICULO AND articulos.CODARTICULO = $row->CODARTICULO");
    $fetch = mysqli_fetch_object($select);
    
$pdf->SetFont('Arial','',11);    
$pdf->Cell(22,6,"$row->NUMFAC",1,0,'L');  
$pdf->Cell(100,6,"$fetch->DESCRIPCION",1,0,'L');
$pdf->Cell(20,6,chr(128)." ".number_format($row->PRECIODEFECTO, 2 , ',' , '.')."",1,0,'L');
$pdf->Cell(22,6,chr(128)." $row->COSTE",1,1,'L'); 

    
}

$teller = 0;

$sql2 = mysqli_query($con, "SELECT * FROM albventacab WHERE FECHA = '$datum' GROUP BY NUMFAC");
while($fetchio = mysqli_fetch_object($sql2)){
    
    $teller = $teller + $fetchio->TOTALCOSTE;
   
    
}

$pdf->Cell(22,6,"",1,0,'L');  
$pdf->Cell(100,6,"",1,0,'L');
$pdf->Cell(20,6,"",1,0,'L');
$pdf->Cell(22,6,"",1,1,'L');

$pdf->SetFont('Arial','B',11);  

$subtotaal = $teller / 100;
$sub = $subtotaal * 79;
$sub2 = number_format($sub, 2 , ',' , '.');

$pdf->Cell(22,6,"",1,0,'L');  
$pdf->Cell(100,6,"",1,0,'L');
$pdf->Cell(20,6,"Subtotaal:",1,0,'L'); 
$pdf->Cell(22,6,chr(128)." $sub2",1,1,'L');

$pdf->Cell(22,6,"",1,0,'L');  
$pdf->Cell(100,6,"",1,0,'L');
$pdf->Cell(20,6,"% BTW",1,0,'L'); 
$pdf->Cell(22,6,"21",1,1,'L');

$totaal = number_format($teller, 2 , ',' , '.');

$pdf->Cell(22,6,"",1,0,'L');  
$pdf->Cell(100,6,"",1,0,'L');
$pdf->Cell(20,6,"Totaal:",1,0,'L'); 
$pdf->Cell(22,6,chr(128)." $totaal",1,1,'L'); 

$pdf->Output('D', "dagoverzicht.pdf");
?>