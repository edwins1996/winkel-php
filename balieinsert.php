<?php
include 'connect.php';

//$cliente = '3500';

$verkoper = mysqli_query($con, "SELECT * FROM gebruikers WHERE gebruikersnummer = ".$_SESSION["gebruikersnummer"]."");
$verkoper1 = mysqli_fetch_object($verkoper);
$codvendedor = $verkoper1->CODVENDEDOR;
$nomvendedor = strtoupper("$verkoper1->gebruikersnaam");

$select = mysqli_query($con, "SELECT * FROM temp WHERE CODCLIENTE = $cliente");
$SELECTIO = mysqli_fetch_object($select);

$factuurnr = mysqli_query($con, "SELECT MAX(NUMFACTURA) as numfact FROM facturasventa");
$facnur = mysqli_fetch_object($factuurnr);
$factionumero = $facnur->numfact+1;

$numalbarano = $facnur->numfact+2;

$FECHA =  "$SELECTIO->datum $SELECTIO->tijd";

$tempero = mysqli_query($con, "SELECT * FROM temp WHERE CODCLIENTE = $cliente");
$TOTALNETO = 0;
while($vari = mysqli_fetch_object($tempero)){
   
    $TOTALNETO = $TOTALNETO + $vari->PRISIO;

 
$temp123 = mysqli_query($con, "SELECT * FROM temp WHERE CODCLIENTE = $cliente AND CODARTICULO = $vari->CODARTICULO AND tempid = $vari->tempid");


    

$artic = mysqli_query($con, "SELECT * FROM articulos, preciosventa WHERE articulos.CODARTICULO = preciosventa.CODARTICULO AND articulos.CODARTICULO = $vari->CODARTICULO"); 
$article = mysqli_fetch_object($artic);


$pbruto = ($vari->PRISIO / 121) * 100;    
$pbruto2 = number_format($pbruto, 2, '.', ' ');
   
$preciodefecto = $vari->PRISIO / $vari->ANTALIO;
$fetch123 = mysqli_fetch_object($temp123);

$insertalbventalin =  "INSERT INTO albventalin (NUMALBARAN, CODARTICULO, DESCRIPCION, PRECIO, COSTE, PRECIODEFECTO, IVA, CODVENDEDOR)
VALUES ($numalbarano, $vari->CODARTICULO, '$fetch123->ART_TEMP', '$pbruto2', '$vari->PRISIO', '$preciodefecto', '21', $codvendedor)";
    
    //echo $insertalbventalin . '<br />';
    
    mysqli_query($con, $insertalbventalin);

 
    
//echo $insertalbventalin;
$insertventasacumuladas = "INSERT INTO ventascumuladas(CODCLIENTE, CODVENDEDOR, CODARTICULO, IMPORTE, IMPORTEIVA) VALUES($cliente, $codvendedor, $vari->CODARTICULO, '$pbruto2', '$vari->PRISIO')";
    mysqli_query($con, $insertventasacumuladas);
    //echo '<br />' . $insertventasacumuladas;
    
$stockupdate = mysqli_query($con, "UPDATE stocks SET STOCK = STOCK-$vari->ANTALIO WHERE CODARTICULO = $vari->CODARTICULO");    

}

$NETOTOTAL = number_format($TOTALNETO, 2, '.', ' ');
$TOTALBRUTO = ($NETOTOTAL / 121) * 100;
$BRUTOTOTAL = number_format($TOTALBRUTO, 2, '.', ' ');
$BTWIMPUESTOS = $NETOTOTAL - $BRUTOTOTAL;






$insertfacturasventa = mysqli_query($con, "INSERT INTO facturasventa(NUMFACTURA, CODCLIENTE, FECHA, TOTALBRUTO, TOTALIMPUESTOS, TOTALNETO, TOTALCOSTE, FECHAMODIFICADO, betaald, CODVENDEDOR) VALUES($factionumero, $cliente, '$FECHA', '$BRUTOTOTAL', '$BTWIMPUESTOS', '$NETOTOTAL', '$NETOTOTAL', '$FECHA', 1, $codvendedor)");

$insertalbventacab = mysqli_query($con, "INSERT INTO albventacab(NUMALBARAN, CODCLIENTE, CODVENDEDOR, FECHA, HORA, TOTALBRUTO, TOTALIMPUESTOS, TOTALNETO, TOTALCOSTE, NUMFAC) VALUES($numalbarano, $cliente, $codvendedor, '$SELECTIO->datum', '$SELECTIO->tijd', '$BRUTOTOTAL', '$BTWIMPUESTOS', '$NETOTOTAL', '$NETOTOTAL', $factionumero)");




?>