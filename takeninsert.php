<?php
include "connect.php";


$datum=			date("Y-m-d");
$datumafdoen=	date("Y-m-d",strtotime($_POST['datumafdoen']));
$van=			$_POST['van'];
$voor=			$_POST['voor'];
$omschrijving= 	$_POST['omschrijving'];
$opmerking= 	$_POST['opmerking'];


$query="INSERT INTO taken (datum,datumafdoen,van,voor,omschrijving,opmerking) VALUES ('$datum','$datumafdoen','$van','$voor','$omschrijving','$opmerking')";
mysqli_query($con, $query);

//echo $taakid;
$SQL = mysqli_query($con, "SELECT MAX(taakid) as taakid FROM taken");
$fetch = mysqli_fetch_object($SQL);
// echo $query;
header("Location: index.php?page=takenedit&taakid=$fetch->taakid");
?>



