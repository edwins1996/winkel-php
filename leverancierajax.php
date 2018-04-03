<table border=0>
<?php
session_start();
include "connect.php";
$LEVERANCIER= $_POST['LEVERANCIER'];
$SQL="SELECT * FROM leveranciers WHERE LEVERANCIER LIKE '$LEVERANCIER%' AND ACTIEF=1 ORDER BY LEVERANCIER ASC";

$result = mysqli_query($con, $SQL);
while($row = mysqli_fetch_object($result)) {
    echo "<tr><td><a href=?page=leverancierview&CODPROVEEDOR=$row->CODPROVEEDOR>$row->LEVERANCIER</a></td><td><a href=?page=leverancieredit&CODPROVEEDOR=$row->CODPROVEEDOR><img src=images/button_edit.png border=0></a></td></tr>";
	}
mysqli_free_result($result);
?>
</table>

