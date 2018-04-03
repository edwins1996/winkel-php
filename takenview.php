<?php
include "connect.php";

if(isset($_GET['van'])){
    $van = $_GET['van'];
}elseif(!isset($_GET['van'])){
    $van = '';
}

if(isset($_GET['voor'])){
    $voor = $_GET['voor'];
}elseif(!isset($_GET['voor'])){
    $voor = '';
}
if(isset($_GET['view'])){
    $view = $_GET['view'];
}elseif(!isset($_GET['view'])){
    $view = '';
}

?>

<a href=?page=home>Home</a> - <a href=?page=taken>Taken</a><br><br>
<script src='jquery.min.js'></script>
<script>
$(document).ready(function(){
    $("#href-1").click(function(){
        $("#select-1").show();
        $("#href-1").css("font-weight", "bold");
        $("#href-1").css("color", "#DEDEDE");
        $("#href-2").css("color", "");
        $("#href-2").css("font-weight", "");
        $("#href-3").css("font-weight", "");
        $("#href-3").css("color", "");
        $("#select-2").hide();
    });
    $("#href-2").click(function(){
        $("#select-2").show();
        $("#href-2").css("font-weight", "bold");
        $("#href-2").css("color", "#DEDEDE");
        $("#href-1").css("color", "");
        $("#href-1").css("font-weight", "");
        $("#href-3").css("font-weight", "");
        $("#href-3").css("color", "");
        $("#select-1").hide();
    });
    $("#href-3").click(function(){
        $("#select-2").hide();
        $("#href-2").css("font-weight", "");
        $("#href-2").css("color", "");
        $("#href-1").css("color", "");
        $("#href-1").css("font-weight", "");
        $("#href-3").css("font-weight", "bold");
        $("#href-3").css("color", "#DEDEDE");
        $("#select-1").hide();
    });
    
    <?php if(isset($_GET['voor'])){?>
    $("#select-2").show();
        $("#href-2").css("font-weight", "bold");
        $("#href-2").css("color", "#DEDEDE");
        $("#href-1").css("color", "");
        $("#href-1").css("font-weight", "");
        $("#select-1").hide();
    
<?php } ?>
    
        <?php if(isset($_GET['van'])){?>
        $("#select-1").show();
        $("#href-1").css("font-weight", "bold");
        $("#href-1").css("color", "#DEDEDE");
        $("#href-2").css("color", "");
        $("#href-2").css("font-weight", "");
        $("#select-2").hide();
    
<?php } ?>
    
            <?php if(isset($_GET['view'])){?>
                $("#select-2").hide();
        $("#href-2").css("font-weight", "");
        $("#href-2").css("color", "");
        $("#href-1").css("color", "");
        $("#href-1").css("font-weight", "");
        $("#href-3").css("font-weight", "bold");
        $("#href-3").css("color", "#DEDEDE");
        $("#select-1").hide();
    
<?php } ?>
});
    
    
</script>
<script>
function url1(){
        var van = document.getElementById('select-1').value;
        
        location.replace("?page=takenview&van="+van);
    }
function url2(){
        var voor = document.getElementById('select-2').value;
        
        location.replace("?page=takenview&voor="+voor);
    }
function url3(){
        location.replace("?page=takenview&view=alle");
    }
    
</script>
<table border=0>
<?php


echo "
<tr><td colspan=8 rowspan=2>Selecteren op: <a href='#' id='href-1'>van</a> | <a href='#' id='href-2'>voor</a> | <a href='#' id='href-3' onclick='url3();'>alle</a>&nbsp;&nbsp;&nbsp;

<select id='select-1' onchange='url1();' style='display:none;'> ";
$SQL = mysqli_query($con, "SELECT * FROM taken GROUP BY van");
                                    
            while($row1 = mysqli_fetch_object($SQL)){
                
                echo "<option value='$row1->van'";
                if($row1->van == $van){ echo ' selected';}
                echo ">$row1->van</option>".chr(10);
                
            }
echo "</select>

<select id='select-2' onchange='url2();' style='display:none;'>";
$SQL = mysqli_query($con, "SELECT * FROM taken GROUP BY voor");
                                    
            while($row1 = mysqli_fetch_object($SQL)){
                
                echo "<option value='$row1->voor'";
                if($row1->voor == $voor){ echo ' selected';}
                echo ">$row1->voor</option>".chr(10);
                
            }
echo "</select>

</td></tr>
<tr></tr>
<tr><td colspan=8>&nbsp;</td></tr>
<tr style='font-weight:bold;'><td>Ingevoerd op</td><td>Van</td><td>Voor</td><td>Omschrijving</td><td>Opmerking</td><td>Afdoen voor</td><td>Afgedaan (ja/nee)</td><td></td></tr>";

if(isset($_GET['van'])){
    $vansel = "SELECT * FROM taken WHERE van = '$van'";
    $selvan = mysqli_query($con, $vansel);
    
    while($fetchvan = mysqli_fetch_object($selvan)){
    
echo "<tr><td>$fetchvan->datum</td><td>$fetchvan->van</td><td>$fetchvan->voor</td><td>$fetchvan->omschrijving</td><td>$fetchvan->opmerking</td><td>$fetchvan->datumafdoen</td>

<td>";
        if($fetchvan->afgedaan == 0){
            echo "nee";
        }elseif($fetchvan->afgedaan == 1){
            echo "ja";
        }
        echo "</td>

<td><a href='?page=takenedit&taakid=$fetchvan->taakid'><img src='images/button_edit.png' style='margin:2px;'/></a></td></tr>";
        
    }
}

if(isset($_GET['voor'])){
    $voorsel = "SELECT * FROM taken WHERE voor = '$voor'";
    $selvoor = mysqli_query($con, $voorsel);
    
    while($fetchvoor = mysqli_fetch_object($selvoor)){
    
echo "<tr><td>$fetchvoor->datum</td><td>$fetchvoor->van</td><td>$fetchvoor->voor</td><td>$fetchvoor->omschrijving</td><td>$fetchvoor->opmerking</td><td>$fetchvoor->datumafdoen</td>

<td>";
        if($fetchvoor->afgedaan == 0){
            echo "nee";
        }elseif($fetchvoor->afgedaan == 1){
            echo "ja";
        }
        echo "</td>

<td><a href='?page=takenedit&taakid=$fetchvoor->taakid'><img src='images/button_edit.png' style='margin:2px;'/></a></td></tr>";
        
    }
}
    
    if(isset($_GET['view'])){
    $voorsel = "SELECT * FROM taken";
    $selvoor = mysqli_query($con, $voorsel);
    
    while($fetchvoor = mysqli_fetch_object($selvoor)){
    
echo "<tr><td>$fetchvoor->datum</td><td>$fetchvoor->van</td><td>$fetchvoor->voor</td><td>$fetchvoor->omschrijving</td><td>$fetchvoor->opmerking</td><td>$fetchvoor->datumafdoen</td>

<td>";
        if($fetchvoor->afgedaan == 0){
            echo "nee";
        }elseif($fetchvoor->afgedaan == 1){
            echo "ja";
        }
        echo "</td>

<td><a href='?page=takenedit&taakid=$fetchvoor->taakid'><img src='images/button_edit.png' style='margin:2px;'/></a></td></tr>";
        
    }
}
?>
</table>