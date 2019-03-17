<?php 

	session_start();
	include("../connect.php");
	$id_dep=$_SESSION['id_dep'];

	$nom=$_POST["nom"];
	$cof=$_POST["cof"];
	$cre=$_POST["cre"];
	$ann=$_POST["ann"];
	$tea=$_POST["tea"];
	$typ=$_POST["typ"];
	$eva=$_POST["eva"];

	mysqli_query($connect,"insert into module 
				values ('','$nom','$cof','$cre','$tea','$id_dep','$ann','$typ','$eva')");

 ?>