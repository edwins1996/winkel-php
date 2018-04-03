<?php

include 'connect.php';

$artikel = $_POST['artikel'];
$prijs = $_POST['prijs'];
$aantal = $_POST['aantal'];
$cliente = $_POST['cliente'];
$totaalprijspp = $aantal * $prijs;
$totaal = number_format($totaalprijspp, 2, '.', ' ');
$datum = date('d'). '-' .date('n'). '-' . date('Y');
    
$tijd = date('G'). ':' .date('i'). ':' .date('s');

echo $artikel . '<Br />';
echo $prijs . '<br />';
echo $aantal;

$update = mysqli_query($con, "UPDATE articulos SET DESCRIPCION = '$artikel' WHERE CODARTICULO = 5081");

$insert = mysqli_query($con, "INSERT INTO temp(CODARTICULO, ART_TEMP, PRISIO, ANTALIO, CODCLIENTE, datum, tijd) VALUES(5081, '$artikel', $totaal, $aantal, $cliente, '$datum', '$tijd')");

header("location: balieedit.php?CODCLIENTE=$cliente");

?>