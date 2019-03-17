<?php 
	
	include('../connect.php');
	session_start();

	$matricule=$_SESSION['matricule'];

		$sql="select r.matricule_etu, r.reclam_date, r.id_reclam, r.id_module, r.view from reclam r,module m, enseignant e
		  where r.id_module=m.id_module and m.matricule_ens=e.matricule_ens and e.matricule_ens='$matricule' 
		  and (view='S' or view='s') ";

	$resulte=mysqli_query($connect,$sql);

	while($message=mysqli_fetch_array($resulte)){
		$etudiant=mysqli_fetch_array(mysqli_query($connect,"select nom, prenom from etudiant where matricule_etu='$message[0]' "));
		$mess="$message[2]";
		if($message[4]=="S")
			echo "<input class='messages_button' type='button' onclick='showMessage($mess)' value='from: $etudiant[1] $etudiant[0]' title='$message[1]' />";
		else
			echo "<input style='background:#999;' class='messages_button' type='button' onclick='showMessage($mess)' value='from: $etudiant[1] $etudiant[0]' title='$message[1]' />";
	}

 ?>