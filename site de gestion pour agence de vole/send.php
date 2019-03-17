



<!DOCTYPE html>
<html lang="fr">
<head>
  <title>recuperation de password</title>
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body align="center" >


<style type="text/css"> 
.form-group { 
 margin: auto; 
 max-width: 300px;
 padding: 7px;
  padding-bottom:  10px;
 }
.login{margin: auto;
padding-top: 10%;
padding-bottom: 2%  ;
}

p{
  font:white;
}


body {
    background-color:#282828;
}

h2,label{ color: white; }
</style>




 
<div class="login">
  <h2>Veillez remplir ce fomulaire  </h2>
  <form method="post" action="">
    <div class="form-group">
      <label for="text">Nom:</label>
      <input type="text" class="form-control"  placeholder="Entrer votre nom" name="nom" >
      
    </div>
    <div class="form-group">
      <label for="email">email:</label>
      <input type="email" class="form-control"  placeholder="Entrer votre email" name="email" >
      <br>
    </div>
 
     
    <button type="submit" name="validé" class="btn btn-default" id="validé" name="validé">Valider</button>
    
 

  </form>

</div>


</body>
</html>












<?php

?>










<?php 

if( !empty($_POST['nom']) && !empty($_POST['email'])  &&  isset($_POST['validé']) ) {
	
//recupérer les donnee du formulaire


	
$conn=new mysqli('localhost','root','','wakalati');


$nom=$_POST['nom'];	
$email=$_POST['email'];


if($conn){
	
}
else{echo"erreur";}



$req="select nom,password
 	  from admin";

$users = mysqli_query($conn,$req);		
   

$user = mysqli_fetch_array($users);
	
	if($user['nom']==$nom){
	
	$msg = "votre mot de passe est :" .$user['password'] ;

mail($email,"Password recover ",$msg);

	}

  else{
	
		 include("alert6.html");
		}
	
}




 if( ( empty($_POST['nom']) || empty($_POST['email']) )
      && isset($_POST['validé'] ) ) {

  include("alert2.html");

 }
?>






</body>
</html>






