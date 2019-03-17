<?php 

	session_start();
	include("../connect.php");
	$id_dep=$_SESSION['id_dep'];

	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$email=$_POST['email'];
	$matt=$_POST['matt'];
	$pass=$_POST['pass'];

	mysqli_query($connect,"insert into enseignant values ('$matt','$pass','$nom','$prenom','$email','$id_dep') ");

 ?>