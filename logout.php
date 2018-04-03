<?php  
ob_start();
session_start();
session_unset();    // Deactiveer de sessievariabelen
session_destroy();    // Verwijder eventuele sessiebestanden op de server
//include("vars.php");
header("Location:index.php");
?>