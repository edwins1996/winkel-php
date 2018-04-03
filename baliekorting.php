<?php
$CODCLIENTE = $_GET['CODCLIENTE'];
$PRODID = $_GET['id'];
?>

<a href=?page=home>Home</a> - <a href=?page=balie>Balie</a> - <a href=?page=balieedit&CODCLIENTE=<?php echo $CODCLIENTE; ?>>Kassa</a><br><br>


<table border=0>
<?php
    session_start();
    
include "connect.php";


    if(isset($ARTICULOSA)){
        $ARTICULOSA = $_GET['articulos'];
    }
    
$SQL="SELECT * FROM clientes WHERE CODCLIENTE=$CODCLIENTE";
$result = mysqli_query($con, $SQL);
$row = mysqli_fetch_object($result);
    

    


    
echo "<tr><td>klantnummer:</td><td>$row->CODCLIENTE</td></tr>
<tr><td>Naam:</td><td>$row->aanhef $row->voorletters $row->tussenvoegsel $row->NOMBRECLIENTE ($row->voornaam)</td></tr>
";
mysqli_free_result($result);
?>
</table><br><br>
<table border=0>
<tr>
<td width="70%">
<script type="text/javascript" src="ajax.js"></script>

    <?php  
  
    
echo "<script>
  function prodchange(){
  var articulosid = document.forms['kortingform']['product'].value;
  location.replace('?page=baliekorting&CODCLIENTE=$CODCLIENTE&id='+articulosid);
  }
    </script>";
    
        ?>
    <form id='kortingform'>
        
    <select id='product' onchange='prodchange();' class="vdbbutton" >
    <?php
    $temp = mysqli_query($con, "SELECT * FROM temp, articulos WHERE temp.CODCLIENTE = $CODCLIENTE AND temp.CODARTICULO = articulos.CODARTICULO");
        
    while($tempcliente = mysqli_fetch_object($temp)){
        echo "<option value='$tempcliente->tempid'";
        if($tempcliente->tempid == $PRODID){ echo " selected";}
        echo ">$tempcliente->DESCRIPCION</option>";
    }
        
    ?>    
    </select>
        <br /><br />
        
        </form>
    <ol style='margin:0px;'>
    <?php
$tempprod = mysqli_query($con, "SELECT * FROM temp, articulos WHERE temp.tempid = $PRODID AND temp.CODARTICULO = articulos.CODARTICULO");
    echo "<table border=1>";   
     echo " <tr>
    <td></td>
    <td  width='275px'>OMSCHRIJVING</td>
    <td width='20px;'>AANT</td>
    <td>PRIJS</td>
    <td>KORTING</td>
    </tr> ";  
        
    while($prod = mysqli_fetch_object($tempprod)){
    echo "<form action='?page=baliekortingupdate' method='POST' id='kortingupdate'>
    
    <tr>
    <td><li></li></td>
    <td  width='275px'>$prod->DESCRIPCION</td>
    <td width='20px;'>$prod->ANTALIO</td>
    <td>€$prod->PRISIO</td>
    <td>€<input name='korting' type=int size='9' id='aantal' style='background-color:transparent; border:none; color:white; outline:none;'/>
    <input type='hidden' name='tempid' value='$prod->tempid' />
    <input type='hidden' name='clientid' value='$CODCLIENTE' />
    </td>
    </tr>";
        
    if(isset($_SESSION['kortingfout'])){    
    echo "<tr><td COLSPAN=5 style='color:yellow;'>Er is geen kortingsbedrag ingevuld!</td></tr>";
        unset($_SESSION['kortingfout']);
    }
    echo "</form>";
    }
   echo "</table>";     
?>
    </ol>
<td>
<table border=1>
<tr>
<td><img src="./images/1.png" onclick='getElementById("aantal").value+="1";'></td>
<td><img src="./images/2.png" onclick='getElementById("aantal").value+="2";'></td>
<td><img src="./images/3.png" onclick='getElementById("aantal").value+="3";'></td>
</tr>
<tr>
<td><img src="./images/4.png" onclick='getElementById("aantal").value+="4";'></td>
<td><img src="./images/5.png" onclick='getElementById("aantal").value+="5";'></td>
<td><img src="./images/6.png" onclick='getElementById("aantal").value+="6";'></td>
</tr>
<tr>
<td><img src="./images/7.png" onclick='getElementById("aantal").value+="7";'></td>
<td><img src="./images/8.png" onclick='getElementById("aantal").value+="8";'></td>
<td><img src="./images/9.png" onclick='getElementById("aantal").value+="9";'></td>
</tr>
<tr>
<td><img src="./images/clear.png" onclick='getElementById("aantal").value = "";'></td>
<td><img src="./images/0.png" onclick='getElementById("aantal").value+="0";'></td>
<td><img src="./images/punt.png" onclick='getElementById("aantal").value+="."'></td>
</tr>
<tr>
<td></td>
<td><img src="./images/ok2.png" onclick='document.getElementById("kortingupdate").submit();' width='80px' height='80px' ></td>
<td></td>

</tr>

</table>

</table>

