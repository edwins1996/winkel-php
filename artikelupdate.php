<?php
include "connect.php";
$CODARTICULO= $_POST['CODARTICULO'];
$LEVERANCIER= $_POST['LEVERANCIER'];
$PNETO=		  $_POST['PNETO'];
$CODBARRAS=   $_POST['CODBARRAS'];

$query2= "UPDATE preciosventa SET PNETO=$PNETO WHERE CODARTICULO=$CODARTICULO";
mysqli_query($con, $query2);
$query3= "UPDATE articulos SET CODPROVEEDOR=$LEVERANCIER WHERE CODARTICULO=$CODARTICULO";
mysqli_query($con, $query3);
if($CODBARRAS != ''){
$query4 = "UPDATE articuloslin SET CODBARRAS=$CODBARRAS WHERE CODARTICULO=$CODARTICULO";
mysqli_query($con, $query4) or die (mysqli_error());
}elseif($CODBARRAS == ''){
    $query4 = "UPDATE articuloslin SET CODBARRAS='' WHERE CODARTICULO=$CODARTICULO";
mysqli_query($con, $query4) or die (mysqli_error());
}
//echo $query4;

header("Location: index.php?page=artikeledit&CODARTICULO=$CODARTICULO");
?>
