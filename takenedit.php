<a href=?page=home>Home</a> - <a href=?page=taken>Taken</a><br><br>



<form action=takenupdate.php method=post>
<table border=0>
<?php
include "connect.php";

$taakid= $_GET['taakid'];
$SQL="SELECT * FROM taken WHERE taakid=$taakid";
$result = mysqli_query($con, $SQL);

//echo $result();
$row = mysqli_fetch_object($result);
echo"
<tr><td>Datum:</td><td>$row->datum</td></tr>
<tr><td>Datum afdoen:</td><td>$row->datumafdoen</td></tr>
<tr><td>Van:</td><td><select name=van>";
    $SQL = mysqli_query($con, "SELECT * FROM gebruikers");
                                    
            while($row1 = mysqli_fetch_object($SQL)){
                
                echo "<option value='$row1->gebruikersnaam'";
                if($row->van == $row1->gebruikersnaam){echo " selected";}
                echo ">$row1->gebruikersnaam</option>".chr(10);
                
            }
    echo "</select></td></tr>
<tr><td>Voor:</td><td><select name=voor>"; 
    $SQL = mysqli_query($con, "SELECT * FROM gebruikers");
                                    
            while($row1 = mysqli_fetch_object($SQL)){
                
                echo "<option value='$row1->gebruikersnaam'";
                if($row1->gebruikersnaam == $row->voor){echo " selected";}
                echo ">$row1->gebruikersnaam</option>".chr(10);
                
            }
    echo "</select></td></tr>
<tr><td>Omschrijving:</td><td><input name=omschrijving value='$row->omschrijving' size=100></td></tr>
<tr><td>Opmerking:</td><td><input name=opmerking value='$row->opmerking' size=100></td></tr>
<tr><td>Afgedaan:</td><td><input type=checkbox";
 if($row->afgedaan==1){echo " checked";} 
 echo " name=Afgedaan value='1'></td></tr>
";
mysqli_free_result($result);
?>
<tr><td><input type=submit value=Opslaan> <input type=hidden name=taakid value=<?php echo $taakid;?>></td></tr>
</table><br><br>
</form>