<?php 

	include("../connect.php");

	$pre_matt=$_POST['pre_matt'];

	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$asg=$_POST['asg'];
	$matt=$_POST['matt'];
	$pass=$_POST['pass'];

	mysqli_query($connect,"update etudiant 
				 set  matricule_etu='$matt', password_etu='$matt', nom='$nom', prenom='$prenom' ,id_groupe='$asg'  
				 where matricule_etu='$pre_matt' " );






?>