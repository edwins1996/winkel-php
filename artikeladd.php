<?php
include 'connect.php';

$SQL = "SELECT LEVERANCIER FROM leveranciers order by LEVERANCIER";
$result = mysqli_query($con, $SQL);
$row = mysqli_fetch_object($result);

$datum = date('Y'). '-' .date('n'). '-' . date('d') . ' ' . date('G'). ':' .date('i'). ':' .date('s');

?>

<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a> - <a href=?page=artikelbeheer>Artikelbeheer</a><br><br>
Nieuw artikel<br><br>
<form action=artikelinsert.php method=post>
<table border=0>
<tr><td>Artikelnaam:</td><td><input name=DESCRIPCION size=40></td></tr>

<tr><td>Leverancier:</td><td>
    <select> 
    <option value="0">selecteer</option>
        <?php
            while($row = mysqli_fetch_assoc($result))
            {
            ?>
            <option value = "<?php echo($row['LEVERANCIER'])?>" >
                <?php echo($row['LEVERANCIER']) ?>
            </option>
            <?php
            }               
        ?>
    </select>

</td></tr>

<tr><td>Invoerdatum:</td><td><input name=FECHAMODIFICADO value='<?php echo $datum; ?>' size=40></td></tr>
<tr><td>Aantal:</td><td><input name=TALLA size=40></td></tr>
<tr><td>Netto prijs: &euro; </td><td><input name=PNETO size=40></td></tr>

<tr><td>&nbsp;</td><td> </td></tr>
<tr><td>Barcode:</td><td><input name=CODBARRAS size=40></td></tr>

<tr><td><input type=submit value=Opslaan></td></tr>
</table><br><br>
</form>