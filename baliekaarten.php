<?php

include 'connect.php';

$cliente = $_GET['CODCLIENTE'];
$card = $_GET['card'];

$datum = date('d'). '-' .date('n'). '-' . date('Y');
    
$tijd = date('G'). ':' .date('i'). ':' .date('s');

if($card == 'regelkorting'){
    
    $korting = $_POST['korting'];
    
    
    
    $selectio = mysqli_query($con, "SELECT MAX(tempid) as id FROM temp WHERE CODCLIENTE = $cliente AND CODARTICULO != 5079 AND CODARTICULO != 5080 AND CODARTICULO != 3059 AND CODARTICULO != 3060 AND CODARTICULO != 3057");
    $fetchio = mysqli_fetch_object($selectio);
        
    $select = mysqli_query($con, "SELECT * FROM temp WHERE tempid = $fetchio->id");
    $fetch = mysqli_fetch_object($select);
    
    $perc = 100 - $korting;
    $neu1 = $fetch->PRISIO / 100;
    $neu2 = $neu1 * $korting;
    
    //$update = mysqli_query($con, "UPDATE temp SET PRISIO = $neu2 WHERE tempid = $fetchio->id");
    
    $insert = mysqli_query($con, "INSERT INTO temp(CODARTICULO, ART_TEMP, PRISIO, ANTALIO, CODCLIENTE, datum, tijd) VALUES (5081, 'KORTING $korting%', -$neu2, 1, $cliente, '$datum', '$tijd')");
 
}

elseif($card == 'SPAARKAART'){
    

    
   
    
    $nieuw = 25;
    
    $sql = mysqli_query($con, "INSERT INTO temp(CODARTICULO, ART_TEMP, PRISIO, ANTALIO, CODCLIENTE, datum, tijd) VALUES (3059, 'SPAARKAART', -$nieuw, 1, $cliente, '$datum', '$tijd')");
    
}
elseif($card == 'cadeau'){
    
    $cadeau = $_POST['cadeau'];
    
    $sql = mysqli_query($con, "INSERT INTO temp(CODARTICULO, ART_TEMP, PRISIO, ANTALIO, CODCLIENTE, datum, tijd) VALUES (3060, 'CADEAUKAART', -$cadeau, 1, $cliente, '$datum', '$tijd')");
    
}
elseif($card == 'shisheido'){
    
    $shisheido = $_POST['shisheido'];
    
    $sql = mysqli_query($con, "INSERT INTO temp(CODARTICULO, ART_TEMP, PRISIO, ANTALIO, CODCLIENTE, datum, tijd) VALUES (3057, 'SHISHEIDO', -$shisheido, 1, $cliente, '$datum', '$tijd')");
    
    /*$select = mysqli_query($con, "SELECT MAX(tempid) as id FROM temp WHERE CODCLIENTE = $cliente AND CODARTICULO != 5079 AND CODARTICULO != 5080 AND CODARTICULO != 3059 AND CODARTICULO != 3060 AND CODARTICULO != 3057");
    $fetchio = mysqli_fetch_object($select);
    
    $sql = mysqli_query($con, "SELECT * FROM temp WHERE tempid = $fetchio->id");
    $fetch = mysqli_fetch_object($sql);
    
    $nieuw1 = $fetch->PRISIO / 100;
    $nieuw2 = $nieuw1 * $shisheido;
    
   
    if($nieuw2 < 0){
    $sql = mysqli_query($con, "INSERT INTO temp(CODARTICULO, PRISIO, ANTALIO, CODCLIENTE, datum, tijd) VALUES (3057, $nieuw2, 1, $cliente, '$datum', '$tijd')");        
    }else{
    $sql = mysqli_query($con, "INSERT INTO temp(CODARTICULO, ART_TEMP, PRISIO, ANTALIO, CODCLIENTE, datum, tijd) VALUES (3057, 'SHISHEIDO', -$nieuw2, 1, $cliente, '$datum', '$tijd')");
    }*/
}
elseif($card == 'retour'){
    
    $select = mysqli_query($con, "SELECT MAX(tempid) as id FROM temp WHERE CODCLIENTE = $cliente AND CODARTICULO != 5079 AND CODARTICULO != 5080 AND CODARTICULO != 3059 AND CODARTICULO != 3060 AND CODARTICULO != 3057");
    $fetchio = mysqli_fetch_object($select);
    
    $sql = mysqli_query($con, "SELECT * FROM temp WHERE tempid = $fetchio->id");
    $fetch = mysqli_fetch_object($sql);
    
    $update = mysqli_query($con, "UPDATE temp SET ANTALIO = -$fetch->ANTALIO, PRISIO = -$fetch->PRISIO WHERE tempid = $fetchio->id");
    
}
elseif($card == 'vergeten'){
    
    $select = mysqli_query($con, "SELECT * FROM temp WHERE CODCLIENTE = $cliente");
    
    $getal = 0;
    
    while($row = mysqli_fetch_object($select)){
        
        $nieuw = $row->PRISIO / 2;
        
        $update = mysqli_query($con, "UPDATE temp SET PRISIO = $nieuw WHERE tempid = $row->tempid");
        
    }
    
    
    
    
    $sql = mysqli_query($con, "INSERT INTO temp(CODARTICULO, ART_TEMP, PRISIO, ANTALIO, CODCLIENTE, datum, tijd) VALUES (3234, 'AFSPRAAK VERGETEN', 0.00, 1, $cliente, '$datum', '$tijd')");
    
    
}

header("location:balieedit.php?CODCLIENTE=$cliente");
?>