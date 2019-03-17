<?php 

	session_start();
	include("../connect.php");

	$matt_etu=$_POST["matt_etu"];
	$Module=$_POST["Module"];
	$Td=$_POST["Td"];
	$Tp=$_POST["Tp"];
	$Ex=$_POST["Ex"];	
	$moyenne=$_POST["moyenne"];

	$query_etudiant="insert into note values ('$matt_etu','$Module','$Td','$Tp','$Ex','$moyenne') ";

	 mysqli_query($connect,$query_etudiant);
		  				

 ?>