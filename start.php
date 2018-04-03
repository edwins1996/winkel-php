<?php  ob_start();
session_start();
session_unset();    // Deactiveer de sessievariabelen
session_destroy();    // Verwijder eventuele sessiebestanden op de server
include "connect.php";
?>
<html><head><title>Login op <?php  echo $sitenaam; ?></title></head><body bgcolor=#<?php  echo $_SESSION[bijkleur];?>><center></center>
<?php 
$gnaam = $_POST["gnaam"];
$ww = $_POST["ww"];
if ((strlen($gnaam)>0) && (strlen($ww)>0))
{
    if (!get_magic_quotes_gpc())
    {
        $gnaam = addslashes($gnaam);
        $ww = addslashes($ww);
    }
    $ww = md5(stripslashes($ww)."vdboom");
	echo $ww;
        $sql = "SELECT * FROM gebruikers WHERE gebruikersnaam='$gnaam' AND wachtwoord='$ww'";
        $res = mysqli_query($con, $sql) or die(mysqli_error());
    if (mysqli_num_rows($res) > 0)
    {

                // Gevonden... maak nu de sessie aan
        $row = mysqli_fetch_object($res);
        session_start();
        $_SESSION["gebruikersnummer"] = $row->gebruikersnummer;
        $_SESSION["gebruikersnaam"] = $row->gebruikersnaam;
		$_SESSION["administrator"] = $row->administrator;
	$datum=(date("Y-m-d H-i-s"));
        $sql1 = "UPDATE gebruikers SET ipadres='".$_SERVER['REMOTE_ADDR']."',ingelogd='$datum' WHERE gebruikersnummer=$row->gebruikersnummer";
        $test = mysqli_query($con, $sql1) or die(mysqli_error());
        header("Location:index.php");

    }
    else
    {
//echo $ww;
    ?>
                         <LINK rel='stylesheet' type='text/css' href='../style/main.css'>
            <center><font color="Red">Ongeldige gebruikersnaam of wachtwoord. Klik <a href=index.php>hier</a> om terug te gaan.</font> </center>

    <?php 
    }

//
}
else
{
?>
<center>
<img src=images/header.jpg border=0>
<form action="login.php" method="post" name="form1" target="_self">
<table border="0" cellpadding="2" style="font-family: Arial; font-size: 8 pt" cellspacing="3" height="85">
  <tr>
    <td width="115" valign="middle" bgcolor="#<?php echo $_SESSION[hoofdkleur]; ?>" height="16">
      <p align="right"></p>
    </td>
    <td width="44" valign="middle" bgcolor="#<?php echo $_SESSION[hoofdkleur]; ?>" height="16"></td>
    <td width="623" valign="middle" bgcolor="#<?php echo $_SESSION[hoofdkleur]; ?>" height="16"><font color="#<?php echo $_SESSION[letterkleur]; ?>"><b><?php echo $sitenaam; ?></b></font></td>
  </tr>
  <tr>
    <td width="115" valign="top" height="25" align="right"><b><font color="#<?php echo $_SESSION[letterkleur]; ?>">INLOGGEN</font></b>
    </td>
    <td width="44" valign="middle" height="25"></td>
      <td width="623" valign="top" height="25"><font color="#<?php echo $_SESSION[letterkleur]; ?>">
       </font><font color="#<?php echo $_SESSION[letterkleur]; ?>">
    
</font></td>
  </tr>
  <tr>
    <td width="115" valign="top" height="13" align="right">
    </td>
    <td width="44" valign="middle" height="13"></td>
    <td width="623" valign="top" height="13"></td>
  </tr>
  <tr>
      <td width="115" valign="middle" height="12" align="right"> <b><font color="#<?php echo $_SESSION[letterkleur]; ?>">Gebruikersnaam:</font></b>
      </td>
    <td width="44" valign="middle" height="12"></td>
    <td width="623" valign="top" height="12"><input maxLength="20" name="gnaam" size="20"></td>
  </tr>
  <tr>
      <td width="115" valign="middle" height="6" align="right"> <b><font color="#<?php echo $_SESSION[letterkleur]; ?>">Wachtwoord:</font></b>
      </td>
    <td width="44" valign="middle" height="6"></td>
    <td width="623" valign="top" height="6"><input type="password" maxLength="20" value name="ww" size="20"></td>
  </tr>
  <tr><td>&nbsp;</td><td>&nbsp;</td><td><input name="loginBT" type="submit" value="Inloggen"></td></tr>

  <tr>
    <td width="115" valign="top" height="6" align="right">
    </td>
    <td width="44" valign="middle" height="6"></td>
    <td width="623" valign="top" height="6"></td>
  </tr>
  <tr>
    <td width="115" valign="top" bgcolor="#<?php echo $_SESSION[hoofdkleur]; ?>" height="16" align="right">&nbsp;
      </td>
    <td width="44" valign="middle" bgcolor="#<?php echo $_SESSION[hoofdkleur]; ?>" height="16">&nbsp;</td>
    <td width="623" valign="top" bgcolor="#<?php echo $_SESSION[hoofdkleur]; ?>" height="16">&nbsp;</td>
  </tr>
</table>
</form>
</center>
</body>
<?php 
}
//include "vars.php";
?>