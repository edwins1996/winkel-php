<?php
include "connect.php";
$CODCLIENTE= $_POST['CODCLIENTE'];




$opmerkingen= $_POST['opmerkingen'];
$query="UPDATE clientes SET opmerkingen='$opmerkingen' WHERE CODCLIENTE=$CODCLIENTE";
mysqli_query($con, $query) or die (mysqli_error());


// echo $query ;

header("Location: index.php?page=cabineklantedit&CODCLIENTE=$CODCLIENTE");

?>