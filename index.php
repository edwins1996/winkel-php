<?php
//include 'connect.php';
if(isset($_GET["page"])){
$page=$_GET["page"];
}
elseif(!isset($_GET["page"])){$page="home";}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">
    <title>Corrie van den Boom <?=$page;?></title>
	<link rel="icon" href="./favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
    <link rel="stylesheet" href="style.css" media="screen">
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>
<meta name="description" content="Startpagina systeem van den boom">


<style>.vdbcontent .vdbpostcontent-0 .layout-item-0 { color: #B2B2B2; background: ;  }
.vdbcontent .vdbpostcontent-0 .layout-item-1 { color: #B2B2B2; padding: 15px;  }
.vdbcontent .vdbpostcontent-0 .layout-item-2 { color: #B2B2B2; background: ; padding: 15px;  }
.vdbcontent .vdbpostcontent-0 .layout-item-3 { color: #B2B2B2; background: #1C3F5A; padding: 15px;  }
.vdbcontent .vdbpostcontent-0 .layout-item-4 { padding: 15px;  }
.ie7 .vdbpost .vdblayout-cell {border:none !important; padding:0 !important; }
.ie6 .vdbpost .vdblayout-cell {border:none !important; padding:0 !important; }

</style></head>
<body>
<div id="vdbmain">
    <div class="vdbsheet clearfix">
<header class="vdbheader">

    <div class="vdbshapes">
        
            </div>
</header>
<div class="vdblayout-wrapper">
                <div class="vdbcontent-layout">
                    <div class="vdbcontent-layout-row">
                        <div class="vdblayout-cell vdbcontent"><article class="vdbpost vdbarticle">
                                
                                <div class="vdbpostcontent vdbpostcontent-0 clearfix"><div class="vdbcontent-layout layout-item-0">
    <div class="vdbcontent-layout-row">
<?php include "$page.php";?>
    </div>
</div>
</div>
                                
                

</article></div>
                    </div>
                </div>
            </div>
    </div>
<footer class="vdbfooter">
  <div class="vdbfooter-inner">
<div class="vdbcontent-layout-wrapper layout-item-0">
<div class="vdbcontent-layout layout-item-1">
    <div class="vdbcontent-layout-row">
    <div class="vdblayout-cell layout-item-2" style="width: 50%">
        <p><br></p>
    </div><div class="vdblayout-cell layout-item-2" style="width: 50%">
        <p style="text-align: right;"><a href="#">Design by:</a><a href="http://www.vanstek.net">van Stek it consultancy</a></p>
    </div>
    </div>
</div>
</div>

  </div>
</footer>

</div>


</body></html>
<?php
//include "vars.php";
?>