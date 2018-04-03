<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat: "dd-mm-yy",dayNamesMin: [ "zo", "ma", "di", "wo", "do", "vr", "za" ], monthNames: [ "januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december" ]});
  } );
  </script>

<?php
include 'connect.php';
?>

<a href=?page=home>Home</a> - <a href=?page=taken>Taken</a><br><br>
Nieuwe taak<br><br>
<form action=takeninsert.php method=post>
<table border=0>

<tr><td>afdoen voor:</td><td><input id=datepicker name=datumafdoen value='<?php echo date("d-m-Y", strtotime("+1 day"))?>'></td></tr>
<tr><td>van:</td><td><select name='van'>
    
    <?php
    
    $SQL = mysqli_query($con, "SELECT * FROM gebruikers");
                                    
            while($row = mysqli_fetch_object($SQL)){
                
                echo "<option value='$row->gebruikersnaam'>$row->gebruikersnaam</option>";
                
            }
    
    ?>
    
    </select></td></tr>
<tr><td>voor:</td><td><select name='voor'>
        <?php
    
    $SQL = mysqli_query($con, "SELECT * FROM gebruikers");
                                    
            while($row = mysqli_fetch_object($SQL)){
                
                echo "<option value='$row->gebruikersnaam'>$row->gebruikersnaam</option>";
                
            }
    
    ?>
    
    
    </select></td></tr>
<tr><td>omschrijving:</td><td><input name=omschrijving type=text size=100></td></tr>
<tr><td>opmerking:</td><td><input name=opmerking type=text size=100></td></tr>
<tr><td>afgedaan:</td><td><input name=afgedaan type=checkbox></td></tr>
<tr><td><input type=submit value=Opslaan></td></tr>
</table>
</form>




