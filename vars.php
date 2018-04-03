<?php
include 'connect.php';
echo $_REQUEST['inhoud'];
session_start();
echo "<table border=1><TR><TD>REQUEST's: </TD><TD>";
print_r($_REQUEST);
echo "</TR><TR><TD>POST's: </TD><TD>";
print_r($_POST);
echo "</TR><TR><TD>GET's: </TD><TD>";
print_r($_GET);
echo "</TR><TR><TD>SESSION's: </TD><TD>";
print_r($_SESSION);
?>
</TR>
</table>