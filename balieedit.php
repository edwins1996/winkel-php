<?php

include 'connect.php';

$CODCLIENTE = $_GET['CODCLIENTE'];

$nombresql = mysqli_query($con, "SELECT * FROM clientes WHERE CODCLIENTE = $CODCLIENTE");
$nombre = mysqli_fetch_object($nombresql);

?>

<html>
<head>

    <title>Kassa</title>
    <meta charset="UTF-8" />
    <link rel='stylesheet' href='sheet.css' />
    <script type="text/javascript" src="ajax.js"></script>
    <script src='./jquery.min.js'></script>
    <script>
    function veranderen(){
        
        var test = document.getElementById("naam").innerHTML;
        var test1 = document.getElementById("prisio").innerHTML;
        var test2 = document.getElementById("code").innerHTML;
        
        document.getElementById("artikel").value = test;
        document.getElementById("prijs").value = test1;
        document.getElementById("codarticulo").value = test2;
        
        
    }
        
        
    function change(){
        if(document.getElementById("artikel").value.length > 1){
            ajax('artikel','artikel','veld','balieajax2.php'); 
        setTimeout(function(){ veranderen(); }, 250);
        }
    }
        
        function showTotal(){
            
            document.getElementById("total").style.display = "";
            document.getElementById("total1").style.display = "";
            
        }
        
        function leegmaken(){
            
            document.getElementById("aantal").value = "";
         
        }
        
        function leegmaken2(){
            
            document.getElementById("input-cadeau").value = "";
         
        }
        
        function leegmaken3(){
            
            document.getElementById("input-shisheido").value = "";
         
        }
                function leegmaken4(){
            
            document.getElementById("input-korting").value = "";
         
        }
    
    function BON(){
location.replace('baliedelete.php?CODCLIENTE=<?php echo $CODCLIENTE; ?>');
setTimeout(function(){ location.reload(); }, 5000);
}
        
        function regelkorting(){
            
            var kort = document.getElementById('korting-regel').style.display;
            
            if(kort == 'none'){
                document.getElementById('korting-regel').style.display = '';
                document.getElementById('button-table').style.display = 'none';
                document.getElementById('button-table-2').style.display = 'none';
                document.getElementById('button-table-3').style.display = 'none';
                document.getElementById('button-table-4').style.display = '';
                document.getElementById('cadeau').style.display = 'none';
                document.getElementById('shisheido').style.display = 'none';
            }
            else if(kort == ''){
                document.getElementById('korting-regel').style.display = 'none';
                document.getElementById('button-table-4').style.display = 'none';
                document.getElementById('button-table').style.display = '';
            }
            
        }
        
        function cadeau(){
            
            
            var cad = document.getElementById('cadeau').style.display;
            var button = document.getElementById('button-table-2').style.display;
            
            if(cad == 'none' && button == 'none'){
                document.getElementById('cadeau').style.display = '';
                document.getElementById('shisheido').style.display = 'none';
                document.getElementById('button-table-2').style.display = '';
                document.getElementById('button-table-3').style.display = 'none';
                document.getElementById('button-table-4').style.display = 'none';
                document.getElementById('button-table').style.display = 'none';
                document.getElementById('korting-regel').style.display = 'none';
            }else if(cad == '' && button == ''){
                document.getElementById('cadeau').style.display = 'none';
                document.getElementById('button-table-2').style.display = 'none';
                document.getElementById('button-table').style.display = '';
            }
            
        }
        
        function shisheido(){
            
            var shi = document.getElementById('shisheido').style.display;
            var button = document.getElementById('button-table-3').style.display;
            
            
            if(shi == 'none' && button == 'none'){
                document.getElementById('shisheido').style.display = '';
                document.getElementById('button-table-3').style.display = '';
                document.getElementById('cadeau').style.display = 'none';
                document.getElementById('korting-regel').style.display = 'none';
                document.getElementById('button-table-2').style.display = 'none';
                document.getElementById('button-table-4').style.display = 'none';
                document.getElementById('button-table').style.display = 'none';
            }else if(shi == '' && button == ''){
                document.getElementById('shisheido').style.display = 'none';
                document.getElementById('button-table-3').style.display = 'none';
                document.getElementById('button-table').style.display = '';
            }
            
        }
        
        function invoerChange(){
            
            var inv = document.getElementById('invoer').innerHTML;
            
            if(inv == 'HANDMATIGE INVOER'){
                
                document.getElementById('artikel').style.display = 'none';
                document.getElementById('aantal').style.display = 'none';
                document.getElementById('prijs').style.display = 'none';
                
                document.getElementById('artikel2').style.display = '';
                document.getElementById('aantal2').style.display = '';
                document.getElementById('prijs2').style.display = '';
                
                document.getElementById('invoer').innerHTML = 'SCANNEN';
                
                document.getElementById('submit').style.display = 'none';
                document.getElementById('submit2').style.display = '';
                
                document.getElementById('invoer-img').src = 'images/keyboard.png';
                
            }else if(inv == "SCANNEN"){
                
                document.getElementById('artikel').style.display = '';
                document.getElementById('aantal').style.display = '';
                document.getElementById('prijs').style.display = '';
                
                document.getElementById('artikel2').style.display = 'none';
                document.getElementById('aantal2').style.display = 'none';
                document.getElementById('prijs2').style.display = 'none';
                
                document.getElementById('invoer').innerHTML = 'HANDMATIGE INVOER';
                
                document.getElementById('submit').style.display = '';
                document.getElementById('submit2').style.display = 'none';
                
                document.getElementById('invoer-img').src = 'images/scanner.png';
            
            }
            
            
        }

    </script>
    
    
