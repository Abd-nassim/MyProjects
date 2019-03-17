<?php 

	session_start();
	include("../connect.php");

	$matricule=$_SESSION['matricule'];
	$password=$_POST['Password'];

	mysqli_query($connect, "UPDATE enseignant 
							SET password_ens= '$password' 
							WHERE matricule_ens = '$matricule' ");

 ?>