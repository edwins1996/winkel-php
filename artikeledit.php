<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a> - <a href=?page=artikelbeheer>Artikelbeheer</a><br><br>
<form action=artikelupdate.php method=post>
<table border=0>
<?php
include "connect.php";
$CODARTICULO= $_GET['CODARTICULO'];

$SQL="SELECT * FROM articulos,articuloslin,preciosventa WHERE articulos.CODARTICULO=$CODARTICULO AND articuloslin.CODARTICULO= articulos.CODARTICULO AND preciosventa.CODARTICULO= articulos.CODARTICULO";

$result = mysqli_query($con, $SQL);
$row = mysqli_fetch_object($result);
echo "<tr><td>Artikelnummer:</td><td>$row->CODARTICULO</td></tr>
<tr><td>Omschrijving:</td><td>$row->DESCRIPCION</td></tr>
<tr><td>Leverancier:</td><td><select name=LEVERANCIER>".chr(10);

// Laat de leveranciers zien in een option select veld

$SQL1="SELECT * FROM leveranciers";
$result1 = mysqli_query($con, $SQL1);
    echo "<option size=60 value=''>selecteer</option>";
while($leverancier = mysqli_fetch_object($result1)){
	echo "<option size=60 value=$leverancier->CODPROVEEDOR";
	if($leverancier->CODPROVEEDOR==$row->CODPROVEEDOR){echo " selected";}
	echo ">$leverancier->LEVERANCIER</option>".chr(10);
}
echo "</select></td></tr>
<tr><td>Netto verkoop:</td><td>&euro; <input name=PNETO value='$row->PNETO' size=38></td></tr>

<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>Barcode:</td><td><input name=CODBARRAS value=$row->CODBARRAS></td></tr>
";
mysqli_free_result($result);
?>
<tr><td><input type=submit value=Opslaan> <input type=hidden name=CODARTICULO value=<?php echo $CODARTICULO;?>></td></tr></table><br><br>
</form>