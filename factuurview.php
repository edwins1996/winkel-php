<?php
include "connect.php";
$NUMFACTURA= $_GET['NUMFACTURA'];

$SQL2= mysqli_query($con, "SELECT * FROM albventacab, gebruikers where albventacab.NUMFAC=$NUMFACTURA AND albventacab.CODVENDEDOR = gebruikers.CODVENDEDOR");
$fetch = mysqli_fetch_object($SQL2);

?>
<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a> - <a href=?page=klantbeheer>Klantbeheer</a> - <a href=?page=klantview&CODCLIENTE=<?php echo $fetch->CODCLIENTE; ?>>Klantview</a><br><br>
<table border=0>
    
    <tr>
    <th style="text-align:left;">Verkoper:</th>
    <th style="text-align:left;"><?php echo $fetch->gebruikersnaam; ?></th>
    </tr>
    
    <tr style='border:none;'><td style='border:none;'>&nbsp;</td></tr>
    
    <tr>
        <th style="text-align:left;">Artikel:</th>
        <th style="text-align:left;">Prijs:</th>
    
    </tr>
<?php

$SQL="SELECT * FROM albventacab where NUMFAC=$NUMFACTURA";
$result = mysqli_query($con, $SQL);
$row = mysqli_fetch_object($result);
$SQL1="SELECT * FROM albventalin where NUMALBARAN=$row->NUMALBARAN";
$result1 = mysqli_query($con, $SQL1);
while($row1 = mysqli_fetch_object($result1)) {
	    echo "<tr><td>$row1->DESCRIPCION</td><td>&euro; $row1->COSTE</td></tr>";
}

mysqli_free_result($result);
?>
</table><br /><br /><br />
<form action='factuurpdf.php' method='POST' target='_blank'>
<input type='hidden' value='<?php echo $NUMFACTURA; ?>' name='numfac' />
<input type='hidden' value='<?php echo $fetch->CODCLIENTE; ?>' name='cliente' />
<input type='submit' value='Bon printen' />
</form>