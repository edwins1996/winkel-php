<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a> - <a href=?page=artikelbeheer>Artikelbeheer</a><br><br>
<?php
include "connect.php";

$CODARTICULO= $_GET['CODARTICULO'];

?>

<button class='vdbbutton' type='button' style='float:right; height:70px;' onclick='window.open("artikelpdf.php?code=<?php echo $CODARTICULO; ?>","_blank");'>PRINT<br />(88x35)</button>
<button class='vdbbutton' type='button' style='float:right; height:70px;' onclick='window.open("artikelpdf-v2.php?code=<?php echo $CODARTICULO; ?>","_blank");'>PRINT<br />(57x19)</button>
<table border=0>

<?php



$info = mysqli_query($con, "SELECT * FROM articulos, articuloslin, preciosventa WHERE articulos.CODARTICULO = articuloslin.CODARTICULO AND articulos.CODARTICULO = preciosventa.CODARTICULO AND articulos.CODARTICULO = $CODARTICULO"); 

$info2 = mysqli_fetch_object($info);  

if($info2->CODPROVEEDOR == NULL){
   $codproveedor = 'Niet ingesteld.';
}
    elseif($info2->CODPROVEEDOR != NULL){
        $leverancier = mysqli_query($con, "SELECT * FROM leveranciers WHERE CODPROVEEDOR = $info2->CODPROVEEDOR");
        $lev = mysqli_fetch_object($leverancier);
        $codproveedor = $lev->LEVERANCIER;
    }
   

echo "<tr><td>Artikelcode:</td><td>$info2->CODARTICULO</td></tr>
<tr><td>Artikelnaam:</td><td>$info2->DESCRIPCION</td></tr>
<tr><td>Leverancier:</td><td>$codproveedor</td></tr>
<tr><td>Netto verkoop:</td><td>&euro; $info2->PNETO</td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>Barcode:</td><td bgcolor=white><img src=barcodegen/test_1D.php?text=$info2->CODBARRAS border=0></td></tr>
"; 

?>
</table>



