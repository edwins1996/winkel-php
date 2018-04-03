<table border=1>

<?php
session_start();
include "connect.php";
if($_SESSION[gebruikersnaam]==""){echo "Je bent niet ingelogd, klik <a href=login.php>hier</a> om verder te gaan";}else{echo "Gebruikersnaam:".$_SESSION[gebruikersnaam]."<br>";}
$SQL="SELECT facturasventa.NUMFACTURA,clientes.NOMBRECLIENTE FROM facturasventa,clientes WHERE facturasventa.CODCLIENTE=clientes.CODCLIENTE ORDER BY NUMFACTURA ASC";
$result = mysqli_query($con, $SQL);
while($row = mysqli_fetch_object($result)) {
    echo "<tr><td><a href=?page=factuurview>$row->NUMFACTURA $row->NOMBRECLIENTE</a></td><td>$row-> <a href=?page=factuuredit&id=$row->NUMFACTURA><img src=images/button_edit.png border=0></a></td></tr>";
}
mysqli_free_result($result);
include "vars.php";
?>
</table>