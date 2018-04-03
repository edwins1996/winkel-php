<?php
include 'connect.php';
?>

<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a><br><br>
<script type="text/javascript" src="ajax.js"></script>
Artikelnaam: <input type="text" id="DESCRIPCION" onKeyUp="ajax('DESCRIPCION','DESCRIPCION','suggestion','artikelajax.php')" onLoad="ajax('DESCRIPCION','DESCRIPCION','suggestion','artikelajax.php')">
<div id="suggestion"></div>
<div class="vdblayout-cell layout-item-1" style="width: 33%" ><p style="text-align:center;"><a href="?page=artikeladd" class="vdbbutton">Artikel toevoegen</a>&nbsp;<br></p></div>