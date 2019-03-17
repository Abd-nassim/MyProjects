<?php 
	session_start();
	include("../connect.php");

	$matt_etu=$_SESSION['matt_etu'];
	$id_module=$_SESSION['id_module'];
	
	$mess=$_POST['Mess'];

	$date=date('Y/m/d');

	mysqli_query($connect,"insert into reclam values ('','$matt_etu','$id_module','$date','$mess','T')");
 ?>