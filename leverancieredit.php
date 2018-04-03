<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a> - <a href=?page=leverancierbeheer>Leverancierbeheer</a><br><br>
<form action=leverancierupdate.php method=post>
<table border=0>
<?php
include "connect.php";
$CODPROVEEDOR= $_GET['CODPROVEEDOR'];
$SQL="SELECT * FROM leveranciers WHERE CODPROVEEDOR=$CODPROVEEDOR";
$result = mysqli_query($con, $SQL);
$row = mysqli_fetch_object($result);
echo "<tr><td>Leverancierscode:</td><td>$row->CODPROVEEDOR</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Leverancier:</td><td><input name=LEVERANCIER value='$row->LEVERANCIER' size=40></td></tr>
<tr><td>Contactpersoon:</td><td><input name=CONTACT value='$row->CONTACT' size=40></td></tr>
<tr><td>Telefoonnummer:</td><td><input name=TELEFOON value='$row->TELEFOON' size=40></td></tr>
<tr><td>Emailadres:</td><td><input name=EMAIL value='$row->EMAIL' size=40></td></tr>
<tr><td>Actief:</td><td><input type=checkbox";
 if($row->ACTIEF==1){echo " checked";} 
 echo " name=Actief value='1'></td></tr>
";
mysqli_free_result($result);
?>
<tr><td><input type=submit value=Opslaan> <input type=hidden name=CODPROVEEDOR value=<?php echo $CODPROVEEDOR;?>></td></tr>
</table><br><br>
</form>