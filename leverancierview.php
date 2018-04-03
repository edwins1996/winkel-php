<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a> - <a href=?page=leverancierbeheer>Leverancierbeheer</a><br><br>
<table border=0>
<?php
include "connect.php";
$CODPROVEEDOR= $_GET['CODPROVEEDOR'];
$SQL="SELECT * FROM leveranciers WHERE CODPROVEEDOR=$CODPROVEEDOR";

// Als actief=0, dan 'nee', als actief=1, dan 'ja'

$result = mysqli_query($con, $SQL);
$row = mysqli_fetch_object($result);
echo "<tr><td>leveranciercode:</td><td>$row->CODPROVEEDOR</td></tr>
<tr><td>Leverancier:</td><td>$row->LEVERANCIER</td></tr>
<tr><td>Contactpersoon:</td><td>$row->CONTACT</td></tr>
<tr><td>Telefoonnummer:</td><td>$row->TELEFOON</td></tr>
<tr><td>Emailadres:</td><td>$row->EMAIL</td></tr>
<tr><td>Actief:</td><td>$row->ACTIEF</td><tr>
"; 
mysqli_free_result($result);

?>
</table>