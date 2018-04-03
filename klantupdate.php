<?php
include "connect.php";
$CODCLIENTE=	$_POST['CODCLIENTE'];
$aanhef=		$_POST['aanhef'];
$voorletters=	$_POST['voorletters'];
$tussenvoegsel=	$_POST['tussenvoegsel'];
$voornaam=		$_POST['voornaam'];
$NOMBRECLIENTE=	$_POST['NOMBRECLIENTE'];
$DIRECCION1=	$_POST['DIRECCION1'];
$CODPOSTAL=		$_POST['CODPOSTAL'];
$POBLACION=		$_POST['POBLACION'];
$geboortedatum=date("Y-m-d",strtotime($_POST['geboortedatum']));
$TELEFONO1=		$_POST['TELEFONO1'];
$TELEFONO2=		$_POST['TELEFONO2'];
$E_MAIL=		$_POST['E_MAIL'];
$MOBIL=			$_POST['MOBIL'];
$MOBIL2=		$_POST['MOBIL2'];
$nieuwsbrief=	$_POST['nieuwsbrief'];
$opmerkingen=	$_POST['opmerkingen'];
$actief=		$_POST['actief'];

// Als nieuwsbrief is checked, dan 1, else 0

$query="UPDATE clientes SET NOMBRECLIENTE='$NOMBRECLIENTE',aanhef='$aanhef',voorletters='$voorletters',tussenvoegsel='$tussenvoegsel',voornaam='$voornaam',DIRECCION1='$DIRECCION1',CODPOSTAL='$CODPOSTAL',POBLACION='$POBLACION',geboortedatum='$geboortedatum',TELEFONO1='$TELEFONO1',TELEFONO2='$TELEFONO2',E_MAIL='$E_MAIL',MOBIL='$MOBIL',MOBIL2='$MOBIL2',nieuwsbrief='$nieuwsbrief',opmerkingen='$opmerkingen',actief='$actief' WHERE CODCLIENTE=$CODCLIENTE";
mysqli_query($con, $query) or die (mysqli_error());

//echo $query;

header("Location: index.php?page=klantedit&CODCLIENTE=$CODCLIENTE");
?>