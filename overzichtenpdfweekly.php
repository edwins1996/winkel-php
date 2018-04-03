<?php
include 'connect.php';
require('fpdf/fpdf.php');

$pdf = new FPDF('P','mm', 'A4');
$pdf->AddPage();

$week = $_POST['week'];
$year = $_POST['jaar'];

$date1 = date( "d-n-Y", strtotime($year."W".$week."1") ); // First day of week
$date2 = date( "d-n-Y", strtotime($year."W".$week."2") ); // Last day of week
$date3 = date( "d-n-Y", strtotime($year."W".$week."3") ); // Last day of week
$date4 = date( "d-n-Y", strtotime($year."W".$week."4") ); // Last day of week
$date5 = date( "d-n-Y", strtotime($year."W".$week."5") ); // Last day of week
$date6 = date( "d-n-Y", strtotime($year."W".$week."6") ); // Last day of week
$date7 = date( "d-n-Y", strtotime($year."W".$week."7") ); // Last day of week



$blah = "SELECT * FROM albventacab WHERE albventacab.FECHA = '$date1' OR albventacab.FECHA = '$date2'  OR albventacab.FECHA = '$date3' OR albventacab.FECHA = '$date4'  OR albventacab.FECHA = '$date5' OR albventacab.FECHA = '$date6' OR albventacab.FECHA = '$date7'";
//echo $blah;
$sql = mysqli_query($con, $blah);

$pdf->SetFont('Arial','B',18);
$pdf->Cell(79,15,"WEEKOVERZICHT $date1 - $date7",0,1,'L');
$pdf->Cell(79,10,"",0,1,'L');


$pdf->SetFont('Arial','B',11); 
$pdf->Cell(22,6,"Factuurnr.",1,0,'L');
$pdf->Cell(100,6,"Artikelomschrijving",1,0,'L');
$pdf->Cell(20,6,"Prijs/stuk",1,0,'L');
$pdf->Cell(22,6,"Prijs/totaal",1,1,'L');

while($row = mysqli_fetch_object($sql)){
$numal = $row->NUMFAC + 1;
    
     $blah2 = "SELECT * FROM albventacab, albventalin WHERE albventacab.NUMALBARAN = albventalin.NUMALBARAN AND albventacab.NUMALBARAN = $numal";
   // echo $blah2 . '<Br />';
    $select1 = mysqli_query($con, $blah2);
   
        //echo $fetch1->PRECIODEFECTO . '<br />';
    
  while($fetch1 = mysqli_fetch_object($select1)){  
    $select = mysqli_query($con, "SELECT * FROM articulos, preciosventa WHERE articulos.CODARTICULO = preciosventa.CODARTICULO AND articulos.CODARTICULO = $fetch1->CODARTICULO");
    $fetch = mysqli_fetch_object($select);
    
     
$pdf->SetFont('Arial','',11);    
$pdf->Cell(22,6,"$row->NUMFAC",1,0,'L');  
$pdf->Cell(100,6,"$fetch->DESCRIPCION",1,0,'L');
$pdf->Cell(20,6,chr(128)." ".number_format($fetch1->PRECIODEFECTO, 2 , ',' , '.')."",1,0,'L');
$pdf->Cell(22,6,chr(128)." $fetch1->COSTE",1,1,'L'); 

}    
}

$teller = 0;

$sql2 = mysqli_query($con, "SELECT * FROM albventacab WHERE FECHA = '$date1' OR FECHA = '$date2'  OR FECHA = '$date3' OR FECHA = '$date4'  OR FECHA = '$date5' OR FECHA = '$date6' OR FECHA = '$date7' GROUP BY NUMFAC");
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

$pdf->Output('D', "weekoverzicht.pdf");
?>