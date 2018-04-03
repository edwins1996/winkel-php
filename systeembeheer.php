<?php
include 'connect.php';
?>
<html>
<head></head>
<body>

<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a><br><br>
<script type="text/javascript" src="ajax.js"></script>
<table>
<tr><td>
<div class="vdblayout-cell layout-item-1" style="width: 33%" ><p style="text-align:center;"><a href="?page=systeembackup" class="vdbbutton">Backup maken van database</a>&nbsp;<br></p></div>
</td><td>
<div class="vdblayout-cell layout-item-1" style="width: 33%" ><p style="text-align:center;"><a href="?page=klantadd" class="vdbbutton">Database terugzetten</a>&nbsp;<br></p></div>
</td><td>
<div class="vdblayout-cell layout-item-1" style="width: 33%" ><p style="text-align:center;"><a href="?page=klantadd" class="vdbbutton">Database opschonen</a>&nbsp;<br></p></div>
</td></tr></table>

</body>
</html>