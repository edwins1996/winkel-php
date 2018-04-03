<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a> - <a href=?page=klantbeheer>Klantbeheer</a><br><br>
<table width="100%" border="3" cellpadding="10" cellspacing="10">
<td width="70%">
<table border="0" cellpadding="10" cellspacing="10">
<?php
include "connect.php";
$CODCLIENTE= $_POST['CODCLIENTE'];
$SQL="SELECT * FROM clientes WHERE CODCLIENTE=$CODCLIENTE";
$result = mysqli_query($con, $SQL);
$row = mysqli_fetch_object($result);
echo "<tr><td>Klantnummer</td><td>$row->CODCLIENTE</td></tr>
<tr><td>Naam:</td><td>$row->aanhef $row->voorletters $row->tussenvoegsel $row->NOMBRECLIENTE, $row->voornaam</td></tr>
";
mysqli_free_result($result);
?>
</table>
</td>
<td border="0" halign="center" width="30%">
<center>
<?php
//<div class="vdblayout-cell layout-item-2"><p style="text-align:center;"><a href="?page=klantviewbehandelingen" class="vdbbutton">behandelingen</a></p></div>
    

?>
</center>
</td>
</table><br><br>

<table border=0>
<tr><td width=150>Factuurnummer</td><td width=150>Bruto totaal</td><td width=150>Netto totaal</td></tr>
<?php
$SQL1="SELECT * FROM facturasventa where CODCLIENTE=$CODCLIENTE ORDER BY NUMFACTURA DESC";
$result1 = mysqli_query($con, $SQL1);
while($row1 = mysqli_fetch_object($result1)) {
    $totalbruto = str_replace(".", ",", "$row1->TOTALBRUTO");
    $totalcoste = str_replace(".", ",", "$row1->TOTALCOSTE");
	    echo "<tr><td><a href=?page=factuurview&NUMFACTURA=$row1->NUMFACTURA>$row1->NUMFACTURA</a></td><td> &euro; $totalbruto</td><td> &euro; $totalcoste</td></tr>";
}
mysqli_free_result($result1);
?>
</table>