</head>
<body>
    <div id='content'>
        
    <div id="raster-0">
        
        <table>
        
            <tr>
        
                <td><button class="knop-3" onclick='regelkorting();'>Regel<br />korting</button></td>    
                <td><button class="knop-3" onclick='cadeau();'>Cadeau</button></td>    
                <td><button class="knop-3" style='font-size:18px;' onclick="shisheido();">Shisheido</button></td>    
                <td><button class="knop-3" onclick="location.replace('baliekaarten.php?CODCLIENTE=<?php echo $CODCLIENTE; ?>&card=SPAARKAART')">Spaar<br/>kaart</button></td>    
                <td><button class="knop-3" onclick="location.replace('baliekaarten.php?CODCLIENTE=<?php echo $CODCLIENTE; ?>&card=retour')">Retour</button></td>    
                <td><button class="knop-3" onclick="location.replace('baliekaarten.php?CODCLIENTE=<?php echo $CODCLIENTE; ?>&card=vergeten')" style='width:120px;'>Vergeten<br />afspraak</button></td>    
        <td style='width:820px; text-align:right; font-family:Tahoma; font-weight:bold; font-size:23px; padding-right:10px;'><?php echo $_SESSION['gebruikersnaam']; ?></td>
            </tr>
        
        </table>
        
        </div>
        <div id='korting-regel' style='display:none;'><table>
            
            <tr>
            
            <form action='baliekaarten.php?card=regelkorting&CODCLIENTE=<?php echo $CODCLIENTE; ?>' method='POST' id='korting-invoer'>
                <td><font style='font-size:30px; font-family:Tahoma;'>% </font><input type='text' id='input-korting' name='korting' /></td>
                </form>
                
            
            </tr>
            
            </table></div>
        
                <div id='cadeau'  style='display:none;'><table>
            
            <tr>
            <form action='baliekaarten.php?card=cadeau&CODCLIENTE=<?php echo $CODCLIENTE; ?>' method='POST' id='cadeau-invoer'>
                <td><font style='font-size:30px; font-family:Tahoma;'>€ </font><input type='text' id='input-cadeau' name='cadeau' /></td>
                </form>
                
            
            </tr>
            
            </table></div>
        
        <div id='shisheido' style='display:none;'><table>
            
            <tr>
            <form action='baliekaarten.php?card=shisheido&CODCLIENTE=<?php echo $CODCLIENTE; ?>' method='POST' id='shisheido-invoer'>
                <td><font style='font-size:30px; font-family:Tahoma;'>€ </font><input type='text' id='input-shisheido' name='shisheido' /></td>
                </form>
                
            
            </tr>
            
            </table></div>
        
        
    <div id="raster-1">
    <form id='balieinvoer' action='balieupdate.php' method='POST'>
        <input type="text" id="artikel" name="artikel" onkeyup="change();" autocomplete='off' autofocus/>
        <input type="hidden" id="codarticulo" name="codarticulo"/>
        <input type="hidden" id="cliente" name="cliente" value='<?php echo $CODCLIENTE; ?>'/>
        </form>
        
    <form id='balieinvoer2' action='balieupdate2.php' method='POST'>
        <input type="text" id="artikel2" name="artikel" autocomplete='off' autofocus style='display:none;'/>
        <input type="hidden" id="codarticulo" name="codarticulo"/>
        <input type="hidden" id="cliente" name="cliente" value='<?php echo $CODCLIENTE; ?>'/>
        </form>
        
        <br /><br />
        
        <table id="art-table">
        
        
        <tr>
            <th></th>
            <th style="width:350px;" align="left">Product</th>
            <th style="width:150px;" align="left">Aantal</th>
            <th  style="width:80px;"  align="left">Prijs</th>
        </tr>
            <div id="veld"></div>
            <div>
            <?php
                
            $sql = mysqli_query($con, "SELECT * FROM temp, articulos WHERE temp.CODCLIENTE = $CODCLIENTE AND temp.CODARTICULO = articulos.CODARTICULO");
                
                if(mysqli_num_rows($sql) != 0){
                    $teller = 0;
                    $aantal = 0;
                    while($row = mysqli_fetch_object($sql)){
                        $teller = $teller + 1;
                        echo "<tr><td>$teller.</td><td>";
                        
                        echo $row->ART_TEMP;
                      
                            
                        
                        
                        echo "</td><td>$row->ANTALIO</td><td>€$row->PRISIO</td></tr>";
                        
                        $aantal = $aantal + $row->PRISIO;
                    }
                 $totaal = number_format($aantal, 2, '.', ' ');
                    //echo "<div id='total' style='display:none;'>";
                    echo "<tr id='total' style='display:none;'><td colspan='4'><hr></td></tr>";
                    echo "<tr id='total1' style='display:none;'><td></td><td></td><td><strong>Totaal</strong></td><td>€$totaal</td></tr>";
                   // echo "</div>";
                }
                
                
            ?>
            


            </div>

        
            
        </table>
   
    </div>
    
    <div id="raster-2">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" id="aantal" name="aantal" form='balieinvoer'  autocomplete='off'/>
        <input type="text" id="aantal2" name="aantal" form='balieinvoer2'  autocomplete='off' style='display:none;'/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <font style='font-family:Tahoma; font-size:25px;'>€</font>
        <input type="text" id="prijs" name="prijs" value="" form='balieinvoer'  autocomplete='off'/>
        <input type="text" id="prijs2" name="prijs" value="" form='balieinvoer2'  autocomplete='off' style='display:none;'/>
        &nbsp;&nbsp; &nbsp;&nbsp;
        <img id='invoer-img' src="images/scanner.png" width=45px style='position:relative; top:13px;'/>
        
        <p id='client-text'>
        <table border=1 id="client-table">
        
        <tr><td style='width:150px;'>Klantnummer:</td><td style='width:275px;'><?php echo $CODCLIENTE; ?></td></tr>
        <tr><td>Naam:</td><td><?php echo "$nombre->aanhef $nombre->voorletters $nombre->tussenvoegsel $nombre->NOMBRECLIENTE ($nombre->voornaam)"; ?></td></tr>
        
        </table>
        
        </p>
        <br /><br /><br /><br />
        <a href="index.php?page=baliebeheer"><img src="images/header2.png"  width=500px/></a>
    
        <br /><br /><br />
        
        <center><button style='background-color:#7e9df0; width:350px; border: 1px solid; padding:10px;' onclick='document.getElementById("user-table").style.display = "";'>SWITCHEN VAN GEBRUIKER</button>
        <br />
            
