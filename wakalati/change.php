<?php
session_start();
if(!isset($_SESSION['nom']) ){  header("location:index.php");}
 include("nav.html"); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>wakalti</title>
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
padding-top: 80px;}


body {
    background-color:#282828;
}

h2,label{ color: white; }
</style>




 
<div class="login"></div>
  <h2>Changement de mot de passe </h2>
  <form method="post" action="">
    <div class="form-group">
      <label for="text">Anien mot de passe:</label>
      <input type="password" class="form-control"  placeholder="Entrer votre password" name="password" >

        <label for="text">Nouveau mot de passe:</label>
      <input type="password" class="form-control"  placeholder="Entrer votre ancien password" name="new_password1" >

      
    </div>
    <div class="form-group">
      <label for="pwd">Confirmer noveau mot de passe:</label>
      <input type="password" class="form-control"  placeholder="Entrer votre nouveau password" name="new_password2" >
      <br>
    </div>
 
     
    <button type="submit" name="validé" class="btn btn-default">Valider</button>
    <button type="reset" name="reset" class="btn btn-default">Annuller</button>
  </form>

</div>


</body>
</html>


</style>

	


<?php 

if( !empty($_POST['new_password1']) && !empty($_POST['new_password2'])&& !empty($_POST['password']) && 
  isset($_POST['validé'] ) ) {

$conn=new mysqli('localhost','root','','wakalati');



$password=$_POST['password'];

$new_password1=$_POST['new_password1'];
$new_password2=$_POST['new_password2'];

if(!$conn){echo"erreur";}


			
$req2="UPDATE admin set password='$new_password1'
 where password='$password' and '$new_password1'='$new_password2' and '$password'!='$new_password1' "; 

$req3="SELECT password from admin where password='$new_password1' ";
mysqli_query($conn,$req2);	

$a=mysqli_query($conn,$req3);	

$b=mysqli_fetch_array($a);
if($b[0]==""){
  include("alert3.html");

}else {

include("alert4.html");
}
		}


    if( ( empty($_POST['new_password1']) || empty($_POST['new_password2'])|| empty($_POST['password']) )
      && isset($_POST['validé'] ) ) {

include("alert2.html");

    }

?>
</body>
</html>



