<?php
include 'connect.php';
?>

<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a> - <a href=?page=leverancierbeheer>Leverancierbeheer</a><br><br>
Nieuwe leverancier<br><br>
<form action=leverancierinsert.php method=post>
<table border=0>
<tr><td>Leverancier:</td><td><input name=LEVERANCIER size=40></td></tr>
<tr><td>Contactpersoon:</td><td><input name=CONTACT size=40></td></tr>
<tr><td>Telefoonnummer:</td><td><input name=TELEFOON size=40></td></tr>
<tr><td>Emailadres</td><td><input name=EMAIL size=40></td></tr>
<tr><td>Actief</td><td><input id=ACTIEF type=checkbox></td></tr>
<tr><td><input type=submit value=Opslaan></td></tr>
</table><br><br>
</form>