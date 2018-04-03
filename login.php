<?php  ob_start();
session_start();
if(isset($_SESSION['no-access'])){
    
}
else{
session_unset();    // Deactiveer de sessievariabelen
session_destroy();    // Verwijder eventuele sessiebestanden op de server
}
?>
<html><head><title>Login</title>
    
<style>
    
#test1{
    padding:5px;
  border: none;
  border-bottom: solid 2px rgba(108, 108, 108, 0.28);
  transition: border 0.3s;
    background:transparent;
    color:black;
    outline:none;
}
#test1:focus{
    border-bottom: solid 2px #969696;
}
    #test2{
    padding:5px;
    border: none;
    border: solid 2px rgba(108, 108, 108, 0.28);
    transition: border 0.3s;
    background:transparent;
    color:black;
    outline:none; 
        
    }
    #test2:focus{
    border: solid 2px #969696;
}
    body{
        background:url(images/huidverzorging.png);
        background-size:100%;
        background-color:#EEEEEE;
        background-repeat:no-repeat;
    }
    
    </style>
    
    </head><body bgcolor=#DDDDDD>


<center>
<img src=images/header.jpg border=0>
<form action="logincheck.php" method="post" name="form1" style='margin-top:-10px;'>
<table border="0" cellpadding="4.5" style="font-family: Arial; font-size: 8 pt; width:837.5px;" cellspacing="3" height="85">
  <tr>
    <td colspan='3' width="115" valign="middle" bgcolor="#FFFFFF" height="16">
      <p align="right"><b><br /></b></p>
    </td>
      </tr>
  <tr>
    <td width="115" valign="top" height="25" align="left"><b><font color="#494C45">INLOGGEN</font></b>
    </td>
    <td width="44" valign="middle" height="25"></td>
      <td width="623" valign="top" height="25"><font color="#FFFFFF">
       </font><font color="#FFFFFF">
    
</font></td>
  </tr>
  <tr>
    <td width="115" valign="top" height="13" align="right">
    </td>
    <td width="44" valign="middle" height="13"></td>
    <td width="623" valign="top" height="13" style='color:red;'>
      <?php 
        if(isset($_SESSION['no-access'])){
    echo "Uw gebruikersnaam/wachtwoord is onjuist.";
 unset($_SESSION['no-access']);
}
      ?>
      </td>
  </tr>
  <tr>
      <td width="115" valign="middle" height="12" align="right"> <b><font color="#494C45">Gebruikersnaam:</font></b>
      </td>
    <td width="44" valign="middle" height="12"></td>
    <td width="623" valign="top" height="12"><input maxLength="20" id='test1'  name="gnaam" size="20" autocomplete="off" autofocus></td>
  </tr>
  <tr>
      <td width="115" valign="middle" height="6" align="right"> <b><font color="#494C45">Wachtwoord:</font></b>
      </td>
    <td width="44" valign="middle" height="6"></td>
    <td width="623" valign="top" height="6"><input type="password" maxLength="20" id='test1' name="ww" size="20"></td>
  </tr>
  <tr><td>&nbsp;</td><td>&nbsp;</td><td><input name="loginBT"  id='test2'  type="submit" value="Inloggen"></td></tr>

  <tr>
    <td width="115" valign="top" height="6" align="right">
    </td>
    <td width="44" valign="middle" height="6"></td>
    <td width="623" valign="top" height="6"></td>
  </tr>
  <tr>
    <td colspan='3' width="115" valign="top" bgcolor="#FFFFFF" height="30" align="right">&nbsp;
      </td>
    
  </tr>
</table>
</form>
</center>
</body>
<?php 

//include "vars.php";
?>