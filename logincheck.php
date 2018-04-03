<?php 
include "connect.php";
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
	//echo $ww;
        $sql = "SELECT * FROM gebruikers WHERE gebruikersnaam='$gnaam'";
        $res = mysqli_query($con, $sql) or die(mysqli_error());
    if (mysqli_num_rows($res) != 0)
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
        header("Location:index.php?page=home");

    }
    else
    {
        $_SESSION['no-access'] = 'No-Access';
    
    }

//
}
else
{
  }  
?>