<?php

 $users = mysqli_query($con, "SELECT * FROM gebruikers");
 
            
?>            
            

            <table id='user-table' style='display:none;'>
            <?php 
                $teller = 0;
                while($userfetch = mysqli_fetch_object($users)){
    $teller = $teller + 1;
        echo "<script>
            function userswitch$teller(){
                var user = document.getElementById('userswitch$teller').innerHTML;
                
                location.replace('userswitch.php?user='+user);
            }
            </script>";
    
                echo "<tr><td><button id='userswitch$teller' onclick='userswitch$teller();' style='background-color:#7e9df0; width:350px; border: 1px solid; padding:10px;'>$userfetch->gebruikersnaam</button></td></tr>";
}?>

            
            </table>
        </center>
        
        
    </div>
    
    <div id="raster-3">
        <br />
    <table border=0 id="button-table">
     
    
        
    <tr>
        
    <td colspan='3'><button class="knop-2" id='invoer' onclick='invoerChange();'>HANDMATIGE INVOER</button></td>
        
    </tr>
        
    <tr>
        
        <td><button class="knop" onclick='getElementById("aantal").value+="7";'>7</button></td>
        <td><button class="knop" onclick='getElementById("aantal").value+="8";'>8</button></td>
        <td><button class="knop" onclick='getElementById("aantal").value+="9";'>9</button></td>
    
    </tr>
        
    <tr>
        
        <td><button class="knop" onclick='getElementById("aantal").value+="4";'>4</button></td>
        <td><button class="knop" onclick='getElementById("aantal").value+="5";'>5</button></td>
        <td><button class="knop" onclick='getElementById("aantal").value+="6";'>6</button></td>
    
    </tr>
        
        
    <tr>
        
        <td><button class="knop" onclick='getElementById("aantal").value+="1";'>1</button></td>
        <td><button class="knop" onclick='getElementById("aantal").value+="2";'>2</button></td>
        <td><button class="knop" onclick='getElementById("aantal").value+="3";'>3</button></td>
    
    </tr> 
        
    <tr>
        
        <td><button class="knop" id='submit' onclick='getElementById("balieinvoer").submit();'>OK</button>
        <button class="knop" id='submit2' onclick='getElementById("balieinvoer2").submit();' style='display:none;'>OK</button>
        </td>
        <td><button class="knop" onclick='getElementById("aantal").value+=".";'>.</button></td>
        <td><button class="knop" onclick='getElementById("aantal").value+="0";'>0</button></td>
    
    </tr>
        
    <tr>
        
    <td><button class="knop" onclick="showTotal();">Totaal</button></td>    
    <td><button class="knop" onclick='leegmaken();'>CL</button></td>    
    <td><button class="knop" onclick='location.replace("baliedelete2.php?CODCLIENTE=<?php echo $CODCLIENTE ?>")'><img src='images/trash-1.png' width=50px/></button></td>    
        
    </tr>
    <tr><td colspan=3><button class="knop-2"
                              <?php if(mysqli_num_rows($sql) != 0){ ?>
                              onclick="BON();"
                              <?php } ?>
                              >BON PRINTEN</button></td></tr>    
    </table>
        
     <?php
        
    include 'baliebutton.php';    
        
    ?>  
    
    </div>
    </div>
    
</body>

</html>