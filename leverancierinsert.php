<?php
include "connect.php";
$CODPROVEEDOR= 	$_POST['CODPROVEEDOR'];
$LEVERANCIER= 	$_POST['LEVERANCIER'];
$CONTACT= 		$_POST['CONTACT'];
$TELEFOON= 		$_POST['TELEFOON'];
$EMAIL= 		$_POST['EMAIL'];
$ACTIEF=		$_POST['ACTIEF'];
$query="INSERT INTO leveranciers (LEVERANCIER,CONTACT,TELEFOON,EMAIL,ACTIEF)VALUES('$LEVERANCIER','$CONTACT','$TELEFOON','$EMAIL',$ACTIEF)";
mysqli_query($con, $query) or die (mysqli_error());
//echo $query;
header("Location: index.php?page=leverancieredit&CODPROVEEDOR=$CODPROVEEDOR");
?>