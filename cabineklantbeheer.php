<?php
include 'connect.php';
?>
<a href=?page=home>Home</a> - <a href=?page=cabine>Cabine</a><br><br>
<script type="text/javascript" src="ajax.js"></script>
Klantnaam: <input type="text" id="NOMBRECLIENTE" onKeyUp="ajax('NOMBRECLIENTE','NOMBRECLIENTE','suggestion','cabineklantajax.php')">
<div id="suggestion"></div>
