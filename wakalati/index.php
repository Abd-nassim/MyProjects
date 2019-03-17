



<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Login wakalti</title>
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
  <h2>Veillez vous Connecté </h2>
  <form method="post" action="">
    <div class="form-group">
      <label for="text">Nom:</label>
      <input type="text" class="form-control"  placeholder="Entrer votre nom" name="nom" >
      
    </div>
    <div class="form-group">
      <label for="pwd">Mot de passe:</label>
      <input type="password" class="form-control"  placeholder="Entrer votre mot de passe" name="password" >
      <br>
    </div>
 
     
    <button type="submit" name="validé" class="btn btn-default" id="validé" name="validé">Valider</button>
    
 <br>

   <font color="white">mot de passe  oublier?</font> 

     <a href="send.php">
   <font color="red">cliquer ici</font> 
   
    </a>


  </form>

</div>


</body>
</html>







<?php 

if( !empty($_POST['nom']) && !empty($_POST['password'])  &&  isset($_POST['validé']) ) {
	
//recupérer les donnee du formulaire


	
$conn=new mysqli('www.a5barlyoum.com','a5barlyo_user','H^Os8)Ro3kSx','a5barlyo_Wakalati');

$nom=$_POST['nom'];	
$password=$_POST['password'];

if($conn){
	
}
else{echo"erreur";}


$req="select nom,password
 	  from admin
 	  where nom='$nom' 
 	  and password='$password' ";

$users = mysqli_query($conn,$req);		
if(!$users){
			die("ERROR requet");
		}		
$user = mysqli_fetch_array($users);
	
	if($user[0]==""){
		include("alert5.html");

	
	}

  else{
		session_start();
		$_SESSION['nom']=$user["nom"];
		$_SESSION['password']=$user["password"];
		header("location:../wakalati/wakala.php");
		
		}
	
}




 if( ( empty($_POST['nom']) || empty($_POST['password']) )
      && isset($_POST['validé'] ) ) {

  include("alert2.html");

 }
?>






</body>
</html>






