<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a>
<?php
include 'connect.php';

if(!isset($_GET['pagina'])){
    $page = 1;
}elseif(isset($_GET['pagina'])){
    $page = $_GET['pagina'];
}

$levid = $_GET['id'];

$SQL = mysqli_query($con, "SELECT * FROM leveranciers");

?>
<script>
function url1(){
    var id = document.getElementById("select-1").value;
    
    location.replace("?page=voorraadbeheer&id="+id);
}

    function pdf(){
        
        window.open('voorraadpdf.php?leverancier=<?php echo $levid; ?>', '_blank');
        
    }
</script>


<br /><br />
Leveranciers: <select id='select-1' onchange='url1();'>
<option value='alle'>Alle</option>
<?php

    while($row = mysqli_fetch_object($SQL)){
        
        echo "<option value='$row->CODPROVEEDOR'";
        if($levid == $row->CODPROVEEDOR){echo " selected";}
        echo ">$row->LEVERANCIER</option>";
        
    }

?>
</select>
<button class='vdbbutton' type="button" style='float:right;' onclick='pdf();'>PRINTEN</button>
<br /><br />
<form action='voorraadupdate.php' method='POST'>  
<table border=0>
    
    <tr style='font-weight:bold;'>
    <td>Beschrijving</td>
    <td>Aantal</td>
    <td>Aantal bijwerken:</td>
    </tr>
    
  
    <?php
    if($levid == 'alle'){
        
        $offset = ($page-1)*25;
        $select = "SELECT * FROM articulos, stocks WHERE articulos.CODARTICULO = stocks.CODARTICULO ORDER BY DESCRIPCION LIMIT 25 OFFSET $offset";
    $select1 = mysqli_query($con, $select);
    
    while($fetch = mysqli_fetch_object($select1)){
        
        echo "<tr>
        
        <td>$fetch->DESCRIPCION</td>
        <td>$fetch->STOCK</td>
        <td align=right><input type='text' value='$fetch->STOCK' name='aantal$fetch->CODARTICULO' style='padding:3px 0;'/></td>
        
        </tr>";

        
    }         $artikelen = mysqli_query($con, "SELECT * FROM articulos, stocks WHERE articulos.CODARTICULO = stocks.CODARTICULO");
$teller = 0;
            echo "<tr><td style='text-align:right;' colspan=3>
            <input type='hidden' value='$levid' name='levid' />
            <input type='hidden' value='$page' name='pagina' />
            <input type='submit' value='Opslaan' /></td></tr><tr><th colspan=3><div style='max-width:850px; word-wrap:break-word;'>";
for($x = 1; $x <= mysqli_num_rows($artikelen); $x++){
    
    if($x % 25 === 0){
        $teller = $teller+1;
      
        echo "<a href='?page=voorraadbeheer&id=$levid&pagina=$teller'";
        if($page == $teller){
        echo "style='font-weight:bold; color:black;'";
        }
        echo ">$teller</a>&nbsp;&nbsp;";
   
    }
}
            $teller1 = $teller+1;
            echo "<a href='?page=voorraadbeheer&id=$levid&pagina=$teller1'";
        if($page == $teller1){
        echo "style='font-weight:bold; color:black;'";
        }
        echo ">$teller1</a>";
            echo "</div></th></tr>
            ";
    }else{
    
        $offset = ($page-1)*25;
        
    $select = "SELECT * FROM articulos, stocks WHERE articulos.CODARTICULO = stocks.CODARTICULO AND articulos.CODPROVEEDOR = $levid ORDER BY DESCRIPCION LIMIT 25 OFFSET $offset";
    $select1 = mysqli_query($con, $select);
    
    while($fetch = mysqli_fetch_object($select1)){
        
        echo "<tr>
        
        <td>$fetch->DESCRIPCION</td>
        <td>$fetch->STOCK</td>
        <td align=right><input type='text' value='$fetch->STOCK' name='aantal$fetch->CODARTICULO' style='padding:3px 0;'/></td>
        </tr>";
        
    }
      $artikelen = mysqli_query($con, "SELECT * FROM articulos, stocks WHERE articulos.CODARTICULO = stocks.CODARTICULO AND CODPROVEEDOR = $levid");
$teller = 0;
            echo "<tr><td style='text-align:right;' colspan=3>
            <input type='hidden' value='$levid' name='levid' />
            <input type='hidden' value='$page' name='pagina' />
            <input type='submit' value='Opslaan' /></td></tr><tr><th colspan=3><div style='max-width:850px; word-wrap:break-word;'>";
for($x = 1; $x <= mysqli_num_rows($artikelen); $x++){
    
    if($x % 25 === 0){
        $teller = $teller+1;
      
        echo "<a href='?page=voorraadbeheer&id=$levid&pagina=$teller'";
        if($page == $teller){
        echo "style='font-weight:bold; color:black;'";
        }
        echo ">$teller</a>&nbsp;&nbsp;";
   
    }
}
            $teller1 = $teller+1;
            echo "<a href='?page=voorraadbeheer&id=$levid&pagina=$teller1'";
        if($page == $teller1){
        echo "style='font-weight:bold; color:black;'";
        }
        echo ">$teller1</a>";
            echo "</div></th></tr>
            ";  
        
    }
    
    
    ?>
      
</table>
     
    </form>