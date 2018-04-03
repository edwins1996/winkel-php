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

// WEL KLANTCODE MEEGEVEN VOOR VOLGENDE QUERY ????????????????
?>
</table>
</td>
<td border="0" halign="center" width="30%">
<center>
<?php
// <div class="vdblayout-cell layout-item-1"><p style="text-align:center;"><a href="?page=klantviewfacturen" class="vdbbutton">facturen</a></p></div><br>
?>
</center>
</td>
</table><br><br>

Behandelingen:<p>
<table border=1 width="100%">
<tr><td>Datum</td><td>Behandeling / Product</td></tr>
<?php
$SQL1="SELECT * FROM clientes,albventalin,albventacab WHERE clientes.CODCLIENTE = albventacab.CODCLIENTE AND albventacab.NUMALBARAN = albventalin.NUMALBARAN AND clientes.CODCLIENTE = $CODCLIENTE ORDER BY FECHA ASC";
$result1 = mysqli_query($con, $SQL1);
//echo query();

while($row1 = mysqli_fetch_object($result1)) {
	    echo "<tr><td>$row1->FECHA</td><td>$row1->DESCRIPCION</td></tr>";
}
mysqli_free_result($result1);
?>
</table>