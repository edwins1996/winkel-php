<?php
session_start();
include "connect.php";
if($_SESSION[gebruikersnaam]==""){echo "Je bent niet ingelogd, klik <a href=login.php>hier</a> om verder te gaan";}else{echo "Gebruikersnaam:".$_SESSION[gebruikersnaam]."<br>";}
$SQL="SELECT * FROM clientes";
$result = mysqli_query($SQL);
while($row = mysqli_fetch_object($result)) {
    echo "$row->ALIAS<br>";
}
mysqli_free_result($result);
include "vars.php";
?>