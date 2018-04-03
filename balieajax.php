<table border=0>
<?php
session_start();
include "connect.php";
$NOMBRECLIENTE= $_POST['NOMBRECLIENTE'];
$SQL="SELECT NOMBRECLIENTE,voornaam,tussenvoegsel,CODCLIENTE FROM clientes where NOMBRECLIENTE LIKE '$NOMBRECLIENTE%' AND actief=1 ORDER BY NOMBRECLIENTE ASC";
$result = mysqli_query($con, $SQL);
while($row = mysqli_fetch_object($result)) {
    echo "<tr><td><a href=balieedit.php?CODCLIENTE=$row->CODCLIENTE>$row->NOMBRECLIENTE, $row->voornaam $row->tussenvoegsel</a></td><td><a href=balieedit.php?CODCLIENTE=$row->CODCLIENTE></a></td></tr>";
}
mysqli_free_result($result);
?>
</table>




