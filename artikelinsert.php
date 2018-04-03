<?php
include "connect.php";


$DESCRIPCION= 		$_POST['DESCRIPCION'];
$FECHAMODIFICADO= 	$_POST['FECHAMODIFICADO'];
$TALLA= 			$_POST['TALLA'];
$CODBARRAS= 		$_POST['CODBARRAS'];
$PNETO = 		$_POST['PNETO'];

$datum = date('d'). '-' .date('n'). '-' . date('Y');

$PNETO1  = number_format($PNETO, 2, '.', ' ');

$query="INSERT INTO articulos (DESCRIPCION,FECHAMODIFICADO) VALUES ('$DESCRIPCION','$FECHAMODIFICADO')";
mysqli_query($con, $query);

$select = mysqli_query($con, "SELECT CODARTICULO FROM articulos WHERE DESCRIPCION = '$DESCRIPCION'");
$fetch = mysqli_fetch_object($select);
echo $query . '<br />';
$query="INSERT INTO stocks (STOCK, CODARTICULO, FECHAMODIFICADO) VALUES ('$TALLA', $fetch->CODARTICULO, '$datum')";
mysqli_query($con, $query);
echo $query . '<br />';
$query="INSERT INTO preciosventa (CODARTICULO,PNETO, FECHAMODIFICADO) VALUES ($fetch->CODARTICULO, $PNETO1, '$FECHAMODIFICADO')";
mysqli_query($con, $query);
echo $query . '<br />';


// BARCODE TOEVOEGEN
$query="INSERT INTO articuloslin (CODARTICULO, CODBARRAS, COSTEMEDIO, COSTESTOCK, ULTIMOCOSTE) VALUES ($fetch->CODARTICULO, '$CODBARRAS', '$PNETO', '$PNETO', '$PNETO')";
mysqli_query($con, $query);
//echo $query . '<br />';


//echo $query;
header("Location: index.php?page=artikeledit&CODARTICULO=$fetch->CODARTICULO");
?>