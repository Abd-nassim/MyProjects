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
 .table{
 	margin: auto;	}
.input1{display: none;}

</style>

 <h2>Ici s'affichent tout vos donnees !</h2>
    <h3> cliquer sur modifier ou supprimer pour les modifier</h3>

<div class="table" >

 <table class="table table-bordered" >
	


				 <thead>
		<tr style="color: #fff; background: #282828;">
			<th > nom: </th>
			<th>Adresse: </th>
			<th>ville: </th>
			<th>Email: </th>
			<th >Localisation: </th>
			<th>Numero phone</th>
     	</tr>
		 </thead>

		

	

<?php

$conn=new mysqli('localhost','root','','wakalati');
$req="SELECT * from wakala";
$compte = mysqli_query($conn,$req);

if(isset($_POST['Supprimer'])) {
  	
  	$num=$_POST['num'];
echo $num;

$req2="delete  from wakala where num='$num' "; 
mysqli_query($conn,$req2); 
 header('Location:Show_wakala.php');



}   

if(isset($_POST['Modifier'])) { 
  	
$num=$_POST['num'];
echo $num;

$nom=$_POST['nom'];
$adresse=$_POST['adresse'];
$ville=$_POST['ville'];
$email=$_POST['email'];
$localisation=$_POST['localisation'];
$numero=$_POST['numerotelephone'];

echo $nom;
echo $adresse;
echo $ville;
echo $email;
echo $localisation;

echo $numero;



mysqli_query($conn,"update wakala 
set nom='$nom', adresse='$adresse',ville='$ville', email='$email',  localisation='$localisation'
, numero='$numero' 

					where num='$num'  ");
header('Location:Show_wakala.php');


}   


while ($result=mysqli_fetch_array($compte)) {

 



  	
	echo'
 <tbody>
	<tr>
		<form method="post" >
	<input class="input1"  name="num" 
	value="'.$result['num'].'" size="0" > 

	<td><input  type="text" name="nom" size="17" value="'.$result['nom'].'" 
	placeholder=""> </td> 

	<td><input type="text" name="adresse"  size="17" value="'.$result['adresse'].'"
	  placeholder="" > </td> 

	<td><input type="text" name="ville" size="17" value="'.$result['ville'].'"    
	placeholder="" > </td> 

	<td><input type="text" name="email" size="17" value="'.$result['email'].'"    
	placeholder="" >  </td> 

	<td><input type="text" name="localisation" size="17" value="'.$result['localisation'].'"    
	placeholder="" >  </td> 

	<td><input type="text" name="numerotelephone" size="17" value="'.$result['numero'].'"  
	  placeholder="">  </td> 


  


	<td>    

	<button type="submit" class="btn btn-info btn-xs " id="Modifier" name="Modifier">Modifier
	 <span class="glyphicon glyphicon-pencil"></span>  
	</button>
       
    </td> 


         <td>    
         <button type="submit" class="btn btn-danger btn-xs " id="Supprimer" name="Supprimer">Supprimer
          <span class="glyphicon glyphicon-minus"></span> </button>

	</form>
         </td> 

</tr>		

	
	'

	; 


                        
}

  ?>
  </div>
     <tbody>       



</table>
</body>
</html>



