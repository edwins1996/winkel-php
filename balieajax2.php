<?php

include 'connect.php';

$artikel = $_POST['artikel'];

if(isset($_POST['artikel'])){
$SQL = mysqli_query($con, "SELECT * FROM articulos, articuloslin, stocks, preciosventa WHERE articulos.CODARTICULO = stocks.CODARTICULO AND articulos.CODARTICULO = articuloslin.CODARTICULO AND articulos.CODARTICULO = preciosventa.CODARTICULO AND articuloslin.CODBARRAS LIKE '$artikel%'");


if(mysqli_num_rows($SQL) != 0){
    $fetch = mysqli_fetch_object($SQL);
    echo "<div id='naam' style='display:none;'>$fetch->DESCRIPCION</div>";
    echo "<div id='prisio' style='display:none;'>$fetch->PNETO</div>";
    echo "<div id='code' style='display:none;'>$fetch->CODARTICULO</div>";
    
}
}

?>

