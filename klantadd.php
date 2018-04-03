<?php
include 'connect.php';
?>

<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a> - <a href=?page=klantbeheer>Klantbeheer</a><br><br>
Nieuwe klant<br><br>
<form action=klantinsert.php method=post>
<table border=0>
<tr><td>Aanhef:</td><td><input name=aanhef size=40></td></tr>
<tr><td>Voornaam:</td><td><input name=voornaam size=40></td></tr>
<tr><td>Voorletters:</td><td><input name=voorletters size=40></td></tr>
<tr><td>Tussenvoegsel:</td><td><input name=tusenvoegsel size=40></td></tr>
<tr><td>Achternaam:</td><td><input name=NOMBRECLIENTE size=40></td></tr>
<tr><td>Adres:</td><td><input name=DIRECCION1 size=40></td></tr>
<tr><td>Postcode:</td><td><input name=CODPOSTAL size=40></td></tr>
<tr><td>Woonplaats:</td><td><input name=POBLACION size=40></td></tr>
<tr><td>Geboortedatum:</td><td><input name=geboortedatum size=40></td></tr>
<tr><td>Telefoonnummer 1:</td><td><input name=TELEFONO1 size=40></td></tr>
<tr><td>Telefoonnummer 2:</td><td><input name=TELEFONO2 size=40></td></tr>
<tr><td>E-mail:</td><td><input name=E_MAIL size=40></td></tr>
<tr><td>Mobiele telefoon 1:</td><td><input name=MOBIL size=40></td></tr>
<tr><td>Mobiele telefoon 2:</td><td><input name=MOBIL2 size=40></td></tr>
<tr><td>Nieuwsbrief:</td><td><input type=checkbox name=nieuwsbrief></td></tr>

<tr><td><input type=submit value=Opslaan></td></tr>
</table><br><br>
<textarea name=opmerkingen rows=20 cols=125></textarea>
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
