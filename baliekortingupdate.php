<?php
include 'connect.php';

$korting = $_POST['korting'];
$tempid = $_POST['tempid'];
$clientid = $_POST['clientid'];

echo $korting . '<br />';
echo $tempid . '<br />';
echo $clientid . '<br />';

if($korting == ''){
    header("location: ?page=baliekorting&CODCLIENTE=$clientid&id=$tempid");
    $_SESSION['kortingfout'] = 'OK';
}
elseif($korting != ''){
    $tempselect = mysqli_query($con, "SELECT * FROM temp WHERE CODCLIENTE = $clientid AND tempid = $tempid");
    $temp = mysqli_fetch_object($tempselect);
   
    $bedrag = $temp->PRISIO - $korting;
    
    $tempupdate = mysqli_query($con, "UPDATE temp SET PRISIO = $bedrag WHERE tempid = $tempid");
    header("location: ?page=balieedit&CODCLIENTE=$clientid");
}

?>