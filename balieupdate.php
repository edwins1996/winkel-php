<?php
include "connect.php";

$cliente = $_POST['cliente'];

if($_POST['artikel'] != ''){
$artikel = $_POST['artikel'];
$aantal = $_POST['aantal'];
$prijs = $_POST['prijs'];
$totaalprijspp = $aantal * $prijs;
$totaal = number_format($totaalprijspp, 2, '.', ' ');
  echo $prijs;
    
$datum = date('d'). '-' .date('n'). '-' . date('Y');
    
$tijd = date('G'). ':' .date('i'). ':' .date('s');
$test = $artikel;
    
   
$query = "SELECT * FROM articulos WHERE DESCRIPCION = '$artikel'";
$result = mysqli_query($con, $query);
$query1 = mysqli_fetch_object($result);

echo $query;
$insert = mysqli_query($con, "INSERT INTO temp(CODARTICULO, ART_TEMP, PRISIO, ANTALIO, CODCLIENTE, datum, tijd) VALUES($query1->CODARTICULO, '$artikel', $totaal, $aantal, $cliente, '$datum', '$tijd')");
}

header("location: balieedit.php?CODCLIENTE=$cliente");

?>