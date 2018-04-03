<table border=0>
<?php
session_start();
include "connect.php";
$DESCRIPCION= $_POST['DESCRIPCION'];
$SQL="SELECT * FROM articulos where DESCRIPCION LIKE '$DESCRIPCION%' ORDER BY DESCRIPCION ASC";
$result = mysqli_query($con, $SQL);
while($row = mysqli_fetch_object($result)) {
    echo "<tr><td><a href=?page=artikelview&CODARTICULO=$row->CODARTICULO>$row->DESCRIPCION</a></td><td><a href=?page=artikeledit&CODARTICULO=$row->CODARTICULO><img src=images/button_edit.png border=0></a></td></tr>";
}
mysqli_free_result($result);
?>
</table>