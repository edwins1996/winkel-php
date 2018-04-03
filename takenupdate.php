<?php
include 'connect.php';

$van = $_POST['van'];
$voor = $_POST['voor'];
$omschrijving = $_POST['omschrijving'];
$opmerking = $_POST['opmerking'];
$taakid = $_POST['taakid'];

if(isset($_POST['Afgedaan'])){
$Afgedaan = $_POST['Afgedaan'];

$update = "UPDATE taken SET van = '$van', voor = '$voor', omschrijving = '$omschrijving', opmerking = '$opmerking', afgedaan = $Afgedaan WHERE taakid = $taakid";
     mysqli_query($con, $update);
    
}else{

$update = "UPDATE taken SET van = '$van', voor = '$voor', omschrijving = '$omschrijving', opmerking = '$opmerking', afgedaan = 0 WHERE taakid = $taakid";
    mysqli_query($con, $update);
    
}

header("location: index.php?page=takenedit&taakid=$taakid");
?>