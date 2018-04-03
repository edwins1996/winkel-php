<?php
include 'connect.php';
$cliente = $_POST['cliente'];
$numfac = $_POST['numfac'];


require('fpdf/fpdf.php');


$client = mysqli_query($con, "SELECT * FROM clientes WHERE CODCLIENTE = $cliente");
$datijd = mysqli_query($con, "SELECT * FROM albventacab WHERE NUMFAC = $numfac");
$datijd1 = mysqli_fetch_object($datijd);
$cliento = mysqli_fetch_object($client);
   
$hoogte = (mysqli_num_rows($datijd)*4)+149;
$breedte = 79;
$array = array($breedte, $hoogte);

$pdf = new FPDF('P','mm',$array);
$pdf->AddPage();
$pdf->SetAutoPageBreak(false);
$pdf->Image('images/logo.jpg',6,4,-275);

$pdf->SetY(30);
$pdf->SetX(0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(79,4,'DAHLIASTRAAT 92',0,1,'C');
$pdf->SetX(0);
$pdf->Cell(79,4,'4613 DP BERGEN OP ZOOM',0,1,'C');
$pdf->SetX(0);
$pdf->Cell(79,4,'TEL. (0164) 252 652',0,1,'C');
$pdf->SetX(0);
$pdf->Cell(79,4,'',0,1,'C');
$pdf->SetX(2);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(23,4,'KLANTNAAM',0,0,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell(5,4,':',0,0,'R');
$pdf->Cell(52,4,"$cliento->NOMBRECLIENTE, $cliento->tussenvoegsel $cliento->voornaam",0,1,'L');


$pdf->SetX(2);
$pdf->Cell(79,4,'',0,1,'L');


$pdf->SetX(2);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(23,4,'TICKET NR',0,0,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell(5,4,':',0,0,'R');
$pdf->Cell(10,4,'OT',0,0,'L');
$pdf->Cell(17,4,"/$numfac",0,0,'L');
$pdf->Cell(20,4,"$datijd1->FECHA",0,1,'R');

$verkopersql = mysqli_query($con, "SELECT * FROM gebruikers WHERE CODVENDEDOR = $datijd1->CODVENDEDOR");
$verkoperfetch = mysqli_fetch_object($verkopersql);
$verkoperr = strtoupper($verkoperfetch->gebruikersnaam);


$pdf->SetX(2);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(23,4,'VERKOPER',0,0,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell(5,4,':',0,0,'R');
$pdf->Cell(27,4,"$verkoperr",0,0,'L');
$pdf->Cell(20,4,"$datijd1->HORA",0,1,'R');

$pdf->SetX(2);
$pdf->Cell(79,4,'',0,1,'L');

$pdf->SetX(2);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(12,4,'AANT',0,0,'L');
$pdf->Cell(50,4,'OMSCHRIJVING',0,0,'L');
$pdf->Cell(14,4,'TOTAAL',0,1,'R');


$pdf->SetX(2);
$pdf->SetFont('Arial','',8);
$pdf->Cell(76,4,'=============================================',0,1,'L');


$temp = mysqli_query($con, "SELECT * FROM albventacab, albventalin WHERE albventacab.NUMFAC = $numfac AND albventacab.NUMALBARAN = albventalin.NUMALBARAN");
$bedrag = 0;

while($row = mysqli_fetch_object($temp)){

$omschrijving = substr($row->DESCRIPCION, 0, 27);

    if($row->PRECIO != '0.00'){
$aantalia = $row->COSTE / $row->PRECIODEFECTO;
$aantall = number_format($aantalia, 0, ',', ' ');
    }else{
        $aantall = '1';
    }
$pdf->SetX(2);
$pdf->SetFont('Arial','',8);
$pdf->Cell(12,4,"$aantall",0,0,'L');
$pdf->Cell(50,4,"$omschrijving",0,0,'L');
$pdf->Cell(14,4,"$row->COSTE",0,1,'R');

$bedrag = $bedrag + $row->COSTE;
}


$pdf->SetX(2);
$pdf->SetFont('Arial','',8);
$pdf->Cell(76,4,'=============================================',0,1,'L');

$subtotaal = number_format($bedrag, 2, ',', ' ');

$pdf->SetX(2);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(40,4,'',0,0,'L');
$pdf->Cell(22,4,'SUBTOTAAL :',0,0,'R');
$pdf->SetFont('Arial','',8);
$pdf->Cell(14,4,"$subtotaal",0,1,'R');


$pdf->SetX(2);
$pdf->SetFont('Arial','',8);
$pdf->Cell(76,4,'=============================================',0,1,'L');

$pdf->SetX(2);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(37,4,'',0,0,'L');
$pdf->Cell(22,4,'TOTAAL :',0,0,'R');
$pdf->Cell(3,4,chr(128),0,0,'R');
$pdf->Cell(14,4,"$subtotaal",0,1,'R');

$pdf->SetX(2);
$pdf->Cell(79,4,'',0,1,'L');
$pdf->SetX(2);
$pdf->Cell(79,4,'',0,1,'L');

$exbtw = $bedrag/121;
$exbtw1 = $exbtw*100;
$btw = $bedrag - $exbtw1;
$exbtw2 = number_format($exbtw1, 2, ',', ' ');
$btw1 = number_format($btw, 2, ',', ' ');


$pdf->SetX(2);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(40,4,'',0,0,'L');
$pdf->Cell(22,4,'EX BTW :',0,0,'R');
$pdf->SetFont('Arial','',8);
$pdf->Cell(14,4,"$exbtw2",0,1,'R');

$pdf->SetX(2);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(40,4,'',0,0,'L');
$pdf->Cell(22,4,'BTW 21% :',0,0,'R');
$pdf->SetFont('Arial','',8);
$pdf->Cell(14,4,"$btw1",0,1,'R');


$pdf->SetX(2);
$pdf->Cell(79,4,'',0,1,'L');
$pdf->SetX(2);
$pdf->Cell(79,4,'',0,1,'L');


$pdf->SetX(0);
$pdf->Cell(79,4,'DANK U EN TOT ZIENS!',0,1,'C');
$pdf->SetX(0);
$pdf->Cell(79,4,'',0,1,'L');
$pdf->Output('', "kassabon.pdf");




unset($_SESSION['hoogte']);

?>