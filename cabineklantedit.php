<a href=?page=home>Home</a> - <a href=?page=cabineklantbeheer>Cabine klantbeheer</a><br><br>
<form action=cabineklantupdate.php method=post>
<table border=0>
<?php
include "connect.php";
$CODCLIENTE= $_GET['CODCLIENTE'];
$SQL = "SELECT * FROM clientes WHERE CODCLIENTE = $CODCLIENTE";
$result = mysqli_query($con, $SQL);
$row = mysqli_fetch_object($result);

$SQL1 = "SELECT MAX(NUMFACTURA) as NUMFACTURA FROM facturasventa WHERE CODCLIENTE = $CODCLIENTE";
$result1 = mysqli_query($con, $SQL1);
  /*  if(mysqli_num_rows($result1) != 0){
$row1 = mysqli_fetch_object($result1);
    }
if(mysqli_num_rows($result1) == 0){
	$SQL2="INSERT INTO facturasventa (CODCLIENTE)VALUES ($CODCLIENTE)";
mysqli_query($con, $SQL2);
$SQL1="SELECT * FROM facturasventa where CODCLIENTE=$CODCLIENTE AND betaald=0";
$result1 = mysqli_query($con, $SQL1);
$row1 = mysqli_fetch_object($result1);
	}
	$NUMFACTURA=$row1->NUMFACTURA;
*/
  ?>  
    <tr style='border-color:transparent;'><td colspan=8 style='width:850px;border-color:transparent;'><input type=submit value=Opslaan style='float:right;'><input type=hidden name=CODCLIENTE value=<?php echo $CODCLIENTE;?>></td></tr>
    </table><table border=0>
     <script src='./jquery.min.js'></script>
<script>
$(document).ready(function(){
    $("#plus").click(function(){
        $("#extra-info").slideToggle();
    });
});
</script>
<?php    
echo "<tr><td>Klantnummer</td><td>$row->CODCLIENTE</td></tr>
<tr><td>Naam:</td><td>$row->aanhef $row->voorletters $row->tussenvoegsel $row->NOMBRECLIENTE ($row->voornaam)</td></tr>
";
mysqli_free_result($result);
?>

    
<tr><td colspan=2 style='border-color:transparent;'>&nbsp;</td></tr>    
<tr><td colspan=2 style='border-color:transparent;'>Laatste behandeling:</td></tr>    
    <?php
    if(mysqli_num_rows($result1) != 0){
        echo "<tr><td style='border:none;'>&nbsp;</td></tr>
        <tr style='font-weight:bold;'>
        <td width=150>Factuurnummer</td>
        <td>Totaalbedrag</td>
        <td>Datum</td>
        <td>Details</td>
        </tr>
        ";
    
        $fetch = mysqli_fetch_object($result1);
        $numfacinfo = mysqli_query($con, "SELECT * FROM facturasventa WHERE NUMFACTURA = $fetch->NUMFACTURA");
        $info = mysqli_fetch_object($numfacinfo);
        
        $totalcoste = str_replace(".", ",", "$info->TOTALCOSTE");
    echo "<input type=hidden name=NUMFACTURA value=$fetch->NUMFACTURA>
    
    <tr>
    
    <td>$fetch->NUMFACTURA</td>
    <td>$totalcoste</td>
    <td>$info->FECHA</td>
    <td style='text-align:center;'><img src=images/plus.gif width=20 height=20 style='margin:2px; cursor:pointer;' id='plus'/></td>
    
    </tr>
    
    ";
        
        $selectio1 = "SELECT * FROM albventacab, albventalin WHERE albventacab.NUMALBARAN = albventalin.NUMALBARAN AND albventacab.NUMFAC = $fetch->NUMFACTURA";
        $selectio = mysqli_query($con, $selectio1);
        
        echo "<tr><td colspan=4><div id='extra-info' style='display:none;'><table border=0><tr><td width=150 style='border:none;'><b>Artikelnummer:</b></td><td style='border:none;'><b>Artikelomschrijving:</b></td></tr>";
        while($sel = mysqli_fetch_object($selectio)){
            $selectio3 = "SELECT * FROM articulos WHERE CODARTICULO = $sel->CODARTICULO";
            $selectio4 = mysqli_query($con, $selectio3);
            $fetchio = mysqli_fetch_object($selectio4);
            echo "<tr><td style='border:none;'>$sel->CODARTICULO</td><td style='border:none;'>$fetchio->DESCRIPCION</td></tr>";
            
        }
        echo "</table></div></td></tr>";
        
    }else{
    echo "<tr><td colspan=2><u>Geen facturen beschikbaar.</u></td></tr>";
    }
    ?>
</table>
    
    
    
    <br><br>
    <span>Opmerkingen:</span><br /><br />
<textarea name=opmerkingen rows=20 cols=125><?php echo $row->opmerkingen; ?></textarea>
</form>



<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "style.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
