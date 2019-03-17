<?php 

	session_start();
$conn=new mysqli('localhost','root','','wakalati');
	$nom=$_SESSION['nom'];



$nom=$_POST['nom'];
$adresse=$_POST['adresse'];
$ville=$_POST['ville'];
$email=$_POST['email'];
$localisation=$_POST['localisation'];
$numero=$_POST['numerotelephone'];


echo $ville;


	mysqli_query($connect,"update wakala 
					set  ville='$ville', localisation='$localisation', nom='$nom', adresse='$adresse', email='$email' ,numerotelephone='numerotelephone'
					where nom='$nom'  ");

 ?>