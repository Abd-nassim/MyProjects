<?php 
	
	session_start();

if(!isset($_SESSION['interface']) and !isset($_POST['go'])) 
	header("location:../index.php");

		include("../connect.php");

if(isset($_SESSION['interface'])){

	if($_SESSION['interface']=='etudiant')
		header('location: ../student/etu_confirme.php');
	else  if($_SESSION['interface']=='departement')
        header('location: ../departement/depa_confirme.php');

}

	if(isset($_POST['go'])){		

		$matricule=$_POST['Matt'];
		$password=$_POST['Pass'];
	
		if(isset($_POST['Module']))
			$Module=$_POST['Module'];
		if(isset($_POST['Groupe']))
			$Groupe=$_POST['Groupe'];

//		echo "<p style='font-color:white'; >$matricule  $password  $Module $Groupe </p>";

		$query="select m.nom_module, e.nom, e.prenom, e.matricule_ens
				from module m
				join enseignant e
				on m.matricule_ens=e.matricule_ens
				where e.matricule_ens='$matricule' and e.password_ens='$password' 
				or e.nom='$matricule' and e.password_ens='$password'  ";

		if(!$result=mysqli_query($connect,$query)) die('Failed');

		if(!$line=mysqli_fetch_array($result)){
			header("location:../index.php?content=enseignant&falt=1");
		} else {		
			$nom=$line[1];	
			$prenom=$line[2];
			$_SESSION['nom']=$nom;
			$_SESSION['prenom']=$prenom;
		$_SESSION['matricule']=$line[3];
		$_SESSION['password']=$password;
		$_SESSION['interface']='enseignant';
	
		}

		if(isset($_POST['Matt_etu'])){
			$matt_etu=$_POST['Matt_etu'];		  	
		}
				
	}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<link rel="stylesheet" href="teacher.css">
 	<link rel="shortcut icon" href="../logo.png" />
 	<script src="../jquery.js" ></script>
 	<script src="teacher.js" ></script>
 	<title> <?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?> </title>
 </head>
 <body>
 	<div class="header"> 
 		<div style='float:left;' >Bien Venu: <?php echo $_SESSION['nom']." ".$_SESSION['prenom'] ?></div>
 		<br>
		 <div id="config"> 
			• Configuration •<hr/>
			<div id="config_slide">
 			<input type='button' value='Settings' class='messages_top' onclick='settings()' />
			<form action="logout.php" method="post" >
				<input type='submit' value='LogOut' class='messages_top' />
			</form>
 		</div>
 		</div>
 
 	 </div>	
	<div class="module">
		<center>	
		<p style='font-size:26px;'>les Module </p>
		<?php 
			$matricule=$_SESSION['matricule'];
			$query_module="select m.id_module, m.nom_module, a.nom_annee, m.type
							from module m
							join enseignant e
							on m.matricule_ens=e.matricule_ens
							join annee a
							on m.id_annee=a.id_annee
							where e.matricule_ens='$matricule'
							";
			
			if(!$result_module=mysqli_query($connect,$query_module))	echo "no result";		
			while($module=mysqli_fetch_array($result_module)){
				echo "<hr>";
				$password=$_SESSION['password'];
				echo "
					<input type='button' value='$module[2]-$module[1]' onclick='getModule(\"$module[0]\",\"$module[3]\")' class=module_button />
				 ";

				 $query_groupe="select g.id_groupe, g.num_groupe, a.specialite
						from annee a
						join groupe g
						on g.id_annee=a.id_annee
						join module m
						on m.id_annee=g.id_annee
						where m.id_module='$module[0]' "
						;
						$result_groupe=mysqli_query($connect,$query_groupe);
						while($groupe=mysqli_fetch_array($result_groupe)){
							if($groupe[1]!=0){
							echo "<center> <input type='button' name='go' value='G:$groupe[1]' onclick='getGroupe(\"$module[0]\",\"$module[3]\",$groupe[0])' class=groupe_button /> </center>";
								} else {
								echo "<center> <input type='button' name='go' value='S:$groupe[2]' onclick='getGroupe(\"$module[0]\",\"$module[3]\",$groupe[0])' class=groupe_button /> </center>";
								}
						}

			}
		 ?>
		</center>
	</div>

	<div class="content">
		<?php 
			if(!isset($Module)){
				echo "Main";
			} 
		 ?>
	</div>
	 <!--             * * * * * * * * * * * * * * *     Les Message     * * * * * * * * * * *    -->
             <?php include("message.php"); ?>
 	<div class="footer"> thanks for visiting! </div>
 </body>
 </html>
