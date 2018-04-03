<?php

include 'connect.php';

$user = $_GET['user'];

$_SESSION['gebruikersnaam'] = $user;

$SQL = mysqli_query($con, "SELECT * FROM gebruikers WHERE gebruikersnaam = '$user'");
$fetch = mysqli_fetch_object($SQL);

$_SESSION['gebruikersnummer'] = $fetch->gebruikersnummer;


header("location: index.php?page=baliebeheer");

?>