<a href=?page=home>Home</a> - <a href=?page=balie>Balie</a><br><br>
<table width="100%" border="3" cellpadding="10" cellspacing="10">
<td>
<table width="50%" border="0" cellpadding="10" cellspacing="10">
<?php
include "connect.php";
$CODCLIENTE= $_GET['CODCLIENTE'];
$SQL="SELECT * FROM clientes where CODCLIENTE=$CODCLIENTE";
$result = mysqli_query($con, $SQL);
$row = mysqli_fetch_object($result);
echo "<tr><td>Klantnummer</td><td>$row->CODCLIENTE</td></tr>
<tr><td>Naam:</td><td>$row->NOMBRECLIENTE</td></tr>
<tr><td>Adres:</td><td>$row->DIRECCION1</td></tr>
<tr><td>Postcode:</td><td>$row->CODPOSTAL</td></tr>
<tr><td>Woonplaats:</td><td>$row->POBLACION</td></tr>
<tr><td>Telefoonnummer 1:</td><td>$row->TELEFONO1</td></tr>
<tr><td>Telefoonnummer 2:</td><td>$row->TELEFONO2</td></tr>
<tr><td>E-mail:</td><td>$row->E_MAIL </td></tr>
<tr><td>GSM:</td><td>$row->MOBIL </td></tr>
";
mysqli_free_result($result);
?>
</table>
</td>
<td border="3" halign="left">
<?php
echo "$row->opmerkingen"
?>
</td>
</table><br><br>
<?php echo $row->opmerkingen;?>
<br><br>
<table border=0>
</table>
