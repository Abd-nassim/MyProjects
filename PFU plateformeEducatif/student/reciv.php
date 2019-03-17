<?php 
	
	include('../connect.php');
	session_start();

	$matt_etu=$_SESSION['matt_etu'];

		$sql="select matricule_etu, reclam_date, id_reclam, id_module, view from reclam 
		  where matricule_etu='$matt_etu' 
		  and (view='T' or view='t') ";

	$resulte=mysqli_query($connect,$sql);

	while($message=mysqli_fetch_array($resulte)){
		$enseignant=mysqli_fetch_array(mysqli_query($connect,"select e.nom, e.prenom from enseignant e,module m where m.id_module='$message[3]' and m.matricule_ens=e.matricule_ens"));
		$mess="$message[2]";
		if($message[4]=="T")
			echo "<input class='messages_button' type='button' onclick='showMessage($mess)' value='from: $enseignant[1] $enseignant[0]' title='$message[1]' />";
		else
			echo "<input style='background:#999;' class='messages_button' type='button' onclick='showMessage($mess)' value='from: $enseignant[1] $enseignant[0]' title='$message[1]' />";
	}

 ?>