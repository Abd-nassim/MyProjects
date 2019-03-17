<?php 

	include("../connect.php");

	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$asg=$_POST['asg'];
	$matt=$_POST['matt'];
	$pass=$_POST['pass'];

	mysqli_query($connect,"insert into etudiant   values ('$matt','$pass','$nom','$prenom','$asg','') ");

 ?>