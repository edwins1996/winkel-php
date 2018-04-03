<?php
include 'connect.php';
?>	

<html>
	<head></head>
	<body>
	<table width=100%">
	<tr>
	<td colspan=2 >
	<div class="vdblayout-cell layout-item-1" style="width: 25%" >
        <p style="text-align:center;"><a href="?page=kantoor" class="vdbbutton">kantoor</a>&nbsp;<br></p>
    </div>
	<div class="vdblayout-cell layout-item-2" style="width: 25%" >
        <p style="text-align:center;"><a class="vdbbutton" href="?page=balie">balie</a><br></p>
    </div>
	<div class="vdblayout-cell layout-item-1" style="width: 25%" >
        <p style="text-align:center;"><a class="vdbbutton" href="?page=cabine">cabine</a></p>
    </div>
    <div class="vdblayout-cell layout-item-1" style="width: 25%" >
        <p style="text-align:center;"><a class="vdbbutton" href="?page=taken">taken</a></p>
    </div>    
	<div class="vdblayout-cell layout-item-1" style="width: 25%" >
        <p style="text-align:center;"><a class="vdbbutton" href="?page=logout">uitloggen</a></p>
    </div>
	</td>
	</tr>
	<tr>
	<td colspan=2>
	&nbsp;
                                                                              </td>
	<tr><td colspan=2>
	<h1 style="text-align: left;"><span style="color: rgb(178, 178, 178); font-family: 'Century Gothic'; font-size: 15px; text-transform: none;">Vandaag jarig:</span><br></h1><p style="text-align:left;"><br>
    </td>
	</tr>
	<tr>


<?php
$vandaag= DATE("m-d");


$sql = "SELECT * FROM clientes WHERE DATE_FORMAT(`geboortedatum`,'%m-%d')='$vandaag'";
$result = mysqli_query($con, $sql);



if (mysqli_num_rows($result) == 0){
		echo "<tr><td colspan=2>Er zijn geen cliënten jarig vandaag.</td></tr>";
}
else {
    while($row = mysqli_fetch_object($result)){
echo "<tr><td> $row->aanhef $row->voorletters $row->tussenvoegsel $row->NOMBRECLIENTE, $row->voornaam</td>
<td>". date('d-m-Y', strtotime($row->geboortedatum))."</td>
</tr>";
    }
}
mysqli_free_result($result);
?>
	</td>
	</tr>
    	<tr><td colspan=2>
	<h1 style="text-align: left;"><span style="color: rgb(178, 178, 178); font-family: 'Century Gothic'; font-size: 15px; text-transform: none;">Volgende week jarig:</span><br></h1><p style="text-align:left;"><br>
    </td>
	</tr>
    
    
    <?php
    
    $week_start = new DateTime();
    $week_start->setISODate(date('Y'), date('W', strtotime('+1 week')));
    $datum = $week_start->format('m-d');
    $week_end = new DateTime();
    $week_end->setISODate(date('Y'), date('W', strtotime('+2 weeks')));
    $weekeinde = $week_end->format('m-d');
    
   
    
   $birth1 =  "SELECT aanhef, voorletters, tussenvoegsel, NOMBRECLIENTE, voornaam, geboortedatum FROM clientes WHERE DATE_FORMAT(`geboortedatum`,'%m-%d') >= '$datum' AND DATE_FORMAT(`geboortedatum`,'%m-%d') < '$weekeinde'";
    
    $birth = mysqli_query($con, $birth1);
    
    while($fetchbirth = mysqli_fetch_object($birth)){
        echo "<tr>
        
        <td> $fetchbirth->aanhef $fetchbirth->voorletters $fetchbirth->tussenvoegsel $fetchbirth->NOMBRECLIENTE, $fetchbirth->voornaam</td>
        <td>". date('d-m-Y', strtotime($fetchbirth->geboortedatum))."</td>
        
    </tr>";
    }
    
    
    ?>
   
	</table>
	</body>
	</html>