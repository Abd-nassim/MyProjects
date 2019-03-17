<?php 

	session_start();
	include("../connect.php");

	$id_dep=$_SESSION['id_dep'];
	$password=$_POST['Password'];

	mysqli_query($connect, "UPDATE departement 
							SET pass_dep= '$password' 
							WHERE id_departement = '$id_dep' ");

 ?>