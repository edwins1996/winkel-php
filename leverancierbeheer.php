<?php
include 'connect.php';
?>
<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a><br><br>
<script type="text/javascript" src="ajax.js"></script>
Leverancier: <input type="text" id="LEVERANCIER" onKeyUp="ajax('LEVERANCIER','LEVERANCIER','suggestion','leverancierajax.php')" onLoad="ajax('LEVERANCIER','LEVERANCIER','suggestion','leverancierajax.php')">
<div id="suggestion"></div>
<div class="vdblayout-cell layout-item-1" style="width: 33%" ><p style="text-align:center;"><a href="?page=leverancieradd" class="vdbbutton">Leverancier toevoegen</a>&nbsp;<br></p></div>