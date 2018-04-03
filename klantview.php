<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a> - <a href=?page=klantbeheer>Klantbeheer</a><br><br>
<?php
include "connect.php"; 
$CODCLIENTE= $_GET['CODCLIENTE'];

?>
<script>

function pdf(){
    
    window.open('klantpdf.php?CODCLIENTE=<?php echo $CODCLIENTE; ?>', '_blank');
    
}

</script>
<table width="100%" border="3" cellpadding="10" cellspacing="10">
<td>
<table width="70%" border="0" cellpadding="10" cellspacing="10">
<?php

$SQL = "SELECT * FROM clientes where CODCLIENTE=$CODCLIENTE";
$result = mysqli_query($con, $SQL);
$row = mysqli_fetch_object($result);
echo "<tr><td>Klantnummer</td><td>$row->CODCLIENTE</td></tr>
<tr><td>Naam:</td><td>$row->aanhef $row->voorletters $row->tussenvoegsel $row->NOMBRECLIENTE ($row->voornaam)</td></tr>
<tr><td>Adres:</td><td>$row->DIRECCION1</td></tr>
<tr><td>Postcode:</td><td>$row->CODPOSTAL</td></tr>
<tr><td>Woonplaats:</td><td>$row->POBLACION</td></tr>
<tr><td>Geboortedatum:</td><td>$row->geboortedatum</td></tr>
<tr><td>Telefoonnummer 1:</td><td>$row->TELEFONO1</td></tr>
<tr><td>Telefoonnummer 2:</td><td>$row->TELEFONO2</td></tr>
<tr><td>E-mail:</td><td>$row->E_MAIL </td></tr>
<tr><td>Mobiel nummer 1:</td><td>$row->MOBIL </td></tr>
<tr><td>Mobiel nummer 2:</td><td>$row->MOBIL2 </td></tr>
<tr><td>Nieuwsbrief:</td><td>$row->nieuwsbrief</td></tr>
";
mysqli_free_result($result);
?>
</table>
</td>
<td border="0" width="30%" valign="middle">
<center><br><br/>
<form action=?page=klantviewbehandelingen method=post>
<input class='vdbbutton' type=submit value=Behandelingen style='width:125px;'><input type=hidden name=CODCLIENTE value=<?php echo $CODCLIENTE;?>><br>&nbsp;
</form><br/>
<form action=?page=klantviewfacturen method=post>
<input class='vdbbutton' type=submit value=Facturen style='width:125px;'><input type=hidden name=CODCLIENTE value=<?php echo $CODCLIENTE;?>>
</form>
                                       
                                      
                                       <br/>
                                     <div class="vdblayout-cell layout-item-1" style="width: 25%" >
        <p style="text-align:center;"><a  class="vdbbutton" href="#" onclick='pdf();' style='width:125px;'>Etiket</a></p>
    </div>
</center>

</td>
</table><br>Opmerkingen:<p>
<?php echo $row->opmerkingen;?>
<br><br>
