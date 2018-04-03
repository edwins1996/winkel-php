<table border=0>
<?php
session_start();
include "connect.php";
$NOMBRECLIENTE= $_POST['NOMBRECLIENTE'];
$SQL="SELECT NOMBRECLIENTE,voornaam,tussenvoegsel,CODCLIENTE FROM clientes where NOMBRECLIENTE LIKE '$NOMBRECLIENTE%' AND actief=1 ORDER BY NOMBRECLIENTE ASC";
$result = mysqli_query($con, $SQL);
while($row = mysqli_fetch_object($result)) {
    echo "<tr><td><a href=?page=klantview&CODCLIENTE=$row->CODCLIENTE>$row->NOMBRECLIENTE, $row->voornaam $row->tussenvoegsel</a></td><td><a href=?page=klantedit&CODCLIENTE=$row->CODCLIENTE><img src=images/button_edit.png border=0></a></td></tr>";
}
mysqli_free_result($result);
?>
</table>