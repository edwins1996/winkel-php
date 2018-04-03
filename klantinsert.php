<?php
include "connect.php";

$aanhef=		$_POST['aanhef'];
$voorletters=	$_POST['voorletters'];
$tussenvoegsel=	$_POST['tussenvoegsel'];
$voornaam=		$_POST['voornaam'];
$NOMBRECLIENTE= $_POST['NOMBRECLIENTE'];
$DIRECCION1= 	$_POST['DIRECCION1'];
$CODPOSTAL= 	$_POST['CODPOSTAL'];
$POBLACION= 	$_POST['POBLACION'];
$geboortedatum=	date("Y-m-d",strtotime($_POST['geboortedatum']));
$TELEFONO1= 	$_POST['TELEFONO1'];
$TELEFONO2= 	$_POST['TELEFONO2'];
$E_MAIL= 		$_POST['E_MAIL'];
$MOBIL= 		$_POST['MOBIL'];
$MOBIL2=		$_POST['MOBIL2'];
$nieuwsbrief=	$_POST['nieuwsbrief'];
$opmerkingen= 	$_POST['opmerkingen'];

$SQL = mysqli_query($con, "SELECT MAX(CODCLIENTE) as COD FROM clientes");
$fetch = mysqli_fetch_object($SQL);
$CODCLIENTE = $fetch->COD+1;
echo $CODCLIENTE;
$query="INSERT INTO clientes (CODCLIENTE, aanhef,voornaam,voorletters,tussenvoegsel,NOMBRECLIENTE,DIRECCION1,CODPOSTAL,POBLACION,geboortedatum,TELEFONO1,TELEFONO2,E_MAIL,MOBIL,MOBIL2,nieuwsbrief,opmerkingen) VALUES ($CODCLIENTE, '$aanhef','$voornaam','$voorletters','$tussenvoegsel','$NOMBRECLIENTE','$DIRECCION1','$CODPOSTAL','$POBLACION','$geboortedatum','$TELEFONO1','$TELEFONO2','$E_MAIL','$MOBIL','$MOBIL2','$nieuwsbrief','$opmerkingen')";
mysqli_query($con, $query);
//echo $query;
header("Location: index.php?page=klantedit&CODCLIENTE=$CODCLIENTE");
?>
