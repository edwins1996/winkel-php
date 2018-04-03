<?php
include 'connect.php';
?>
<a href=?page=home>Home</a><br>
<table width="100%">
<tr>
<td>
<div class="vdblayout-cell layout-item-1"><p style="text-align:center;"><a href="?page=klantbeheer" class="vdbbutton">Klantbeheer</a></p></div>
</td>
<td>
<div class="vdblayout-cell layout-item-1"><p style="text-align:center;"><a href="?page=artikelbeheer" class="vdbbutton">Artikelbeheer</a></p></div>
</td>
<td>
<div class="vdblayout-cell layout-item-1"><p style="text-align:center;"><a href="?page=leverancierbeheer" class="vdbbutton">Leverancierbeheer</a></p></div>
</td>
</tr>
<tr>
<td>
    <?php 
    $SQL = mysqli_query($con, "SELECT * FROM leveranciers");
    $fetch = mysqli_fetch_object($SQL);
    ?>
<div class="vdblayout-cell layout-item-1"><p style="text-align:center;"><a href="?page=voorraadbeheer&id=<?php echo $fetch->CODPROVEEDOR; ?>&pagina=1" class="vdbbutton">Voorraadbeheer</a></p></div>
</td>
<td>
<div class="vdblayout-cell layout-item-1"><p style="text-align:center;"><a href="?page=systeembeheer" class="vdbbutton">Systeembeheer</a></p></div>
</td>
    <td>
<div class="vdblayout-cell layout-item-1"><p style="text-align:center;"><a href="?page=overzichten" class="vdbbutton">Overzichten</a></p></div>
</td>
</tr>
</table>
