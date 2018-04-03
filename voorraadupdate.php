<?php
include 'connect.php';

$pagina = $_POST['pagina'];
$levid = $_POST['levid'];

//echo $pagina;

$SQL = mysqli_query($con, "SELECT * FROM articulos, stocks WHERE articulos.CODARTICULO = stocks.CODARTICULO");

while($row = mysqli_fetch_object($SQL)){
    if(isset($_POST["aantal$row->CODARTICULO"])){
    $aantal = $_POST["aantal$row->CODARTICULO"];
    
        
        $update1 = "UPDATE stocks SET STOCK = $aantal WHERE CODARTICULO = $row->CODARTICULO";
        //echo $row->CODARTICULO . ' / ' . $aantal . ' / ' . $update1 . '<br />';
        $update = mysqli_query($con, $update1);
        
    }
}

header("location: index.php?page=voorraadbeheer&id=$levid&pagina=$pagina");

?>