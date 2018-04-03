<?php
include "connect.php";
$CODPROVEEDOR=$_POST['CODPROVEEDOR'];
$LEVERANCIER= $_POST['LEVERANCIER'];
$CONTACT= 	  $_POST['CONTACT'];
$TELEFOON= 	  $_POST['TELEFOON'];
$EMAIL=		  $_POST['EMAIL'];
$ACTIEF=	  $_POST['ACTIEF'];

$query="UPDATE leveranciers SET LEVERANCIER='$LEVERANCIER',CONTACT='$CONTACT',TELEFOON='$TELEFOON',EMAIL='$EMAIL',ACTIEF='$ACTIEF' WHERE CODPROVEEDOR=$CODPROVEEDOR";
mysqli_query($con, $query) or die (mysqli_error());

//echo $query;
header("Location: index.php?page=leverancieredit&CODPROVEEDOR=$CODPROVEEDOR");
?>