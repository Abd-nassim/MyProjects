<?php 
	session_start();
	include("../connect.php");

	$matt_etu=$_POST["matt_etu"];
	$Module=$_POST["Module"];
	$Td=$_POST["Td"];
	$Tp=$_POST["Tp"];
	$Ex=$_POST["Ex"];	
	$moyenne=$_POST["moyenne"];

	$query_etudiant="update note
						set td='$Td', tp='$Tp', examen='$Ex', moyenne='$moyenne'
						where matricule_etu='$matt_etu' and id_module='$Module'";

         	mysqli_query($connect,$query_etudiant);

 ?>