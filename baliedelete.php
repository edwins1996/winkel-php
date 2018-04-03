<?php
include 'connect.php';


$CODCLIENTE = $_GET['CODCLIENTE'];

$select = mysqli_query($con, "SELECT * FROM temp WHERE CODCLIENTE = $CODCLIENTE");
$_SESSION['hoogte'] = (mysqli_num_rows($select)*4)+149;


//include 'balieinsert.php';



header("location: pdf.php?cliente=$CODCLIENTE");


?>