  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat: "dd-mm-yy",dayNamesMin: [ "Zo", "Ma", "Di", "Wo", "Do", "Vr", "Za" ], monthNames: [ "Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "December" ]});
  } );
  </script>
<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a> - <a href=?page=klantbeheer>Klantbeheer</a><br><br>
<form action=klantupdate.php method=post>
<table border=0>
<?php
include "connect.php";
$CODCLIENTE= $_GET['CODCLIENTE'];
$SQL="SELECT * FROM clientes where CODCLIENTE=$CODCLIENTE";
$result = mysqli_query($con, $SQL);
$row = mysqli_fetch_object($result);
echo "<tr><td>Klantnummer</td><td>$row->CODCLIENTE</td></tr>
<tr><td>Aanhef:</td><td><input name=aanhef value='$row->aanhef' size=40></td></tr>
<tr><td>Voornaam:</td><td><input name=voornaam value='$row->voornaam' size=40></td></tr>
<tr><td>Voorletters:</td><td><input name=voorletters value='$row->voorletters' size=40></td></tr>
<tr><td>Tussenvoegsel:</td><td><input name=tussenvoegsel value='$row->tussenvoegsel' size=40></td></tr>
<tr><td>Naam:</td><td><input name=NOMBRECLIENTE value='$row->NOMBRECLIENTE' size=40></td></tr>
<tr><td>Adres:</td><td><input name=DIRECCION1 value='$row->DIRECCION1' size=40></td></tr>
<tr><td>Postcode:</td><td><input name=CODPOSTAL value='$row->CODPOSTAL' size=40></td></tr>
<tr><td>Woonplaats:</td><td><input name=POBLACION value='$row->POBLACION' size=40></td></tr>
<tr><td>Geboortedatum:</td><td><input id=datepicker name=geboortedatum value='".date("d-m-Y",strtotime($row->geboortedatum))."'></td></tr>
<tr><td>Telefoonnummer 1:</td><td><input name=TELEFONO1 value='$row->TELEFONO1' size=40></td></tr>
<tr><td>Telefoonnummer 2:</td><td><input name=TELEFONO2 value='$row->TELEFONO2' size=40></td></tr>
<tr><td>E-mail:</td><td><input name=E_MAIL value='$row->E_MAIL' size=40></td></tr>
<tr><td>Mobiel nummer 1:</td><td><input name=MOBIL value='$row->MOBIL' size=40></td></tr>
<tr><td>Mobiel nummer 2:</td><td><input name=MOBIL2 value='$row->MOBIL2' size=40></td></tr>

<tr><td>Nieuwsbrief</td><td><input type=checkbox";
 if($row->nieuwsbrief==1){echo " checked";} 
 echo " name=nieuwsbrief value='1'></td></tr>

<tr><td>Actief</td><td><input type=checkbox";
 if($row->actief==1){echo " checked";} 
 echo " name=actief value='1'></td></tr>
";
mysqli_free_result($result);
?>
<tr><td><input type=submit value=Opslaan> <input type=hidden name=CODCLIENTE value=<?php echo $CODCLIENTE;?>></td></tr>
</table><br><br>
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
