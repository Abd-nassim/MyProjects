<?php 


	session_start();

if(isset($_SESSION['interface'])){

	if($_SESSION['interface']=='etudiant')
		header('location: student/etu_confirme.php');
	else if($_SESSION['interface']=='enseignant')
		header('location: teacher/ensei_confirme.php');
	else if($_SESSION['interface']=='departement')
		header('location: departement/depa_confirme.php'); 
	
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="index/index.css"/>
	<meta charset="UTF-8"/>
	<title>interface</title>
	<link rel="shortcut icon" href="logo.png" />
	<script src="jquery.js" ></script>
	<script src="index/index.js" ></script>
</head>
<center>
<body>
	<?php include('index/header.html'); ?>
	<div class="interface_button" >
		 <input type="button" value="About" onclick='about()' class="button_i" id="about" />
		 <input type="button" value="Departement" onclick='departement()' class="button_i" id="departement" />	
		 <input type="button" value="Enseignant" onclick='enseignant()' class="button_i" id="enseignant" />			 	
		 <input type="button" value="Etudiant" onclick='etudiant()' class="button_i" id="etudiant" />
	 </div>
	 <center>
	 <div class="content">
	 	<?php 
	 		if(isset($_GET['content'])){
	 			include($_GET['content'].".php");
	 		}
	 	 ?>
	 </div>
</body>
</center>
</html>