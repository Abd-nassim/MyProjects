<?php 

	session_start();
	include("../connect.php");

	$matricule=$_SESSION['matt_etu'];
	$password=$_POST['Password'];

	mysqli_query($connect, "UPDATE etudiant 
							SET password_etu= '$password' 
							WHERE matricule_etu = '$matricule' ");

 ?>