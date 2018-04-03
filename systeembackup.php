<a href=?page=home>Home</a> - <a href=?page=kantoor>Kantoor</a> - <a href=?page=systeembeheer>Systeembeheer</a>
<br /><br />

De database is opgeslagen.
<?php
 //ENTER THE RELEVANT INFO BELOW
 /*$mysqlDatabaseName ='vdboom';
 $mysqlUserName ='root';
 $mysqlPassword ='';
 $mysqlHostName ='192.168.1.13';
 $mysqlImportFilename ='backupvdb.sql';

 //DO NOT EDIT BELOW THIS LINE
 //Export the database and output the status to the page
 $command='mysqli -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ' .$mysqlImportFilename;
 exec($command,$output=array(),$worked);
 switch($worked){
     case 0:
         echo 'Export file <b>' .$mysqlDatabaseName .'</b> successfully exported to database <b>' .$mysqlImportFilename .'</b>';
         break;
     case 1:
         echo 'There was an error during import. Please make sure the export file is saved in the same folder as this script and check your values:<br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>MySQL User Name:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' .$mysqlHostName .'</b></td></tr><tr><td>MySQL Import Filename:</td><td><b>' .$mysqlImportFilename .'</b></td></tr></table>';
         break;
 }*/

$datum = date('d-m-Y');
$output = shell_exec('cd C:\xampp\mysql\bin && mysqldump vdboom -u root -proot > C:\xampp\htdocs\vdboom\vdboom\database\vdboom-database-'.$datum.'.sql');
echo "<pre>$output</pre>";
 ?>