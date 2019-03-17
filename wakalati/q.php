<?php
session_start();
if(!isset($_SESSION['nom']) ){  header("location:index.php");}
include("nav.html"); 



?>
	


<!DOCTYPE html>
	<html>
	<head>
		<title>Wakalati</title>
	</head>
	<body>
	
		

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>

<div class="container">
 <table class="table table-condensed">
		<form method="post">


				 <thead>
		<tr>
			<th>nom: </th>
			<th>Adresse: </th>
			<th>ville: </th>
			<th>Email: </th>
			<th>Localisation: </th>
			<th>Numero telephone:: </th>
     	</tr>
		 </thead>

		

	

<?php

$conn=new mysqli('localhost','root','','wakalati');
$req="SELECT * from wakala";
$compte = mysqli_query($conn,$req);
	
while ($result=mysqli_fetch_array($compte)) {
  	
	echo'
 <tbody>
	<tr>
	
	<th><input type="text ">'.$result['nom'].' </th> 
	<th>'.$result['adresse'].'  </th> 
	<th>'.$result['ville'].'  </th> 
	<th>'.$result['email'].'  </th> 
	<th>'.$result['localisation'].'  </th> 
	<th>'.$result['numero'].'  </th> 


	<th>    <a href="#" class="btn btn-info btn-xs">
          <span class="glyphicon glyphicon-pencil"></span> Modifier 
         </a>                                                          </th> 


         <th>    <a href="#" class="btn btn-danger btn-xs">
          <span class="glyphicon glyphicon-minus"></span> Supprimer 
         </a>                                                          </th> 


	
	'

	; }

  ?>
     <tbody>       
</tr>		
	</form>
</div>

</table>
</body>
</html>



<script type="text/javascript">
	

function updateTeacher(nom,adresse,ville,email,localisation,numero){

	var nom=$("#nom_"+id);
	var adresse=$("#adresse"+id);
	var ville=$("#ville"+id);
	var localisation=$("#localisation"+id);
	var numero=$("#numero"+id);

	


	$.post("update_wakala.php",{nom:nom.val(),prenom:prenom.val(),email:email.val(),matt:matt.val(),pass:matt.val(),pre_matt:pre_matt},enseignant());
	enseignant();
	enseignant();

	console.log(nom.val()+" "+prenom.val()+" "+email.val()+" "+matt.val()+" "+pass.val());
}

</script>
