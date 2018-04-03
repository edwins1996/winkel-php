<?php
include 'connect.php';

$CODCLIENTE = $_GET['CODCLIENTE'];

$lastitemselect = mysqli_query($con, "SELECT MAX(tempid) as tid FROM temp WHERE CODCLIENTE = $CODCLIENTE");
$lastitem = mysqli_fetch_object($lastitemselect);



$deletelastitem = mysqli_query($con, "DELETE FROM temp WHERE tempid = $lastitem->tid");

header("location: balieedit.php?CODCLIENTE=$CODCLIENTE");

?>