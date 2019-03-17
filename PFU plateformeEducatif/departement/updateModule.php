<?php 

	session_start();
	include("../connect.php");
	$id_dep=$_SESSION['id_dep'];

	$id_module=$_POST['id_module'];
	$nom=$_POST["nom"];
	$cof=$_POST["cof"];
	$cre=$_POST["cre"];
	$ann=$_POST["ann"];
	$tea=$_POST["tea"];
	$typ=$_POST["typ"];
	$eva=$_POST["eva"];

	mysqli_query($connect,"update module
				 set nom_module='$nom', coefficient='$cof', credit='$cre', id_annee='$ann', matricule_ens='$tea', type='$typ', id_evaluation='$eva' 
				 where id_module='$id_module' ");

 ?>