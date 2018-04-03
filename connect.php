<?php
$con = mysqli_connect("localhost","root","root","vdboom");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to mysqli: " . mysqli_connect_error();
  }
if (session_status() == PHP_SESSION_NONE) {
session_start();

}
$request="SELECT * FROM variabelen";
$query = mysqli_query($con, $request);
while ($variabele = mysqli_fetch_object($query)){
$_SESSION[$variabele->variabele] = $variabele->waarde;
}
if(isset($_SESSION["gebruikersnummer"])){
//echo 'niettest';
}
else{
	
	//echo 'test';
	header("location: login.php");
}

?>