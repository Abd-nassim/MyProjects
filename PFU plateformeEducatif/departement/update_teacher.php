<?php 

	session_start();
	include("../connect.php");
	$id_dep=$_SESSION['id_dep'];

	$pre_matt=$_POST['pre_matt'];

	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$email=$_POST['email'];
	$matt=$_POST['matt'];
	$pass=$_POST['pass'];

	mysqli_query($connect,"update enseignant 
					set  matricule_ens='$matt', password_ens='$pass', nom='$nom', prenom='$prenom', email='$email' 
					where id_departement='$id_dep' and matricule_ens='$pre_matt' ");

 ?>