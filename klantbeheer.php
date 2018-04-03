<?php
include 'connect.php';
?>

<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a><br><br>
<script type="text/javascript" src="ajax.js"></script>
Klantnaam: <input type="text" id="NOMBRECLIENTE" onKeyUp="ajax('NOMBRECLIENTE','NOMBRECLIENTE','suggestion','klantajax.php')">
<div id="suggestion"></div>
<div class="vdblayout-cell layout-item-1" style="width: 33%" ><p style="text-align:center;"><a href="?page=klantadd" class="vdbbutton">Klant toevoegen</a>&nbsp;<br></p></div>
